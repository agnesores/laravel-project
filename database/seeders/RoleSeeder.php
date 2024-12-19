<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WitoutModelEvents;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $employee = Role::create(['name'=>'employee']);
        $admin = Role::create(['name'=>'admin']);
        $customer = Role::create(['name'=>'customer']);

        $manage_users_permission = Permission::create(['name'=>'manage users']);
        $manage_content_permission = Permission::create(['name'=>'manage content']);
        $see_content_permission = Permission::create(['name'=>'see content']);

        $adminpermissions = [$manage_users_permission,$manage_content_permission,$see_content_permission];
        $employeepermissions = [$manage_content_permission,$see_content_permission];

        $admin->syncPermissions($adminpermissions);
        $employee->syncPermissions($employeepermissions);
        $customer->givePermissionTo($see_content_permission);

    }
}
