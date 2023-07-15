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
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" x-on:click="createModalShow = false" wire:click="resetFields()"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add a Boarding House</h3>
                <form class="space-y-6" action="#" wire:submit.prevent="storePostData" wire:click.self="resetFields()">
                    <div>
                        <label for="name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Boarding
                            Name</label>
                        <input type="text" name="name" id="name" wire:model.defer="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="Boarding Name">
                        @error('name')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    @if ($thumbnail)
                        <div class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-64">
                            <img class="object-cover h-28 w-64"
                                 src="{{$thumbnail->temporaryUrl()}}"/>
                        </div>
                    @endif
                    <div>
                        <input wire:model.defer="thumbnail"
                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                               aria-describedby="thumbnail" id="thumbnail" type="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="thumbnail">A
                            thumbnail must be 1920px * 1080px
                        </div>
                        @error('thumbnail')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <label for="price"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" min="1" step="any" name="price" id="price" wire:model.defer="price"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="Price">
                        @error('price')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">
                        Add a price that is not used before.
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" x-on:click="editModalShow = false"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Post</h3>
                <form class="space-y-6" action="#" wire:submit.prevent="editPostData">
                    <div>
                        <label for="name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Boarding
                            Name</label>
                        <input type="text" name="name" id="name" wire:model.defer="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="Post Title">
                        @error('name')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    @if ($thumbnail || $old_thumbnail)
                        <div class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-64">
                            <img class="object-cover h-28 w-64"
                                 src="{{ $thumbnail ? $thumbnail->temporaryUrl() : asset('storage/'. $old_thumbnail)}}"/>
                        </div>
                    @endif
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                               for="thumbnail">Upload file</label>
                        <input wire:model.defer="thumbnail"
                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                               aria-describedby="thumbnail" id="thumbnail" type="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="thumbnail">A
                            thumbnail must be 1920px * 1080px
                        </div>
                        @error('thumbnail')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <label for="price"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" min="1" step="any" name="price" id="price" wire:model.defer="price"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="Add a price">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">
                            Add a price that is not used before.
                        </div>
                        @error('price')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button x-on:click="deleteModalShow = false" type="button"
                    class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="deleteModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this boarding house?</p>
            <div class="flex justify-center items-center space-x-4">
                <button x-on:click="deleteModalShow = false" type="button"
                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    No, cancel
                </button>
                <button wire:click="deletePostData()" type="submit"
                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
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
        @this.set('article', event.editor.getData());
        });
    </script>
@endpush
