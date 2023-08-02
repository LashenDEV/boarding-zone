<?php

namespace App\Http\Livewire;

use App\Models\BoardingPlace;
use Livewire\Component;

class ViewBoardingPlaces extends Component
{
    public $boarding_place;

    public function mount($id)
    {
        $this->boarding_place = BoardingPlace::whereId($id)->first();
    }

    public function render()
    {
        return view('livewire.view-boarding-places', ['boarding_place' => $this->boarding_place]);
    }
}
