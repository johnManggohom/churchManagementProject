<x-client-layout>
<div class=" w-10/12 mx-auto">


      <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><a href="" class="text-gray-500 hover:text-gray-600 text-sm">User</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/</span></li>
         <li><span class="text-gray-500 hover:text-gray-600 text-sm">Edit User Organization</span></li>
        <li><span class="text-gray-500 mx-2 text-sm">/</span></li>
      </ol>
    </nav>
  </div>
</nav>  

 <div class="my-6">
    <p class="text-lg">Edit User Organization</p>
    <div class="mt-7 flex space-x-5">

      <div  class="profile bg-white p-3 shadow-sm h-fit">
            <div class="w-32 h-32 bg-blue-500 rounded-full overflow-hidden flex items-center justify-center">   <span class="font-extrabold text-5xl text-white">  {{ mb_substr(auth()->user()->name , 0, 1, "UTF-8") }} </span>  </div>

           
            <p class="mt-3 text-xl font-bold">{{ ucfirst(auth()->user()->name) }} {{ ucfirst(auth()->user()->middle_name) }} {{ ucfirst(auth()->user()->last_name) }}</p>
            <p class="text-lg">{{ ucfirst(auth()->user()->email) }}</p>
            <div class="details mt-4">
                <p class="text-sm"> Member Since: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', auth()->user()->created_at)->format('M d Y g:i A')}}</p>
                <p class="text-sm"> Birth Day:  {{ \Carbon\Carbon::createFromFormat('Y-m-d',auth()->user()->birth_date )->format('M d Y')}}</p>
                <p class="text-sm"> Number: {{ auth()->user()->phone_number }}</p>
            </div>
        </div> 

    <div class="organizations">


        <div class="display-organization flex space-x-2">


          <p> Pending Organizations: </p>
           @foreach ($user as $org )
          
               <div class="flex align-end justify-center"><span class="bg-rose-500 text-xs px-1 py-1 text-white rounded-lg">
                {{  $org->name}}
              </span></div>

          @endforeach

        </div> 

           <div class="display-organization mt-3 flex space-x-2">


          <p> Accepted Organizations: </p>
           @foreach ($user1 as $org )
          
               <div class="flex align-end justify-center"><span class="bg-rose-500 text-xs px-1 py-1 text-white rounded-lg">
                {{  $org->name}}
              </span></div>

          @endforeach

        </div> 


        <div class="add-organization w-full mt-3">

                  <div x-data="{ open: false }">
                    <div class="w-full flex justify-end"> <button x-on:click="open = ! open" class="bg-blue-500 px-1 py-1 text-sm justify-end text-white rounded-lg mr-2"> <i class="fa-solid fa-plus mx-2"></i>Add Organization</button></div>
                   
                
                    <div x-show="open" x-transition>
                     
                      <form action="{{ route('client.user-profile.store') }}" method="POST">
                              @csrf
                      <div class="grid grid-cols-3 gap-3 mt-4">
                                @foreach ($organizations as $organization )

                   
                    <div class="flex items-center space-x-2">
                      <input class="" type="checkbox" value="{{ $organization->id }}"  name="organizations[]" id="flexCheckDefault" {{ $organization->user->contains('pivot.user_id', auth()->user()->id) ? 'checked' : ''}}>
                      <label class=" text-gray-800" for="flexCheckDefault"> {{ $organization->name }}
                      </label>
                    </div>
        
                  
                        @endforeach 
                     </div>  

                         <button type="Submit" class=" mt-4 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>

                      </form>

                    </div>
                </div>

           
          
        </div>
    </div>
       
    </div>
  </div>

</div>
</x-client-layout>

{{-- 
          

      
          --}}