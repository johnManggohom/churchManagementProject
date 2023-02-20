<?php

namespace App\Http\Livewire\Client\Appointment;
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
     public $to='';
      public $sortColumnName = 'start_time';
    public $sortDirection = 'desc';

    protected $append = 'user_id';
    public function render()
    {


        return view('livewire.client.appointment.appointment-table', [
            'appointments'=> $this->pages()->paginate(5),
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
        })->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));  
        }

        
      
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
}
