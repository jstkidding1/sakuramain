<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Auth;

class QuoteController extends Controller
{
    public function index()
    {
        return response()->json(Quote::with(['user', 'vehicle'])->get(), 200);
    }

    public function acceptQuote(Quote $quote)
    {
        $quote->is_approved = true;
        $status = $quote->save();

        return response()->json([
            'status' => $status,
            'data' => $quote,
            'message' => $status ? 'Quotation Approved' : 'Error Quotation'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_num' => 'required',
            'address' => 'required',
            'purchase_in' => 'required',
            'financing_option' => 'required',
            'car_loan_downpayment' => 'required',
            'loan_duration' => 'required',
            'message' => 'required',
        ]);

        $quote = Quote::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => Auth::id(),
            'contact_num' => $request->contact_num,
            'address' => $request->address,
            'purchase_in' => $request->purchase_in,
            'financing_option' => $request->financing_option,
            'car_loan_downpayment' => $request->car_loan_downpayment,
            'loan_duration' => $request->loan_duration,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => (bool) $quote,
            'message' => 'Successfully Submitted.',
            'data' => $quote, 
        ]);
    }

    public function show(Quote $quote)
    {
        return response()->json($quote->load(['user', 'vehicle']), 200);
    }

    public function update(Request $request, Quote $quote)
    {
        //
    }

    public function destroy(Quote $quote)
    {
        $status = $quote->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Quotation Deleted' : 'Error Deleting Quotation'
        ]);
    }
}
