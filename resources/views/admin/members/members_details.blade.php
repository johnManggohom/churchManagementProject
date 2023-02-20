<x-admin-layout>
        <nav class="relative w-full mb-4 flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
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
<div class="w-full bg-blue-500 bg-white p-2"> 
    <div class="w-full">
<div class="w-1/6  item-center justify-center">
<div class=" w-20 h-20 rounded-full bg-red-500 text-white flex items-center justify-center text-3xl font-extrabold"> {{ mb_substr($users[0]['name'] , 0, 1, "UTF-8") }} </div>
</div>
<div class="w-5/6 flex gap-5"> 
    <div>
<p class="text-lg"> <span class="mr-3 font-bold my-3">First Name:</span>{{  ucwords($users[0]['name']) }}</p>
<p class="text-lg"> <span class="mr-3 font-bold my-3"> Middle Name:</span>{{  ucwords($users[0]['middle_name']) }}</p>
<p class="text-lg"> <span class="mr-3 font-bold my-3">Last Name:</span>{{  ucwords($users[0]['last_name']) }}</p>
    </div>
    
<div>
<p class="text-lg"> <span class="mr-3 my-3"> Age:</span>{{  ucwords($users[0]['age']) }}<p>
<p class="text-lg"> <span class="mr-3 my-3"> Birth Date:</span>{{  \Carbon\Carbon::createFromFormat('Y-m-d', ucwords($users[0]['birth_date']))->format('M d Y')  }}<p>
  <p class="text-lg"> <span class="mr-3 my-3"> Birth Date:</span>{{  ucwords($users[0]['phone_number']) }}<p>
</div>

</div></div>

<div class="member-org mt-5">
<h1 class="text-lg border-b-2">Member Of:</h1>
<div class="flex gap-3 mt-2 ">
@foreach($users as $user) 
        @foreach ($user->organization  as $org )

      <p class="bg-blue-500 py-1 px-1 rounded-xl text-white">{{ $org->name }}</p> 
            
        @endforeach
@endforeach
</div>
</div>
</div>

</x-admin-layout>
