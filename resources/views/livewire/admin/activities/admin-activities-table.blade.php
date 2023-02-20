<div>
                <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><a href="{{ route('admin.activities') }}" class="text-gray-500 hover:text-gray-600 text-sm">Activities</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/</span></li>
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
                    <input type="search" wire:model.debounce.300ms="search" class="form-control relative flex-auto min-w-0 block h-7 text-xs font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none text-sm" placeholder="Search Activity" aria-label="Search" aria-describedby="button-addon2">
       
                    </div>


                </div>
                </div>
                @unlessrole('staff')
                  <div class="flex  justify-end w-full">
                    <div class="w-full"> <div class="flex justify-end space-x-4">
                    <button type="button"  class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "> <a href="{{                             route('admin.activities.create') }}"><i class="fas text-lg fa-plus"></i> </a></button>
                   
                </div></div>
                     
                </div>
                @endunlessrole

              
             </div>

              <div class="flex w-full space-x-2">

                 <div class="flex items-center justify-center text-sm space-x-2">
                              <div>From:</div>
                             <input type="datetime-local" id="start_time" name="start_time" wire:model="from"
                        value=""
                        class="block text-sm appearance-none h-7 w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />

                        </div>
                        
                    <div class="flex items-center justify-center  space-x-2">
                                <div class="text-sm">To:</div>
                        <input type="datetime-local" id="start_time" name="start_time" wire:model.lazy="to"
                        value=""
                        class="block text-sm  h-7 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                    </div>
                

             </div>

             <div class="mt-1">
                        <button wire:click="month('month')" class="p-1 rounded-2xl bg-blue-500 text-white text-xs">This Month</button>
                        <button wire:click="month('week')" class="p-1 bg-blue-500 rounded-2xl text-white text-xs"> This Week</button>
                        <button wire:click="month('day')" class="p-1 bg-blue-500 rounded-2xl text-white text-xs">This Day</button>

                        <button wire:click="remove()" class=" p-1 bg-blue-500 rounded-2xl text-white text-xs">Reset Filters</button></div>

                        <table class="w-full border-separate border-spacing-y-2 ">
     
                        <thead class="border-b-4 border-dark-700 ">
                            <tr class=" border-b">
                            
                                <th class="p-2  cursor-pointer  font-thin text-gray-500">
                                    <div class="flex items-center justify-center space-x-2">

                                        <div class="text-xs">Name </div>
                                
                                       <span class="cursor-pointer" wire:click="sortBy('name')">
                                            <i class="text-xs fas fa-long-arrow-up "></i>
                                            <i class="text-xs fas fa-long-arrow-down  "></i>
                                        </span>
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                         
                                        Description
                                          
                                    </div>
                                </th>
                                <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                      <div>Start</div> 
                                       <span class="cursor-pointer" wire:click="sortBy('start_time')">
                                            <i class="text-xs fas fa-long-arrow-up "></i>
                                            <i class="text-xs fas fa-long-arrow-down  "></i>
                                        </span>
                                    </div>
                                </th>
                                <th class="p-2  cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center text-xs space-x-2">
                                        <div> End</div>
                                       
                                        <span class="cursor-pointer" wire:click="sortBy('end_time')">
                                            <i class="text-xs fas fa-long-arrow-up "></i>
                                            <i class="text-xs fas fa-long-arrow-down  "></i>
                                        </span>
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                        Attendance
                                         
                                    </div>
                                </th>
                                 <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                        Action
                                         
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                    
            @forelse ( $activities as $activity)
                 <tr class="bg-gray-100 text-center border-b  text-gray-600">
                             
                            
                                  <td class="p-2 bg-white  text-xs">{{ $activity->name }}</td>
                                  <td class="p-2 bg-white  text-xs"> {{\Illuminate\Support\Str::limit($activity->description, 100)  }}</td>
                                       <td class="p-2 bg-white  text-xs">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $activity->start_time)->format('M d Y g:i A')}}</td>
                                            <td class="p-2 bg-white  text-xs">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $activity->end_time)->format('M d Y g:i A')}}</td>
                                             <td class="p-2 bg-white  text-xs">  @if ($activity->hasAttendance == 1 && \Carbon\Carbon::now()->between($activity->start_time,$activity->end_time))
                                                <a href="{{ route('admin.activities.attendance', $activity->id) }}" class="underline">Active</a>
                                            @else
                                            <p>Disabled</p> 
                                             @endif</td>
                                          
                                <td class="p-2  bg-white text-xs flex justify-center space-x-3">
                                  
    
                                  
                        
                                 <a href="{{ route('admin.activities.edit', $activity->id) }}"><i class="fa-regular fa-pen-to-square bg-blue-500 p-1 text-slate-100 rounded-md "></i></a> 
                                
                                   <form  method="POST"  action="{{ route('admin.activities.delete', $activity->id) }}" onsubmit="return confirm('are you sure')">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit"><i class="fa-sharp fa-solid fa-trash bg-red-500 p-1 text-slate-100 rounded-md "></i></button>
                                        </form> 
                                </td>
                                </tr>
            @empty
                 <tr class="bg-gray-100 text-center border-b  text-gray-600">
                               <td class="p-2  bg-white text-xs">No events</td>
                                </tr>
            @endforelse
                        
                                           
                        
                        </tbody>
                    </table>

            {{ $activities->links() }}


</div>
</div>
