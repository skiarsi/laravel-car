<select id="caryear" wire:model.live='year' class="block py-0.5 text-sm px-1 rounded-md bg-white shadow-sm border border-gray-400 w-{{$width}}">
  @for ($i = date('Y')+1; $i >= 1980; $i--)
    @if ($i == date('Y')+1)
      <option value="any">Any year</option>
    @else
      <option value="{{$i}}" >{{$i}}</option>
    @endif
  @endfor
</select>