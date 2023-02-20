<?php

namespace App\Http\Livewire\Client\Attendance;

use App\Models\Activity;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAttendance extends Component
{

               use WithPagination;

    public $perPage = 8;
    public $search = '';
     public $search2 = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;

    public $statusData;
     public $gaga;
    public $from='';
     public $to='';
      public $sortColumnName = 'start_time';
    public $sortDirection = 'desc';

    protected $append = 'user_id';
    public function render()
    {
        
      $activities =Attendance::select('attendance.activity_id')->where('user_id', Auth::id())->distinct()->get();

        return view('livewire.client.attendance.view-attendance', [
            'appointments'=> $this->pages()->paginate($this->perPage),
            'activities'=>$activities
        ]);
    }


    public function pages(){
        
                 return Attendance::select(['attendance.*'])->where('user_id', Auth::id())->when($this->status, function($query) {
            $query->where('activity_id', $this->status);
        })->search(trim($this->search));  
    }

    public function sortBy($columnName){


if($this->sortColumnName ===  $columnName){

        $this->sortDirection = $this->swapSortDirection();
   
            
 
}else{
    $this->sortDirection = 'asc';
}

$this->sortColumnName = $columnName;


}

public function swapSortDirection(){
    return $this->sortDirection === 'asc' ? 'desc' : 'asc';
}

public function month($day){

    if($day == 'month'){
                $this->status = 'thisMonth';
    }elseif($day == 'week'){
         $this->status = 'thisWeek';   
    }elseif($day == 'day'){
        $this->status = 'thisDay';
    }

}
public function remove(){
     $this->from = '';
       $this->to= '';
     $this->sortColumnName = 'start_time';
    $this->sortDirection = 'asc';
      $this->status = '';

}
}
