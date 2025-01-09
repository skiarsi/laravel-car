<label for="models" class="text-sm md:text-lg">Models <span class="text-sm text-gray-500" wire:loading wire:target='selectedmake'>loading...</span>
  <select
      {{(count($brands) > 0) && ($selectedmake != 'any') ? '' : 'disabled' }}
      wire:model.live='selectedmodel'
      name="models"
      id="models"
      class="disabled:bg-gray-300 w-full py-2 text-lg bg-white border border-gray-400 rounded-md" >
          <option value="any">All models</option>
          @foreach ($models as $model)
              <option value={{$model->slug}}>{{$model->name}}</option>
          @endforeach
  </select>
</label>