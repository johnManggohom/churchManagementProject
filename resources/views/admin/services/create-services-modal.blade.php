

<div class="modal fade text-left" id="servicesModal" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                {{ __('Create New Occasion') }}
            </h4>

            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span>
            </button>
          
        </div>

    <div class="modal-body">

          <form action="{{ route('admin.services.store') }}" method="post" enctype="multipart/form">
@csrf


            <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Occasion Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div> 
  {{-- <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>  --}}
  <button type="submit" class="btn text-white bg-blue-600">Submit</button>

</form>
        </div> 
    </div>
</div>

</div>


{{-- Update --}}



   <div wire:ignore.self class="modal fade text-left" id="updateServicesModal" aria-labelledby="updateStudentModalLabel" tabindex="-1" role="dialog" aria-hidden="true">




<div class="modal-dialog modal-lg" role="document">

  

    <div class="modal-content">
        <div class="modal-header" id="updateStudentModalLabel">
            <h4 class="modal-title">
                {{ __('Edit  Occasion') }}
            </h4>

          
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span>
            </button>
          
        </div>

        
            <div class="modal-body">

                  <form wire:submit.prevent="updateService">
    
                    <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Occasion Name</label>
            <input type="text" class="form-control" name="name" wire:model="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            
          </div> 
          {{-- <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>  --}}
          <button type="submit" class="btn text-white bg-blue-600">Submit</button>

        </form>
                </div> 

    </div>
    </div>
</div>