<label for="body" class="text-sm md:text-lg">Body style
  <select wire:model.live='selectedbodystyle' name="body" id="body" class="w-full py-{{$py}} text-lg bg-white border border-gray-400 rounded-md" >
      <option value="any">All</option>
      @foreach ($bodystyle as $type)
          <option value="{{$type->bodystyle_slug}}">{{$type->bodystyle_title}}</option>
      @endforeach
  </select>
</label>