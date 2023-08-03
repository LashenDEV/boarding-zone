<div
    x-data="{
        flashMessageShow: false,
    }"

    @flash-message.window="flashMessageShow = true"
>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-2">
            @include('livewire.components.flash-message')
        </div>
        <div class="relative flex p-5 overflow-x-auto">
            @foreach($boarding_places as $boarding_place)
                <a href="{{route('view-boarding-place', $boarding_place->id)}}">
                    <div
                        class="max-w-xl m-2 justify-evenly px-4 py-6 rounded-lg transform transition duration-500 hover:scale-105">
                        <div
                            class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
                            <div class="h-[200px]">
                                <img class="rounded-t-lg object-cover h-[200px] w-full"
                                     src="{{asset('storage/' . $boarding_place->thumbnail)}}"
                                     alt="">
                            </div>
                            <div class="p-5">
                                <div class="flex justify-between">
                                    <a href="#">
                                        <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">{{$boarding_place->name}}</h5>
                                    </a>
                                </div>
                                <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">{{$boarding_place->features}}</p>
                                <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">
                                    Price:
                                    Rs.{{$boarding_place->price}}/=</p>
                                <div class="flex flex-row justify-end">
                                    <a class="ml-1 cursor-pointer text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-eye pe-2"></i> View
                                    </a>
                                    <a wire:click="reserve({{$boarding_place->id}})"
                                       class="ml-1 cursor-pointer text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-shop pe-2"></i> reserve
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="p-2">
            {{$boarding_places->links()}}
        </div>
    </section>
</div>