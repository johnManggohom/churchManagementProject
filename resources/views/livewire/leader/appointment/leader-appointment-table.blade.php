<div>
  <div>
<div>

    <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><span class="text-gray-500 hover:text-gray-600 text-sm">Appointment</span></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ Appointment History</span></li>
      </ol>
    </nav>
  </div>
</nav>  
    <div class="flex w-full mt-5">
                
               
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
                      
                      <select wire:model="occassion"  class="block text-xs appearance-none  bg-gray-200 border border-gray-200 text-gray-700  h-8 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            
                                        <option value="" class="text-xs"> Ocassion</option>
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
                            
                              
                                  <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                        Date Time
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
                        
                               <td class="p-2  bg-white text-xs">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start_time)->format('M d Y g:i A')}}</td>
                               <td class="p-2  bg-white text-xs">{{ $appointment->status}}</td>
                                <td class="p-2  bg-white text-xs">{{ $appointment->ocassion->name}}</td>
                              
                               <td class="p-2  bg-white text-xs">{{  \Illuminate\Support\Str::limit($appointment->message, 100)?: 'No message' }}</td>
                               
                              
                               <td class=" bg-white text-xs">

                               @if ($appointment->status != 'pending')
                               <form action="">
                                <button class="text-xs rounded-xl bg-red-200 py-1 px-2 text-white" disabled>Cancel</button>
                                 @else
                                  <form  method="POST" action="{{ route('client.appointment.update', $appointment->id) }}">
                                                    @csrf
                                                <button type="submit" class="text-xs rounded-xl bg-red-500 py-1 px-2 text-white">Cancel</button>
                                                 </form>
                               @endif
                             
                               </td>
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
