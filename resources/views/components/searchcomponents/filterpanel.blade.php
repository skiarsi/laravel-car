<div class="w-full bg-white shadow-sm shadow-gray-300 rounded-md flex flex-col py-4 px-2">
  
  <div class="w-full flex flex-row">
    <p class="text-3xl my-0 ms-0 me-auto">{{ env('APP_NAME') }}</p>
    <span wire:loading class="mt-0.5 me-1">loading...</span>
  </div>
  <hr class="my-3">
  <div class="w-full flex flex-row">
    <span class="ms-0 me-auto text-lg font-bold">Filters</span>
    <span wire:click='clearfilters' class="ms-auto me-0 cursor-pointer text-blue-800 text-sm pt-1.5 font-bold select-none">Clear all filters</span>
  </div>
  <hr class="my-3">
  <div class="w-full flex flex-col gap-1">
    <p class="font-bold">Make & Model</p>
    <x-searchcomponents.forms.carmake :carbrand="$carbrand" :brands="$brands" width="10/12" />
    <x-searchcomponents.forms.carmodel :carmodel="$carmodel" :allmodels="$allmodels" width="10/12" />
  </div>
  <hr class="my-3 ">
  <div class="w-full flex flex-col">
    <p class="font-bold mb-2">Price</p>
    <div class="flex flex-col w-10/12">
      <div class="flex flex-row pb-1">
        <span class="ms-0 me-auto text-sm text-gray-800">${{number_format($cars->min('price'))}}</span>

        <span class="mx-auto text-sm text-gray-950">{{(is_numeric($carprice)) ? '$'.number_format($carprice) : ''}}</span>
        
        <span class="ms-auto me-0 text-sm text-gray-800">${{number_format(100000)}}</span>
      </div>
      <x-searchcomponents.forms.price :carprice="$carprice" :cars="$cars" />
    </div>
  </div>
  <hr class="my-3 ">
  <div class="w-full flex flex-col">
    <p class="font-bold">Year</p>
    <x-searchcomponents.forms.year :year="$year" width="10/12" />
    
    <p class="font-bold mt-1">Mileage</p>
    <x-searchcomponents.forms.mileage :mileage="$mileage" width="10/12" />

    <p class="font-bold mt-1">Body type</p>
    <x-searchcomponents.forms.bodytype :bodylist="$bodylist" :carbody="$carbody" width="10/12" />

    <p class="font-bold mt-1">Transmission</p>
    <x-searchcomponents.forms.transmission :translist="$translist" :transmission="$transmission" />

    <p class="font-bold mt-1">Drivetrain</p>
    <x-searchcomponents.forms.drivetype :drivelist="$drivelist" :drivetype="$drivetype" />

    <p class="font-bold mt-1">Engin</p>
    <x-searchcomponents.forms.engin :enginelist="$enginelist" :engin="$engin" />

  </div>
</div>