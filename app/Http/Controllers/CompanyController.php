<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class CompanyController extends Controller
{
    public function index (Request $request)
    {
        $companies = User::role('Company')->orderBy('id', 'desc');

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

            $user = User::find($request->id);
            $user->update($userData);

            Session::flash('success', 'Company profile successfully updated');
            return redirect()->route('companies.index');
        } else {
            $this->validate($request, [
                'company_name' => 'required',
                'company_email' => 'required|email|unique:users,company_email',
                'company_phone' => 'required',
                'company_website' => 'nullable',
            ]);
            
            $userData = $request->all();
            $userData['name'] = $request->company_name;
            $userData['username'] = $request->company_email;
            $userData['email'] = $request->company_email;
            $userData['password'] = Hash::make($request->company_email);
    
            $user = User::create($userData);
            if ($user) {
                $role = Role::where('name', 'Company')->first();
                $user->syncRoles($role);
    
                return redirect()->route('companies.show', [$user->id, 'tab' => 'contact']);
            }
    
            return back()->withErrors(['error' => 'Something wrong']);
        }
    }

    public function show ($id, Request $request)
    {
        $tab = @$request->tab;
        $company = User::find($id);

        return view('companies.create', get_defined_vars());
    }

    public function update (Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'company_email' => 'required|email|unique:users,company_email,' . $request->id,
            'company_phone' => 'required',
            'company_website' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required',
        ]);

        $userData = $request->all();
        $userData['name'] = $request->first_name . ' ' . $request->last_name;
        $userData['username'] = $request->email;

        $user = User::find($request->id);
       

        if ($request->hasFile('photo')) {
            $user->clearMediaCollection('avatar');
            $user->addMediaFromRequest('photo')->toMediaCollection('avatar');
        }
        $user->update($userData);
        
        Session::flash('success', 'Company profile successfully updated');
        return redirect()->route('profile');
    }
}
