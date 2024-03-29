<div
    x-data="{
        flashMessageShow: false,
    }"

    @flash-message.window="flashMessageShow = true"
>
    <section class="bg-white">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 :text-white lg:text-5xl">
            Boarding Places
        </h1>
        <div class="flex justify-end">

            <div class="w-[500px]">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="default-search" wire:model="search"
                           class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Search Boardings" required>
                    <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Search
                    </button>
                </div>
            </div>
        </div>
        <div class="py-2">
            @include('livewire.components.flash-message')
        </div>
        <div class="relative flex p-5 overflow-x-auto">
            @if(isset($boarding_places))
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
                                    <div class="flex justify-end">
                                        @if($boarding_place->is_reserved == 'YES')
                                            <span
                                                class="bg-red-600 text-white rounded-lg p-1 m-2 text-sm">Reserved</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="p-5">
                                    <div class="flex justify-start">
                                        <a href="#">
                                            <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">{{$boarding_place->name}}</h5>
                                        </a>
                                    </div>
                                    <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">{{$boarding_place->features}}</p>
                                    <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">
                                        Price:
                                        Rs.{{$boarding_place->price}}/=</p>
                                    <div class="flex flex-row justify-end">
                                        <a href="{{route('view-boarding-place', $boarding_place->id)}}"
                                           class="ml-1 cursor-pointer text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <i class="fa-solid fa-eye pe-2"></i> View
                                        </a>
                                        @if($boarding_place->is_reserved !== "Yes")
                                            <a wire:click="reserve({{$boarding_place->id}})"
                                               class="ml-1 cursor-pointer text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <i class="fa-solid fa-shop pe-2"></i> Reserve
                                            </a>
                                        @else
                                            <a wire:click="reserve({{$boarding_place->id}})"
                                               class="ml-1 cursor-pointer text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                                <i class="fa-solid fa-circle-exclamation pe-2"></i> Request
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="flex items-center justify-center py-32">
                    <i class="fa-regular fa-face-worried pe-3"></i> No Boarding Places Were Found
                </div>
            @endif
        </div>
        <div class="p-2">
            {{$boarding_places->links()}}
        </div>
    </section>
</div>
