<select id="carbody" wire:model.live='carbody' class="block py-0.5 text-sm px-1 rounded-md bg-white shadow-sm border border-gray-400 w-{{$width}}">
  <option value="any">All type</option>
  @foreach ($bodylist as $body)
    <option value="{{$body->bodystyle_slug}}">{{$body->bodystyle_title}}</option>
  @endforeach
</select>