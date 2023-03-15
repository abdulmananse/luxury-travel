<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invitation;
use App\Notifications\InviteAgent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Notification;

class AgentController extends Controller
{
    public function index (Request $request)
    {

        //Notification::route('mail', 'abdulmanan4d@gmail.com')->notify(new InviteAgent());
        // try {
        //     Notification::route('mail', $ddc->email)
        //                 ->notify(new DPIApprove(['uuid' => $application->uuid]));
        // } catch (\Exception $e) {
        //     Log::error('Application ('. $application->id .') approved by DPI email Error: ' . $e->getMessage());
        // }

        $agents = Invitation::orderBy('id', 'desc');

        if ($request->filled('name')) {
            $agents->where('email', $request->name);
        }

        $agents = $agents->get();
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

        $emails = explode(',', $request->emails);
        if (count($emails) == 1) {
            $emails = explode(PHP_EOL, $emails[0]);
        }

        foreach($emails as $email) {
            $email = str_replace(' ', '', $email);

            $invitation = Invitation::where('email', $email)->first();
            if (!$invitation) {
                Invitation::create(['email' => $email]);
            }
        }

        Session::flash('success', 'Email successfully sent to Agents');
        return redirect()->route('agents.index');
    }

    public function register ($email)
    {
        $email = base64_decode($email);
        $invitation = Invitation::where('email', $email)->first();
        if ($invitation) {
            if(!$invitation->status) {
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

        $invitation = Invitation::where('email', $email)->first();
        if ($invitation && !$invitation->status) {
            $user = User::where('email', $email)->first();
            if ($user) {
                return back()->withErrors(['name' => 'User already exists']);
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
        unset($userData['email']);
        unset($userData['username']);

        $user->update($userData);

        Session::flash('success', 'Profile successfully updated');
        return redirect()->route('profile');
    }
}
