<div>

                  <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><a href="{{ route('admin.view_attendance.index') }}" class="text-gray-500 hover:text-gray-600 text-sm">Attendance</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/</span></li>
      </ol>
    </nav>
  </div>
</nav> 
    <div class="flex w-full mt-3">
      
                
                 <div class="flex w-full  items-end"> 
                       <div class="w-1/2"> 
                     <div class="input-group relative flex flex-wrap items-stretch w-full mb-2">
                        <button class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium h-7 text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </button>
                    <input type="search" wire:model.debounce.300ms="search" class="form-control relative flex-auto min-w-0 block h-7 text-xs font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none text-sm" placeholder="Search Name of Attendee" aria-label="Search" aria-describedby="button-addon2">
       
                    </div>

                <div style="margin:auto" class="pb-4">
                        <label for="countries_multiple" class="block  text-sm font-medium text-gray-900 dark:text-gray-400">Filter by Activity</label>
                        <select wire:model="status" multiple="" id="activities" wire.model="status" class="bg-slate-50 border border-gray-300 text-gray-900  w-full p-2.5 ">
                        
                          @forelse ($activities as $activity )
                            <option value="{{ $activity->id }}" class="text-xs"> {{ $activity->name }}</option>
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
                      
                {{-- <h2>Attendance For <span id="activity_id" wire:model = "title"></span></h2> --}}

                        <table class="w-full border-separate border-spacing-y-2 ">
     
                        <thead class="border-b-4 border-dark-700 ">
                            <tr class=" border-b">
                            
                                <th class="p-2  cursor-pointer  font-thin text-gray-500">
                                     <div class="flex items-center justify-around ">

                                        <div class="text-xs">Name </div>
                                         <span class="cursor-pointer" wire:click="sortBy('name')">
                                            {{-- <i class="text-xs fas fa-long-arrow-up {{ $sortColumnName === 'name'  && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                            <i class="text-xs fas fa-long-arrow-down  {{ $sortColumnName === 'name'  && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i> --}}
                                        </span>
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer  font-thin text-gray-500">
                                    <div class="flex items-center justify-center space-x-2">

                                        <div class="text-xs">  Attendance</div>
                                    </div>
                                  </th>
                                   <th class="p-2  cursor-pointer  font-thin text-gray-500">
                                    <div class="flex items-center justify-center space-x-2">

                                        <div class="text-xs"> Date</div>
                                    </div>
                                  </th>
                                   <th class="p-2  cursor-pointer  font-thin text-gray-500">
                                    <div class="flex items-center justify-center space-x-2">

                                        <div class="text-xs"> Employee</div>
                                    </div>
                                  </th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($appointments as $appointment )
                              <tr class="bg-gray-100 text-center border-b  text-gray-600">
                                 <td class="p-2 bg-white  text-xs">{{ $appointment->user->name }} {{ $appointment->user->middle_name }} {{ $appointment->user->last_name }}</td>
                                  <td class="p-2 bg-white  text-xs">Present</td>
                                     <td class="p-2 bg-white  text-xs">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $appointment->attendence_date )->format('M d Y') }}</td>
                                           <td class="p-2 bg-white  text-xs">{{ $appointment->employee->name }} {{ $appointment->employee->middle_name }} {{ $appointment->employee->last_name }}</td>
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
