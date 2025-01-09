<select wire:model.live='selectedmake' id="makeselect" class="py-0.5 px-1 bg-white shadow-sm border border-gray-300 w-full rounded-md">
    <option value="any">All makes</option>
    @foreach($carmake as $make)
        <option value="{{ $make->slug }}">{{ $make->name }}</option>
    @endforeach
</select>