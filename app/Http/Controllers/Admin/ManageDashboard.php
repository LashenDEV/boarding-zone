<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardingPlace;
use App\Models\ReservedBoardingPlaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageDashboard extends Controller
{
    public function index()
    {
        $my_boarding_count = 0;
        $reserved_boarders_ids = [];

        $boarding_places = BoardingPlace::all();
        foreach ($boarding_places as $boarding_place) {
            $my_boarding_count = $my_boarding_count + \App\Models\ReservedBoardingPlaces::where('boarding_place_id', $boarding_place->id)->get()->count();
        }

        $reserved_boarders = ReservedBoardingPlaces::all()->pluck('boarder_id')->toArray();
        foreach ($reserved_boarders as $reserved_boarder) {
            $reserved_boarders_ids = $reserved_boarders;
        }


        return view('admin.dashboard', compact('boarding_places', 'my_boarding_count', 'reserved_boarders_ids'));
    }
}
