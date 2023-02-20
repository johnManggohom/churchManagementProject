<?php

namespace App\Http\Livewire\Admin\Appointment;

use App\Models\Appointment;
use App\Models\Ocassion;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentTable extends Component
{
       use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status= '';
    public $occassion= '';
    public $statusData;
     public $gaga;
    public $from='';
    public $follow='';
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

    $ocassion = Ocassion::all();



        return view('livewire.admin.appointment.appointment-table', [
            'appointments'=> $this->pages()->paginate($this->perPage),
            'occasions'=> $ocassion
        ]);
    }

    

    protected function pages(){

        if($this->status =="thisMonth"){


            
        return Appointment::select(['appointments.*', 'users.name as user_name'])->join('users', 'appointments.user_id', '=', 'users.id' )->whereMonth('appointments.created_at', date('m'))
->whereYear('appointments.created_at', date('Y'))
->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 


           
        }elseif($this->status == 'thisWeek'){


                return Appointment::select(['appointments.*', 'users.name as user_name'])->join('users', 'appointments.user_id', '=', 'users.id' )->when($this->from, function($query) {
            $query->where('start_time','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('start_time','<=', $this->to);
        })->whereBetween('appointments.start_time', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 
        
        

        }elseif($this->status =='thisDay'){


            
                return Appointment::select(['appointments.*', 'users.name as user_name'])->join('users', 'appointments.user_id', '=', 'users.id' )->when($this->from, function($query) {
            $query->where('start_time','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('start_time','<=', $this->to);
        })->whereDate('appointments.start_time', Carbon::today())->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 

        }else{
            
            return Appointment::select(['appointments.*', 'users.name as user_name'])->join('users', 'appointments.user_id', '=', 'users.id' )->when($this->status, function($query) {
            $query->where('status', $this->status);
        })->when($this->occassion, function($query) {
            $query->where('ocassion_id', $this->occassion);
        })->when($this->from, function($query) {
            $query->where('start_time','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('start_time','<=', $this->to);
        })->when($this->follow, function($query) {
            $query->where('isFollow','=', $this->follow);
        })->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));  
        }

        
      
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
        $this->occassion= '';
     $this->sortColumnName = 'start_time';
    $this->sortDirection = 'asc';
      $this->status = '';

}
}
