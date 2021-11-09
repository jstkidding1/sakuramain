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

            $inquiries = Inquiry::with(['user', 'vehicle'])->whereHas('user', function($query) use($request) {
                $query->where('fname', 'like', '%' . $request->search . '%')
                ->orWhere('mname', 'like', '%' . $request->search . '%')
                ->orWhere('lname', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhere('contact_num', 'like', '%' . $request->search . '%');
            })->orWhereHas('vehicle', function($query) use($request) {
                $query->where('brand_name', 'like', '%' . $request->search . '%')
                ->orWhere('year_model', 'like', '%' . $request->search . '%')
                ->orWhere('model_type', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%');
            })
            ->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'inquiries' => $inquiries,
                'inquiries_count' => $inquiries->count()
            ]);

        } else {
            
            $inquiries = Inquiry::with(['user', 'vehicle'])->orderBy('id', 'desc')->paginate(10); 

            return response()->json([
                'inquiries' => $inquiries,
                'inquiries_count' => $inquiries->count()
            ]);

        }
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'vehicle_id' => 'required|unique:inquiries,vehicle_id,NULL,id,user_id,'.\Auth::id(),
        ], [
            'unique' => 'You can only have one inquiry for this vehicle.'
        ]);

        $inquiry = Inquiry::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => Auth::id(),
            'message' => $request->message,
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
