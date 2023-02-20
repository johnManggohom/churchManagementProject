<x-admin-layout>
       <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><span class="text-gray-500 hover:text-gray-600 text-sm">Appointment</span></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ Follow-up Appointment</span></li>
      </ol>
    </nav>
  </div>
</nav>  

  <div>

     <div>
        @if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show w-10/12 mx-auto my-4 " role="alert">
        <ul  class=" text-dark">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
         <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
    </div>
@endif
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show w-10/12 mx-auto my-4" role="alert">
      {{ session('message') }}   
   <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
</div>

@endif

@if (session()->has('messageerror'))
<div class="alert alert-danger alert-dismissible fade show w-10/12 mx-auto my-4" role="alert">
      {{ session('messageerror') }}   
   <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
</div>

@endif

<div class="bg-white drop-shadow-md px-2 py-2 rounded-lg w-full mt-4 mx-auto">
<div class="w-full "> <p class="font-bold text-xl text-center">Follow-up  Appointment</p> </div>
</div>


 <div class="bg-white drop-shadow-md px-5 py-3 rounded-lg w-full mt-2 mx-auto">


<div class="flex gap-4 justify-center mb-4">        <div  class="profile bg-white   h-fit">


           
            <p class=" text-xl font-bold">{{ ucfirst($appointment->user->name) }} {{ ucfirst($appointment->user->middle_name) }} {{ ucfirst($appointment->user->last_name) }}</p>
            <p class="text-lg">{{ ucfirst($appointment->user->email) }}</p>
            <div class="details mt-4">
                <p class="text-sm"> Member Since: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->user->created_at)->format('M d Y g:i A')}}</p>
                <p class="text-sm"> Address: Antipolo City</p>
                <p class="text-sm"> Number: 097862424</p>
            </div>
        </div>

 <div class="appointment-details ml-3">
            <p class="text-xl ">Appointment Details</p>
            <div class="appointment-specific-details  ">
                      <p class="text-lg "> <span class="font-bold"> Ocassion: </span> {{  ucfirst($appointment->ocassion->name)  }}</p>
              <p class="text-lg "> <span class="font-bold"> Date Time: </span> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start_time)->format('M d Y g:i A')}}</p>


            </div>

        </div>

      </div>

       


  <form method="POST" action="{{ route('admin.appointmentfollow.store', $appointment->id) }}">
@csrf

<div class="flex w-full space-x-5">
<livewire:client.appointment.date-time-picker>


 {{-- <button type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Delete</button> --}}

 <div class="w-1/2">


   <div class="w-full">
  <div class="mb-3 xl:w-full">
    <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700"
      >Message <span class="text-gray-500 text-xs"> (optional)</span></label
    >
    <textarea name="message"
      class="
        form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      "
      id="exampleFormControlTextarea1"
      rows="3"
      placeholder="Your message"
    ></textarea>
  </div>
</div>


<div class="w-full">
  <button type="submit" class="inline-block px-6 w-full py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg mb-3 focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
</div>

 </div>

 </form>


 {{---------------------------------------------------------- Appointment table --------------------------------------------------------}}

</div>

</div>


  </div>

</x-admin-layout>