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
        $my_boarding_payments = BoardingPayment::where('boarding_id', $my_boarding->id)->get();
        return view('boarding-owner.payments', compact('my_boarding', 'my_boarding_payments'));
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

//    public function storePayment(Request $request)
//    {
//        // Validate the form data
//        $validatedData = $request->validate([
//            'paymentMethod' => 'required',
//            'paymentAmount' => 'required|numeric|min:0',
//            'paymentMonth' => 'required',
//            'paymentReceipt' => 'required|file|mimes:pdf,jpg,jpeg,png',
//        ]);
//
//        $payment = new BoardingPayment();
//        $payment->payment_method = $validatedData['paymentMethod'];
//        $payment->amount = $validatedData['paymentAmount'];
//        $payment->month = $validatedData['paymentMonth'];
//        $payment->boarding_id = $request->boardingId;
//        $payment->boarder_id = Auth::user()->id;
//
//        $file = $request->file('paymentReceipt');
//        $filename = time() . '_' . $file->getClientOriginalName();
//        $file->storeAs('payment_receipts', $filename, 'public');
//        $payment->payment_receipts = $filename;
//
//        $payment->save();
//
//        return redirect()->route('boarding_owner.payments')->with('success', 'Payment added successfully.');
//    }
}
