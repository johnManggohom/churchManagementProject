@include('partials.header')

<div>


<p class="text-3xl bolder my-10 w-4/5 mx-auto text-center text-white">Events</p>
<div class="grid grid-cols-3 gap-3 w-4/5 mx-auto ">
  @forelse ($events as $event )
    <div class="rounded-lg shadow-lg bg-white min-w-full justify-self-center">

      <div class="w-30">
        
      </div>

      <div class="w-full h-2/5">

         <a href="#!" data-mdb-ripple="true"  data-mdb-ripple-color="light">
      <img class="rounded-t-lg object-cover" style="width:100%; height:100%"src="{{ asset('storage/images/'.$event->Picture) }}" alt=""/>
    </a>

      </div>
   
    <div class="p-6">
      <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $event->EventName }}</h5>
       <div class="card-title fst-italic" style="color:#bcb9b9; margin-top: -10px; font-size:15px;">{{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->EventDateFrom)
            ->format('M d, Y')}}</div>
      <p class="text-gray-700 text-base mb-4 mt-3">
        {{ Str::limit($event->Details, 200) }}
      </p>
         @if (
                Str::length($event->Details) > 200
            
            )
                     <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">  <a  href="{{route('home.show', $event->id)}}">Read More</a></button>
              
            @endif
     
    </div>
    
  </div> 
     
  @empty
  <p>No Events</p>
  @endforelse
</div>  
<div class=" w-4/5 mx-auto flex mt-4 justify-center align-center">
{{ $events->links() }}
</div>
</div>

<div>


<p class="text-3xl bolder my-10 w-4/5 mx-auto text-center text-white">Activities</p>
<div class="grid grid-cols-3 gap-3 w-4/5 mx-auto ">
  @forelse ($activities as $activity )
    <div class="rounded-lg shadow-lg bg-white min-w-full justify-self-center">

      <div class="w-30">
        
      </div>

      <div class="w-full h-2/5" style="height: 20vh"  class="bg-blue-500">

        
      <div class="rounded-t-lg object-cover" style="width:100%; height:100%" ></div>


      </div>
   
    <div class="p-6">
      <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $activity->name }}</h5>
       <div class="card-title fst-italic" style="color:#bcb9b9; margin-top: -10px; font-size:15px;">{{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $activity->start_time)
            ->format('M d, Y')}}</div>
      <p class="text-gray-700 text-base mb-4 mt-3">
        {{ Str::limit($activity->description, 200) }}
      </p>
         @if (
                Str::length($activity->description) > 200
            
            )
                     <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">  <a  href="{{route('home.showActivity', $activity->id)}}">Read More</a></button>
              
            @endif
     
    </div>
    
  </div> 
     
  @empty
  <p>No Events</p>
  @endforelse
</div>  
<div class=" w-4/5 mx-auto flex mt-4 justify-center align-center">
{{ $events->links() }}
</div>
</div>