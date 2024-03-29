<!-- Add Post Modal -->
<div wire:ignore.self
     class="fixed flex justify-center items-center right-0 bg-gray-100 bg-opacity-60 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full"
     x-show="createModalShow"
     x-on:click.self="createModalShow = false"
     x-on:keydown.escape.window="createModalShow = false"
     wire:click.self="resetFields()"
>

    <div class="relative w-full bg-white h-full max-w-7xl m-auto md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button" x-on:click="createModalShow = false" wire:click="resetFields()"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Add a Boarding House</h3>
                <form class="space-y-6" action="#" wire:submit.prevent="storePostData" wire:click.self="resetFields()">
                    <div>
                        <label for="name"
                               class="block mb-2 text-sm font-medium text-gray-900 ">Boarding
                            Name</label>
                        <input type="text" name="name" id="name" wire:model.defer="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   "
                               placeholder="Boarding Name">
                        @error('name')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    @if ($thumbnail)
                        <div class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap  w-64">
                            <img class="object-cover h-28 w-64"
                                 src="{{$thumbnail->temporaryUrl()}}"/>
                        </div>
                    @endif
                    <div class="flex justify-between">
                        <div>
                            <div class="p-1">
                                <label for="thumbnail"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Thumbnail</label>
                                <input wire:model.defer="thumbnail"
                                       class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none"
                                       aria-describedby="thumbnail" id="thumbnail" type="file">
                                <div class="mt-1 text-sm text-gray-500 " id="thumbnail">A
                                    thumbnail must be 1920px * 1080px
                                </div>
                                @error('thumbnail')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="p-1">
                                <label for="boarding_images"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Images</label>
                                <input wire:model.defer="boarding_images"
                                       class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none"
                                       aria-describedby="boarding_images" id="boarding_images" type="file" multiple>
                                <div class="mt-1 text-sm text-gray-500 " id="boarding_images">
                                </div>
                                @error('boarding_images')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="pt-5">
                                <label for="number_of_rooms"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Number of
                                    Rooms</label>
                                <input type="number" min="1" step="any" name="number_of_rooms" id="number_of_rooms"
                                       wire:model.defer="number_of_rooms"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                       placeholder="Number of Rooms">
                                @error('number_of_rooms')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="p-1">
                                <label for="price"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                <input type="number" min="1" step="any" name="price" id="price" wire:model.defer="price"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                       placeholder="Price">
                                @error('price')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="pt-5">
                                <label for="target_audience"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Target
                                    Audience</label>
                                <input type="text" min="1" step="any" name="target_audience" id="target_audience"
                                       wire:model.defer="target_audience"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   "
                                       placeholder="Target Audience">
                                @error('target_audience')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="p-1">
                                <label for="payment_method"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Payment
                                    Method</label>
                                <input type="text" min="1" step="any" name="payment_method" id="payment_method"
                                       wire:model.defer="payment_method"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                       placeholder="Payment Method">
                                @error('payment_method')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="pt-5">
                                <label for="availability"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Availability</label>
                                <input type="number" min="1" step="any" name="availability" id="availability"
                                       wire:model.defer="availability"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                                @error('availability')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="location">Location</label>
                            <div class="p-1">
                                <label for="latitude"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Latitude</label>
                                <input type="number" min="1" step="any" name="latitude" id="latitude"
                                       wire:model.defer="latitude"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                       placeholder="Latitude">
                                @error('latitude')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="p-1">
                                <label for="longitude"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Longitude</label>
                                <input type="number" min="1" step="any" name="longitude" id="longitude"
                                       wire:model.defer="longitude"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                       placeholder="Longitude">
                                @error('longitude')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="features"
                               class="block mb-2 text-sm font-medium text-gray-900 ">Features</label>
                        <textarea type="number" min="1" step="any" name="features" id="features" rows="5"
                                  wire:model.defer="features"
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                  placeholder="Features">
                        </textarea>
                        @error('features')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        Add
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Post Modal -->
<div wire:ignore.self
     class="fixed flex justify-center items-center right-0 bg-gray-100 bg-opacity-60 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full"
     x-show="editModalShow"
     x-on:click.self="editModalShow = false"
     x-on:keydown.escape.window="editModalShow = false"
>
    <div class="relative w-full bg-white h-full max-w-7xl m-auto md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button" x-on:click="editModalShow = false"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Edit Post</h3>
                <form class="space-y-6" action="#" wire:submit.prevent="editPostData">
                    <div>
                        <label for="name"
                               class="block mb-2 text-sm font-medium text-gray-900 ">Boarding
                            Name</label>
                        <input type="text" name="name" id="name" wire:model.defer="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                               placeholder="Post Title">
                        @error('name')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    @if ($thumbnail || $old_thumbnail)
                        <div class="px-6 py-4 flex font-medium text-gray-900  w-full">
                            <div class="whitespace-nowrap h-[200px] w-[300px]">
                                <img class="object-cover h-[200px] w-[300px]"
                                     src="{{ $thumbnail ? $thumbnail->temporaryUrl() : asset('storage/'. $old_thumbnail)}}"/>
                            </div>
                            <livewire:boarding-owner.manage-boarding-places.boarding-preview-images
                                :old_boarding_images="$old_boarding_images"/>
                            <div class="p-1">
                                <label for="boarding_images"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Images</label>
                                <input wire:model.defer="boarding_images"
                                       class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none  "
                                       aria-describedby="boarding_images" id="boarding_images" type="file" multiple>
                                <div class="mt-1 text-sm text-gray-500 " id="boarding_images">
                                </div>
                                @error('boarding_images')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                    @endif
                    <div class="flex justify-between">
                        <div>
                            <div class="p-1">
                                <label class="block mb-2 text-sm font-medium text-gray-900 "
                                       for="thumbnail">Upload file</label>
                                <input wire:model.defer="thumbnail"
                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none  "
                                       aria-describedby="thumbnail" id="thumbnail" type="file">
                                <div class="mt-1 text-sm text-gray-500 " id="thumbnail">A
                                    thumbnail must be 1920px * 1080px
                                </div>
                                @error('thumbnail')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="p-1">
                                <label for="number_of_rooms"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Number of
                                    Rooms</label>
                                <input type="number" min="1" step="any" name="number_of_rooms" id="number_of_rooms"
                                       wire:model.defer="number_of_rooms"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                       placeholder="Number of Rooms">
                                @error('number_of_rooms')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div>
                                <label for="price"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                <input type="number" min="1" step="any" name="price" id="price" wire:model.defer="price"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                       placeholder="Add a price">
                                @error('price')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="pt-5">
                                <label for="target_audience"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Target
                                    Audience</label>
                                <input type="text" min="1" step="any" name="target_audience" id="target_audience"
                                       wire:model.defer="target_audience"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                       placeholder="Target Audience">
                                @error('target_audience')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div>
                                <label for="payment_method"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Payment
                                    Method</label>
                                <input type="text" min="1" step="any" name="payment_method" id="payment_method"
                                       wire:model.defer="payment_method"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                       placeholder="Payment Method">
                                @error('payment_method')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="pt-5">
                                <label for="availability"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Availability</label>
                                <input type="number" min="1" step="any" name="availability" id="availability"
                                       wire:model.defer="availability"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                                @error('availability')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="location">Location</label>
                            <div class="p-1">
                                <label for="latitude"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Latitude</label>
                                <input type="number" min="1" step="any" name="latitude" id="latitude"
                                       wire:model.defer="latitude"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                       placeholder="Latitude">
                                @error('latitude')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="p-1">
                                <label for="longitude"
                                       class="block mb-2 text-sm font-medium text-gray-900 ">Longitude</label>
                                <input type="number" min="1" step="any" name="longitude" id="longitude"
                                       wire:model.defer="longitude"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                       placeholder="Longitude">
                                @error('longitude')
                                <p class="peer-invalid:visible text-red-700 font-light">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="features"
                               class="block mb-2 text-sm font-medium text-gray-900 ">Features</label>
                        <textarea type="number" min="1" step="any" name="features" id="features" rows="5"
                                  wire:model.defer="features"
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                  placeholder="Add a features"></textarea>
                        @error('features')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <button type="submit"
                            class="text-white flex justify-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Category Modal -->
<div wire:ignore.self
     class="fixed flex justify-center items-center right-0 bg-gray-100 bg-opacity-60 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full"
     x-show="deleteModalShow"
     x-on:click.self="deleteModalShow = false"
     x-on:keydown.escape.window="deleteModalShow = false"
>
    <div class="relative w-full bg-white h-full max-w-lg md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow  sm:p-5">
            <button x-on:click="deleteModalShow = false" type="button"
                    class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  "
                    data-modal-toggle="deleteModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400  w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
            <p class="mb-4 text-gray-500 ">Are you sure you want to delete this boarding house?</p>
            <div class="flex justify-center items-center space-x-4">
                <button x-on:click="deleteModalShow = false" type="button"
                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10     ">
                    No, cancel  ">
                    No, cancel
                </button>
                <button wire:click="deletePostData()" type="submit"
                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300  ">
                    Yes, I'm sure
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const createPostEditor = CKEDITOR.replace('createPostEditor');
        createPostEditor.on('change', function (event) {
            console.log(event.editor.getData())
            @this.set('article', event.editor.getData());
        });
    </script>

    <script>
        const editPostEditor = CKEDITOR.replace('editPostEditor');
        window.addEventListener('post-data', event => {
            let article = event.detail.postData;
            editPostEditor.setData(article);
        })
        editPostEditor.on('change', function (event) {
            @this.
            set('article', event.editor.getData());
        });
    </script>
@endpush
