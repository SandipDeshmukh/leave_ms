<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'leave_application.create',
            'leave_application.authorize',
        ];
        foreach($permissions as $permission) Permission::create(['name' => $permission]);
        
        $hr       = Role::create(['name' => 'hr']);
        $employee = Role::create(['name' => 'employee']);

        $employee_permissions = [
            'leave_application.create',
        ];
        
        $hr->syncPermissions($permissions);
        $employee->syncPermissions($employee_permissions);
    }
}
