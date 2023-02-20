<div  class="w-full">
<div>

            @if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show w-10/12 mx-auto my-4 " role="alert">
        <ul  class=" text-dark">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
         <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
    </div>
@endif
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show w-10/12 mx-auto my-4" role="alert">
      {{ session('message') }}   
   <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
</div>

@endif

@if (session()->has('messageerror'))
<div class="alert alert-danger alert-dismissible fade show w-10/12 mx-auto my-4" role="alert">
      {{ session('messageerror') }}   
   <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
</div>

@endif


    <div class="w-full text-center mb-3">
        <input type="text" id="date" wire:model="date" class="i  bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl shadow-lg text-white font-bold text-center  cursor-pointer overflow-hidden ">
    </div>

    <div class="grid gap-4 m-0 grid-cols-6">

        @foreach ($availableTimes as $key=>$time )

        @if ($time != false)

        @if ($key != '12:00 PM')

          <div class="w-full group">

            <input type="checkbox"  id="interval-{{ $key }}"  name="time[]"  value="{{ $date.' '.$key   }}" class="hidden peer">
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

<p class="text-xs text-slate-500 mt-2">Note: Must pick start time and end time slots</p>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script>

    $('input[type=checkbox]').on('change', function (e) {
    if ($('input[type=checkbox]:checked').length > 2) {
        $(this).prop('checked', false);
        alert("allowed only 3");
    }
});

    new Pikaday({
field:document.getElementById('date'),
        onSelect: function(){
            @this.set('date', this.getMoment().format('YYYY-MM-DD'));
        },minDate: new Date(),
    })

  </script>
    
@endpush

