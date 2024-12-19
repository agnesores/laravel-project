<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_user = new User();
        $admin_user -> name = 'admin';
        $admin_user -> email = 'admin@gmail.com';
        $admin_user -> password = Hash::make('password');
        $admin_user -> save();

        $admin_user ->assignRole('admin');


        $employee_user = new User();
        $employee_user -> name = 'employee';
        $employee_user -> email = 'employee@gmail.com';
        $employee_user -> password = Hash::make('password');
        $employee_user -> save();

        $employee_user ->assignRole('employee');
    }
}
