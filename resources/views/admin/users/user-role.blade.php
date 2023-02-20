<x-admin-layout>

      <nav class="relative w-full mb-4 flex flex-wrap items-center justify-between py-1 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <nav class="bg-grey-light rounded-md w-full" aria-label="breadcrumb">
      <ol class="list-reset flex items-center">
         <li><p class="text-gray-500 hover:text-gray-600 text-sm  mx-2">User/ </p></li>
        <li><a href="{{ route('admin.members.index') }}" class="text-gray-500 hover:text-gray-600 text-sm">Members</a></li>
        <li><span class="text-gray-500 mx-2 text-sm">/ Member Details</span></li>
      </ol>
    </nav>
  </div>
</nav>  
<div class="w-full bg-blue-500 bg-white p-2"> 
    <div class="w-full">
<div class="w-1/6  item-center justify-center">
<div class=" w-20 h-20 rounded-full bg-red-500 text-white flex items-center justify-center text-3xl font-extrabold"> {{ mb_substr($user->name , 0, 1, "UTF-8") }} </div>
</div>
<div class="w-5/6 flex gap-5"> 
    <div>
<p class="text-lg"> <span class="mr-3 font-bold my-3">First Name:</span>{{  ucwords($user->name) }}</p>
<p class="text-lg"> <span class="mr-3 font-bold my-3"> Middle Name:</span>{{  ucwords($user->middle_name) }}</p>
<p class="text-lg"> <span class="mr-3 font-bold my-3">Last Name:</span>{{  ucwords($user->last_name) }}</p>
    </div>
    
<div>
<p class="text-lg"> <span class="mr-3 my-3"> Age:</span>{{  ucwords($user->age) }}<p>
<p class="text-lg"> <span class="mr-3 my-3"> Birth Date:</span>{{  \Carbon\Carbon::createFromFormat('Y-m-d', ucwords($user->birth_date))->format('M d Y')  }}<p>
  <p class="text-lg"> <span class="mr-3 my-3"> Number:</span>{{  ucwords($user->phone_number) }}<p>
</div>

</div></div>



   <div class="w-full bg-white mt-4 border-t-4 border-slate-700">

<div class="w-1/2">

       <div class=" py-2   bg-white">
                    <h2 class="text-sm font-bold">Current Role</h2>
                    <div class="flex space-x-2  p-2">
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)

                                @if ($user_role->name == 'user')
                                        <div class="px-2 py-1 bg-blue-300 text-white rounded-md relative" >
                                            <button  class=" py-2 cursor: not-allowed">{{ $user_role->name }}</button>
                                        </div>
                                @else
                                <form class="px-2 py-1 text-sm hover:bg-blue-700 text-white rounded-md  bg-blue-500 relative" method="POST"
                                    action="{{ route('admin.user.roles.remove', [$user->id, $user_role->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <div class="py-2">{{ $user_role->name }}</div>
                                    
                                    <div class="bg-red-500 rounded-md w-6 h-6  flex items-center justify-center rounded-full absolute" style="top: -15%; right: -5%;">
                                                  <button type="submit" class="">x</button>
                                    </div>
                                  
                                </form>
                                @endif
                               
                            @endforeach
                        @endif

                    
                    </div>

                        <form method="POST" action="{{ route('admin.user.roles', $user->id) }}">
                            @csrf
                            <div class="sm:col-span-6 pt-2">
                                <label for="role" class="block text-sm font-medium text-gray-700">Assign Role</label>
                                <select id="role" name="role" autocomplete="role-name"
                                   class="form-select form-select-lg mb-1
      appearance-none
      block
      w-full
      px-4
      py-2
      text-sm
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label=".form-select-lg example">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="sm:col-span-6 ">
                        <button type="submit"
                            class="px-1 py-1 bg-green-500 hover:bg-green-700 text-white font-bold text-sm rounded-md">Submit</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>

</div>
    


</div>
  
   {{-- <div class="py-12 w-2/3 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.users.index') }}"
                      class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas fa-chevron-left text-2xl"></i></a>
                </div>
                <div class="flex flex-col p-2 py-5  mt-5 bg-white">
                    
                     <div class="text-sm font-bold">User Details</div>
                    <div class="text-sm mt-4">User Name: {{ $user->name }}</div>
                    <div class="text-sm">Email: {{ $user->email }}</div>
                    
                </div>
                <div class="p-2 py-5  mt-2 bg-white">
                    <h2 class="text-sm font-bold">Assign Role</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)

                                @if ($user_role->name == 'user')
                                        <div class="px-2 py-1 bg-blue-300 text-white rounded-md relative" >
                                            <button  class=" py-2 cursor: not-allowed">{{ $user_role->name }}</button>
                                        </div>
                                @else
                                <form class="px-2 py-1 text-sm hover:bg-blue-700 text-white rounded-md  bg-blue-500 relative" method="POST"
                                    action="{{ route('admin.user.roles.remove', [$user->id, $user_role->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <div class="py-2">{{ $user_role->name }}</div>
                                    
                                    <div class="bg-red-500 rounded-md w-6 h-6  flex items-center justify-center rounded-full absolute" style="top: -15%; right: -5%;">
                                                  <button type="submit" class="">x</button>
                                    </div>
                                  
                                </form>
                                @endif
                               
                            @endforeach
                        @endif

                    
                    </div>
                    <div class="max-w-xl bg-white">
                        <form method="POST" action="{{ route('admin.user.roles', $user->id) }}">
                            @csrf
                            <div class="sm:col-span-6 pt-2">
                                <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                                <select id="role" name="role" autocomplete="role-name"
                                   class="form-select form-select-lg mb-3
      appearance-none
      block
      w-full
      px-4
      py-2
      text-sm
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label=".form-select-lg example">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="sm:col-span-6 pt-2">
                        <button type="submit"
                            class="px-1 py-1 bg-green-500 hover:bg-green-700 text-white font-bold text-sm rounded-md">Assign Role</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div> --}}
</x-admin-layout>
