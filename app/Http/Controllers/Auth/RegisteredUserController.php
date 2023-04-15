<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Http;
use Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'company_name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $email[] = ['label' => 'Work', 'value' => $request->email, 'primary' => true];
        $phone[] = ['label' => 'Work', 'value' => $request->phone, 'primary' => true];

        $orgUrl = config('app.pipedrive_base_url') . 'organizations?api_token=' . config('app.pipedrive_api_key');
       // try {
            $orgResponse = Http::post($orgUrl, [
                'name' => $request->company_name,
                'owner_id' => (int) config('app.pipedrive_owner_id'),
            ]);
                
            $orgResData = $orgResponse->object();
            if ($orgResData->success) {
                $orgId = $orgResData->data->id;
                $personUrl = config('app.pipedrive_base_url') . 'persons?api_token=' . config('app.pipedrive_api_key');
                $personResponse = Http::post($personUrl, [
                    'name' => $request->first_name . ' ' . $request->last_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'owner_id' => (int) config('app.pipedrive_owner_id'),
                    'org_id' => $orgId,
                    'email' => $email,
                    'phone' => $phone,
                ]);

                $personResData = $personResponse->object();
                if ($personResData->success) {
                    $personId = $orgResData->data->id;
                    $leadUrl = config('app.pipedrive_base_url') . 'leads?api_token=' . config('app.pipedrive_api_key');
                    $leadResponse = Http::post($leadUrl, [
                        'title' => $request->first_name . ' ' . $request->last_name . '-' . $request->company_name,
                        'owner_id' => (int) config('app.pipedrive_owner_id'),
                        'person_id' => $personId,
                        'organization_id' => $orgId
                    ]);

                    $leadResData = $leadResponse->object();
                    if ($leadResData->success) {
                        $user = User::create([
                            'name' => $request->first_name . ' ' . $request->last_name,
                            'username' => $request->email,
                            'email' => $request->email,
                            'company_name' => $request->company_name,
                            'phone' => $request->phone,
                            'password' => Hash::make('tripwix@123'),
                            'is_active' => 0
                        ]);

                        if ($user) {
                            Session::flash('success', 'User successfully registered');
                            return redirect()->route('login');
                        }

                        return back()->withErrors(['company_name' => 'User not registered'])->withInput();

                    } else {
                        return back()->withErrors(['company_name' => 'Lead not created'])->withInput();
                    }
                } else {
                    return back()->withErrors(['company_name' => 'Person not created'])->withInput();
                }
            } else {
                return back()->withErrors(['company_name' => 'Company not created'])->withInput();
            }
        // } catch (\Exception $e) {
        //     return back()->withErrors(['company_name' => 'Company not created']);
        // }

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}
