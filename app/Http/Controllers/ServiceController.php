<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        return Service::when(request('search'), function($query) {
            $query->where('service_name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|unique:services|max:255',
            'description' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048'
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

    public function uploadService(Request $request)
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
                'status',
                'image'
            ])
        );
        
        return response()->json([
            'status_code' => 200,
            'message' => 'Service Updated Successfully',
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
