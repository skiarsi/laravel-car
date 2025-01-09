<label for="transmission" class="text-sm md:text-lg">Transmission
  <select wire:model.live='selectedtransmission' name="transmission" id="transmission" class="w-full py-2 text-lg bg-white border border-gray-400 rounded-md" >
      <option value="any">All type</option>
      @foreach ($transmissiontype as $trans)
          <option value="{{$trans->transmission_slug}}">{{$trans->transmission_title}}</option>
      @endforeach
  </select>
</label>