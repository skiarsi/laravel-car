
<div class="w-full bg-blue-50">
    <div class="flex flex-col min-h-screen">
        <div class=" bg-blue-600 w-full">
            <x-header />
        </div>
        <div class="w-full bg-white border-b-4 border-gray-200">
            
            <x-searchcomponents.toptitle :carbrand="$carbrand" :carmodel="$carmodel" />
            
        </div>
        <div class="w-full flex flex-row mx-auto pt-4 max-w-[1224px] relative">
            <div class="hidden lg:block md:w-[19rem] pe-2">
                {{-- search filter panel --}}
                <x-searchcomponents.filterpanel
                                :enginelist="$enginelist"
                                :engin="$engin"

                                :drivelist="$drivelist"
                                :drivetype="$drivetype"

                                :translist="$translist"
                                :transmission="$transmission"
                                
                                :bodylist="$bodylist"
                                :carbody="$carbody"

                                :mileage="$mileage"
                                :year="$caryear"
                                :carprice="$carprice"
                                :cars="$cars"
                                :brands="$brands"
                                :carbrand="$carbrand"
                                :allmodels="$allmodels"
                                :carmodel="$carmodel" />

            </div>
            <div class="flex-1 flex flex-col pb-3 px-0 relative">

                @if ((count($cars)) > 0)
                    <x-searchcomponents.resultcount :cars="$cars" />
                @endif
                
                {{-- 
                    list of cars
                    Send list of cars and prinf theme in for loop
                --}}
                
                @if ((count($cars)) > 0)
                    <x-searchcomponents.carlist :cars="$cars" /> 
                @else
                    <x-searchcomponents.nofounditem />
                @endif



                <x-searchcomponents.paginatelinks :cars="$cars" />
            </div>
        </div>
    </div>
</div>



