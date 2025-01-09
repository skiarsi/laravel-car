<label for="drivetrain" class="text-sm md:text-lg">Drivetrain
  <select wire:model.live='selecteddrivetype' name="drivetrain" id="drivetrain" class="w-full py-2 text-lg bg-white border border-gray-400 rounded-md" >
      <option value="any">All type</option>
      @foreach ($drive as $type)
          <option value="{{$type->drivetype_slug}}">{{$type->drivetype_title}}</option>
      @endforeach
  </select>
</label>