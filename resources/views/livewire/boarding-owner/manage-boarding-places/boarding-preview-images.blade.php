<div class="px-4">
    <span>Boarding preview</span>
    <div class="flex">
        @foreach($old_boarding_images as $old_boarding_image)
            @if(file_exists(public_path('storage/boarding/images/' . $old_boarding_image->image)))
                <div class="p-1 relative">
                    <img class=" object-cover h-[200px] w-[200px]"
                         src="{{asset('storage/boarding/images/' . $old_boarding_image->image)}}"
                         alt="">
                    <button class="absolute top-0 right-0 text-red-500 hover:text-red-700"
                            wire:click="deleteBoardingPreviewImage({{$old_boarding_image->id}})">
                        <i class="fa-solid fa-circle-xmark"></i></button>
                </div>
            @endif
        @endforeach
    </div>
</div>
