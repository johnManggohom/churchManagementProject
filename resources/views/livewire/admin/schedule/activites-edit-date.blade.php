

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            
            <div>
                <p class="text-sm py-2">Start</p>
              <label class="sr-only" for="start_day">Start</label>
                <input type="text" id="startday" name="startday" wire:model="startday"  class="w-full rounded-lg border-gray-200 p-3 text-sm">
            </div>

            <div>
                <p class="text-sm py-2">End</p>
              <label class="sr-only" for="phone">End</label>
              <input type="text" id="endday" name="end_day" wire:model="endday"  class="w-full rounded-lg border-gray-200 p-3 text-sm">
            </div>
          </div>
          <div>
            

    {{-- <form action="{{ route('admin.activities.store') }}" method="POST">
    @csrf
         <input type="text" id="startday" name="startday" wire:model="startday">
          <input type="text" id="endday" name="endday" wire:model="endday">

         <button type="submit">submit</button>
    </form> --}}
   
    @push('scripts')
         <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script>

    new Pikaday({
field:document.getElementById('startday'),
        onSelect: function(){
            @this.set('startday', this.getMoment().format('YYYY-MM-DD'));
        },minDate: new Date(),
    }
    
    
    
    )
        new Pikaday({
field:document.getElementById('endday'),
        onSelect: function(){
            @this.set('endday', this.getMoment().format('YYYY-MM-DD'));
        },minDate: new Date(),
    })

  </script>
    
@endpush
</div>
