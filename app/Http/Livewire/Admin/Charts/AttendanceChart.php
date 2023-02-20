<?php

namespace App\Http\Livewire\Admin\Charts;

use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Component;

class AttendanceChart extends Component
{
    public function render()
    {

        
       $collection = Attendance::groupBy('attendence_date')
->selectRaw('count(*) as total, attendence_date')
->get();

      $days=[];
        $count=[];


        foreach($collection as $month => $values){
            $days[]=  Carbon::createFromFormat('Y-m-d', $values->attendence_date)->format('M d Y'); ;
            $count[]=$values->total;
        }
        return view('livewire.admin.charts.attendance-chart', ['days'=>$days,'count'=>$count]);
    }
}
