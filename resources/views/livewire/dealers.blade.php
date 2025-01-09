<div class="w-full bg-blue-50">
    <div class="flex flex-col">
        <div class=" bg-blue-600 w-full">
            <x-header />
        </div>
        <div class="w-full bg-white border-gray-400 border-b-2">
            <div class="flex flex-col justify-start items-center max-w-[1224px] mx-auto pt-9">
                <div class="w-full flex flex-row pb-9">
                    <div class="bg-gray-500 w-32 h-32 rounded-full ms-0 overflow-hidden">
                        <img src="{{$dealer->dealer_logo}}" class="w-full" />
                    </div>
                    <div class="flex-1 flex flex-col justify-center items-start">
                        <p class="text-3xl font-bold px-4 mb-2">{{$dealer->dealer_title}}</p>
                        <p class="text-lg px-4 flex flex-row">
                            <x-tabler-map-pin />
                            <span class="ms-2">{{$dealer->address}}</span>
                        </p>
                        <p class="text-lg px-4 flex flex-row">
                            <x-tabler-phone />
                            <span class="ms-2">{{$dealer->phone}}</span>
                        </p>
                        <p class="text-lg px-4 flex flex-row">
                            <x-tabler-mail />
                            <span class="ms-2">{{$dealer->email}}</span>
                        </p>
                    </div>
                </div>
                <div class="flex flex-row w-full">
                    <a class="px-10 py-3 border-b-4 border-blue-600" href="{{route("dealers.home", $dealer->dealer_slug )}}">Home</a>
                    {{-- <a class="px-10 py-3 border-b-4 border-blue-100" href="{{route("dealers.home", $dealer->dealer_slug )}}">About</a> --}}
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col md:flex-row mx-auto pt-4 max-w-[1224px] relative">
            <div class="w-full w-full relative pb-4 flex flex-col ">
                <div class="w-full bg-white shadow-sm border border-gray-200 rounded-md flex flex-col mt-7 px-4">
                    <div class="flex flex-row w-full">
                        <p class="hidden lg:inline-block text-3xl font-bold py-6 ms-0 me-auto">Cars at {{$dealer->dealer_title}}</p>
                        <label class="mt-3 lg:mt-8 ms-auto me-5">Sort
                            <select wire:model.live='sort' class="bg-white py-0.5 px-3 rounded-md shadow-sm border border-gray-300 ">
                              <option value="date-desc">Date: Newest to Oldest</option>
                              <option value="date-asc">Date: Oldest to Newest</option>
                              <option value="price-desc">Price - High to Low</option>
                              <option value="price-asc">Price - Low to High</option>
                              <option value="mileage-desc">Mileage - High to Low</option>
                              <option value="mileage-asc">Mileage - Low to High</option>
                              <option value="year-desc">Year - New to Old</option>
                              <option value="year-asc">Year - Old to New</option>
                            </select>
                        </label>
                    </div>
                    <div class="grid grid-cols-5 w-full">
                        <div>
                            <label for="makeselect" class="block">Car make</label>
                            <x-filters.carmake :carmake="$carmake" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 w-full gap-4 py-2">
                        @foreach ($cars as $car )
                            <div  class="bg-gray-100 overflow-hidden rounded-md border border-gray-300 group hover:border-gray-400 hover:bg-gray-200">
                                <div class="bg-gray-500 w-full h-[400px] md:h-[300px] lg:h-[200px] overflow-hidden flex justify-center items-center relative">
                                    <x-bookmark :car="$car" merge=3 />
                                    @if ($car->thumbnail)
                                        <img src="{{$car->thumbnail->image_url}}" class="w-full" />
                                    @else
                                        <span class="text-white">no images</span>
                                    @endif
                                </div>
                                <div class="w-full min-h-[100px] px-3 group-hover:bg-gray-200">
                                    <a href="{{route("car.index",["carmake"=>$car->car_make,"carmodel"=>$car->car_model,"id"=>$car->id])}}" class="font-semibold text-lg text-blue-500 group-hover:text-blue-600" >
                                        
                                        <p class="pt-3">
                                            {{$car->year}}
                                            {{$car->carmake->name}}
                                            {{$car->carmodel->name}}
                                        </p>

                                        <p class="py-2 flex flex-row gap-1 text-black">
                                            <span class="font-semibold ">${{ number_format($car->price) }}</span> | 
                                            <span class="font-normal">{{ number_format($car->mileage) }} miles</span>
                                        </p>

                                        <p class="pb-2 gap-2 text-gray-700 font-normal text-sm w-10/12">
                                            {{ Str::limit($car->description,35,' ...')}}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="w-full">
                    {{ $cars->links() }}
                </div>

            </div>
        </div>
    </div>
</div>