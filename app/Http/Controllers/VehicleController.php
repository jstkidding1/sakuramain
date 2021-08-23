<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        return Vehicle::when(request('search'), function($query) {
            $query->where('brand_name', 'like', '%' . request('search') . '%')
            ->orWhere('year_model', 'like', '%' . request('search') . '%')
            ->orWhere('model_type', 'like', '%' . request('search') . '%')
            ->orWhere('price', 'like', '%' . request('search') . '%')
            ->orWhere('status', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'year_model' => 'required|numeric|digits:4',
            'model_type' => 'required',
            'body_type' => 'required',
            'mileage' => 'required|numeric|min:1|regex:/^([0-9\s\-\+\(\)]*)$/',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'drive_type' => 'required',
            'color' => 'required',
            'interior_color' => 'required',
            'engine' => 'required',
            'features' => 'required',
            'vehicle_overview' => 'required',
            'price' => 'required|numeric|min:1|regex:/^([0-9\s\-\+\(\)]*)$/',
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = date('mdYHis'). uniqid();
            $desinationPath = public_path(). '/images';
            $image->move($desinationPath, $imageName);
        }

        $vehicle = Vehicle::create([
            'brand_name' => $request->brand_name,
            'year_model' => $request->year_model,
            'model_type' => $request->model_type,
            'body_type' => $request->body_type,
            'mileage' => $request->mileage,
            'fuel_type' => $request->fuel_type,
            'transmission' => $request->transmission,   
            'drive_type' => $request->drive_type,
            'color' => $request->color,
            'interior_color' => $request->interior_color,
            'engine' => $request->engine,
            'features' => $request->features,
            'vehicle_overview' => $request->vehicle_overview,
            'price' => $request->price,
            'image' => env('APP_URL'). 'images/'. $imageName,
        ]);


        return response()->json([
            'status_code' => (bool) $vehicle,
            'message' => 'Image has successfully saved', 
            'data' => $vehicle
        ]);
    }

    public function show(Vehicle $vehicle)
    {
        return response()->json($vehicle,200);
    }

    public function uploadVehicle(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        if($request->hasFile('image')){
            $name = time()."_".$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $name);
        }

        return response()->json(asset("images/$name"),201);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'brand_name' => 'required',
            'year_model' => 'required|numeric|digits:4',
            'model_type' => 'required',
            'body_type' => 'required',
            'mileage' => 'required|numeric|min:1|regex:/^([0-9\s\-\+\(\)]*)$/',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'drive_type' => 'required',
            'color' => 'required',
            'interior_color' => 'required',
            'engine' => 'required',
            'features' => 'required',
            'vehicle_overview' => 'required',
            'price' => 'required|numeric|min:1|regex:/^([0-9\s\-\+\(\)]*)$/',
            'status' => 'required'
        ]);

        $status = $vehicle->update(
            $request->only([
                'brand_name',
                'year_model',
                'model_type',
                'body_type',
                'mileage',
                'fuel_type',
                'transmission',
                'drive_type',
                'color',
                'interior_color',
                'engine',
                'features',
                'vehicle_overview',
                'price',
                'status',
                'image'
            ])
        );

        return response()->json([
            'status' => 200,
            'message' => $status ? 'Vehicle Successfully Updated' : 'Error Updating Vehicle', 
            'data' => $status
        ]);
    }

    public function destroy($id)
    {
        
        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        return response()->json('Vehicle Deleted!');
        // $status = $vehicle->delete();

        // return response()->json([
        //     'status' => $status,
        //     'message' => $status ? 'Vehicle Deleted!' : 'Error Deleting Vehicle'
        // ]);
    }
}
