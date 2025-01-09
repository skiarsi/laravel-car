<select wire:model.live='drivetype'class="block py-0.5 text-sm px-1 rounded-md bg-white shadow-sm border border-gray-400 w-10/12 mt-1" >
  <option value="any">Any type</option>
  
  @foreach ($drivelist as $drive)
    <option value="{{$drive->drivetype_slug}}">{{$drive->drivetype_title}}</option>
  @endforeach
  
  {{-- <option value="awd">Awd</option>
  <option value="fwd">Fwd</option>
  <option value="4wd">4wd</option> --}}
</select>
