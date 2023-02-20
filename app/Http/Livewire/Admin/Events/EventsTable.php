<?php

namespace App\Http\Livewire\Admin\Events;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class EventsTable extends Component
{
           use WithPagination;

    public $perPage = 8;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status= '';
        public $post= '';
    public $occassion= '';
    public $statusData;
     public $gaga;
    public $from='';
     public $to='';
      public $sortColumnName = 'EventDateFrom';
    public $sortDirection = 'desc';

    protected $append = 'user_id';
    public function render()
    {

                $events = Event::all();
        return view('livewire.admin.events.events-table',['events'=>$this->pages()->paginate($this->perPage)]);
    }

        protected function pages(){

        if($this->status =="thisMonth"){


            
        return  Event::select(['events.*'])->when($this->from, function($query) {
            $query->where('events.EventDateFrom','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('events.EventDateTo','<=', $this->to);
        })->whereMonth('events.EventDateFrom', date('m'))
->whereYear('events.EventDateFrom', date('Y'))->when($this->post, function($query) {
            $query->where('events.Post','=', $this->post);
        })
->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 


           
        }elseif($this->status == 'thisWeek'){


           return      Event::select(['events.*'])->when($this->from, function($query) {
            $query->where('events.EventDateFrom','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('events.EventDateTo','<=', $this->to);
        })->whereBetween('events.EventDateFrom', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->when($this->post, function($query) {
            $query->where('events.Post','=', $this->post);
        })->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 
        
        

        }elseif($this->status =='thisDay'){


            
             return   Event::select(['events.*'])->when($this->from, function($query) {
            $query->where('events.EventDateFrom','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('events.EventDateTo','<=', $this->to);
        })->whereDate('events.EventDateFrom', '<=',  Carbon::today())
            ->whereDate('events.EventDateFrom', '>=',  Carbon::today())->when($this->post, function($query) {
            $query->where('events.Post','=', $this->post);
        })->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 

        }else{
            
            return Event::select(['events.*'])->when($this->from, function($query) {
            $query->where('events.EventDateFrom','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('events.EventDateTo','<=', $this->to);
        })->when($this->post, function($query) {
            $query->where('events.Post','=', $this->post);
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
     $this->sortColumnName = 'EventDateFrom';
    $this->sortDirection = 'asc';
      $this->status = '';

}
}
