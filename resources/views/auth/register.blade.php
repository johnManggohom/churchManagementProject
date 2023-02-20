<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="w-20 h-20 mr-3">
                    <img src="{{ URL('images/home/SNP Logo.png') }}" class=" alt="">
                </div>
        </x-slot>
        

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div  class="mt-4">
                <x-input-label for="name" :value="__('First Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="flex gap-2 mt-4">
                         
                       <div class="w-1/2">
                <x-input-label for="name" :value="__('Middle Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="middle" :value="old('middle')" required autofocus />
                <x-input-error :messages="$errors->get('middle')" class="mt-2" />
            </div>

              <div class="w-1/2">
                <x-input-label for="name" :value="__('Last Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="last" :value="old('middle')" required autofocus />
                <x-input-error :messages="$errors->get('last')" class="mt-2" />
            </div>


            </div>
    
              <div   class="mt-4">
                <x-input-label for="name" :value="__('Birth Date')" />
                <x-text-input id="name" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required autofocus />
                <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
            </div>
              <div  class="mt-4">
                <x-input-label for="name" :value="__('Phone Number')" />
                <x-text-input id="name" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>




                    @forelse ($roles  as $role )

            <div x-data="{ open: false }">


                    @if ($role->name == 'organization leader')

                    <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer  @error('role') is-invalid @enderror" type="radio" name="role" id="inlineRadio1" value="{{ $role->id }}" x-on:click="open = ! open" onchange="handleChange(this);">
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">{{ $role->name }}</label>

                      <div x-show="open">
                                   <select name="organization_id" id="myselectbox">
                                    <option value="">Select Organization</option>

                                        @forelse ($organizations as $organization )

                                          <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                            
                                        @empty
                                            
                                        @endforelse

                                   </select>
                                </div>
           </div>   
                  
            </div>

                                @else
                    
              <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer  @error('role') is-invalid @enderror" type="radio" name="role" id="inlineRadio1" value="{{ $role->id }}" x-on:click="open = ! open" onchange="handleChange(this);">
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">{{ $role->name }}</label>

                        </div>
                                       
                        
                    @endif
                                                      
                    @empty

                    <p>No role available</p>
                        
                    @endforelse
                 
        
            @error('role')

                    <div>

                      <p class="text-red-500">
                        {{ $message }}
                    </p>  
                    </div>
                        
                    @enderror
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>


            <script>
function handleChange(src) {
 select_box = document.getElementById("myselectbox");
 select_box.selectedIndex = 0;
  }
    </script>
    </x-auth-card>



</x-guest-layout>
