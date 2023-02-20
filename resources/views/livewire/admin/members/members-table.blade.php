<div>  <div class="w-full"> 
    
                  <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light mb-3">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex items-center">
        <li><p class="text-gray-500 hover:text-gray-600 text-sm">User</p></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ Members</span></li>
      </ol>
    </nav>
  </div>
</nav> 

    <div class="full flex gap-2">

         <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                        <button class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium h-7 text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </button>
                    <input type="search" wire:model.debounce.300ms="search" class="form-control relative flex-auto min-w-0 block h-7 text-xs font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none text-sm" placeholder="Search Name, Email" aria-label="Search" aria-describedby="button-addon2">
       
                    </div>
                    <div>
                        <div class="mb-3 xl:w-96">
                            <select wire:model="organization" class="form-control relative flex-auto min-w-0 block h-7 text-xs font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none text-sm"aria-label="Default select example">
                              <option value="" selected>All Organizations</option>
                            @forelse ($organizations as  $key=>$org)
                                 <option value="{{ $org }}">{{ $key }}</option>
                            @empty
                                 <option value="">No Organization available</option>
                            @endforelse
                              
                               
                               
                            </select>
                        </div>
                        </div>

    </div>
                    
                </div>

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
                                        Email
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                        Action
                                    </div>
                            </tr>
                        </thead>
                        <tbody>


        
                            @forelse ( $members as $member )

                              <tr class="bg-gray-100 text-center border-b  text-gray-600">
                               <td class="p-2  bg-white text-xs">{{ ucwords($member->name ) }} {{ ucwords($member->middle_name) }} {{ ucwords($member->last_name) }}</td>
                                <td class="p-2  bg-white text-xs">{{ $member->email }}</td>
                                 <td class="p-2 bg-white  text-xs flex items-center justify-center gap-1"> <a class="bg-blue-500 px-1 rounded-lg text-white hover:shadow-lg text-xs font-thin" href="{{ route('admin.members.getDetails', $member->id) }}" class="underline">Details</a> 
                                  @if ($member->isBlock == 0)
                                   
                                             <form  method="POST" action="{{ route('admin.members.updateBlock', $member->id) }}" onsubmit="return confirm('are you sure')">
                                            @csrf
                                        <button type="submit" class="bg-red-500 px-1 rounded-lg text-white hover:shadow-lg text-xs font-thin"> Block</button>
                                        </form>
                                        @elseif($member->isBlock == 1)
               
                                             <form  method="POST" action="{{ route('admin.members.updateBlock', $member->id) }}" onsubmit="return confirm('are you sure')">
                                            @csrf
                                        <button type="submit" class="bg-red-500 px-1 rounded-lg text-white hover:shadow-lg text-xs font-thin">Unblock</button>
                                        </form>
                                        @endif
                                </td>
                               {{-- <td class="p-2  bg-white text-xs">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start_time)->format('M d Y g:i A')}}</td>
                               <td class="p-2  bg-white text-xs">{{ $appointment->status}}</td>
                                <td class="p-2  bg-white text-xs">{{ $appointment->ocassion->name}}</td>
                              
                               <td class="p-2  bg-white text-xs">{{  \Illuminate\Support\Str::limit($appointment->message, 100)?: 'No message' }}</td>
                               <td class="p-2  bg-white text-xs flex space-x-2 justify-center"> <a href="{{ route('admin.appointment.edit', $appointment->id) }}"><i class="fa-regular fa-pen-to-square bg-blue-500 p-1 text-slate-100 rounded-md "></a></i>   --}}
                                
                                
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

                
                    {{-- {{ $members->links() }} --}}
           
</div>
