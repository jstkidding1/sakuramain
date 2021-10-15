<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {

            $vehicle = Vehicle::where('archive', '=', false)->with('category')->whereHas('category', function($query) use($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })->orWhere('brand_name', 'like', '%' . request('search') . '%')
            ->orWhere('year_model', 'like', '%' . request('search') . '%')
            ->orWhere('model_type', 'like', '%' . request('search') . '%')
            ->orWhere('price', 'like', '%' . request('search') . '%')
            ->orWhere('status', 'like', '%' . request('search') . '%')
            ->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'vehicles' => $vehicle,
                'vehicle_count' => $vehicle->count()
            ]);

        } else {

            $vehicle = Vehicle::where('archive', '=', false)->with('category')->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'vehicles' => $vehicle,
                'vehicle_count' => $vehicle->count()
            ]);

        }
    }

    public function getVehicleAvailable(Request $request) 
    {
        if ($request->has('search')) {

            $vehicle = Vehicle::where([['status', '=', 'Available'], ['archive', '=', false]])->with('category')->whereHas('category', function($query) use($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })->orWhere('brand_name', 'like', '%' . request('search') . '%')
            ->orWhere('year_model', 'like', '%' . request('search') . '%')
            ->orWhere('model_type', 'like', '%' . request('search') . '%')
            ->orWhere('price', 'like', '%' . request('search') . '%')
            ->orWhere('status', 'like', '%' . request('search') . '%')
            ->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'vehicles' => $vehicle,
            ]);

        } else {

            $vehicle = Vehicle::where([['status', '=', 'Available'], ['archive', '=', false]])->with('category')->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'vehicles' => $vehicle,
            ]);

        }
    }

    public function archiveVehicle(Vehicle $vehicle)
    {
        $vehicle->archive = true;
        $status = $vehicle->save();

        return response()->json([
            'status' => $status,
            'data' => $vehicle,
            'message' => $status ? 'Vehicle Archived' : 'Error Archiving'
        ]);
    }

    public function unarchiveVehicle(Vehicle $vehicle)
    {
        $vehicle->archive = false;
        $status = $vehicle->save();

        return response()->json([
            'status' => $status,
            'data' => $vehicle,
            'message' => $status ? 'Vehicle Archived' : 'Error Archiving'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
                'category_id' => 'required|exists:categories,id',
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
                'vehicle_overview' => 'required',
                'price' => 'required|numeric|min:1|regex:/^([0-9\s\-\+\(\)]*)$/',
                'thumbnail' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,jpg,png|max:2048'
        ], [
            'exists' => 'The car category is required.'
        ]);      

        if ($request->hasFile('image')) {

            $files = [];

            foreach ($request->file('image') as $file) {

            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = public_path('images/');
            $file->move($destinationPath, $filename);
            $files[] = $filename;
            
            } 

        } 

        $imageArray = json_encode($files);

        $vehicle = new Vehicle();
        $vehicle->category_id = $validateData['category_id'];
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

        return response()->json($vehicle->load('category'),200);
    
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

    public function uploadMultipleVehicle(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $files = json_decode($vehicle->image, true);

        if ($request->hasFile('image')) {

            foreach ($request->file('image') as $file) {

            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = public_path('images/');
            $file->move($destinationPath, $filename);
            $files[] = $filename;
            return response(json_encode($files));
            
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
            'vehicle_overview' => 'required',
            'price' => 'required|numeric|min:1|regex:/^([0-9\s\-\+\(\)]*)$/',
            'status' => 'required'
        ]);

        $status = $vehicle->update(
            $request->only([
                'category_id',
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
