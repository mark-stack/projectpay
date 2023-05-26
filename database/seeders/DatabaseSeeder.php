<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Project;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //Spatie Roles & Permissions
            // Create roles
            $roleAdmin = Role::create(['name' => 'admin']);
            $roleContractor = Role::create(['name' => 'contractor']);
            $roleProjectOwner = Role::create(['name' => 'project_owner']);

            // Create permissions
            $permissions = [
                'can-edit-project-price',
            ];

            // Assign permissions to roles
            foreach($permissions as $permissionName) {
                $permission = Permission::create(['name' => $permissionName]);

                //Admin (everything)
                $roleAdmin->givePermissionTo($permission);

                //Contractor
                //none

                //Project Owner
                //none
            }

        //Admin
        $admin = User::factory()->create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'password' => bcrypt('admin'),
            'email_verified_at' => now()
        ]);
        $admin->assignRole('admin');

        //Project owner
        $projectOwner = User::factory()->create([
            'email' => 'project@gmail.com',
            'name' => 'Mark P',
            'password' => bcrypt('project'),
            'email_verified_at' => now()
        ]);
        $projectOwner->assignRole('project_owner');

        //Contractor
        $contractor = User::factory()->create([
            'email' => 'contractor@gmail.com',
            'name' => 'Mark C',
            'password' => bcrypt('contractor'),
            'email_verified_at' => now()
        ]);
        $contractor->assignRole('contractor');

        //Create a Company
        $company = Company::factory()->create([
            'user_id' => $contractor->id
        ]);
        
        //Create a Project (unassociated with a company)
        Project::factory()->create([
            'user_id' => $projectOwner->id
        ]);

        //Create a Project (associated with a company)
        Project::factory()->create([
            'user_id' => $projectOwner->id,
            'company_id' => $company->id
        ]);
    }
}
