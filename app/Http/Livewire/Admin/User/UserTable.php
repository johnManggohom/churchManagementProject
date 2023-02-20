<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{

            public $perPage = 10;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status = '';
     public $role;
     public $gaga;
    public $from;
      public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';

    protected $append = 'user_id';
    public function render()


    {

        
        return view('livewire.admin.user.user-table', [ 'employees'=> $this->pages()->paginate($this->perPage)]);
    }

    protected function pages()
{
    return User::select(['users.*'])->whereHas('roles', function ($query) {
    $query->where('name','!=', 'organization leader')->where('name','!=', 'user');
})->orWhere('role_id' , '=', 3)->orWhere('role_id', '=', 1)->when($this->status, function($query) {
            $query->where('isRoleAccepted', $this->status);
        })->when($this->role, function($query) {
            $query->where('role_id', $this->role);
        })->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));
      
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
}


