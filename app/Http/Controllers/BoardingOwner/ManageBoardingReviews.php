<?php

namespace App\Http\Controllers\BoardingOwner;

use App\Http\Controllers\Controller;
use App\Models\BoardingReviews;
use Illuminate\Http\Request;

class ManageBoardingReviews extends Controller
{
    public function index($id)
    {

        $reviews = BoardingReviews::where('boarding_id', $id)->get();
        return view('boarding-owner.reviews', compact('reviews'));
    }


    public function approval($id)
    {

        $review = BoardingReviews::whereId($id)->first();
        $review->status = 'Published';
        $review->save();
        return redirect()->back()->with('success', 'Review Approved Successfully');
    }

    public function rejection($id)
    {

        $review = BoardingReviews::whereId($id)->first();
        $review->status = 'Declined';
        $review->save();
        return redirect()->back()->with('success', 'Review Approved Successfully');
    }

    public function removal($id)
    {

        $review = BoardingReviews::whereId($id)->delete();
        return redirect()->back()->with('success', 'Review Approved Successfully');
    }
}
