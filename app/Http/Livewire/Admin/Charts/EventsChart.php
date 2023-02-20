<?php

namespace App\Http\Livewire\Admin\Charts;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;

class EventsChart extends Component
{
    public function render()
    {

               $collection = Event::groupBy('EventDateFrom')
->selectRaw('count(*) as total, EventDateFrom')
->get();

      $days=[];
        $count=[];


        foreach($collection as $month => $values){
            $days[]=  Carbon::createFromFormat('Y-m-d H:i:s', $values->EventDateFrom)->format('M d Y'); ;
            $count[]=$values->total;
        }
        return view('livewire.admin.charts.events-chart', ['days'=>$days,'count'=>$count]);
    }
}
