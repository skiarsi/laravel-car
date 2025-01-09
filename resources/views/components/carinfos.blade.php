<div class="flex flex-col py-4 ">
    <div class="bg-white shadow-md rounded-lg p-7 mt-2 border border-gray-300">
        <p class="flex flex-row pb-3">
            <x-tabler-map-pin-filled class="w-7 h-7 ms-0" />
            <span class="pt-0.5 ps-2 text-gray-600">{{$car->dealersel->address}}</span>
        </p>
        <p class="font-bold text-3xl">
            {{ $car->year.' '.$car->carmake->name.' '.$car->carmodel->name }}
        </p>
        <p class="font-semibold text-2xl mt-3">
            Price: ${{ number_format($car->price) }} | {{ number_format($car->mileage) }} mi
        </p>
    </div>
    <p class="font-semibold text-gray-800 text-3xl ps-1 my-5">Vehicle Highlights</p>
    <div class="bg-white shadow-md rounded-lg p-7 border border-gray-300 flex flex-col">
        <div class="grid grid-cols-3 w-full gap-3">
            <p class="w-full font-bold">
                Car title : <span class="font-normal block">{{$car->title->cartitle_title}}</span>
            </p>
            <p class="w-full font-bold">
                Drivetrain : <span class="font-normal block">{{$car->drivetype->drivetype_title}}</span>
            </p>
            <p class="w-full font-bold">
                Transmission : <span class="font-normal block">{{$car->transmission->transmission_title}}</span>
            </p>
            <p class="w-full font-bold">
                Engin Type : <span class="font-normal block">{{$car->engintype->engine_title}}</span>
            </p>
            <p class="w-full font-bold">
                Fuel Type : <span class="font-normal block">{{$car->fueltype->fueltype_title}}</span>
            </p>
            <p class="w-full font-bold">
                Body type : <span class="font-normal block">{{$car->bodytype->bodystyle_title}}</span>
            </p>
            <p class="w-full font-bold">
                Body type : <span class="font-normal block">{{$car->bodytype->bodystyle_title}}</span>
            </p>
        </div>

        @if ($car->description)
            <p class="font-bold mt-8 mb-1 text-2xl">Car Description</p>
            <p class="ms-5 mb-14">{{ $car->description }}</p>
        @endif

        
        
        @if ($car->feature)
            <hr/>
            <div class="block mb-8 mt-3">
                <p class="font-bold mt-6 mb-3 text-2xl">Top Features</p>
                <div class="flex flex-row gap-1">
                @foreach (json_decode($car->feature) as $featureitem)
                    <span class="rounded-md bg-gray-100 text-sm border border-gray-300 py-0 px-2">{{$featureitem}}</span>
                @endforeach
                </div>
            </div>
        @endif
        <div class="block">
            <hr />

            @if ($car->title_description)
                <p class="font-bold mt-8 mb-2 text-2xl">Title Description</p>
                <p class="ms-5">{{ $car->title_description }}</p>
            @endif

            @if ($car->dealer_description)
                <p class="font-bold mt-6 mb-2 text-2xl">Dealer Description</p>
                <p class="ms-5">{{ $car->dealer_description }}</p>
            @endif
        </div>
    </div>


    <p class="font-semibold text-gray-800 text-3xl ps-1 my-5">Dealer details</p>
    <div class="bg-white shadow-md rounded-lg p-7 border border-gray-300 flex flex-col">
        

        <div class="flex flex-row">
            <div class="w-20 h-20 bg-gray-600 rounded-full overflow-hidden">
                <img src="{{$car->dealersel->dealer_logo}}" class="w-full" />
            </div>
            <div class="flex-1 flex flex-col ps-4 justify-start items-start ">
                <p class="font-semibold text-2xl mt-1">{{$car->dealersel->dealer_title}}</p>

                <a href="{{route('dealers.home',$car->dealersel->dealer_slug)}}" class="font-semibold flex flex-row gap-1 w-36 mb-4">
                    <x-tabler-link class="w-6 h-6" />
                    <span class="text-blue-800">Dealer's page</span>
                </a>
            </div>
        </div>
        
        
        <p class="font-light mb-3 mt-10 flex flex-row gap-1">
            <x-tabler-map-pin class="w-6 h-6" />
            <span>{{$car->dealersel->address}}</span>
        </p>
        <p class="font-light mb-3 mt-0 flex flex-row gap-1">
            <x-tabler-phone class="w-6 h-6" />
            <a href="tel:{{$car->dealersel->phone}}">{{$car->dealersel->phone}}</span>
        </p>
        <p class="font-light mb-3 mt-0 flex flex-row gap-1">
            <x-tabler-mail class="w-6 h-6" />
            <a href="mailto:{{$car->dealersel->email}}">{{$car->dealersel->email}}</span>
        </p>
        
    </div>


</div>