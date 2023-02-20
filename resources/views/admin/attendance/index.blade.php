<x-admin-layout>

    <nav class="relative w-full mb-4 flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><a href="{{ route('admin.activities') }}" class="text-gray-500 hover:text-gray-600 text-sm">Activities</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ Activity Attendance</span></li>
      </ol>
    </nav>
  </div>
</nav>  
  Attendance for Activity <span  class="text-blue-500"> {{ $activity_name->name }} </span> 

  <p> <span class="pr-5"> Date:</span>{{ \Carbon\Carbon::now()->format('M-d-Y')}}</p>


  <livewire:admin.attendance.attendance-table :attendance="$activity_name->id">
</x-admin-layout>