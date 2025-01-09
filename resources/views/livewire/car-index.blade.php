<div class="w-full bg-blue-50">
    <div class="flex flex-col">
        <div class=" bg-blue-600 w-full">
            <x-header />
        </div>
        <div class="w-full flex flex-col md:flex-row mx-auto pt-4 max-w-[1224px] relative">
            <div class="w-full md:w-[550px] lg:w-[740px] relative pb-4 flex flex-col ">
                <x-carpictures :car="$car" />


                <x-carinfos :car="$car" />
            </div>
            <div class="flex-1 px-3 relative flex flex-col">
                <div class=" w-full h-full flex flex-col pb-10 ">
                    <a href="{{route('dealers.home',$car->dealersel->dealer_slug)}}" class="hidden md:flex md:flex-row py-3 px-3 bg-gray-200">
                        <div class="w-[70px] h-[70px] rounded-full bg-gray-500 overflow-hidden">
                            <img src="{{$car->dealersel->dealer_logo}}" class="w-full" />
                        </div>
                        <div class="flex-1 flex flex-col justify-center items-start ps-4">
                            <p class="block border-b-2 border-gray-500 pb-2 mb-2 w-full">{{$car->dealersel->dealer_title}}</p>
                            <hr />
                            <span class="block text-nowrap"><x-tabler-phone class="w-6 h-6 inline-block" /> {{$car->dealersel->phone}}</span>
                        </div>                        
                    </a>
                    <x-sendmessagecomponent :car="$car" />
                </div>
            </div>
        </div>
    </div>
</div>