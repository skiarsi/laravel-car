
<div class="w-full min-h-screen bg-blue-50">
    <div class="flex flex-col h-screen">
        <div class="h-1/6 bg-blue-600 w-full">
            <x-header />
        </div>
        <div class="h-5/6 bg-gradient-to-b from-blue-600 from-50% top-blue-50 to-0% flex justify-center items-center">
            <div class="w-11/12 max-w-[900px] md:w-10/12 xl:w-8/12 bg-white shadow-md shadow-gray-500 py-6 px-4 rounded-md mx-auto flex flex-col overflow-hidden">
                <form wire:submit='search'>
                    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <div class="">
                                <x-formcomponents.carmake :brands="$brands" />
                            </div>
                            <div class="">
                                <x-formcomponents.carmodel :brands="$brands" :selectedmake="$selectedmake" :models="$models"  />
                            </div>
                        </div>
                        <div class=" grid grid-cols-3 gap-2">
                            <div class="">
                                <x-formcomponents.year :selecyear="$selecyear" :py="2" />
                            </div>
                            <div class="">
                                <x-formcomponents.price :selecprice="$selecprice" />
                            </div>
                            <div class="">
                                <x-formcomponents.carmileage :selecmileage="$selecmileage" />
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col">
                        <div class="w-full py-1 flex">
                            <p wire:click='showfilters()' wire:loading.remove wire:target='showmorefilter' class="{{$showmorefilter==true ? 'hidden' : 'block'}} me-auto ms-0 text-blue-700 font-semibold py-2 cursor-pointer text-xl">More filters</p>
                            <div class="{{$showmorefilter==true ? 'block' : 'hidden'}} w-full grid grid-cols-2 md:grid-cols-4 gap-2 pt-3">
                                <div class="w-full">
                                    <x-formcomponents.body :selectedbodystyle="$selectedbodystyle" :bodystyle="$bodystyle" :py="2" />
                                </div>
                                <div class="w-full">
                                    <x-formcomponents.transmission :selectedtransmission="$selectedtransmission" :transmissiontype="$transmissiontype" />
                                </div>
                                <div class="w-full">
                                    <x-formcomponents.drivetrain :selecteddrivetype="$selecteddrivetype" :drive="$drive" />
                                </div>
                                <div class="w-full">
                                    <x-formcomponents.engintype :selectedengintype="$selectedengintype" :engin="$engin" />
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <button class="bg-blue-600 text-white px-12 py-2 text-md rounded-sm me-auto ms-0 mt-1">Search</button> 
                            <span wire:model.live='count'> {{$count}} </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



