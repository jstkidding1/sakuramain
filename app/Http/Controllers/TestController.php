<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Auth;

class TestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {

            $testdrive = Test::with(['user', 'vehicle'])->whereHas('user', function($query) use($request) {
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

            return response()->json([
                'testdrive' => $testdrive,
                'testdrive_count' => $testdrive->count()
            ]);

        } else {
            
            $testdrive = Test::with(['user', 'vehicle'])->orderBy('id', 'desc')->paginate(10); 

            return response()->json([
                'testdrive' => $testdrive,
                'testdrive_count' => $testdrive->count()
            ]);

        }
        // return response()->json(Test::with(['user', 'vehicle'])->get(), 200);
    }

    public function requestTest(Test $test)
    {
        $test->is_approved = true;
        $status = $test->save();

        return response()->json([
            'status' => $status,
            'data' => $test,
            'message' => $status ? 'Request A Test Drive Approved' : 'Error Request'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'address' => 'required',
            'date' => 'required',
            'time' => 'required',
            'purchase_in' => 'required',
            'message' => 'required',
            'vehicle_id' => 'required|unique:tests,vehicle_id,NULL,id,user_id,'.\Auth::id(),
        ], [
            'unique' => 'You can only have one request for this vehicle.'
        ]);

        $test = Test::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => Auth::id(),
            'contact_num' => $request->contact_num,
            'address' => $request->address,
            'date' => $request->date,
            'time' => $request->time,
            'purchase_in' => $request->purchase_in,
            'message' => $request->message
        ]);

        return response()->json([
            'status' => (bool) $test,
            'message' => 'Successfully Submitted.',
            'data' => $test, 
        ]);
    }

    public function show(Test $test)
    {
        return response()->json($test->load(['user', 'vehicle']), 200);
    }

    public function update(Request $request, Test $test)
    {
        $status = $test->update(
            $request->only('status')
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Request A Test Drive Updated' : 'Error Updating Test'
        ]);
    }

    public function destroy(Test $test)
    {
        $status = $test->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Request A Test Drive Deleted' : 'Error Deleting Request'
        ]);
    }
}
