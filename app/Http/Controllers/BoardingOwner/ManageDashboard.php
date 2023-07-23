<?php

namespace App\Http\Controllers\BoardingOwner;

use App\Http\Controllers\Controller;
use App\Models\BoardingPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageDashboard extends Controller
{
    public function index()
    {

        $boarding_places = BoardingPlace::where('bowner_id', Auth::id())->get();
        return view('boarding-owner.dashboard', compact('boarding_places'));
    }
}
