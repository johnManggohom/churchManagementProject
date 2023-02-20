<?php

namespace App\Http\Livewire\Admin\Activities;

use App\Models\Activity;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class AdminActivitiesTable extends Component
{

     public $organization_id, $name;
     public $activity;
      use WithPagination;
  public $search = '';
           public $sortColumnName = 'name';
    public $sortDirection = 'desc';

    public $perPage = 10;
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;

    public $statusData;
     public $gaga;
    public $from='';
     public $to='';


    protected $append = 'user_id';

     protected $rules = [
        'name' => 'required|min:3'
    ];
    public function render()
    {
        return view('livewire.admin.activities.admin-activities-table',[
            'activities'=> $this->pages()->paginate($this->perPage)
        ]);
    }



    protected function pages()
{



            if($this->status =="thisMonth"){


            
        return Activity::select(['activities.*'])->when($this->from, function($query) {
            $query->where('start_time','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('start_time','<=', $this->to);
        })->whereMonth('created_at', date('m'))
->whereYear('created_at', date('Y'))
->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 


           
        }elseif($this->status == 'thisWeek'){


                return Activity::select(['activities.*'])->when($this->from, function($query) {
            $query->where('start_time','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('start_time','<=', $this->to);
        })->whereBetween('activities.start_time', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search)); 
        
        

        }elseif($this->status =='thisDay'){


            
            return Activity::select(['activities.*'])->when($this->from, function($query) {
            $query->where('start_time','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('start_time','<=', $this->to);
        })->whereDate('activities.start_time', Carbon::today())->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));  

        }else{

              return Activity::select(['activities.*'])->when($this->from, function($query) {
            $query->where('start_time','>=', $this->from);
        })->when($this->from, function($query) {
            $query->where('start_time','<=', $this->to);
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
     $this->sortColumnName = 'start_time';
    $this->sortDirection = 'asc';
      $this->status = '';

}


}

