<div>
<div  class="w-1/2">
<div>

    <div class="w-full text-center mb-5">
        <input type="text" id="date" wire:model="date" class="i  bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl shadow-lg text-white font-bold text-center  cursor-pointer overflow-hidden ">
    </div>

    <div class="grid gap-4 m-0 grid-cols-6">

        @foreach ($availableTimes as $key=>$time )

        @if ($time != false)

        @if ($key != '12:00 PM')

          <div class="w-full group">

            <input type="radio" id="interval-{{ $key }}"  name="time"  value="{{ $date.' '.$key   }}" class="hidden peer">
            <label @class(['inline-block w-full text-center border py-1 peer-checked:bg-blue-800 drop-shadow-[0_5px_5px_rgba(0,0,0,0.25)] peer-checked:text-white peer-checked:border']
            )    wire:key="interval-{{ $key }}"  for="interval-{{ $key }}"> {{ $key }}</label> </div>
            
        @endif

       
       @else
                <div @class(['inline-block w-full text-center border py-1 text-gray-400 border cursor-not-allowed']
            )>{{ $key }}</div>
            
        @endif

       
            
        @endforeach

    </div>



</div>
</div>


@push('scripts')
         <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script>

    new Pikaday({
field:document.getElementById('date'),
        onSelect: function(){
            @this.set('date', this.getMoment().format('YYYY-MM-DD'));
        },minDate: new Date(),
    })

  </script>
    
@endpush
</div>
