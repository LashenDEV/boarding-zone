<div x-data="{
        createModalShow: false,
        editModalShow: false,
        deleteModalShow: false,
        flashMessageShow: false,
    }"
     @post-created.window="createModalShow = false"
     @post-updated.window="editModalShow = false"
     @post-deleted.window="deleteModalShow = false"
     @flash-message.window="flashMessageShow = true"
>
    <div>
        @include('livewire.components.flash-message')
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-4">
        <div class="p-6 text-gray-900 font-bold dark:text-gray-100 flex justify-between items-center">
            <p class="text-xl">
                {{ __("All Boarding Places") }}
            </p>

            {{--            <div class="w-[500px]">--}}
            {{--                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>--}}
            {{--                <div class="relative">--}}
            {{--                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">--}}
            {{--                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"--}}
            {{--                             stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
            {{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
            {{--                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>--}}
            {{--                        </svg>--}}
            {{--                    </div>--}}
            {{--                    <input type="search" id="default-search" wire:model="search"--}}
            {{--                           class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
            {{--                           placeholder="Search Posts" required>--}}
            {{--                    <button type="submit"--}}
            {{--                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">--}}
            {{--                        Search--}}
            {{--                    </button>--}}
            {{--                </div>--}}
            {{--            </div>--}}


            <button x-on:click="createModalShow = true" wire:click="resetFields()"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                Add Boarding Place
            </button>
        </div>
    </div>
    <div class="relative flex p-5 overflow-x-auto shadow-md sm:rounded-lg">
            @foreach($boarding_places as $boarding_place)
                <div class="max-w-xl m-2 justify-evenly">
                    <div
                        class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
                        <div class="h-[200px]">
                            <a href="#">
                                <img class="rounded-t-lg object-cover h-[200px] w-full"
                                     src="{{asset('storage/' . $boarding_place->thumbnail)}}"
                                     alt="">
                            </a>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between">
                                <a href="#">
                                    <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">{{$boarding_place->name}}</h5>
                                </a>
                                <span
                                    class="p-1 text-xs bg-gray-600 h-full rounded-md text-white {{$boarding_place->publish_status == "Drafted" ? 'bg-gray-600' : ($boarding_place->publish_status == "Approved" ? 'bg-green-600' : 'bg-red-600' )}}">{{$boarding_place->publish_status}}</span>
                            </div>
                            <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order.</p>
                            <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">Price:
                                Rs.{{$boarding_place->price}}/=</p>
                            <div class="flex flex-row justify-end">
                                @if($boarding_place->publish_status == 'Drafted')
                                    <a
                                        wire:click="approveBoardingPlace({{$boarding_place->id}})"
                                        class="ml-1 cursor-pointer text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </a>

                                    <a
                                        wire:click="rejectBoardingPlace({{$boarding_place->id}})"
                                        class="ml-1 cursor-pointer text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-thumbs-down"></i>
                                    </a>
                                @elseif($boarding_place->publish_status == 'Approved')
                                    <a
                                        wire:click="rejectBoardingPlace({{$boarding_place->id}})"
                                        class="ml-1 cursor-pointer text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-thumbs-down"></i>
                                    </a>
                                @else
                                    <a
                                        wire:click="approveBoardingPlace({{$boarding_place->id}})"
                                        class="ml-1 cursor-pointer text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </a>
                                @endif
                                <a x-on:click="editModalShow = true" wire:click="editPost({{$boarding_place->id}})"
                                   class="ml-1 cursor-pointer text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a x-on:click="deleteModalShow = true" wire:click="deletePost({{$boarding_place->id}})"
                                   class="ml-1 cursor-pointer text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                    <i class="fa-duotone fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    <div class="p-2">
        {{$boarding_places->links()}}
    </div>
    <!-- Create, Edit, Delete Modal -->
    @include('livewire.boarding-owner.manage-boarding-places.components.model')
</div>
