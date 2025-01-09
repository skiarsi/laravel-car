@foreach ($cars as $car)
    <div class="w-11/12 md:w-full mx-auto flex flex-col bg-white mb-5 py-2 px-2 shadow-sm shadow-gray-500 rounded-sm group">
        <div class="w-full flex flex-col md:flex-row">
            <div class="w-full h-[380px] md:w-[300px] md:h-[270px] p-1 relative overflow-hidden">
                <div class="bg-gray-400 rounded-md w-full h-full overflow-hidden relative">
                    <x-bookmark :car="$car" merge=1 />
                    <img class="w-full h-full object-cover" src="{{($car->thumbnail !== null) ? $car->thumbnail->first()['image_url'] : asset('storage/images/thumb.jpg') }}">
                </div>
            </div>
            <div class="flex-1 ps-2 md:ps-3 ">
                <h1 class="text-xl md:text-3xl pt-2 md:pt-3">
                    <a target="_blank"
                        href="{{ route('car.index',['carmake'=>$car->car_make,'carmodel'=>$car->car_model,'id'=>$car->id]) }}"
                        class="text-blue-700">
                            {{$car->year}} {{ $car->carmake->name }} {{ $car->carmodel->name }}
                    </a>
                </h1>

                <p class="text-lg mb-3 ">
                    <span class="">added at {{ date('F d Y',strtotime($car->created_at)) }}</span>
                </p>

                <p class="text-2xl md:text-4xl font-semibold mt-1 mb-2 md:mb-8 md:mt-8 ">
                    Price : ${{ number_format($car->price) }}
                </p>

                <p class="text-xl ">
                    Dealer
                    <a class="text-blue-600 font-semibold" href="dealer/">{{ $car->dealersel->dealer_title }}</a>
                </p>

                <p class="text-xl mt-2">
                    Title
                    <a class="text-blue-600 font-semibold" href="search?cartitle={{$car->title->cartitle_slug}}">{{ $car->title->cartitle_title }}</a>
                </p>
                
            </div>
        </div>
        <div class="py-3">
            <div class="w-full grid grid-cols-2 md:grid-cols-4 gap-1 my-4">
                <div class="w-full">
                    <p class="block">Body type: <span class="font-bold">{{$car->bodytype->bodystyle_title}}</span></p>
                </div>
                <div class="w-full">
                    <p class="block">Engin type: <span class="font-bold">{{$car->engintype->engine_title}}</span></p>
                </div>
                <div class="w-full">
                    <p class="block">Mileage: <span class="font-bold">{{ number_format($car->mileage)}} miles</span></p>
                </div>
                <div class="w-full">
                    <p class="block">Transmission: <span class="font-bold">{{ $car->transmission->transmission_title }}</span></p>
                </div>
                <div class="w-full col-span-2">
                    <p class="block"><span class="font-bold">Location:</span> {{$car->dealersel->address}}</p>
                </div>
                <div class="w-full">
                    <p class="block"><span class="font-bold">MPG:</span> {{explode('/',$car->mpg)[0]}} city / {{explode('/',$car->mpg)[1]}} hwy</p>
                </div>
                <div class="w-full">
                    <p class="block"><span class="font-bold">Drive type:</span> {{$car->drivetype->drivetype_title}}</p>
                </div>
            </div>
            <p class="m-0">
                <span class="font-bold">Description :</span> {{ $car->description }} 
            </p>
            <p class="m-0">
                <span class="font-bold">Dealer note :</span> {{ $car->dealer_description }} 
            </p>
        </div>
    </div>
@endforeach