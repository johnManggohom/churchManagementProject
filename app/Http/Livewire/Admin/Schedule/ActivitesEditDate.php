<?php

namespace App\Http\Livewire\Admin\Schedule;

use Livewire\Component;

class ActivitesEditDate extends Component
{

       public $startday;
    public $endday;

    public function mount(){
        $this->startday =  now()->startOfDay()->format('Y-m-d');
        $this->endday= now()->copy()->endOfDay()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.admin.schedule.activites-edit-date');
    }
}
