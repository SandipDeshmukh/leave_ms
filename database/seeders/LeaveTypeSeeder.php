<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveType;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveType::create([
            'type' => 'Casual Leave',
            'days' => 6,
        ]);
        LeaveType::create([
            'type' => 'Sick Leave',
            'days' => 6,
        ]);
        LeaveType::create([
            'type' => 'Paid Leave',
            'days' => 6,
        ]);
    }
}
