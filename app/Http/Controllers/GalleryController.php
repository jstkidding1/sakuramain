<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return response()->json(Gallery::all(), 200);
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
                'description'
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
