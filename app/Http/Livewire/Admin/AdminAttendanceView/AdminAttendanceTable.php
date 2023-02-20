<?php

namespace App\Http\Livewire\Admin\AdminAttendanceView;

use App\Models\Activity;
use App\Models\Attendance;
use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;


class AdminAttendanceTable extends Component
{

           use WithPagination;

    public $perPage = 8 ;
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
    


//     public function export() {
//     $dataToExport = $this->pages()->paginate($this->perPage);
   
//      $data = ['appointments' => $dataToExport];
//       $pdf = PDF::loadView('admin.appointment.appointmentpdf', $data)->setPaper('a4', 'portrait')->output(); //
// return response()->streamDownload(
//     fn() => print($pdf), 'export_protocol.pdf'
// );
// }
  
    public function render()
    {

      $activities =Activity::orderBy("name")->get();



        return view('livewire.admin.admin-attendance-view.admin-attendance-table',  [
            'appointments'=> $this->pages()->paginate($this->perPage),
            'activities'=>$activities
        ]);
}

    protected function pages(){

//         if($this->status =="thisMonth"){


            
//         return Appointment::select(['appointments.*', 'users.name as user_name'])->join('users', 'appointments.user_id', '=', 'users.id' )->when($this->from, function($query) {
//             $query->where('start_time','>=', $this->from);
//         })->when($this->from, function($query) {
//             $query->where('start_time','<=', $this->to);
//         })->whereMonth('created_at', date('m'))
// ->whereYear('created_at', date('Y'))
// ->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 


           
//         }elseif($this->status == 'thisWeek'){


//                 return Appointment::select(['appointments.*', 'users.name as user_name'])->join('users', 'appointments.user_id', '=', 'users.id' )->when($this->from, function($query) {
//             $query->where('start_time','>=', $this->from);
//         })->when($this->from, function($query) {
//             $query->where('start_time','<=', $this->to);
//         })->whereBetween('appointments.start_time', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 
        
        

//         }elseif($this->status =='thisDay'){


            
//                 return Appointment::select(['appointments.*', 'users.name as user_name'])->join('users', 'appointments.user_id', '=', 'users.id' )->when($this->from, function($query) {
//             $query->where('start_time','>=', $this->from);
//         })->when($this->from, function($query) {
//             $query->where('start_time','<=', $this->to);
//         })->whereDate('appointments.start_time', Carbon::today())->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 

//         }else{
            
            return Attendance::select(['attendance.*', 'users.name as user_name'])->join('users', 'attendance.user_id', '=', 'users.id' )->join('activities', 'attendance.activity_id', '=', 'activities.id')->when($this->status, function($query) {
            $query->where('activities.id', $this->status);
        })->search(trim($this->search));  
        // }

        
      
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
