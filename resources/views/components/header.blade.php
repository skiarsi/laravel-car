<div class="bg-blue-600 w-full py-1 px-2 flex flex-row">
    <div class="w-full flex flex-row mx-auto max-w-[1224px]">
        <div class="ms-0 me-auto flex">
            <a href="/" wire:navigate class="py-2 px-6 text-white">Home</a>
            <a href="/contact" wire:navigate class="py-2 px-6 text-white">Contact us</a>
        </div>
        <div class="ms-auto me-0 flex">
            @if (Auth::user())
                <div class="dropdown dropdown-end py-2">
                    <span tabindex="0" class="cursor-pointer text-white">{{Auth::user()->name}}</span>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-sm z-[1] w-52 p-2 shadow">
                        <li>
                            <a class="bg-white hover:bg-white hover:text-gray-600">
                                <x-heroicon-s-bookmark class="w-6 h-6" />
                                <span>My Bookmarks</span>
                            </a>
                        </li>
                        <li class="pt-3 pb-0 my-0 hover:bg-white">
                            <hr class="pt-3 pb-0 my-0 hover:bg-white"/>
                        </li>
                        <li class="py-0">
                            <a href="{{ route('logout') }}" class="text-white bg-red-500 hover:bg-red-800 rounded-none">
                                <x-tabler-logout class="w-6 h-6" />
                                logout
                            </a>
                        </li>
                    </ul>
                </div>
                
                
            @else
                <p class="flex flex-row text-white select-none py-2">
                    <a href="{{route('login')}}" wire:navigate class="text-white" >Login</a>&nbsp;/&nbsp;
                    <a href="{{route('register')}}" wire:navigate class="text-white" >Register</a>
                </p>
            @endif
        </div>
    </div>
</div>