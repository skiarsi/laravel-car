<div class="px-4 pb-6 mx-auto bg-white w-full shadow-md rounded-b-xl">
    @if (session()->has("successmsg"))
        <span class="bg-green-700 text-green-100 block w-full py-2 px-2 mt-2 text-sm my-0">{{ session('successmsg') }}</span>
    @endif
    <p class="text-2xl mt-3 mb-2">Send message to Dealer</p>
    <form wire:submit="sendmessage" class="flex flex-col gap-2">
        <input
            wire:model='userName'
            name="Name"
            type="text"
            value="{{ (Auth::user()) ? Auth::user()->name : '' }}"
            placeholder="Name"
            class="input input-bordered input-md w-full rounded-md text-xl disabled:bg-gray-300" />

            @error('userName')
                <span class="text-red-600 text-sm my-0">{{ $message }}</span>
            @enderror
        <input
            wire:model='userEmail'
            type="Email"
            value="{{ (Auth::user()) ? Auth::user()->email : '' }}"
            placeholder="Email"
            class="input input-bordered input-md w-full rounded-md text-xl disabled:bg-gray-300" />
            @error('userEmail')
                <span class="text-red-600 text-sm my-0">{{ $message }}</span>
            @enderror
        <input
            wire:model='userTel'
            type="Phone"
            value=""
            placeholder="Phone number"
            class="input input-bordered input-md w-full rounded-md text-xl disabled:bg-gray-300" />
            @error('userTel')
                <span class="text-red-600 text-sm my-0">{{ $message }}</span>
            @enderror
        <div class="w-full">
            <p class="bg-gray-200 w-full py-3 px-3">
                <span class="font-bold text-xl block">Hi! I'm interested in this car</span>
                <span class="text-xl block ">{{ $car->year.' '.$car->carmake->name.' '.$car->carmodel->name  }}</span>
                <span class="text-xl block mb-3">${{ number_format($car->price).' | '.number_format($car->mileage) }} mi</span>
            
                <textarea
                    wire:model='userText'
                    id="textareamessage"
                    aceholder="Additional message"
                    rows="5"
                    class="textarea textarea-bordered textarea-md w-full text-md rounded-sm disabled:bg-gray-300"></textarea>
                <span class="text-xs block">
                    (300 characters maximum) 
                    <span id="charCount" class="">300</span>
                </span>
                @error('userText')
                    <span class="text-red-600 text-sm my-0">{{ $message }}</span>
                @enderror
            </p>
        </div>
        <input type="submit" class="btn btn-info rounded-sm w-full" wire:loading.remove wire:target='sendmessage' />
    </form>

    {{-- textarea character counter --}}
    <script>
        const textarea = document.getElementById("textareamessage");
        const charCount = document.getElementById("charCount");

        textarea.addEventListener("input", () => {
        charCount.textContent = (textarea.value.length>0) ? 300 - textarea.value.length : 300;

        if (textarea.value.length > 300) {
            charCount.style.color = 'red';
        } else {
            charCount.style.color = 'black';
        }
        });
    </script>

</div>