<input
    wire:model.live.debounce.1000ms='carprice'
    type="range"
    min="{{$cars->min('price')}}"
    max="100000"
    value="{{ (is_numeric($carprice)) ? $carprice : '' }}"
    step="100"
    class="w-full h-1 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />