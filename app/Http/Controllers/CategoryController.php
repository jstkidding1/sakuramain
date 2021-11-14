<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('archive', '=', false)->when(request('search'), function($query) {
            $query->where('name', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return response()->json(['category' => $category]);
    }

    public function getCategory() 
    {
        $category = Category::all();
        return response()->json(['category' => $category]);
    }

    public function archiveCategory(Category $category)
    {
        $category->archive = true;
        $status = $category->save();

        return response()->json([
            'status' => $status,
            'data' => $category,
            'message' => $status ? 'Category Archived' : 'Error Archiving'
        ]);
    }

    public function unarchiveCategory(Category $category)
    {
        $category->archive = false;
        $status = $category->save();

        return response()->json([
            'status' => $status,
            'data' => $category,
            'message' => $status ? 'Category Archived' : 'Error Archiving'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        $category = new Category();
        $category->name = $request['name'];
        
        if($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = public_path('storage/images/');
            $file->move($destinationPath, $filename);
            $category->image = $filename;
            
        }

        $category->save();

        return response()->json([
            'status' => (bool) $category,
            'data' => $category,
            'message' => $category ? 'Category Created.' : 'Error Creating Category'
        ]);
    }

    public function uploadBrand(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        if($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = public_path('images/');
            $file->move($destinationPath, $filename);
            return response()->json($filename);
            
        }
    }

    public function show(Category $category)
    {
        return response()->json($category, 200);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            // 'image' => 'required|file|mimes:jpeg,jpg,png|max:2048' 
        ]);

        $status = $category->update(
            $request->only([
                'name',
                'image'
            ])
        );

        return response()->json([
            'status' => 200,
            'message' => $status ? 'Category Updated' : 'Error Updating Category',
            'data' => $status
        ]);
    }

    public function destroy(Category $category)
    {
        $status = $category->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Category Deleted.' : 'Error Deleting Category'
        ]);
    }
}
