    <div>
    
        <div class=" w-full">

                  <nav class="relative w-full mb-2 flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex items-center">
         <li><p class="text-gray-500 hover:text-gray-600 text-sm  mx-2">User/ </p></li>
        <li><a href="{{ route('admin.members.index') }}" class="text-gray-500 hover:text-gray-600 text-sm">Members</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ Member Details</span></li>
      </ol>
    </nav>
  </div>
</nav>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden ">

            <div class="table w-full ">
                    
                <div class="flex w-full items-center gap-2">
                    
                    <div class="flex w-1/2  items-center">
                        <div class="w-full">
                        <div class="input-group relative flex flex-wrap items-stretch w-full">
                            <button class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs h-7 leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg>
                        </button>
                        <input type="search" wire:model.debounce.300ms="search" class="form-control  h-7 text-xs relative flex-auto w-full px-3 py-1.5 font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search Name" aria-label="Search" aria-describedby="button-addon2">
                        
                        </div>
                    </div>
                    </div>

                       <div class="space-x-2">

                         <select wire:model="status"  class="block text-xs appearance-none  bg-gray-200 border border-gray-200 text-gray-700  h-8 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                         <option value="" selected>Choose here</option>
                                         <option value="1" class="text-xs"> Accepted</option>
                                         <option value='null' class="text-xs">Pending</option>
                
                                         
                    </select>


                    </div>

                     <div class="space-x-2">

                         <select wire:model="role"  class="block text-xs appearance-none  bg-gray-200 border border-gray-200 text-gray-700  h-8 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                         <option value="" class="text-xs"> Role</option>
                                         <option value="1" class="text-xs">Admin</option>
                                         <option value="3" class="text-xs"> Staff</option>
                                      
                
                                         
                    </select>


                    </div>

                    {{-- <div class="flex  justify-end w-1/2">
                        <div class="w-full"> <div class="flex justify-end  space-x-4">
            
                        <button wire:click="export()" class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas fa-print text-lg"></i></button>
                    </div></div>
                        
                    </div> --}}
                </div>

            
                


                {{-- <div class="flex w-full ">
                    <div class="flex w-1/2">
                        <div class="mx-1 w-1/2">
                        <input type="datetime-local" id="start_time" name="start_time" wire:model="from"
                            value=""
                            class="block appearance-none text-xs h-7 w-full bg-gray-200 border border-gray-200 text-gray-700  px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                    </div> --}}

                    
                    {{-- <select wire:model="orderBy" class="block appearance-none  bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                
                            <option value="user_id">Client</option>
                            <option value="dresser_id">Dresser</option>
                            <option value="appointment_price">Sign Up Date</option>
                            <option value="start_time">Time</option>
                </select>

                <div class="w-1/6 relative mx-1">
                            <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="1">Ascending</option>
                                <option value="0">Descending</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>  
                </div> --}}

                {{-- <div class=" w-1/2 relative mx-1">
                                <select wire:model="status"  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 text-xs h-7 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                            <option value=""> All Status</option>
                                            <option value="finished"> Finished</option>
                                            <option value="reject">Rejected</option>
                                            <option value="pending"> Pending</option>
                                        </select> --}}
                                        {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div> --}}
                                    {{-- </div> --}}


                    
                    </div>

                
                </div>
                    

                
            {{-- <div class="mt-1">
                                            <input type="datetime-local" wire:model.debounce.300ms="search" id="start_time" name="start_time"
                                                value=""
                                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                        </div> --}}
                        <table class="w-full border-separate border-spacing-y-3 ">
        
                            <thead class="border-b-4 border-dark-700 ">
                                <tr class=" border-b">
                                
                                    <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                        <div class="flex justify-center space-x-8 ">

                                            <div>Name </div>
                                            <span class="cursor-pointer" wire:click="sortBy('name')">
                                                <i class="fas fa-long-arrow-up {{ $sortColumnName === 'name'  && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fas fa-long-arrow-down  {{ $sortColumnName === 'name'  && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </div>
                                    </th>
                                    {{-- <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                        <div class="flex justify-center space-x-8 ">
                                            
                                        
                                            <div>Role</div>
                                            <span class="cursor-pointer" wire:click="sortBy('email')">
                                                <i class="fas fa-long-arrow-up {{ $sortColumnName === 'email'  && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fas fa-long-arrow-down  {{ $sortColumnName === 'email'  && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </div>
                                    </th> --}}
                                    <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                        <div class="flex justify-center space-x-8   ">

                                            <div>Email </div>
                                        
                                        <span class="cursor-pointer" wire:click="sortBy('created_at')">
                                                <i class="fas fa-long-arrow-up {{ $sortColumnName === 'created_at'  && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fas fa-long-arrow-down  {{ $sortColumnName === 'created_at'  && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </div>
                                    </th>
                                    <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                        Date Created
                                        </div>
                                    </th>
                                     <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                        Actions
                                        </div>
                                    </th>


                                </tr>
                            </thead>
                            <tbody>
                
                        @foreach ($employees as  $employee)
                                    <tr class="bg-white text-center border-b text-xs text-gray-600 py-5">
                                        <td class="p-2">{{  $employee->name }}</td>
                                    {{-- <td class="p-2">{{  $employee->roles->first()->name}}</td> --}}
                                    <td class="p-2">{{  $employee->email}}</td>
                                    {{-- <td><select id="role" name="role" autocomplete="role-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"> --}}
                                        {{-- <option value="">gaga</option>
                                    </select>gaga</td>--}}
                                    <td class="p-3">{{  $employee->created_at}}</td> 
                                    
                                    <td>
                                        <div  class="flex justify-center">
                                        <a href="{{ route('admin.user.show', $employee->id) }}" class="bg-blue-500 px-1 rounded-lg text-white hover:shadow-lg text-xs font-thin mr-2"> Edit Roles</a>
                                        <form  method="POST" action="{{ route('admin.user.destroy', $employee->id) }}" onsubmit="return confirm('are you sure')">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="bg-red-500 px-1 rounded-lg text-white hover:shadow-lg text-xs font-thin mr-2">Delete</button>
                                        </form>
                                            

                                        @if ($employee->isBlock == 0)
                                   
                                             <form  method="POST" action="{{ route('admin.user.updateBlock', $employee->id) }}" onsubmit="return confirm('are you sure')">
                                            @csrf
                                        <button type="submit" class="bg-red-500 px-1 rounded-lg text-white hover:shadow-lg text-xs font-thin"> Block</button>
                                        </form>
                                        @elseif($employee->isBlock == 1)
               
                                             <form  method="POST" action="{{ route('admin.user.updateBlock', $employee->id) }}" onsubmit="return confirm('are you sure')">
                                            @csrf
                                        <button type="submit" class="bg-red-500 px-1 rounded-lg text-white hover:shadow-lg text-xs font-thin">Unblock</button>
                                        </form>
                                        @endif

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
