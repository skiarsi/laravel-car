<label for="brand" class="text-sm md:text-lg">Brands
    <select wire:model.live='selectedmake' wire:change='updatemodel' name="brand" id="brand" class="w-full py-2 text-lg bg-white border border-gray-400 rounded-md" >
        <option value="any">All Brands</option>
        @foreach ($brands as $brand)
            <option value="{{$brand->slug}}">{{$brand->name}}</option>
        @endforeach
    </select>
</label>