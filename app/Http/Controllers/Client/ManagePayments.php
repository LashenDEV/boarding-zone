<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BoardingPayment;
use App\Models\BoardingPlace;
use App\Models\ReservedBoardingPlaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagePayments extends Controller
{
    public function payments()
    {
        $my_boarding_id = ReservedBoardingPlaces::where('boarder_id', Auth::user()->id)->first()['boarding_place_id'];
        $my_boarding_payments = BoardingPayment::where('boarder_id', Auth::user()->id)->get();
        return view('client.payment', compact('my_boarding_id', 'my_boarding_payments'));
    }

    public function storePayment(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'paymentMethod' => 'required',
            'paymentAmount' => 'required|numeric|min:0',
            'paymentMonth' => 'required',
            'paymentReceipt' => 'required|file|mimes:pdf,jpg,jpeg,png',
        ]);

        $payment = new BoardingPayment();
        $payment->payment_method = $validatedData['paymentMethod'];
        $payment->amount = $validatedData['paymentAmount'];
        $payment->month = $validatedData['paymentMonth'];
        $payment->boarding_id = $request->boardingId;
        $payment->boarder_id = Auth::user()->id;

        $file = $request->file('paymentReceipt');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('payment_receipts', $filename, 'public');
        $payment->payment_receipts = $filename;

        $payment->save();

        return redirect()->route('client.payments')->with('success', 'Payment added successfully.');
    }

//    public function ()
//    {
//        $path = public_path('for_pro_members.zip');
//        $fileName = 'purchase_files.zip';
//
//        return Response::download($path, $fileName, ['Content-Type: application/zip']);
//    }
}
