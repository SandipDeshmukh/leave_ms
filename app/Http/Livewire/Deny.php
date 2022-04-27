<?php

namespace App\Http\Livewire;

use App\Models\LeaveApplication;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Deny extends Component
{
    public $reason;
    public $reasonId;

    public function mount()
    {
        $this->reasonId = Request::segment(2);
        $reason = LeaveApplication::whereNull('reason')->where('status','pending')->find($this->reasonId);
        if(empty($reason))
        {
            return redirect()->to('/applications');
        }
    }

    public function render()
    {
        return view('livewire.deny');
    }

    public function store()
    {
        $reason = LeaveApplication::find($this->reasonId);
        $reason->reason = $this->reason;
        $reason->status = 'deny';
        $reason->save();

        return redirect()->to('/applications');
    }
}
