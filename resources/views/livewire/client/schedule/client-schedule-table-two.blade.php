<div>
<div>
    <div>

    <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><a href="{{ route('admin.appointment') }}" class="text-gray-500 hover:text-gray-600 text-sm">Schedule</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ </span></li>
      </ol>
    </nav>
  </div>
</nav>  
    <div class="flex w-full mt-3">
                
                 <div class="flex w-full  items-end"> 
                       <div class="w-full"> 
                     <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                        <button class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium h-7 text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </button>
                    <input type="search" wire:model.debounce.300ms="search" class="form-control relative flex-auto min-w-0 block h-7 text-xs font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none text-sm" placeholder="Search Name, Service, Price" aria-label="Search" aria-describedby="button-addon2">
       
                    </div>
                </div>
                </div>
{{-- 
                <div class="flex  justify-end w-full">
                    <div class="w-full"> <div class="flex justify-end space-x-4">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#newModal" class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas text-lg fa-plus"></i></button>
                      <button wire:click="export()" class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas fa-print text-lg"></i></button>
                </div></div>
                     
                </div> --}}
             </div>

              <div class="flex w-full space-x-2">

                 <div class="flex items-center justify-center text-sm space-x-2">
                              <div>From:</div>
                             <input type="datetime-local" id="start_time" name="start_time" wire:model="from"
                        value=""
                        class="block text-sm appearance-none h-8 w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />

                        </div>
                        
                    <div class="flex items-center justify-center  space-x-2">
                                <div class="text-sm">To:</div>
                        <input type="datetime-local" id="start_time" name="start_time" wire:model.lazy="to"
                        value=""
                        class="block text-sm  h-8 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                    </div>
                       <div class="space-x-2">

                         <select wire:model="status"  class="block text-xs appearance-none  bg-gray-200 border border-gray-200 text-gray-700  h-8 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="" class="text-xs"> Status</option>
                                         <option value="cancel" class="text-xs ">Cancel</option>
                                         <option value="finish" class="text-xs"> Finish</option>
                                        <option value="pending" class="text-xs "> Pending</option>
                                        <option value="accept" class="text-xs "> Accept</option>
                                         <option value="reject" class="text-xs ">Reject</option>
                                         
                    </select>


                    </div>

                     <div class="space-x-2">

                         <select wire:model="follow"  class="block text-xs appearance-none  bg-gray-200 border border-gray-200 text-gray-700  h-8 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="" class="text-xs"> Follow Up</option>
                                  <option value="1" class="text-xs"> True</option>
                                  <option value="null" class="text-xs"> False</option>
                                        
                                         
                    </select>


                    </div>
                    <div class="space-x-2">
                      
                      <select wire:model="occassion"  class="block text-xs appearance-none  bg-gray-200 border border-gray-200 text-gray-700  h-8 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            
                                        <option value="" class="text-xs"> All</option>
                                        @forelse ( $occasions as $occasion )
                                            <option value="{{ $occasion->id }}" class="text-xs"> {{ $occasion->name }}</option>
                                        @empty
                                          <option value="Finish" class="text-xs"> No Ocassion</option>
                                        @endforelse
                                         
                    </select>
                    </div>


             </div>

             <div class="mt-3">
                        <button wire:click="month('month')" class="p-1 rounded-2xl bg-blue-500 text-white text-xs">This Month</button>
                        <button wire:click="month('week')" class="p-1 bg-blue-500 rounded-2xl text-white text-xs"> This Week</button>
                        <button wire:click="month('day')" class="p-1 bg-blue-500 rounded-2xl text-white text-xs">This Day</button>

                        <button wire:click="remove()" class=" p-1 bg-blue-500 rounded-2xl text-white text-xs">Reset Filters</button></div>

                        <table class="w-full border-separate border-spacing-y-2 ">
     
                        <thead class="border-b-4 border-dark-700 ">
                            <tr class=" border-b">
                            
                                <th class="p-2  cursor-pointer  font-thin text-gray-500">
                                    <div class="flex items-center justify-around ">

                                        <div class="text-xs">Name </div>
                                         <span class="cursor-pointer" wire:click="sortBy('name')">
                                            <i class="text-xs fas fa-long-arrow-up {{ $sortColumnName === 'name'  && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                            <i class="text-xs fas fa-long-arrow-down  {{ $sortColumnName === 'name'  && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                        Date Time
                                           <span class="cursor-pointer" wire:click="sortBy('name')">
                                            <i class="text-xs fas fa-long-arrow-up {{ $sortColumnName === 'start_time'  && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                            <i class="text-xs fas fa-long-arrow-down  {{ $sortColumnName === 'start_time'  && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                        Status
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                        Ocassion
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                        Message
                                    </div>
                                </th>
                                <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                        Actions
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>


        
                            @forelse ( $appointments as $appointment )

                              <tr class="bg-gray-100 text-center border-b  text-gray-600">
                               <td class="p-2  bg-white text-xs">{{ $appointment->user->name }} {{ $appointment->user->middle_name }} {{ $appointment->user->last_name }}</td>
                               <td class="p-2  bg-white text-xs">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start_time)->format('M d Y g:i A')}}</td>
                               <td class="p-2  bg-white text-xs">{{ $appointment->status}}</td>
                                <td class="p-2  bg-white text-xs">{{ $appointment->ocassion->name}}</td>
                              
                               <td class="p-2  bg-white text-xs">{{  \Illuminate\Support\Str::limit($appointment->message, 100)?: 'No message' }}</td>
                               <td class="p-2  bg-white text-xs flex space-x-2 justify-center">
                                 {{-- <a href="{{ route('admin.shedule-view.edit', $appointment->id) }}"><i class="fa-regular fa-pen-to-square bg-blue-500 p-1 text-slate-100 rounded-md "></a></i>   --}}
                                
                                
                                @if ($appointment->status != 'accepted')
                               <form action="">
                                <button class="text-xs rounded-xl bg-red-200 py-1 px-2 text-white" disabled>Cancel</button>
                                 @else
                                  <form  method="POST" action="{{ route('client.schedule.update', $appointment->id) }}">
                                                    @csrf
                                                <button type="submit" class="text-xs rounded-xl bg-red-500 py-1 px-2 text-white">Cancel</button>
                                                 </form>
                               @endif
                             
                                
                                {{-- <form  method="POST" action="{{ route('admin.appointment.delete', $appointment->id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit"><i class="fa-sharp fa-solid fa-trash bg-red-500 p-1 text-slate-100 rounded-md "></i></button>
                                                 </form> </td> --}}
                              </tr>
                                
                            @empty
                                
                            <td class="p-2  bg-white text-xs">Empty Table</td>
                            @endforelse
       
               
                                    
                                    
                                           
                        
                        </tbody>
                    </table>

                
                    {{ $appointments->links() }}
           
</div>
</div>

</div>

</div>
