<?php

namespace App\Http\Livewire\Admin\Organizations;

use App\Models\Organization;
use Livewire\Component;
use Livewire\WithPagination;

class OrganizationsTable extends Component
{

    public $organization_id, $name;
      use WithPagination;
  public $search = '';
           public $sortColumnName = 'name';
    public $sortDirection = 'desc';

    public $perPage = 8;

     protected $rules = [
        'name' => 'required|min:3'
    ];
    public function render()
    {

          $organizations = Organization::all();
        return view('livewire.admin.organizations.organizations-table', [
            'organizations'=> $this->pages()->paginate($this->perPage)
        ]);
    }


    public function editOrganization($organization_id){

        $organization= Organization::find($organization_id);

        if($organization){
            $this->organization_id = $organization->id;
            $this->name = $organization->name;
        }else{

            redirect()->to('/admin/organizations');
        }

    }

        protected function pages()
{
        return Organization::select(['organizations.*'])->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));
      
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

    public function updateOrganization(){

       
        $validatedData = $this->validate([
            'name' => 'required|min:6',
        ]);
        if($validatedData){

         Organization::where('id', $this->organization_id)->update($validatedData);

        session()->flash('message', 'Organization Updated');
        // $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');

        }else{
             $this->dispatchBrowserEvent('close-modal');
        }
       
    }
}
