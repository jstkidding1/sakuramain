<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;
use Auth;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {

            return Inquiry::with(['user', 'vehicle'])->whereHas('user', function($query) use($request) {
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
            
            return Inquiry::with(['user', 'vehicle'])->orderBy('id', 'desc')->paginate(10); 

        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'contact_num' => 'required',
            'message' => 'required',
            'purchase_in' => 'required'
        ]);

        $inquiry = Inquiry::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => Auth::id(),
            'address' => $request->address,
            'contact_num' => $request->contact_num,
            'message' => $request->message,
            'purchase_in' => $request->purchase_in
        ]);

        return response()->json([
            'status' => (bool) $inquiry,
            'message' => 'Successfully Inquired.',
            'data' => $inquiry, 
        ]);
    }

    public function show(Inquiry $inquiry)
    {
        return response()->json($inquiry->load(['user', 'vehicle']), 200);
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        $status = $inquiry->update(
            $request->only('status')
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Inquiry Updated' : 'Error Updating Inquiry'
        ]);
    }

    public function destroy(Inquiry $inquiry)
    {
        $status = $inquiry->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Inquiry Deleted' : 'Error Deleting Inquiry'
        ]);
    }
}
