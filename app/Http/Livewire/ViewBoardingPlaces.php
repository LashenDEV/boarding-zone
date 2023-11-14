<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BoardingOwner\ManageBoardingPlaces\BoardingPreviewImages;
use App\Models\BoardingPlace;
use App\Models\BoardingPlaceImages;
use App\Models\ReservedBoardingPlaces;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewBoardingPlaces extends Component
{
    public $boarding_place, $images = [];

//    public function reserveBoarding($boarding_place_id)
//    {
//        if (!ReservedBoardingPlaces::where('boarder_id', Auth::user()->id)->first() == null) {
//            if (!ReservedBoardingPlaces::where('boarding_place_id', $boarding_place_id)->first()) {
//
//                if (Auth::user()) {
//                    $reserved_boarding_place = new ReservedBoardingPlaces();
//                    $reserved_boarding_place->boarding_place_id = $boarding_place_id;
//                    $reserved_boarding_place->boarder_id = Auth::user()->id;
//                    $reserved_boarding_place->save();
//
//                    $boarding_place = BoardingPlace::whereId($boarding_place_id)->first();
//                    $boarding_place->is_reserved = 'Yes';
//                    $boarding_place->save();
//
//                    $chageUserType = User::whereId(Auth::user()->id);
//                    $chageUserType->userType = "CLNT";
//                    $chageUserType->save();
//
//                    session()->flash('success', 'Boarding place is reserved successfully');
//
//                    $this->reset();
//
//                    $this->dispatchBrowserEvent('flash-message', ['flashMessageShow' => true]);
//                } else {
//                    $this->redirect('/login');
//                }
//            }
//        }
//    }

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
