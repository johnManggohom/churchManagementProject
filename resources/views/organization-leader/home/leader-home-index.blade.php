<x-leader-layout>


    <!-- component -->
<section class="text-gray-600 body-font bg-gray-50 flex ">
  <div class="container mx-auto">
    <div class="flex flex-wrap -m-4 text-center">
        
      <div class="p-4 sm:w-1/2 lg:w-1/3 w-full hover:scale-105 duration-500">
        <div class=" text-center p-4  rounded-lg bg-white shadow-indigo-50 shadow-md">
          <div>
            <h2 class="text-gray-900 text-lg font-bold">Total Members of  <span class="text-ble-500">{{ auth()->user()->organization_leader->organization->name }}</span> </h2>
                                <h1 class="text-3xl font-bold">{{ $organizationsAccepted }}</h1>
           
              <a href="{{ route('leader.dashboard.show.accepted') }}"class="text-sm mt-2 px-4 py-1 bg-orange-400  text-white rounded-lg  tracking-wider hover:bg-orange-500 outline-none cursor-pointer">View Details</a>
          </div>
        
        </div>

      </div>

         
      <div class="p-4 sm:w-1/2 lg:w-1/3 w-full hover:scale-105 duration-500">
        <div class=" text-center p-4  rounded-lg bg-white shadow-indigo-50 shadow-md">
          <div>
            <h2 class="text-gray-900 text-lg font-bold"> Pending Members of  <span class="text-ble-500">{{ auth()->user()->organization_leader->organization->name }}</span> </h2>
                                <h1 class="text-3xl font-bold">{{ $organizationsNotAccepted }}</h1>
            <a href="{{ route('leader.dashboard.show.pending') }}"class="text-sm mt-2 px-4 py-1 bg-orange-400  text-white rounded-lg  tracking-wider hover:bg-orange-500 outline-none cursor-pointer">View Details</a>
          </div>
        
        </div>

      </div>




      </div>

    </div>
</section>
</x-leader-layout>