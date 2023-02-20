<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Ocassion;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesTable extends Component
{

    public $service_id, $name;
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

          $services = Ocassion::all();
        return view('livewire.admin.services.services-table', [
            'services'=> $this->pages()->paginate($this->perPage)
        ]);
    }


    public function editService($service_id){

        $service= Ocassion::find($service_id);

        if($service){
            $this->service_id = $service->id;
            $this->name = $service->name;
        }else{

            redirect()->to('/admin/services');
        }

    }

        protected function pages()
{
        return Ocassion::select(['ocassion.*'])->orderBy($this->sortColumnName, $this->sortDirection)->search(trim($this->search));
      
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

    public function updateService(){

       
        $validatedData = $this->validate([
            'name' => 'required|min:6',
        ]);
        if($validatedData){

         Ocassion::where('id', $this->service_id)->update($validatedData);

        session()->flash('message', 'Service Updated');
        // $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');

        }else{
             $this->dispatchBrowserEvent('close-modal');
        }
       
    }
}
