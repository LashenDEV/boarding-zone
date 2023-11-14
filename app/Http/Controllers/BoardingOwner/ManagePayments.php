<?php

namespace App\Http\Controllers\BoardingOwner;

use App\Http\Controllers\Controller;
use App\Models\BoardingPayment;
use App\Models\BoardingPlace;
use App\Models\ReservedBoardingPlaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class   ManagePayments extends Controller
{
    public function payments()
    {
        $my_boarding = BoardingPlace::where('bowner_id', Auth::user()->id)->first();
        if ($my_boarding !== null) {
            $my_boarding_payments = BoardingPayment::where('boarding_id', $my_boarding->id)->get();
            return view('boarding-owner.payments', compact('my_boarding', 'my_boarding_payments'));
        } else {
            return view('boarding-owner.payments', compact('my_boarding'));
        }
    }

    public function paymentApproval($id)
    {
        $myBoardingPayment = BoardingPayment::findOrFail($id);
        $myBoardingPayment->payment_approval = "Approved";
        $myBoardingPayment->save();

        return back()->with('message', 'Payment approved');
    }

    public function paymentRejection($id)
    {
        $myBoardingPayment = BoardingPayment::findOrFail($id);
        $myBoardingPayment->payment_approval = "Rejected";
        $myBoardingPayment->save();

        return back()->with('message', 'Payment rejected');
    }
}
