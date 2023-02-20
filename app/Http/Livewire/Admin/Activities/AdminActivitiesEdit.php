<?php

namespace App\Http\Livewire\Admin\Activities;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Component;

class AdminActivitiesEdit extends Component
{
    public $activity;
    public $activity_name, $activity_description, $attendance, $startday, $endday;

    public function mount(){

        $this->activity_name = $this->activity->name;
          $this->startday = Carbon::createFromFormat('Y-m-d H:i:s',  $this->activity->start_time )->format('Y-m-d ');
        $this->endday=  Carbon::createFromFormat('Y-m-d H:i:s',  $this->activity->end_time )->format('Y-m-d ');
        $this->activity_description = $this->activity->description;
        $this->attendance = $this->activity->hasAttendance;

    }
    public function render()
    {

    
        return view('livewire.admin.activities.admin-activities-edit');
    }
}
