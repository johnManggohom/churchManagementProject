<div>

    <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><a href="{{ route('admin.activities') }}" class="text-gray-500 hover:text-gray-600 text-sm">Activities</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ Create Activities</span></li>
      </ol>
    </nav>
  </div>
</nav>  

    <section class="">

              @if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show  mx-auto my-4 " role="alert">
        <ul  class=" text-dark">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
         <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
    </div>
@endif

    <form action="{{ route('admin.activities.store') }}" method="POST" class="space-y-4">
    @csrf
          <div>
                 <p class="text-sm py-2">Name</p>
            <label class="sr-only" for="name">Name</label>
            <input
              class="w-full rounded-lg border-gray-200 p-3 text-sm"
              placeholder="Name"
              type="text"
              name="activity_name"
              id="name"
            />
          </div>

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
            <label class="sr-only" for="message">Description</label>
            <textarea
              class="w-full rounded-lg border-gray-200 p-3 text-sm"
              placeholder="Description"
              rows="8"
              name="activity_description"
              id="message"
            ></textarea>
          </div>


           <div class="mb-6">
                            <label class="block">
                                <span class="">Has Attendance</span>
                                <input type="checkbox" name="status" />
                            </label>
                            @error('status')
                            <div class="flex items-center text-sm text-red-600">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>  
          <div class="mt-4">
            <button
              type="submit"
              class="inline-flex w-full items-center justify-center rounded-lg bg-black px-5 py-3 text-white sm:w-auto"
            >
              <span class="font-medium">Post</span>
            </button>
          </div>
        </form>

</section>

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
