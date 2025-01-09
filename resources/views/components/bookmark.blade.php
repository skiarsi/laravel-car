
    @guest
        {{-- <x-tabler-bookmark /> --}}
    @endguest

    @auth
        <div class="absolute top-{{$merge}} right-{{$merge}} bg-white shadow-md rounded-box px-5 py-0.5 cursor-pointer" wire:loading.remove wire:target='bookmarkcar({{$car->id}})' wire:click='bookmarkcar({{$car->id}})'>
            @if ($car->users)
                @if ($car->users->contains('id', Auth::user()->id))
                    <x-tabler-bookmark-filled />
                @else
                    <x-tabler-bookmark />
                @endif        
            @endif
        </div>
    @endauth

