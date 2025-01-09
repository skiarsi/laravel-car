<select wire:model.live='engin'class="block py-0.5 text-sm px-1 rounded-md bg-white shadow-sm border border-gray-400 w-10/12 mt-1" >
  <option value="any">Any engines</option>
  @foreach ($enginelist as $engin)
    <option value="{{ $engin->engine_slug }}">{{ $engin->engine_title }}</option>  
  @endforeach
</select>
