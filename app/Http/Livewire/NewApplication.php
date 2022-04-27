<?php

namespace App\Http\Livewire;

use App\Models\LeaveApplication;
use App\Models\LeaveType;
use Livewire\Component;

class NewApplication extends Component
{
    public $state;

    protected $rules = [
        'state.start_date' => 'required',
        'state.end_date' => 'required',
        'state.information' => 'required',
        'state.leave_type_id' => 'required',
    ];

    public $messages = [
        'state.start_date.required' => 'The date field is required.',
        'state.end_date.required' => 'The to field is required.',
        'state.information.required' => 'The information field is required.',
        'state.leave_type_id.required' => 'The leave type field is required.',
    ];
    
    public function render()
    {
        return view('livewire.new-application',[
            'leaveType' => $leaveType = LeaveType::all()
        ]);
    }

    public function store()
    {
        $this->validate();

        $application = new LeaveApplication;
        $application->information = $this->state['information'];
        $application->applier_user_id = auth()->user()->id;
        $application->start_date = $this->state['start_date'];
        $application->end_date = $this->state['end_date'];
        $application->is_half_day = (isset($this->state['is_half_day'])? 1 : 0 );
        $application->leave_type_id = $this->state['leave_type_id'];
        $application->save();

        return redirect()->to('/leave-balance');
    }
}
