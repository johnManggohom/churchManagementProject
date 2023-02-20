<x-admin-layout>


@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show w-10/12 mx-auto my-4" role="alert">
      {{ session('message') }}   
   <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
</div>

@endif


        <nav class="relative w-full mb-4 flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex items-center">
         <li><p class="text-gray-500 hover:text-gray-600 text-sm  mx-2">User/ </p></li>
        <li><a href="{{ route('admin.organizationLeader.index') }}" class="text-gray-500 hover:text-gray-600 text-sm">Organiazation Leader</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ Organization Leader Details</span></li>
      </ol>
    </nav>
  </div>
</nav>  
<div class="w-full bg-blue-500 bg-white p-2"> 
    <div class="w-full">
<div class="w-1/6  item-center justify-center">
<div class=" w-20 h-20 rounded-full bg-red-500 text-white flex items-center justify-center text-3xl font-extrabold"> {{ mb_substr($user->name , 0, 1, "UTF-8") }} </div>
</div>

   

@if ( $occupied != null && $occupied->count() > 0)

@if ($occupied->user_id == $user->id)

  <div class="my-2 text-lg"> this user is the current leader of  <span class="text-green-500">{{ $user->organization_leader->organization->name}}   </span></div>


  <div class="w-5/6 flex gap-5"> 
   <div>
<p class="text-lg"> <span class="mr-3 font-bold my-3">First Name:</span>{{  ucwords($user->name) }}</p>
<p class="text-lg"> <span class="mr-3 font-bold my-3"> Middle Name:</span>{{  ucwords($user->middle_name) }}</p>
<p class="text-lg"> <span class="mr-3 font-bold my-3">Last Name:</span>{{  ucwords($user->last_name) }}</p>
    </div>
    
<div>
<p class="text-lg"> <span class="mr-3 my-3"> Age:</span>{{  ucwords($user->age) }}<p>
<p class="text-lg"> <span class="mr-3 my-3"> Birth Date:</span>{{  \Carbon\Carbon::createFromFormat('Y-m-d', ucwords($user->birth_date))->format('M d Y')  }}<p>
  <p class="text-lg"> <span class="mr-3 my-3"> Number:</span>{{  ucwords($user->phone_number) }}<p>
</div>
  </div>

  <form  method="POST" action="{{ route('admin.organizationLeader.remove', $occupied->user_id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                <button type="submit" class="bg-red-500 px-1 py-1 text-white mt-3">Remove</button>
                                                 </form></p>
@else

     <div class="flex gap-1 my-2 text-lg">  <p> <span>Organization {{ $user->organization_leader->organization->name}} is assigned to: </span> <span class="text-green-500">{{ $occupied->user->name }}  {{ $occupied->user->middle_name }}  {{ $occupied->user->last_name }}</span>  
                        <form  method="POST" action="{{ route('admin.organizationLeader.remove', $occupied->user_id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                              
                                                <button type="submit" class="bg-red-500 rounded-xl text-sm text-white px-1 py-1"> remove</button>
                                                 </form></p></div></div>

                                                 <div class="w-5/6 flex gap-5"> 
                                                  <div>
<p class="text-lg"> <span class="mr-3 font-bold my-3">First Name:</span>{{  ucwords($user->name) }}</p>
<p class="text-lg"> <span class="mr-3 font-bold my-3"> Middle Name:</span>{{  ucwords($user->middle_name) }}</p>
<p class="text-lg"> <span class="mr-3 font-bold my-3">Last Name:</span>{{  ucwords($user->last_name) }}</p>
    </div>
    
<div>
<p class="text-lg"> <span class="mr-3 my-3"> Age:</span>{{  ucwords($user->age) }}<p>
<p class="text-lg"> <span class="mr-3 my-3"> Birth Date:</span>{{  \Carbon\Carbon::createFromFormat('Y-m-d', ucwords($user->birth_date))->format('M d Y')  }}<p>
  <p class="text-lg"> <span class="mr-3 my-3"> Number:</span>{{  ucwords($user->phone_number) }}<p>
</div>
                                                 </div>

@if ($occupied == null)
                           <form  method="POST" action="{{ route('admin.organizationLeader.accept', $user->id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                <button type="submit" class="bg-blue-500">accept</button>
                                                 </form></p>  
                        
                    @endif


@endif


@else

  <div class="my-2 text-lg"> Pending Application To <span class="text-green-500">{{ $user->organization_leader->organization->name}}   </span></div>


    <div class="w-5/6 flex gap-5"> 
 <div>
<p class="text-lg"> <span class="mr-3 font-bold my-3">First Name:</span>{{  ucwords($user->name) }}</p>
<p class="text-lg"> <span class="mr-3 font-bold my-3"> Middle Name:</span>{{  ucwords($user->middle_name) }}</p>
<p class="text-lg"> <span class="mr-3 font-bold my-3">Last Name:</span>{{  ucwords($user->last_name) }}</p>
    </div>
    
<div>
<p class="text-lg"> <span class="mr-3 my-3"> Age:</span>{{  ucwords($user->age) }}<p>
<p class="text-lg"> <span class="mr-3 my-3"> Birth Date:</span>{{  \Carbon\Carbon::createFromFormat('Y-m-d', ucwords($user->birth_date))->format('M d Y')  }}<p>
  <p class="text-lg"> <span class="mr-3 my-3"> Number:</span>{{  ucwords($user->phone_number) }}<p>
</div>

    </div>

 <form  method="POST" action="{{ route('admin.organizationLeader.accept', $user->id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                <button type="submit" class="bg-blue-500 p-2 rounded mt-2 text-white">accept</button>
                                                 </form></p>

                            

@endif


</div></div>
</div>

  
   {{-- <div class="py-12 w-2/3 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.users.index') }}"
                      class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas fa-chevron-left text-2xl"></i></a>
                </div>
                <div class="flex flex-col p-2 py-5  mt-5 bg-white">

                     <div> 
                        
                    
                    @if ( $occupied != null && $occupied->count() > 0)

                    @if ($occupied->user_id == $user->id)
                        <div> this user is the current leader of {{ $user->organization_leader->organization->name}}</div>

                     
                     <div class="text-sm font-bold mt-4">User Details</div>
                   
                    <div class="text-sm mt-3">User Name: {{ $user->name }}    {{ $user->middle_name }}  {{ $user->last_name }}</div>
                    <div class="text-sm">Email: {{ $user->email }}</div>
                    



                     <form  method="POST" action="{{ route('admin.organizationLeader.remove', $occupied->user_id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                <button type="submit" class="bg-red-500 px-1 py-1 text-white mt-3">Remove</button>
                                                 </form></p>

                    @else

                    <div class="flex gap-1">  <p> <span>Organization is assigned to: </span> <span class="text-green-500">{{ $occupied->user->name }}  {{ $occupied->user->middle_name }}  {{ $occupied->user->last_name }}</span>  
                        <form  method="POST" action="{{ route('admin.organizationLeader.remove', $occupied->user_id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                              
                                                <button type="submit" class="bg-red-500 text-sm text-white px-1"> remove</button>
                                                 </form></p></div></div>
                      

                     <div class="text-sm font-bold mt-4">User Details</div>
                     <div class="text-sm mt-4">Pending Application for: {{ $user->organization_leader->organization->name}} </div>
                    <div class="text-sm mt-1">User Name: {{ $user->name }}    {{ $user->middle_name }}  {{ $user->last_name }}</div>
                    <div class="text-sm mt-1">Email: {{ $user->email }}</div>

                    @if ($occupied == null)
                           <form  method="POST" action="{{ route('admin.organizationLeader.accept', $user->id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                <button type="submit" class="bg-blue-500">accept</button>
                                                 </form></p>    x`
                        
                    @endif

                
                      
                       @endif

                       @else

                              <div class="text-sm font-bold mt-4">User Details</div>
                     <div class="text-sm mt-4">Pending Application for: {{ $user->organization_leader->organization->name}} </div>
                    <div class="text-sm mt-1">User Name: {{ $user->name }}    {{ $user->middle_name }}  {{ $user->last_name }}</div>
                    <div class="text-sm mt-1">Email: {{ $user->email }}</div>

                       <form  method="POST" action="{{ route('admin.organizationLeader.accept', $user->id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                <button type="submit" class="bg-blue-500">accept</button>
                                                 </form></p>

                       
                    @endif
               
                        
                    
                </div> --}}

</x-admin-layout>
