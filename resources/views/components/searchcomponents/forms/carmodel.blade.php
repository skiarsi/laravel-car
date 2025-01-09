<select wire:model.live='carmodel' class="block py-0.5 text-sm px-1 rounded-md bg-white shadow-sm border border-gray-400 w-10/12 mt-1">
  <option value="any">All Models</option>
  @foreach ($allmodels as $modelitem)
      <option value="{{$modelitem->slug}}" {{ ($carmodel === $modelitem->slug) ? 'selected' : '' }}>{{$modelitem->name}}</option>
  @endforeach
</select>


