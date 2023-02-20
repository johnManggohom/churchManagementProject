@include('partials.header');


<div class="w-4/5 m-auto bg-blue-500" style="height:50vh">
  
    <img  src="{{ asset('storage/images/'.$events->Picture) }}" style="width:100%; height:100%; object-fit: cover"  alt="">
            </div>

            <div class="w-4/5 m-auto mt-8">
                <p class="text-3xl text-center font-bold text-white"> {{ $events->EventName }}</p>
                  <p class="text-1xl text-center font-bold text-white">{{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $events->EventDateFrom)
            ->format('M d, Y')}} - {{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $events->EventDateTo)
            ->format('M d, Y')}}</p>
            </div>

             <div class="w-4/5 m-auto mt-8">
                <p class="text-xl text-justify  text-white"> {{ $events->Details }}</p>
            </div>
</div>
