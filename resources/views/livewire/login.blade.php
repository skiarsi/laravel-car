<div class="w-full h-full">
    <div class="flex flex-col relative">
      <div class="bg-blue-600 w-full">
        <x-header />
      </div>
      <div class="w-full h-full flex items-center justify-center flex-1">
        <form wire:submit='login'>
            <div class="bg-white py-1 md:py-14 px-4 shadow-md shadow-gray-300 border border-gray-400 rounded-md w-[320px] mt-5 md:mt-28 flex flex-col gap-1">
                <p class="text-center text-3xl mb-4">Login</p>
                <lable>Email
                    <input type="text" wire:model='email' class="py-1 px-2 shadow-sm shadow-gray-500 w-full text-lg rounded-md" />
                </lable>
                @error('email')
                    <span class="text-red-600 text-sm my-0">{{ $message }}</span>
                @enderror
        
                <lable>Password
                    <input type="password" wire:model='password' class="py-1 px-2 shadow-sm shadow-gray-500 w-full text-lg rounded-md " />
                </lable>
                @error('password')
                    <span class="text-red-600 text-sm my-0">{{ $message }}</span>
                @enderror

                <a wire:navigate href="{{route('forgot.password')}}" class="text-blue-700 font-bold mt-3">Forgot password?</a>
                
                <button type="submit" class="bg-blue-700 text-white py-2 px-11 mt-3">Login</button>
                
                <p class="w-full mt-3">Don't have an account?  <a wire:navigate class="text-blue-700 font-bold" href="{{route('register')}}"> Create One</a></p>
                <div class="w-full flex flex-col mt-2 justify-center items-center">
                    <hr class="border-gray-600 w-full m-0">
                    <span class="bg-white -mt-3 px-5">OR</span>
                </div>
                <a href="{{route('google.redirect')}}" class="w-full relative py-3 border rounded-md border-gray-500 h-12 px-3 flex flex-row gap-3">
                    <img class="h-full select-none" src="{{ asset("storage/images/google.png")}}" alt="">
                    <p class="font-bold -mt-0.5  text-gray-700 select-none">Loging with google</p>
                </a>
            </div>
        </form>
      </div>
    </div>
  </div>