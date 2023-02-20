<x-admin-layout>

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
    <div class="w-full flex justify-between items-center">
        <h1 class="text-2xl">Create Event</h1>

           <a href="{{ route('admin.adminEvents') }}" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">View Events</a>

    </div>


 <div class="block p-6 rounded-lg shadow-lg bg-white  mt-5 w-full">
  <form action="{{ route('admin.adminEvents.store') }}"  method="POST" enctype="multipart/form-data">
    @csrf
    <div>
      <div class="form-group mb-6">
         <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">Event Name</label>
        <input type="text" name="inputEventName" class="form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123"
          aria-describedby="emailHelp123" placeholder="Event Name">
      </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
          <label for="startday" class="form-label inline-block mb-2 text-gray-700">From</label>
      <input type="date" id="inputDateFrom" name="inputDateFrom" class="form-control  @error('inputDateFrom') is-invalid @enderror" 
						value="{{old('inputDateFrom')}}" >
						@error('inputDateFrom')
						<div class="invalid-feedback">{{$message}}</div>
							@enderror
    </div>
    <div class="form-group mb-6">
          <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">To</label>
       <input type="date" id="inputDateFrom" name="inputDateTo" class="form-control  @error('inputDateFrom') is-invalid @enderror" 
						value="{{old('inputDateFrom')}}" >
						@error('inputDateFrom')
						<div class="invalid-feedback">{{$message}}</div>
							@enderror
    </div>
    </div>

      <div class="mb-3 w-full">
    <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700"
      >Details</label
    >
    <textarea
    name="inputDetails"
      class="
        form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      "
      id="exampleFormControlTextarea1"
      rows="3"
      placeholder="Your message"
    ></textarea>
  </div>

    <div class="flex w-full">
  <div class="mb-3 w-full">
    <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Default file input example</label>
    <input id="inputPictures" name="inputPictures" accept="image/*" class="form-control
    block
    w-full
    px-3
    py-1.5
    text-base
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file">
  </div>
</div>


                             <label class="block">
                                <input type="checkbox" name="inputPost" />
                                <span class="">Post</span>
                                
                            </label>
<div class="mt-4">

    <button type="submit" class="
      w-full
      px-6
      py-2.5
      bg-blue-600
      text-white
      font-medium
      text-xs
      leading-tight
      uppercase
      rounded
      shadow-md
      hover:bg-blue-700 hover:shadow-lg
      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
      active:bg-blue-800 active:shadow-lg
      transition
      duration-150
      ease-in-out">Submit</button>
</div>

  </form>
</div>
   		
		

		{{-- @if ($errors->any())
		@foreach ($errors->all() as $error)
		 <div class="text-white bg-primary">{{$error}}</div>
			
		@endforeach
			
		@endif --}}


		{{-- @if(session('message'))
		<div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
			  <strong>{{ session('message') }}</strong>
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif


    	<div class="EventForm" style="margin-top: 100px;">
    		<div class="bg-white" style="height: 600px;">
				<form action="{{ route('admin.adminEvents.store') }}" method="POST" enctype="multipart/form-data" style="padding-top: 50px;">
				@csrf
				<div class="ms-4  row g-2 align-items-center">
					<div class="col-auto">
						<label for="inputEventName" class="fs-3 fw-bold col-form-label" style="width: 300px;">Event Name</label>
					</div>
					<div class="col-9">
						<input type="text" id="inputEventName" name="inputEventName"    class="form-control @error('inputEventName') is-invalid @enderror"
						value="{{old('inputEventName')}}">
						@error('inputEventName')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
				</div>

				<div class="ms-3 row g-4 align-items-center">
					<div class="col-auto">
						<label for="inputDateFrom" class="fs-3 fw-bold col-form-label" style="width: 300px;">Event Date From</label>
					</div>
					<div class="col-3">
						<input type="date" id="inputDateFrom" name="inputDateFrom" class="form-control  @error('inputDateFrom') is-invalid @enderror" 
						value="{{old('inputDateFrom')}}" >
						@error('inputDateFrom')
						<div class="invalid-feedback">{{$message}}</div>
							@enderror
					</div>
					<div class="col-auto">
					<label for="inputDateTo" class="fs-3 fw-bold col-form-label ms-5">Event Date To</label>
					</div>
					<div class="col-3">
						<input type="date" id="inputDateTo" name="inputDateTo" class="form-control  @error('inputDateTo') is-invalid @enderror" value="{{old('inputDateTo')}}">
						@error('inputDateTo')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
				</div>

				<div class="ms-4 row g-2 align-items-start">
					<div class="col-auto ">
						<label for="inputDetails" class="fs-3 fw-bold col-form-label" style="width: 300px;">Details</label>
					</div>
					<div class="col-9">
						<textarea id="inputDetails" class="form-control  @error('inputDetails') is-invalid @enderror" name="inputDetails" style="height: 200px" value="{{old('inputDetails')}}" ></textarea>
						@error('inputDetails')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
				</div>

				<div class="ms-4 row g-2 align-items-center">
					<div class="col-auto">
						<label for="inputPictures" class="fs-3 fw-bold col-form-label" style="width: 300px;">Attach Picture</label>
					</div>
					<div class="col-9">
						<input type="file" id="inputPictures" name="inputPictures" accept="image/*" class="form-control @error('inputDetails') is-invalid @enderror" value="{{old('inputPictures')}}">
						@error('inputPictures')
						<div class="invalid-feedback">{{$message}}</div>
						@enderror
					</div>
				</div>

				<div class="ms-3 row g-4 align-items-center">
					<div class="col-auto">
						<label for="inputAttendance" class="fs-3 fw-bold col-form-label" style="width: 300px;">Allow Attendance</label>
					</div>
					<div class="col-4">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="inputAttendance"  id="inputAttendance">
					</div>
					</div>

					<div class="col-auto">
					<label for="inputPost" class="fs-3 fw-bold col-form-label">Post on Site</label>
					</div>
					<div class="col-auto">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="inputPost" id="inputPost">
					</div>
					</div>

				</div>
				<input type="submit" value="create"  name="submitbutton" class="position-absolute bottom-0 end-0 mb-5 btn-success btn-lg text-dark" style="background-color: #00ff5b; width: 150px; margin-right: 73px">
				</form>

			</div>


    	</div> --}}
</x-admin-layout>