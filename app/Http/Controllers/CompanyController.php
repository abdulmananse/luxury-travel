<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class CompanyController extends Controller
{
    public function index (Request $request)
    {
        $companies = Company::orderBy('id', 'desc');

        if ($request->filled('name')) {
            $companies->where('name', $request->name)->orWhere('email', $request->name);
        }

        $companies = $companies->get();

        return view('companies.index', get_defined_vars());
    }

    public function create ()
    {
        return view('companies.create', get_defined_vars());
    }

    public function store (Request $request)
    {
        if ($request->filled('tab') && $request->tab == 'contact') {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'nullable',
                'email' => 'required|email|unique:users,email,' . $request->id,
                'phone' => 'required',
            ]);

            $userData['name'] = $request->first_name . ' ' . $request->last_name;
            $userData['username'] = $request->email;
            $userData['email'] = $request->email;
            $userData['phone'] = $request->phone;
            $userData['company_id'] = $request->company_id;
            $userData['password'] = Hash::make($request->email);

            if ($request->filled('id')) {
                $user = User::find($request->id);
                $user->update($userData);
            } else {
                $user = User::create($userData);
            }
            $user->syncRoles(['Contact_Person']);

            if ($request->hasFile('photo')) {
                $user->addMediaFromRequest('photo')->toMediaCollection('avatar');
            }

            Session::flash('success', 'Company profile successfully updated');
            return redirect()->route('companies.index');
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:companies,email,' . $request->company_id,
                'phone' => 'required',
                'website' => 'nullable',
            ]);

            if ($request->filled('company_id')) {
                $companyData = $request->only('name', 'email', 'phone', 'website');
                $company = Company::where('id', $request->company_id)->first();
                $company->update($companyData);
            } else {
                $companyData = $request->all();
                $company = Company::create($companyData);
            }
            
            if ($company) {
                $userData['name'] = $company->name;
                $userData['username'] = $company->email;
                $userData['email'] = $company->email;
                $userData['password'] = Hash::make($request->email);
                $userData['company_id'] = $company->id;
    
                $user = User::where('company_id', $company->id)->role('Company')->first();
                if ($user) {
                    $user->update($userData);
                } else {
                    $user = User::create($userData);
                }

                if ($user) {
                    $user->syncRoles(['Company']);
    
                    return redirect()->route('companies.show', [$company->id, 'tab' => 'contact']);
                }
            }

            return back()->withErrors(['error' => 'Something wrong']);
        }
    }

    public function show ($id, Request $request)
    {
        $tab = @$request->tab;
        $company = Company::find($id);
        $contactPerson = User::where('company_id', $id)->role('Contact_Person')->first();
        return view('companies.create', get_defined_vars());
    }

    public function update (Request $request)
    {
        
        $this->validate($request, [
            'company_name' => 'required',
            'company_email' => 'required|email|unique:users,email,' . $request->id,
            'email' => 'required|email|unique:users,email,' . $request->contact_id,
            'company_phone' => 'required',
            'company_website' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'phone' => 'required',
        ]);
        
        $companyData = [
            'name' => $request->company_name,
            'email' => $request->company_email,
            'phone' => $request->company_phone,
            'website' => $request->company_website
        ];
        $company = Company::where('id', $request->company_id)->first();
        $company->update($companyData);

        $userData['name'] = $request->first_name . ' ' . $request->last_name;
        $userData['username'] = $request->company_email;
        $userData['email'] = $request->company_email;
        $userData['commission'] = @$request->commission;
        $userData['phone'] = @$request->phone;
        $userData['company_name'] = @$request->company_name;
        $userData['company_phone'] = @$request->company_phone;
        $userData['company_email'] = @$request->company_email;
        $userData['company_website'] = @$request->company_website;

        $companyUser = User::find($request->id);

        if ($request->hasFile('photo')) {
            $companyUser->clearMediaCollection('avatar');
            $companyUser->addMediaFromRequest('photo')->toMediaCollection('avatar');
        }

        if ($request->hasFile('company_logo')) {
            $companyUser->clearMediaCollection('company_logo');
            $companyUser->addMediaFromRequest('company_logo')->toMediaCollection('company_logo');
        }

        $companyUser->update($userData);

        $contactData['name'] = $request->first_name . ' ' . $request->last_name;
        $contactData['username'] = $request->email;
        $contactData['email'] = $request->email;
        $contactData['phone'] = $request->phone;
        $contactData['company_name'] = @$request->company_name;
        $contactData['company_phone'] = @$request->company_phone;
        $contactData['company_email'] = @$request->company_email;
        $contactData['company_website'] = @$request->company_website;

        $contactUser = User::find($request->contact_id);
        $contactUser->update($contactData);

        Session::flash('success', 'Profile successfully updated');
        return redirect()->route('profile');
    }
}
