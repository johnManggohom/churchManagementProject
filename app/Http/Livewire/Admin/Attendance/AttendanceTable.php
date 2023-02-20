<?php

namespace App\Http\Livewire\Admin\Attendance;

use App\Models\Activity;
use App\Models\Attendance;
use App\Models\SpecificAttendance;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AttendanceTable extends Component
{

    public $attendance;
    public $search = '';
    public $perPage = 10;
    
    public function render()
    {
      
        

        $date = SpecificAttendance::where('id', $this->attendance)->where('attendance_day', '>=', Carbon::now()->format('Y-m-d'))->first();
        $activity_name= Activity::where('id', $this->attendance)->first();  
        


//         if (Attendance::where('activity_id', $activity_name->id)->where('attendence_date', '=',Carbon::now()->format('Y-m-d'))->exists()) {

//     $attendance_status = true;
// }else{


//   $attendance_status = false;
// }
  
  return view('livewire.admin.attendance.attendance-table', ['users'=> $this->pages()->paginate($this->perPage), 'activity_id'=>$activity_name]);
      


    }


    
    protected function pages()
{
        return User::whereDoesntHave('attendance', function ($q) {
    $q->where('activity_id', '=',  $this->attendance);
})->whereHas('roles', function ($q)  {
           $q->where('roles.name', 'user')->where('roles.name' ,'!=', 'organization leader'); // it joins the table so you may need to use prefixed column name, otherwise you can still use dynamic whereName()
      })->where('id', '!=', auth()->id())->search(trim($this->search));

}

}


