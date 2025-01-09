<label for="engin" class="text-sm md:text-lg">Engine Type
  <select wire:model.live='selectedengintype' name="engin" id="engin" class="w-full py-2 text-lg bg-white border border-gray-400 rounded-md" >
      <option value="any">All engines</option>
      @foreach ($engin as $type)
          <option value="{{$type->engine_slug}}">{{$type->engine_title}}</option>
      @endforeach
  </select>
</label>