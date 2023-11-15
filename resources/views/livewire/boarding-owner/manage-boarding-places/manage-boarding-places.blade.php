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
    <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg my-4">
        <div class="p-6 text-gray-900 font-bold  flex justify-between items-center">
            <p class="text-xl">
                {{ __("All Boarding Places") }}
            </p>


            <button x-on:click="createModalShow = true" wire:click="resetFields()"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                Add Boarding Place
            </button>
        </div>
    </div>
    <div class="relative flex p-5 overflow-x-auto shadow-md sm:rounded-lg">
        @if($boarding_places)
            @foreach($boarding_places as $boarding_place)
                <div class="max-w-xl m-2 justify-evenly">
                    <div
                        class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm ">
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
                                    <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 ">{{$boarding_place->name}}</h5>
                                </a>
                                <span
                                    class="p-1 text-xs bg-gray-600 h-full rounded-md text-white {{$boarding_place->publish_status == "Pending" ? 'bg-gray-600' : ($boarding_place->publish_status == "Approved" ? 'bg-green-600' : 'bg-red-600' )}}">{{$boarding_place->publish_status}}</span>
                            </div>
                            <p class="font-normal text-gray-700 mb-3 ">Price:
                                Rs.{{$boarding_place->price}}/=</p>

                            <p class="font-normal text-gray-700 mb-3 ">{{$boarding_place->description}}/=</p>

                            <div class="flex flex-row justify-end">
                                <a x-on:click="editModalShow = true" wire:click="editPost({{$boarding_place->id}})"
                                   class="ml-1 cursor-pointer text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center    ">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a x-on:click="deleteModalShow = true" wire:click="deletePost({{$boarding_place->id}})"
                                   class="ml-1 cursor-pointer text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center    ">
                                    <i class="fa-duotone fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="flex flex-col justify-center items-center w-full    ">
                <img class="rounded-t-lg"
                     src="{{asset('asserts/gifs/no-data.gif')}}"
                     alt="">
                <h1 class="text-3xl">No Boarding House Found</h1>
                <button x-on:click="createModalShow = true" wire:click="resetFields()"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 my-5 rounded">
                    Add Your Boarding Place
                </button>
            </div>
        @endif
    </div>
    <div class="p-2">
        {{$boarding_places->links()}}
    </div>
    <!-- Create, Edit, Delete Modal -->
    @include('livewire.boarding-owner.manage-boarding-places.components.model')
</div>
