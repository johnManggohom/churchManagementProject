<div>
    

     <div class="flex w-100  items-center justify-end mt-5"> 
                    <div class="w-1/2"> 
                     <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                        <button class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium h-7 text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </button>
                    <input type="search" wire:model.debounce.300ms="search" class="form-control relative flex-auto min-w-0 block h-7 text-xs font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none text-sm" placeholder="Search Name" aria-label="Search" aria-describedby="button-addon2">
       
                    </div>
                </div>
                <div class="w-1/2 mb-4 text-end">
                    {{-- <div><button type="submit" class="p-1 px-5 text-white bg-blue-700">Finish</button></div> --}}
             </div>
         </div>


   
    <table class="w-full border-separate border-spacing-y-2 ">
     
                        <thead class="border-b-4 border-dark-700 ">
                            <tr class=" border-b">
                            
                                <th class="p-2  cursor-pointer  font-thin text-gray-500">
                                    <div class="flex items-center justify-center space-x-2">

                                        <div class="text-xs">Name </div>
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                         
                                        Transaction Number
                                          
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                    
        @if($users != null)

      

      
          @forelse ( $users as $user)

             <form action="{{ route('admin.attendance.store') }}" method="POST">
        @csrf

          <input type="hidden" name="activity_id" value="{{ $activity_id->id }}">
                 <tr class="bg-gray-100 text-center border-b  text-gray-600">
       <td>{{ $user->name }} {{ $user->middle_name }} {{ $user->last_name }}</td>

      
       <td>  <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
    
        <input type="hidden" value="{{ $user->id }}" name="account">
        
        <button type="submit" class="bg-blue-700 p-1 text-white">Present</button>
        {{-- <input type="hidden" value="0" name="account[{{ $user->id }}]"> --}}
         {{-- <input type="checkbox" value="1" name="account[{{ $user->id }}]"> --}}

    </td>
        </form>
    
    </tr>

            
            @empty
                 <tr class="bg-gray-100 text-center border-b  text-gray-600">
                               <td class="p-2  bg-white text-xs">No Member available for attendance</td>
                                </tr>
            @endforelse
                       

            @else
            <tr>
                <td> No Attendance</td>
            </tr>

        @endif


        {{-- <div class="flex space-x-2 justify-center">
                <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                </div> --}}
        
    
                                           
                        
                        </tbody>
                    </table>
        {{ $users->links() }}
                       
</div>
