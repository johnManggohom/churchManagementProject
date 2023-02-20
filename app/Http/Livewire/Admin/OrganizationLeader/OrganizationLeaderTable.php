<?php

namespace App\Http\Livewire\Admin\OrganizationLeader;

use App\Models\Organization;
use App\Models\User;
use Livewire\Component;

class OrganizationLeaderTable extends Component
{
                public $perPage = 10;
    public $search = '';
    public $searchDate = '';
    public $orderByStatus = '';
    public $status;
     public $leader= '';
    public $organization;
      public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';

    protected $append = 'user_id';
    public function render()
    {
          $organizations = Organization::all()->pluck('id', 'name');
       
        return view('livewire.admin.organization-leader.organization-leader-table',[ 'employees'=> $this->pages()->paginate($this->perPage),     'organizations'=>$organizations]);
    }

     protected function pages()
{
    return User::select(['users.*'])->join('organization_leader', 'organization_leader.user_id', '=', 'users.id' )->when($this->leader, function($query) {
            $query->where('organization_leader.is_leader', $this->leader);
        })->when($this->organization, function($query) {
            $query->where('organization_leader.organization_id', $this->organization);
        })->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));
}   
}
