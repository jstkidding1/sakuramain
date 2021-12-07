<?php

namespace App\Http\Controllers;

use App\Drive;
use App\Vehicle;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class DriveController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {

            $drive = Drive::with(['user', 'vehicle'])->whereHas('user', function($query) use($request) {
                $query->where(Drive::raw('CONCAT(fname," ", mname," ",lname)'), 'like', '%' . $request->search . '%')
                ->orWhere(Drive::raw('CONCAT(fname," ", lname)'), 'like', '%' . $request->search . '%')
                ->orWhere(Drive::raw('CONCAT(lname," ",fname)'), 'like', '%' . $request->search . '%')
                ->orWhere('fname', 'like', '%' . $request->search . '%')
                ->orWhere('mname', 'like', '%' . $request->search . '%')
                ->orWhere('lname', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhere('contact_num', 'like', '%' . $request->search . '%');
            })->orWhereHas('vehicle', function($query) use($request) {
                $query->where(Drive::raw('CONCAT(brand_name," ", year_model," ",model_type)'), 'like', '%' . $request->search . '%')
                ->orWhere(Drive::raw('CONCAT(brand_name," ", model_type," ",year_model)'), 'like', '%' . $request->search . '%')
                ->orWhere(Drive::raw('CONCAT(model_type," ", brand_name," ",year_model)'), 'like', '%' . $request->search . '%')
                ->orWhere(Drive::raw('CONCAT(model_type," ", year_model," ",brand_name)'), 'like', '%' . $request->search . '%')
                ->orWhere(Drive::raw('CONCAT(year_model," ", model_type," ",brand_name)'), 'like', '%' . $request->search . '%')
                ->orWhere(Drive::raw('CONCAT(year_model," ", brand_name," ",model_type)'), 'like', '%' . $request->search . '%')
                ->orWhere('brand_name', 'like', '%' . $request->search . '%')
                ->orWhere('year_model', 'like', '%' . $request->search . '%')
                ->orWhere('model_type', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%');
            })
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'drive' => $drive,
                'drive_count' => $drive->count()
            ]);

        } else {
            
            $drive = Drive::with(['user', 'vehicle'])->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'drive' => $drive,
                'drive_count' => $drive->count()
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'vehicle_id' => 'required|unique:drives,vehicle_id,NULL,id,user_id,'.\Auth::id(),
        ], [
            'unique' => 'You can only reserve once per vehicle.'
        ]);

        $drive = Drive::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => Auth::id(),
            'date' => $request->date,
            'time' => $request->time,
            'comments' => $request->comments,
        ]);
            
        return response()->json([
            'status' => (bool) $drive,
            'message' => 'Successfully Reserved.',
            'data' => $drive, 
        ]);
    }

    public function show(Drive $drive)
    {
        //
    }

    public function update(Request $request, Drive $drive)
    {
        //
    }

    public function destroy(Drive $drive)
    {
        //
    }
}
