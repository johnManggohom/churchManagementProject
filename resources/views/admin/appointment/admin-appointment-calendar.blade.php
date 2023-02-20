<x-admin-layout>

    
    <nav class="relative w-full flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light mb-4">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex">
        <li><a href="{{ route('admin.appointment') }}" class="text-gray-500 hover:text-gray-600 text-sm">Appointment</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ Appoinntment Calendar</span></li>
      </ol>
    </nav>
  </div>
</nav>  
    <div id="calendar">
        
    </div>




<div id='calendar'></div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
               <input type="hidden" name="event_id" id="event_id" value="" />
            <input type="hidden" name="appointment_id" id="appointment_id" value="" />
            <div class="modal-body">
                <h4>Appointment Details</h4>

                <h1 class="mt-3" > Client Name:  <span id="gaga"> </span></h1>
                  <h1 class="mt-3" > Ocassion:  <span id="gaga2"> </span></h1>
                <h1 class="mt-3" > Status:  <span id="gaga1"> </span></h1>
                <h1 class="mt-3"> Start time:</h1>
                <h1  id="start_time"></h1>

                <h1 class="mt-3"> End time:</h1>
                <h1   id="finish_time"></h1>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-primary text-white" data-bs-dismiss="modal">Close</button>   
            </div>
        </div>
    </div>
</div>
  
      <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>
        $(document).ready(function() {

        
        
       $('#calendar').fullCalendar({

          header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
    events : [
        @foreach($appointments as $appointment)
        {
            status: '{{ $appointment->status }} ',
            ocassion:'{{ $appointment->ocassion->name }} ',
            title : '{{ $appointment->user->name . ' ' . $appointment->user->middle_name. ' ' . $appointment->user->last_name }}',
            start : '{{ $appointment->start_time }}',

            @if ($appointment->status == 'pending')
                   backgroundColor: 'yellow',
                   textColor: 'black',
            @elseif ($appointment->status == 'accepted')
                   backgroundColor: 'green',
            @elseif ($appointment->status == 'rejected')
                   backgroundColor: 'red',
              @elseif ($appointment->status == 'finished')
                    backgroundColor: 'blue',
            @endif

            @if ($appointment->endTime)
                    end: '{{ $appointment->endTime }}',
            @endif
        },
        @endforeach
    ],

    eventClick: function(calEvent, jsEvent, view) {

         $('#gaga').text(calEvent.title);
        $('#gaga1').text(calEvent.status);
          $('#gaga2').text(calEvent.oc);
            
        $('#start_time').text(moment(calEvent.start).format("dddd, MMMM Do YYYY, h:mm:ss a"));
        $('#finish_time').text(moment(calEvent.end).format("dddd, MMMM Do YYYY, h:mm:ss a"));
        $('#editModal').modal('show');
    }
});



        });
    </script>

@include('admin.appointment.create-modal')
</x-admin-layout>