<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create role
        $SuperAdmin = Role::create(['name' => 'superadmin']);
        $Admin = Role::create(['name' => 'admin']);
        $Admin = Role::create(['name' => 'user']);
        $Editor = Role::create(['name' => 'editor']);
        $Writer = Role::create(['name' => 'writer']);

        // permission array
        $permissions = [
            // super admin
            'superadmin.create',
            'superadmin.read',
            'superadmin.update',
            'superadmin.delete',

             // admin
             'admin.create',
             'admin.read',
             'admin.update',
             'admin.delete',
              // role admin
            'role.create',
            'role.read',
            'role.update',
            'role.delete',
              // super admin
            'blog.create',
            'blog.read',
            'blog.update',
            'blog.delete',
        ];
        // create permission
        for($i=0 ; $i < count($permissions); $i++){

            $permission = Permission::create(['name' => $permissions[$i]]);
            // assinge permission to role
            $SuperAdmin->givePermissionTo($permission);
            $permission->assignRole($SuperAdmin);

        }
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $user = User::first();
        $user->assignRole($SuperAdmin);

    }
}
