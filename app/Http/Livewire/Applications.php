<?php

namespace App\Http\Livewire;

use App\Models\LeaveApplication;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Applications extends Component
{

    public function render()
    {
        return view('livewire.applications',[
            'applications' => LeaveApplication::Type()->get()
        ]);
    }

    public function approve($id)
    {
        LeaveApplication::find($id)->update([
            'status' => 'approved'
        ]);
        
        return redirect()->to('/applications');
    }
}
