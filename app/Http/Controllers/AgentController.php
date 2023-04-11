<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyAgent;
use App\Models\User;
use App\Models\Invitation;
use App\Notifications\InviteAgent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Notification;
use Log;
use Auth;

class AgentController extends Controller
{
    public function index (Request $request)
    {

        //$email = 'abdulmanan4d@gmail.com';
        //$url = route('agents.register', base64_encode($email));
        //Notification::route('mail', $email)->notify(new InviteAgent(['name' => 'Abdul Manan', 'url' => $url]));

        $agents = Invitation::orderBy('id', 'desc');

        if ($request->filled('name')) {
            $agents->where('email', 'LIKE', '%'. $request->name . '%');
        }

        $agents = $agents->paginate(50);
        return view('agents.index', get_defined_vars());
    }

    public function invite ()
    {
        return view('agents.invite');
    }

    public function sendInvitation (Request $request)
    {
        $this->validate($request, [
            'emails' => 'required'
        ]);
        $emailArr = [];

        $emails = explode(PHP_EOL, $request->emails);
        foreach($emails as $email) {
            $emails1 = explode(',', $email);
            foreach($emails1 as $email1) {
                $emails2 = explode(' ', $email1);
                foreach($emails2 as $email2) {
                    $emailArr[] = $email2;
                }
            }
        }

        $authId = Auth::id();
        foreach($emailArr as $email) {
            $companyId = Auth::user()->company_id;
            $invitation = Invitation::where('email', $email)->where('company_id', $companyId)->first();
            $contactPerson = User::role('Contact_Person')->where('company_id', $companyId)->first();
            if (!$invitation) {
                Invitation::where('email', $email)->where('company_id', $companyId)->delete();
                Invitation::create(['email' => $email, 'company_id' => $companyId]);

                try {
                    $url = route('agents.register', base64_encode($companyId.'|'.$email));
                    // dd($url);
                    Notification::route('mail', $email)->notify(new InviteAgent(['name' => $contactPerson->name, 'url' => $url]));
                } catch (\Exception $e) {
                    Log::error('Email not sent: ' . $e->getMessage());
                }
            }
        }

        Session::flash('success', 'Email successfully sent to Agents');
        return redirect()->route('agents.index');
    }

    public function register ($email)
    {
        $email = base64_decode($email);
        $data = explode('|', $email);
        $companyId = @$data[0];
        $email = @$data[1];

        $invitation = Invitation::where('email', $email)->where('company_id', $companyId)->first();
        if ($invitation) {
            if(!$invitation->status) {
                $company = Company::find($companyId);

                $user = User::where('email', $email)->first();
                if ($user) {
                    $invitation->status = 1;
                    $invitation->save();
                    CompanyAgent::updateOrCreate(['user_id'=>$user->id, 'company_id' => $companyId]);

                    Session::flash('success', 'Account successfully created');
                    return redirect()->route('login');
                }

                return view('agents.register', get_defined_vars());
            } else {
                Session::flash('error', 'You have already account');
                return redirect()->route('login');
            }
        }

        Session::flash('error', 'invalid link');
        return redirect()->route('login');
    }

    public function createAgent (Request $request, $email)
    {
        $this->validate($request, [
            'company_name' => ['required', 'string', 'max:60'],
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'phone' => ['required', 'string', 'max:30'],
            'username' => ['required', 'string', 'alpha_dash', 'max:60', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'invited' => ['nullable', 'string', 'max:30'],
        ]);

        $companyId = $request->company_id;
        $invitation = Invitation::where('email', $email)->where('company_id', $companyId)->first();
        if ($invitation && !$invitation->status) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $invitation->status = 1;
                $invitation->save();
                CompanyAgent::updateOrCreate(['user_id'=>$user->id, 'company_id' => $companyId]);

                Session::flash('success', 'Account successfully created');
                return redirect()->route('login');
            }
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $email,
                'username' => $request->username,
                'company_name' => $request->company_name,
                'phone' => $request->phone,
                'invited' => $request->invited,
                'password' => Hash::make($request->password),
            ]);
            if ($user) {

                CompanyAgent::updateOrCreate(['user_id'=>$user->id, 'company_id' => $companyId]);

                $user->syncRoles('Agent');

                if ($request->hasFile('photo')) {
                    $user->addMediaFromRequest('photo')->toMediaCollection('avatar');
                }

                $invitation->status = 1;
                $invitation->save();
            }

            Session::flash('success', 'Account successfully created');
            return redirect()->route('login');
        }

        return back()->withErrors(['name' => 'invalid link']);
    }

    public function update (Request $request)
    {
        $this->validate($request, [
            'company_name' => ['required', 'string', 'max:60'],
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'phone' => ['required', 'string', 'max:30'],
            'photo' => 'nullable|image',
        ]);

        $user = User::where('id', $request->id)->first();

        if ($request->hasFile('photo')) {
            $user->clearMediaCollection('avatar');
            $user->addMediaFromRequest('photo')->toMediaCollection('avatar');
        }

        $userData = $request->all();
        $userData['name'] = $request->first_name . ' ' . $request->last_name;
        unset($userData['email']);
        unset($userData['username']);

        $user->update($userData);

        Session::flash('success', 'Profile successfully updated');
        return redirect()->route('profile');
    }

    public function destroy ($id) {
        $agent = Invitation::findOrFail($id);
        if ($agent) {
            $user = User::where('email', $agent->email)->first();
            if ($user) {
                CompanyAgent::where('user_id', $user->id)->where('company_id', $agent->company_id)->delete();
            }
            $agent->delete();
        }

        Session::flash('success', 'Agent access removed');
        return redirect()->route('agents.index');
    }
}
