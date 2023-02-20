<x-admin-layout>
    <div>

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('message') }}   
   <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
</div>
@elseif (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}   
   <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
</div>
    @endif

    @if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul  class=" text-dark">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
         <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
    </div>
@endif



<livewire:admin.activities.admin-activities-table>
    

</x-admin-layout>