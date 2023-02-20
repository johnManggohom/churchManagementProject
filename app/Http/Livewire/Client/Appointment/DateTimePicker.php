<?php

namespace App\Http\Livewire\Client\Appointment;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DateTimePicker extends Component
{

    public string $date;
    public array $availableTimes = [];
    public Collection $appointments;


    public function mount(){
        $this->date= now()->format('Y-m-d');    
        $this->getIntervalsAvailableTimes();
    }
    public function render()
    {
        return view('livewire.client.appointment.date-time-picker');
    }

public function updatedDate(){

    $this->getIntervalsAvailableTimes();
}
    protected function getIntervalsAvailableTimes(){

        try{

              $this->reset('availableTimes');
        $carbonIntervals = Carbon::parse($this->date.'8 am')->toPeriod($this->date. '8 pm', 1, 'hours');
        $this->appointments=Appointment::whereDate('start_time', $this->date)->where('status', '!=', 'rejected')->get();


        foreach($carbonIntervals  as $interval){
            $this->availableTimes[$interval->format('g:i A')]= !$this->appointments->contains('start_time', $interval);
            
        }
        }catch(\Exception $e){
            $this->addError('error', 'Dramatic error you will die.');
        }
      
    }
}
