<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BoardingOwner\ManageBoardingPlaces\BoardingPreviewImages;
use App\Models\BoardingPlace;
use App\Models\BoardingPlaceImages;
use Livewire\Component;

class ViewBoardingPlaces extends Component
{
    public $boarding_place, $images = [];

    public function mount($id)
    {
        $this->boarding_place = BoardingPlace::whereId($id)->first();
        $previewImages = BoardingPlaceImages::where('boarding_id', $id)->pluck('image');

        $this->images[] = array('url' => asset('storage/' . $this->boarding_place->thumbnail), 'thumb' => asset('storage/' . $this->boarding_place->thumbnail), 'original' => asset('storage/' . $this->boarding_place->thumbnail));


        foreach ($previewImages as $previewImage) {
            $this->images[] = array('url' => asset('storage/boarding/images/' . $previewImage), 'thumb' => asset('storage/boarding/images/' . $previewImage), 'original' => asset('storage/boarding/images/' . $previewImage));
        }
    }

    public function render()
    {
        return view('livewire.view-boarding-places', ['boarding_place' => $this->boarding_place, 'images' => $this->images])->layout('layouts.page');
    }
}
