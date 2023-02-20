<?php

namespace App\Http\Livewire\Admin\Activities;

use Livewire\Component;

class LivewireActivitiesController extends Component
{

    public $startday;
    public $endday;

    public function mount(){
        $this->startday =  now()->startOfDay()->format('Y-m-d');
        $this->endday= now()->copy()->endOfDay()->format('Y-m-d');
    }


    public function render()
    {


        return view('livewire.admin.activities.livewire-activities-controller');
    }
}
