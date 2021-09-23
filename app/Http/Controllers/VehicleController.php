<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicle = Vehicle::when(request('search'), function($query) {
            $query->where('brand_name', 'like', '%' . request('search') . '%')
            ->orWhere('year_model', 'like', '%' . request('search') . '%')
            ->orWhere('model_type', 'like', '%' . request('search') . '%')
            ->orWhere('price', 'like', '%' . request('search') . '%')
            ->orWhere('status', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'vehicles' => $vehicle,
            'vehicle_count' => $vehicle->count()
        ]);

    }

    public function getVehicleAvailable() 
    {
        $vehicle = Vehicle::where('status', '=', 'Available')->when(request('search'), function($query) {
            $query->where('brand_name', 'like', '%' . request('search') . '%')
            ->orWhere('year_model', 'like', '%' . request('search') . '%')
            ->orWhere('model_type', 'like', '%' . request('search') . '%')
            ->orWhere('price', 'like', '%' . request('search') . '%')
            ->orWhere('status', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'vehicles' => $vehicle,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
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
                'thumbnail' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);      

        if ($request->hasFile('image')) {

            $images = [];

            foreach ($request->file('image') as $file) {

            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = public_path('images/');
            $file->move($destinationPath, $filename);
            $images[] = $filename;
            
            } 

        } 

        $imageArray = json_encode($images);

        $vehicle = new Vehicle();
        $vehicle->brand_name = $validateData['brand_name'];
        $vehicle->year_model = $validateData['year_model'];
        $vehicle->model_type = $validateData['model_type'];
        $vehicle->body_type = $validateData['body_type'];
        $vehicle->mileage = $validateData['mileage'];
        $vehicle->fuel_type = $validateData['fuel_type'];
        $vehicle->transmission = $validateData['transmission'];
        $vehicle->drive_type = $validateData['drive_type'];
        $vehicle->color = $validateData['color'];
        $vehicle->interior_color = $validateData['interior_color'];
        $vehicle->engine = $validateData['engine'];
        $vehicle->features = $validateData['features'];
        $vehicle->vehicle_overview = $validateData['vehicle_overview'];
        $vehicle->price = $validateData['price'];
        $vehicle->image = $imageArray;

        if($request->hasFile('thumbnail')) {


            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = public_path('images/');
            $file->move($destinationPath, $filename);
            $vehicle->thumbnail = $filename;
        }

        $vehicle->save();

        return response()->json([
            'status_code' => (bool) $vehicle,
            'message' => 'Vehicle has successfully saved', 
            'data' => $vehicle
        ]);
    }

    public function show(Vehicle $vehicle)
    {

        $vehicle->image = json_decode($vehicle->image);

        return response()->json($vehicle,200);
    
    }

    public function uploadVehicle(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        if($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = public_path('images/');
            $file->move($destinationPath, $filename);
            return response()->json($filename);
        }

    }

    public function uploadMultipleVehicle(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {

            $images = [];

            foreach ($request->file('image') as $file) {

            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = public_path('images/');
            $file->move($destinationPath, $filename);
            $images[] = $filename;
            return response(json_encode($images));
            
        } 
        
        } 
        
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
                'thumbnail',
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

    }
}
