<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
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
                'name' => 'Roberto Carneiro',
                'company_name' => 'Tripwix',
                'commission' => '5',
                'email' => 'contact.person@gmail.com'
            ], [
                'password' => Hash::make('12345678')
            ]);
            $user->syncRoles($role);

            $role->syncPermissions([$permission1->id, $permission2->id, $permission3->id]);
        }

        $companyRole = Role::updateOrCreate([
            'name' => 'Company'
        ]);

        if ($companyRole) {
            $companyRole->syncPermissions([$permission1->id, $permission2->id]);
        }

        $agentRole = Role::updateOrCreate([
            'name' => 'Agent'
        ]);

        if ($agentRole) {
            $user = User::updateOrCreate([
                'username' => 'agent',
                'name' => 'Agent',
                'company_name' => 'Tripwix',
                'email' => 'agent@gmail.com'
            ], [
                'password' => Hash::make('12345678')
            ]);
            $user->syncRoles($agentRole);

            $agentRole->syncPermissions([$permission1->id]);
        }


    }
}
