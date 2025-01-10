
<div class="w-full min-h-screen bg-blue-50 flex flex-col">
    <div class="flex flex-col h-full">
        <div class="h-60 bg-blue-600 w-full bg-blue-600">
            <x-header />
        </div>
        <div class="min-h-96 pb-3 md:pb-0 bg-gradient-to-b from-blue-600 from-50% top-blue-50 to-0% flex justify-center items-center ">
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
    <div class="min-h-96 w-11/12 max-w-[900px] md:w-10/12 xl:w-8/12 mx-auto">
        <h1 class="text-2xl md:text-4xl font-semibold text-center text-gray-600 mb-5">Find your next car by type</h1>
        <div class="grid grid-cols-3 md:grid-cols-5 gap-1 md:gap-2 w-full">
            <div class="w-full">
                <a href="{{route('search',["carbody"=>'pickup'])}}">
                    <div class="w-full h-32 bg-white overflow-hidden flex flex-col justify-center items-center shadow-sm border border-gray-400 rounded-md">
                        <img src="{{asset('storage/images/cars/pickup.png')}}" class="w-[100px] mx-auto" />
                        <p class="text-center block pt-4 font-bold text-xl">Pickups</p>
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="{{route('search',["carbody"=>'suv'])}}">
                    <div class="w-full h-32 bg-white overflow-hidden flex flex-col justify-center items-center shadow-sm border border-gray-400 rounded-md">
                        <img src="{{asset('storage/images/cars/suv.png')}}" class="w-[100px] mx-auto" />
                        <p class="text-center block pt-4 font-bold text-xl">SUVs</p>
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="{{route('search',["carbody"=>'chassis'])}}">
                    <div class="w-full h-32 bg-white overflow-hidden flex flex-col justify-center items-center shadow-sm border border-gray-400 rounded-md">
                        <img src="{{asset('storage/images/cars/electric.png')}}" class="w-[70px] mx-auto" />
                        <p class="text-center block pt-4 font-bold text-xl">Chassis</p>
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="{{route('search',["carbody"=>'convertible'])}}">
                    <div class="w-full h-32 bg-white overflow-hidden flex flex-col justify-center items-center shadow-sm border border-gray-400 rounded-md">
                        <img src="{{asset('storage/images/cars/convertible.png')}}" class="w-[100px] mx-auto" />
                        <p class="text-center block pt-4 font-bold text-xl">Convertible</p>
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="{{route('search',["carbody"=>'coupe'])}}">
                    <div class="w-full h-32 bg-white overflow-hidden flex flex-col justify-center items-center shadow-sm border border-gray-400 rounded-md">
                        <img src="{{asset('storage/images/cars/coupe.png')}}" class="w-[100px] mx-auto" />
                        <p class="text-center block pt-4 font-bold text-xl">Coupe</p>
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="{{route('search',["carbody"=>'van'])}}">
                    <div class="w-full h-32 bg-white overflow-hidden flex flex-col justify-center items-center shadow-sm border border-gray-400 rounded-md">
                        <img src="{{asset('storage/images/cars/electric.png')}}" class="w-[100px] mx-auto" />
                        <p class="text-center block pt-4 font-bold text-xl">Vans</p >
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="{{route('search',["carbody"=>'wagon'])}}">
                    <div class="w-full h-32 bg-white overflow-hidden flex flex-col justify-center items-center shadow-sm border border-gray-400 rounded-md">
                        <img src="{{asset('storage/images/cars/wagone.png')}}" class="w-[100px] mx-auto" />
                        <p class="text-center block pt-4 font-bold text-xl">Wagones</p>
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="{{route('search',["carbody"=>'hatchback'])}}">
                    <div class="w-full h-32 bg-white overflow-hidden flex flex-col justify-center items-center shadow-sm border border-gray-400 rounded-md">
                        <img src="{{asset('storage/images/cars/hachback.png')}}" class="w-[100px] mx-auto" />
                        <p class="text-center block pt-4 font-bold text-xl">Hachbacks</p>
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="{{route('search',["carbody"=>'minivan'])}}">
                    <div class="w-full h-32 bg-white flex flex-col justify-center items-center shadow-sm border border-gray-400 rounded-md">
                        <img src="{{asset('storage/images/cars/minivan.png')}}" class="w-[100px] mx-auto" />
                        <p class="text-center block pt-4 font-bold text-xl">Minivans</p>
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="{{route('search',["carbody"=>'sedan'])}}">
                    <div class="w-full h-32 bg-white overflow-hidden flex flex-col justify-center items-center shadow-sm border border-gray-400 rounded-md">
                        <img src="{{asset('storage/images/cars/coupe.png')}}" class="w-[100px] mx-auto" />
                        <p class="text-center block pt-4 font-bold text-xl">Sedans</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="min-h-96 w-11/12 max-w-[900px] md:w-10/12 xl:w-8/12 mx-auto">
        <h1 class="text-2xl md:text-4xl font-semibold text-center text-gray-600 mb-5">Shop by price</h1>
        <div class="grid grid-cols-4 gap-2 md:gap-3 w-full">
            <a href="{{route('search',["carprice"=>'5000'])}}" class="bg-white shadow-md border border-gray-400 rounded-md py-4 text-center text-gray-800 ">Under $5000</a>
            <a href="{{route('search',["carprice"=>'10000'])}}" class="bg-white shadow-md border border-gray-400 rounded-md py-4 text-center text-gray-800 ">Under $10,000</a>
            <a href="{{route('search',["carprice"=>'15000'])}}" class="bg-white shadow-md border border-gray-400 rounded-md py-4 text-center text-gray-800 ">Under $15,000</a>
            <a href="{{route('search',["carprice"=>'20000'])}}" class="bg-white shadow-md border border-gray-400 rounded-md py-4 text-center text-gray-800 ">Under $20,000</a>

            <a href="{{route('search',["carprice"=>'25000'])}}" class="bg-white shadow-md border border-gray-400 rounded-md py-4 text-center text-gray-800 ">Under $25,000</a>
            <a href="{{route('search',["carprice"=>'35000'])}}" class="bg-white shadow-md border border-gray-400 rounded-md py-4 text-center text-gray-800 ">Under $35,000</a>
            <a href="{{route('search',["carprice"=>'50000'])}}" class="bg-white shadow-md border border-gray-400 rounded-md py-4 text-center text-gray-800 ">Under $50,000</a>
            <a href="{{route('search',["carprice"=>'75000'])}}" class="bg-white shadow-md border border-gray-400 rounded-md py-4 text-center text-gray-800 ">Under $75,000</a>
        </div>
    </div>
</div>




