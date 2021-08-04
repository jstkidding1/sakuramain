<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        return response()->json(Service::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'description' => 'required',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = date('mdYHis'). uniqid();
            $desinationPath = public_path(). '/images';
            $image->move($desinationPath, $imageName);
        }

        $service = Service::create([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'image' => env('APP_URL'). 'images/'. $imageName,
        ]);

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

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required',
            'description' => 'required'
        ]);

        $status = $service->update(
            $request->only([
                'service_name', 
                'description', 
            ])
        );
        
        return response()->json([
            'status_code' => 200,
            'message' => 'Service Updated Successfully',
        ]);
    }

    public function destroy(Service $service)
    {
        // $service = Service::find($id);
        $status = $service->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Service Deleted.' : 'Error Deleting Service'
        ]);
    }
}
