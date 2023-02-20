<x-admin-layout>
      <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><a href="{{ route('admin.schedule-view.index') }}" class="text-gray-500 hover:text-gray-600 text-sm">Schedule</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/</span></li>
         <li><span class="text-gray-500 hover:text-gray-600 text-sm"> @if($appointment->status == 'finished')
 <p class="text-gray-500 hover:text-gray-600 text-sm">show Schedule</p>
  @else
      <p class="text-gray-500 hover:text-gray-600 text-sm">Edit Schedule</p>
  @endif</span></li>
        <li><span class="text-gray-500 mx-2 text-sm">/</span></li>
      </ol>
    </nav>
  </div>
</nav>  

 <div class="my-6">

  @if($appointment->status == 'finished')
 <p class="text-lg">show Schedule</p>
  @else
      <p class="text-lg">Edit Schedule</p>
  @endif



   
    <div class="mt-7 flex space-x-5">

        <div  class="profile bg-white p-3 shadow-sm h-fit">
        <div class="w-1/6  item-center justify-center">
<div class=" w-20 h-20 rounded-full bg-red-500 text-white flex items-center justify-center text-3xl font-extrabold"> {{ mb_substr($appointment->user->name , 0, 1, "UTF-8") }} </div>
</div>

           
            <p class="mt-3 text-xl font-bold">{{ ucfirst($appointment->user->name) }} {{ ucfirst($appointment->user->middle_name) }} {{ ucfirst($appointment->user->last_name) }}</p>
            <p class="text-lg">{{ ucfirst($appointment->user->email) }}</p>
            <div class="details mt-4">
                <p class="text-sm"> Member Since: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->user->created_at)->format('M d Y g:i A')}}</p>
                <p class="text-sm"> Address: Antipolo City</p>
                <p class="text-sm"> Number: 097862424</p>
            </div>
        </div>

        <div class="appointment-details ml-3">
            <p class="text-xl ">Schedule Details</p>
            <div class="appointment-specific-details  mt-4">
                      <p class="text-lg "> <span class="font-bold"> Ocassion: </span> {{  ucfirst($appointment->ocassion->name)  }}</p>
              <p class="text-lg "> <span class="font-bold"> Start Time: </span> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start_time)->format('M d Y g:i A')}}</p>
               <p class="text-lg "> <span class="font-bold"> End Time: </span> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->endTime)->format('M d Y g:i A')}}</p>
                <p class="text-lg "> <span class="font-bold"> Status: </span> <span class="text-yellow-500">{{   ucfirst($appointment->status)}}</span> </p>
                <p class="text-lg "> <span class="font-bold"> Message: </span>  @if ( $appointment->message != null)
                    {{   $appointment->message, 100?: 'No message'}}
                    @else
                    No message
                @endif </p>
            </div>


            <form action="{{ route('admin.schedule-view.update', $appointment->id) }}" method="POST">
                @csrf
            <div class="button-format w-100">

       

                  @if($appointment->status == 'accepted')
                            <div class="buttons  flex  space-x-2 w-full ">
                     {{-- <div class="mt-4 w-full">
                      <input type="radio" id="reject"  name="status"  value="rejected" class="hidden peer">
            <label class="inline-block text-center border w-full py-1 px-1 bg-rose-600 text-white peer-checked:bg-rose-800 drop-shadow-[0_1px_1px_rgba(0,0,0,0.25)] peer-checked:text-white peer-checked:border"
                for="reject"> Reject </label> </div>   --}}

                 <div class="mt-4 w-full">
                   <input type="radio" id="finished"  name="status"  value="finished" class="hidden peer">
            <label class="inline-block text-center border py-1 px-1 w-full bg-emerald-600 text-white peer-checked:bg-emerald-800 drop-shadow-[0_1px_1px_rgba(0,0,0,0.25)] peer-checked:text-white peer-checked:border"
                for="finished"> Finish  </label> </div>

                <div class="mt-4 w-full">
                   <input type="radio" id="cancelled"  name="status"  value="canceled" class="hidden peer">
            <label class="inline-block text-center border py-1 px-1 w-full bg-red-600 text-white peer-checked:bg-red-800 drop-shadow-[0_1px_1px_rgba(0,0,0,0.25)] peer-checked:text-white peer-checked:border"
                for="cancelled"> Cancel  </label> </div>
                            </div>

          <div class="mt-4">
            <div class="w-full my-2">
                    <button
                        type="submit"
                        data-mdb-ripple="true"
                        data-mdb-ripple-color="light"
                        class="inline-block px-6 py-2.5 w-full bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                    >Submit</button>
                    </div>

            </div>

                
            </div>



                  @endif

                </div>



           </form>
            
            </div>
           

        </div>

    </div>
  </div>
</x-admin-layout>

