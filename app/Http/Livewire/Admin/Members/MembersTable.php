<?php

namespace App\Http\Livewire\Admin\Members;

use App\Models\Organization;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MembersTable extends Component
{

          use WithPagination;
  public $search = '';
           public $sortColumnName = 'name';
    public $sortDirection = 'desc';
public $organization;
    public $perPage = 10;
    public function render()
    {

        $organizations = Organization::all()->pluck('id', 'name');
       
        return view('livewire.admin.members.members-table', ['members'=>$this->pages(),
    'organizations'=>$organizations
    ]);
    }



            protected function pages()
{

    if($this->organization != null){
          return User::whereHas('roles', function ($query) {
    $query->where('name','!=', 'organization leader')->where('name','!=', 'admin')->where('name','!=', 'staff');
})->whereHas('organization', function($q) {
        $q->where('organization_id', $this->organization);
    })->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search))->get();
    }else{
          return User::role('user')->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search))->get();
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

    // public function updateService(){

       
    //     $validatedData = $this->validate([
    //         'name' => 'required|min:6',
    //     ]);
    //     if($validatedData){

    //      Ocassion::where('id', $this->service_id)->update($validatedData);

    //     session()->flash('message', 'Service Updated');
    //     // $this->resetInput();
    //     $this->dispatchBrowserEvent('close-modal');

    //     }else{
    //          $this->dispatchBrowserEvent('close-modal');
    //     }
       
    // }
}
