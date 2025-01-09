<select wire:model.live='transmission'class="block py-0.5 text-sm px-1 rounded-md bg-white shadow-sm border border-gray-400 w-10/12 mt-1" >
  <option value="any">Any mileage</option>
  @foreach ($translist as $tarsmission)
    <option value="{{$tarsmission->transmission_slug}}">{{$tarsmission->transmission_title}}</option>
  @endforeach
</select>