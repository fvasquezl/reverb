<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // Create basic permissions
        $permissions = [
            'view_user',
            'view_any_user',
            'create_user',
            'update_user',
            'delete_user',
            'delete_any_user',
            
            'view_post',
            'view_any_post',
            'create_post',
            'update_post',
            'delete_post',
            'delete_any_post',
            
            'view_house',
            'view_any_house',
            'create_house',
            'update_house',
            'delete_house',
            'delete_any_house',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $admin->syncPermissions($permissions);
        $editor->syncPermissions([
            'view_post',
            'view_any_post',
            'create_post',
            'update_post',
            'view_house',
            'view_any_house',
        ]);
        $user->syncPermissions([
            'view_post',
            'view_any_post',
            'view_house',
            'view_any_house',
        ]);

        // Super admin gets all permissions automatically through Shield
    }
}