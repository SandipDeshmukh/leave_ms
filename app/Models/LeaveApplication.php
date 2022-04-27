<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LeaveApplication extends Model
{
    use HasFactory;

    public $table = 'leave_applications';

    protected $fillable = [
        'status',
        'is_half_day',
    ];

    public function getDurationAttribute()
    {
        if($this->is_half_day == 1)
        {
            return 0.5;
        }
        return (new Carbon($this->end_date))->diffInDays(new Carbon($this->start_date))+1;
    }

    public function scopeApplications($query)
    {
        return $query->where('leave_applications.applier_user_id', Auth::id())
        ->latest('leave_applications.id')
        ->join('leave_types', 'leave_types.id', '=', 'leave_applications.leave_type_id')
        ->select(
            'leave_applications.id as id', 
            'leave_applications.reason', 
            'leave_applications.information', 
            'leave_applications.start_date',
            'leave_applications.end_date', 
            'leave_applications.status',
            'leave_applications.remarks',
            'leave_applications.is_half_day',
            'leave_types.type',
        );
    }

    public function scopeType($query)
    {
        return $query->latest('leave_applications.id')
        ->join('leave_types', 'leave_types.id', '=', 'leave_applications.leave_type_id')
        ->select(
            'leave_applications.id as id', 
            'leave_applications.reason', 
            'leave_applications.information', 
            'leave_applications.start_date',
            'leave_applications.end_date', 
            'leave_applications.status',
            'leave_applications.remarks',
            'leave_applications.is_half_day',
            'leave_types.type',
        );
    }

}
