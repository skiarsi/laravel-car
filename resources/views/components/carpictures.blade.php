<div class="w-full relative bg-white shadow-md">
    <div class="flex flex-row gap-1 justify-end select-none absolute top-3 left-3 bg-white px-4 py-1 rounded-box shadow-md">
        <x-tabler-eye class="w-6 h-6" />
        <p class="text-black text-md">{{$car->views}}</p>
    </div>
    <div class="carousel w-full">
        @if (isset($car->images[0]))
            <div id="" class="carousel-item w-full min-h-[500px] bg-gray-600">
                <img id="mainImage" src="{{$car->images[0]->image_url}}" class="w-full" />
            </div> 
        @else
            <div class="carousel-item bg-gray-500 w-full h-[500px] flex justify-center items-center">
                <span class="text-white select-none">no images</span>
            </div> 
        @endif
    </div>
    <div class="flex overflow-x-auto space-x-1 w-full justify-start py-0">
        @if ($car->images)
            @foreach ($car->images as $image)
                <div class="shrink-0 w-32">
                    <img src="{{$image->image_url}}" class="w-full cursor-pointer" onclick="changeImage(this)">
                </div>
            @endforeach
        @endif
    </div>

    <script>
        function changeImage(thumbnail) {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = thumbnail.src;
        }
    </script>
</div>