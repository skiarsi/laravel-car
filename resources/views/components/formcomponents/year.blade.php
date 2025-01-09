<label for="year" class="text-sm md:text-lg">Year
  <select wire:model.live="selecyear" name="year" id="year" class="w-full py-2 text-lg bg-white border border-gray-400 rounded-md" >
      <option value="any">Any year</option>
      @php
          for ($i=2025; $i >= 1980; $i--) { 
            echo '<option value="'.$i.'">'.$i.'</option>';
          }
      @endphp
  </select>
</label>