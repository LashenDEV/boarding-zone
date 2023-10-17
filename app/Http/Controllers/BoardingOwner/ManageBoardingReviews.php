<?php

namespace App\Http\Controllers\BoardingOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageBoardingReviews extends Controller
{
    public function index()
    {
        return view('boarding-owner.reviews');
    }
}
