<div class="w-full h-full">
    <div class="flex flex-col relative">
      <div class="bg-blue-600 w-full">
        <x-header />
      </div>
      <div class="w-full h-full flex items-center justify-center">
        <form wire:submit='register'>
            <div class="bg-white py-1 md:py-8 px-4 shadow-md shadow-gray-300 border border-gray-400 rounded-md w-[380px] mt-5 md:mt-14 flex flex-col gap-3">
                <p class="text-center text-3xl mb-2">Register</p>
                    
                <lable>Name
                    <input wire:model='name' type="text" class="py-1 px-2 shadow-sm shadow-gray-500 w-full text-lg rounded-md" />
                </lable>
                <div class="w-full">
                    @error('name')
                        <span class="text-red-600 text-sm my-0 block">{{ $message }}</span>
                    @enderror
                    @error('lastname')
                        <span class="text-red-600 text-sm my-0 block">{{ $message }}</span>
                    @enderror
                </div>

                <lable>Email
                    <input wire:model='email' type="email" class="py-1 px-2 shadow-sm shadow-gray-500 w-full text-lg rounded-md" />
                </lable>
                @error('email')
                    <span class="text-red-600 text-sm my-0">{{ $message }}</span>
                @enderror
                <hr class="mt-3 mb-1">
                <lable>Password
                    <input wire:model='password' type="password" class="py-1 px-2 shadow-sm shadow-gray-500 w-full text-lg rounded-md " />
                </lable>
                @error('password')
                    <span class="text-red-600 text-sm my-0">{{ $message }}</span>
                @enderror
                <lable>Confirm Password
                    <input wire:model='password_confirmation' type="password" class="py-1 px-2 shadow-sm shadow-gray-500 w-full text-lg rounded-md " />
                </lable>
                @error('password_confirmation')
                    <span class="text-red-600 text-sm my-0">{{ $message }}</span>
                @enderror
            
                <button type="submit" wire:loading.class='disabled' class="disabled:bg-gray-400 disabled:text-gray-100 bg-blue-700 text-white py-2 px-11 mt-3">Register</button>
                <p class="w-full mt-3">Do you have account?  <a wire:navigate class="text-blue-700 font-bold" href="{{route('login')}}"> Login</a></p>
                <div class="w-full flex flex-col mt-2 justify-center items-center">
                    <hr class="border-gray-600 w-full m-0">
                    <span class="bg-white -mt-3 px-5">OR</span>
                </div>
                <a href="{{route('google.redirect')}}" class="w-full relative py-3 border rounded-md border-gray-500 h-12 px-3 flex flex-row gap-3">
                    <img class="h-full select-none" src="{{ asset("storage/images/google.png")}}" alt="">
                    <p class="font-bold -mt-0.5  text-gray-700 select-none">Continue with google</p>
                </a>
            </div>
        </form> 
      </div>
    </div>
  </div>