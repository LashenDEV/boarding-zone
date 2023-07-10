<?php

namespace App\Http\Livewire\BoardingOwner\ManageBoardingPlaces;

use App\Models\BoardingPlaceImages;
use Livewire\Component;

class BoardingPreviewImages extends Component
{
    public $old_boarding_images;

    public function render()
    {
        return view('livewire.boarding-owner.manage-boarding-places.boarding-preview-images', ['old_boarding_images' => $this->old_boarding_images]);
    }

    public function deleteBoardingPreviewImage($id)
    {
        $boarding_image = BoardingPlaceImages::findOrFail($id);

        if (file_exists(public_path('storage/boarding/images/' . $boarding_image->image))) {
            unlink(public_path('storage/boarding/images/' . $boarding_image->image));
        }

        $boarding_image->delete();

        $this->dispatchBrowserEvent('post-updated', ['editModalShow' => true]);
    }
}
