<select wire:model.live='carbrand' wire:change='updatemodel' class="block py-0.5 text-sm px-1 rounded-md bg-white shadow-sm border border-gray-400 w-10/12 ">
  <option value="any" selected>All Brands</option>
  @foreach ($brands as $brand)
      <option value="{{$brand->slug}}" {{ ($carbrand === $brand->slug) ? 'selected' : '' }}>{{$brand->name}}</option>
  @endforeach
</select>