<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Auth;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {

            return Quote::with(['user', 'vehicle'])->whereHas('user', function($query) use($request) {
                $query->where('fname', 'like', '%' . $request->search . '%')
                ->orWhere('mname', 'like', '%' . $request->search . '%')
                ->orWhere('lname', 'like', '%' . $request->search . '%');
            })->orWhereHas('vehicle', function($query) use($request) {
                $query->where('brand_name', 'like', '%' . $request->search . '%')
                ->orWhere('year_model', 'like', '%' . $request->search . '%')
                ->orWhere('model_type', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%');
            })->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhere('contact_num', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

        } else {
            
            return Quote::with(['user', 'vehicle'])->orderBy('id', 'desc')->paginate(10); 

        }
        // return response()->json(Quote::with(['user', 'vehicle'])->get(), 200);
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
            'financing_option' => 'required|bool',
            'car_loan_downpayment' => 'exclude_if:financing_option,true|required|string',
            'loan_duration' => 'exclude_if:financing_option,true|required|string',
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
