<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\BoardingPlace;
use App\Models\ReservedBoardingPlaces;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageDashboard extends Controller
{
    public function index()
    {
        $boarding_count = 0;

        $boarding_places = BoardingPlace::all();
        foreach ($boarding_places as $boarding_place) {
            $boarding_count = $boarding_count + \App\Models\ReservedBoardingPlaces::where('boarding_place_id', $boarding_place->id)->get()->count();
        }

        $users = User::whereNot('userType', 'SADM')->get();
        $boarders = User::where('userType', 'CLNT')->count();
        $bowners = User::where('userType', 'BOR')->count();


        return view('super-admin.dashboard', compact('boarding_places', 'boarding_count', 'users', 'boarders', 'bowners'));
    }
}
