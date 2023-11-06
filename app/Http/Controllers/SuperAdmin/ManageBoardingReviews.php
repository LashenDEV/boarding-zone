<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\BoardingReviews;

class ManageBoardingReviews
{
    public function index()
    {

        $reviews = BoardingReviews::all();
        return view('super-admin.reviews', compact('reviews'));
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
        return redirect()->back()->with('success', 'Review Rejected Successfully');
    }

    public function removal($id)
    {

        $review = BoardingReviews::whereId($id)->delete();
        return redirect()->back()->with('success', 'Review Deleted Successfully');
    }
}
