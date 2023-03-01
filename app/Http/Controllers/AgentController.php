<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Session;

class AgentController extends Controller
{
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
        return redirect()->route('agents.invite');
    }

    public function register ($email)
    {
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
            'name' => ['required', 'string', 'max:60'],
            'username' => ['required', 'string', 'alpha_dash', 'max:60', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
       
        $invitation = Invitation::where('email', $email)->first();
        if ($invitation && !$invitation->status) {
            $user = User::where('email', $email)->first();
            if ($user) {
                return back()->withErrors(['name' => 'User already exists']);
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
            if ($user) {
                
                $user->syncRoles('Agent');

                $invitation->status = 1;
                $invitation->save();
            }

            Session::flash('success', 'Account successfully created');
            return redirect()->route('login');
        }

        return back()->withErrors(['name' => 'invalid link']);
    }
}
