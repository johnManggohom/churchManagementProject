<x-admin-layout>
    <div>
        <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><a href="{{ route('admin.activities') }}" class="text-gray-500 hover:text-gray-600 text-sm">Schedule</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ Assign Schedule</span></li>
      </ol>
    </nav>
  </div>
</nav>  

    <section class=" mb-3">

              @if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show  mx-auto my-4 " role="alert">
        <ul  class=" text-dark">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
         <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
    </div>
@endif

<div class="flex mt-5 gap-5 border-b-2 pb-4 ">
  <div>
     <p class=" text-xl ">User Details</p>
  <p class=" text-xl font-bold  mt-4">{{ ucfirst($appointment->user->name) }} {{ ucfirst($appointment->user->middle_name) }} {{ ucfirst($appointment->user->last_name) }}</p>
            <p class="text-lg">{{ ucfirst($appointment->user->email) }}</p>
            <div class="details mt-4">
                <p class="text-sm"> Member Since: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->user->created_at)->format('M d Y g:i A')}}</p>
                <p class="text-sm"> Address: Antipolo City</p>
                <p class="text-sm"> Number: 097862424</p>
            </div>
        </div>

        
        <div class="appointment-details ml-3">
            <p class="text-xl ">Appointment Details</p>
            <div class="appointment-specific-details  mt-4">
                      <p class="text-lg "> <span class="font-bold"> Ocassion: </span> {{  ucfirst($appointment->ocassion->name)  }}</p>
              <p class="text-lg "> <span class="font-bold"> Date Time: </span> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start_time)->format('M d Y g:i A')}}</p>
                <p class="text-lg "> <span class="font-bold"> Status: </span> <span class="text-yellow-500">{{   ucfirst($appointment->status)}}</span> </p>
       
            </div>
        </div>
</div>


<div class="mt-3">

  <p class="text-lg font-bold">Assign Schedule</p>
    <form action="{{ route('admin.schedule.store', $appointment->id) }}" method="POST" class="space-y-4">
    @csrf
        
<input type="hidden" name="id" value="{{  $appointment->id }}">
<livewire:admin.schedule.schedule-date-time-picker>


<p class="text-sm mt-4">Message <span class="text-xs">(optional)</span>:</p>
<label class="sr-only" for="message">Description</label>
            <textarea
              class="w-full rounded-lg border-gray-200 p-3 mt-1 text-sm"
              placeholder="Type-in message"
              rows="8"
              name="schedule_description"
              id="message"
            ></textarea>
          </div> 
          <div class="mt-2">
            <button
              type="submit"
              class="inline-flex w-full items-center justify-center rounded-lg bg-blue-600 px-5 py-2 text-white sm:w-auto"
            >
              <span class="font-medium">Schedule</span>
            </button>
          </div>
        </form>

</div>

@if (!empty($schedule->appointment))


  
@endif



         


</section>
</x-admin-layout>