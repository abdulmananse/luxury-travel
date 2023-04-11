<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Invitation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permission1 = Permission::updateOrCreate(['name' => 'Search Properties']);
        $permission2 = Permission::updateOrCreate(['name' => 'Manage Agents']);
        $permission3 = Permission::updateOrCreate(['name' => 'Manage Companies']);

        $role = Role::updateOrCreate([
            'name' => 'Contact_Person'
        ]);

        if ($role) {
            $user = User::updateOrCreate([
                'username' => 'contact_person',
                'email' => 'contact.person@gmail.com'
            ], [
                'name' => 'Roberto Carneiro',
                'company_name' => 'Tripwix',
                'commission' => '5',
                'password' => Hash::make('12345678')
            ]);
            $user->syncRoles($role);

            $role->syncPermissions([$permission1->id, $permission2->id, $permission3->id]);
        }

        $companyRole = Role::updateOrCreate([
            'name' => 'Company'
        ]);

        if ($companyRole) {
            $company = Company::updateOrCreate([
                'email' => 'tripwix@gmail.com'
            ], [
                'name' => 'Tripwix',
            ]);

            $user = User::updateOrCreate([
                'username' => 'tripwix',
                'email' => 'tripwix@gmail.com',
                'company_id' => $company->id
            ], [
                'name' => 'Tripwix',
                'company_name' => 'Tripwix',
                'commission' => '5',
                'password' => Hash::make('12345678')
            ]);
            $user->syncRoles($companyRole);

            $companyRole->syncPermissions([$permission1->id, $permission2->id]);
        }

        $agentRole = Role::updateOrCreate([
            'name' => 'Agent'
        ]);

        if ($agentRole) {
            $user = User::updateOrCreate([
                'username' => 'agent',
                'email' => 'agent@gmail.com'
            ], [
                'name' => 'Agent',
                'company_name' => 'Tripwix',
                'password' => Hash::make('12345678')
            ]);
            $user->syncRoles($agentRole);

            for($i = 1; $i < 15000; $i++){
                $user = User::updateOrCreate([
                    'username' => 'agent_' . $i,
                    'name' => 'Agent ' . $i,
                    'company_name' => 'Tripwix',
                    'email' => 'agent_' . $i . '@gmail.com'
                ], [
                    'password' => Hash::make('12345678')
                ]);
                Invitation::create([
                    'email' => 'agent_' . $i . '@gmail.com',
                    'status' => 0
                ]);
                $user->syncRoles($agentRole);
            }

            $agentRole->syncPermissions([$permission1->id]);
        }

        $permission1 = Permission::updateOrCreate(['name' => 'Company']);

        $adminRole = Role::updateOrCreate([
            'name' => 'Admin'
        ]);

        if ($adminRole) {
            $user = User::updateOrCreate([
                'username' => 'admin',
                'email' => 'admin@gmail.com'
            ], [
                'name' => 'Admin',
                'password' => Hash::make('12345678')
            ]);
            $user->syncRoles($adminRole);

            $adminRole->syncPermissions([$permission1->id]);
        }
    }
}
