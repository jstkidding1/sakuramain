<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        // return response()->json(Gallery::all(), 200);
        return Gallery::when(request('search'), function($query) {
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('date', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = date('mdYHis'). uniqid();
            $desinationPath = public_path(). '/images';
            $image->move($desinationPath, $imageName);
        }

        $gallery = Gallery::create([
            'image' => env('APP_URL'). 'images/'. $imageName,
            'name' => $request->name,
            'date' => $request->date,
            'description' => $request->description
        ]);

        return response()->json([
            'status' => (bool) $gallery,
            'data' => $gallery,
            'message' => $gallery ? 'Gallery Created.' : 'Error Creating Gallery'
        ]);
    }

    public function uploadGallery(Request $request)
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

    public function show(Gallery $gallery)
    {
        return response()->json($gallery, 200);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $status = $gallery->update(
            $request->only([
                'name',
                'description',
                'image'
            ])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Gallery Updated' : 'Error Updating Gallery'
        ]);
    }

    public function destroy(Gallery $gallery)
    {
        $status = $gallery->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Gallery Deleted.' : 'Error Deleting Gallery'
        ]);
    }
}
