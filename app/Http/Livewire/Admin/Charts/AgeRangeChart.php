<?php

namespace App\Http\Livewire\Admin\Charts;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AgeRangeChart extends Component
{
    public function render()
    {
                $ranges = [ // the start of each age-range.
    '18-24' => '18-24',
    '25-35' => '25-35',
    '36-45' => '36-45',
    '46+' => '46-100'
];

$output = User::all()
    ->map(function ($user) use ($ranges) {
        $age = Carbon::parse($user->birth_date)->age;
        
        foreach($ranges as $key => $breakpoint)
        {
  
               $rangeLimits = explode('-', $breakpoint);
            if ($age >= $rangeLimits[0] && $age <= $rangeLimits[1])
            {

                $user->range = $key;
                break;
            }
        }
        return $user;
    })
    ->mapToGroups(function ($user, $key) {
        return [$user->range => $user];
    })
    ->map(function ($group) {
        return count($group);
    })
    ->sortKeys();


   $days=[];
        $count=[];


        foreach($output as $month => $values){
            $days[]=  $month ;
            $count[]=$values;
        }
        return view('livewire.admin.charts.age-range-chart',['days'=>$days,'count'=>$count]);
    }
}
