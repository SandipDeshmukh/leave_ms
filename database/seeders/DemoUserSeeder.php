<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hr = User::create([
            'name'     => 'Hr',
            'email'    => 'hr@demo.com',
            'password' => Hash::make('12345'),
        ]);
        $hr->assignRole('hr');

        $employee = User::create([
            'name'     => 'employee',
            'email'    => 'employee@demo.com',
            'password' => Hash::make('12345'),
        ]);
        $employee->assignRole('employee');
    }
}
