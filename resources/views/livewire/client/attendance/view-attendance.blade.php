<div>
                  <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><span class="text-gray-500 hover:text-gray-600 text-sm">Home</span></li>
        <li><span class="text-gray-500 mx-2 text-sm">/</span></li>
      </ol>
    </nav>
  </div>
</nav> 
    <div class="flex w-full mt-3">
      
                
                 <div class="flex w-full  items-end"> 
                <div class="w-1/2"> 

                <p class="text-lg py-3">Attendance History</p>
                <div style="margin:auto" class="pb-4">
                        <label for="countries_multiple" class="block  text-sm font-medium text-gray-900 dark:text-gray-400">Filter by Activities Attended</label>
                        <select wire:model="status" multiple="" id="activities" wire.model="status" class="bg-slate-50 border border-gray-300 text-gray-900  w-full p-2.5 ">
                        
                          @forelse ($activities as $activity )
                            <option value="{{ $activity->activity_id }}" class="text-xs"> {{ $activity->activity->name }}</option>
                          @empty
                            
                                         <option value="" class="text-xs"> No available activity</option>
                          @endforelse
                        </select>
                        </div>
                </div>
                </div>

             </div>

              <div class="flex w-full space-x-2">

               
                        
                    
                      
                             
                

             </div>

            

             <div class="mt-1">
                    
                        <table class="w-full border-separate border-spacing-y-2 ">
     
                        <thead class="border-b-4 border-dark-700 ">
                            <tr class=" border-b">
                            
                            
                                  <th class="p-2  cursor-pointer  font-thin text-gray-500">
                                    <div class="flex items-center justify-center space-x-2">

                                        <div class="text-xs">  Attendance Status</div>
                                    </div>
                                  </th>
                                    <th class="p-2  cursor-pointer  font-thin text-gray-500">
                                    <div class="flex items-center justify-center space-x-2">

                                        <div class="text-xs">  Activity Name</div>
                                    </div>
                                  </th>
                                   <th class="p-2  cursor-pointer  font-thin text-gray-500">
                                    <div class="flex items-center justify-center space-x-2">

                                        <div class="text-xs">  Date</div>
                                    </div>
                                  </th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($appointments as $appointment )
                              <tr class="bg-gray-100 text-center border-b  text-gray-600">
            
                                  <td class="p-2 bg-white  text-xs">Present</td>
                                    <td class="p-2 bg-white  text-xs">{{ $appointment->activity->name }}</td>
                                    <td class="p-2 bg-white  text-xs">{{  \Carbon\Carbon::createFromFormat('Y-m-d', $appointment->attendence_date)->format('M d Y')  }}</td>
                              </tr>
                                
                            @empty


                             <tr class="bg-gray-100 text-center border-b  text-gray-600">
                                 <td class="p-2 bg-white  text-xs">Empty Attendance</td>
                                  
                              </tr>
                                
                            @endforelse
       
               
                                    
                         
                                    
                                           
                        
                        </tbody>
                    </table>
                       {{ $appointments->links() }}
             </div>
</div>
</div>
