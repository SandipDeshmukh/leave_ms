<?php

namespace App\Http\Livewire;

use App\Models\LeaveApplication;
use App\Models\LeaveType;
use Livewire\Component;

class LeaveBalance extends Component
{
    public function render()
    {
        $leaveType = LeaveType::all();
        $leaveApplication = LeaveApplication::applications()->get();

        $apps = LeaveApplication::applications()
        ->where('status', 'approved')
        ->get();

        foreach ($leaveType as $type) {
            $leaveCount[$type->type] = 0;
        }
        
        foreach ($apps as $app) {
            $leaveCount[$app->type] += $app->duration;
        }
        
        return view('livewire.leave-balance',[
            'leaveType' => $leaveType,
            'leaveCount' => $leaveCount,
            'leaveApplication' => $leaveApplication,
        ]);
    }
}
