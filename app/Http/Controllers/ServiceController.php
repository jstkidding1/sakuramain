<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{

    public function index()
    {
        $service = Service::when(request('search'), function($query) {
            $query->where('service_name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'services' => $service,
            'service_count' => $service->count()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'service_name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        $service = new Service();
        $service->service_name = $validateData['service_name'];
        $service->description = $validateData['description'];

        if($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = ('images/');
            $file->move($destinationPath, $filename);
            $service->image = $filename;
            
        }

        $service->save();

        return response()->json([
            'status' => (bool) $service,
            'data' => $service,
            'message' => $service ? 'Service Created' : 'Error Creating'
        ]);
    }

    public function show(Service $service)
    {
        return response()->json($service, 200);
    }

    public function uploadService(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        if($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = ('images/');
            $file->move($destinationPath, $filename);
            return response()->json($filename);
            
        }
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required',
            // 'description' => 'required'
        ]);

        $status = $service->update(
            $request->only([
                'service_name', 
                'description', 
                'status',
                'image'
            ])
        );
        
        return response()->json([
            'status_code' => 200,
            'message' => 'Service Updated Successfully',
        ]);
    }

    public function getAvailableServices()
    {
        $service = Service::where('status', 'Available')->when(request('search'), function($query) {
            $query->where('service_name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'services' => $service,
        ]);
    }

    public function destroy(Service $service)
    {
        $status = $service->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Service Deleted.' : 'Error Deleting Service'
        ]);
    }
}
