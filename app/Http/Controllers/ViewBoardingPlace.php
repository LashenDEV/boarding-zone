<?php

namespace App\Http\Controllers;

use App\Models\BoardingPlace;
use App\Models\BoardingPlaceImages;
use App\Models\ReservedBoardingPlaces;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewBoardingPlace extends Controller
{
    public function viewBoardingPlace($id)
    {
        $boarding_place = BoardingPlace::whereId($id)->first();
        $previewImages = BoardingPlaceImages::where('boarding_id', $id)->pluck('image');

        $images[] = array('url' => asset('storage/' . $boarding_place->thumbnail), 'thumb' => asset('storage/' . $boarding_place->thumbnail), 'original' => asset('storage/' . $boarding_place->thumbnail));


        foreach ($previewImages as $previewImage) {
            $images[] = array('url' => asset('storage/boarding/images/' . $previewImage), 'thumb' => asset('storage/boarding/images/' . $previewImage), 'original' => asset('storage/boarding/images/' . $previewImage));
        }

        return view('view-boarding-place', compact('boarding_place', 'images'));
    }

    public function reserveBoardingPlace($boarding_place_id)
    {
        if (!ReservedBoardingPlaces::where('boarder_id', Auth::user()->id)->first() == null) {
            if (!ReservedBoardingPlaces::where('boarding_place_id', $boarding_place_id)->first()) {
                $reserved_boarding_place = new ReservedBoardingPlaces();
                $reserved_boarding_place->boarding_place_id = $boarding_place_id;
                $reserved_boarding_place->boarder_id = Auth::user()->id;
                $reserved_boarding_place->save();

                $boarding_place = BoardingPlace::whereId($boarding_place_id)->first();
                $boarding_place->is_reserved = 'Yes';
                $boarding_place->save();
            }
        }
        return redirect('/client/my-boarding-place')->with(['message' => 'Boarding place is reserved successfully']);
    }
}
