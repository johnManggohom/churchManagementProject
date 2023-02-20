<?php

namespace App\Http\Livewire\Admin\Schedule;

use App\Models\Admin\Schedule;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ScheduleDateTimePicker extends Component
{

        public string $date;
    public array $availableTimes = [];
    public Collection $appointments;
public  $collection;

    public function mount(){
        $this->date= now()->format('Y-m-d');    
        $this->getIntervalsAvailableTimes();
    }
    public function render()
    {
        return view('livewire.admin.schedule.schedule-date-time-picker');
    }

public function updatedDate(){

    $this->getIntervalsAvailableTimes();
}


    protected function getIntervalsAvailableTimes(){

        try{

              $this->reset('availableTimes');
        $carbonIntervals = Carbon::parse($this->date.'8 am')->toPeriod($this->date. '8 pm', 1, 'hours');
        $this->appointments=Schedule::where('start_time','>=', Carbon::parse($this->date)->startOfDay())->where('endTime','<=', Carbon::parse($this->date)->endOfDay())->where('status', '!=', 'rejected')->get();

     
               $dates = array();

               foreach($this->appointments as $appointment){

                   $current = strtotime($appointment->start_time);
                $last = strtotime($appointment->endTime);

                while( $current <= $last ) {    
                    $dates[] = date('Y-m-d H:i:s', $current);
                    $current = strtotime('+ 1 hour', $current);
                }
               }

                $this->collection = collect($dates);



         
             
        foreach($carbonIntervals  as $interval){
            $this->availableTimes[$interval->format('g:i A')]= !$this->collection->contains( $interval);

        }
        }catch(\Exception $e){
            $this->addError('error', 'Dramatic error you will die.'.$e->getMessage());
        }
      
    }
}
