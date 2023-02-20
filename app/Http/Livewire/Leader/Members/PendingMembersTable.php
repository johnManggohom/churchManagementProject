<?php

namespace App\Http\Livewire\Leader\Members;

use App\Models\OrganizationUser;
use Livewire\Component;

class PendingMembersTable extends Component
{

                public $perPage = 10;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;
     public $gaga;
    public $from;
      public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';

    protected $append = 'user_id';
    public function render()
    {
        return view('livewire.leader.members.pending-members-table',[ 'employees'=> $this->pages()]);
    }

        protected function pages()
{
    return OrganizationUser::select(['organization_user.*'])->join('users', 'organization_user.user_id', '=', 'users.id' )->where('organization_id', '=', auth()->user()->organization_leader->organization->id)->where('isAccepted', '=', 0)->orderBy('users.name', $this->sortDirection)->search(trim($this->search))->get();
      
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
