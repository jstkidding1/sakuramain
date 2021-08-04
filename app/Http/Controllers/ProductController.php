<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::when(request('search'), function($query) {
            $query->where('product_name', 'like', '%' . request('search') . '%')
            ->orWhere('product_model', 'like', '%' . request('search') . '%')
            ->orWhere('product_brand', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);
        // return response()->json(Product::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_brand' => 'required',
            'product_model' => 'required',
            'description' => 'required',
            'units' => 'required',
            'price' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = date('mdYHis'). uniqid();
            $desinationPath = public_path(). '/images';
            $image->move($desinationPath, $imageName);
        }

        $product = Product::create([
            'product_name' => $request->product_name,
            'product_brand' => $request->product_brand,
            'product_model' => $request->product_model,
            'description' => $request->description,
            'units' => $request->units,
            'image' => env('APP_URL'). 'images/'. $imageName,
            'price' => $request->price 
        ]);

        return response()->json([
            'status' => (bool) $product,
            'data' => $product,
            'message' => $product ? 'Product Created.' : 'Error Creating Product'
        ]);
    }

    // public function uploadImage(Request $request)
    // {

    //     $request->validate([
    //         'image' => 'required|file|mimes:jpeg,jpg,png|max:2048',
    //     ]);

    //     if($request->hasFile('image')){
    //         $name = time()."_".$request->file('image')->getClientOriginalName();
    //         $request->file('image')->move(public_path('images'), $name);
    //     }
    //     return response()->json(asset("images/$name"),201);
    // }

    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'product_brand' => 'required',
            'product_model' => 'required',
            'units' => 'required',
            'price' => 'required',
        ]);
        
        $status = $product->update(
            $request->only([
                'product_name', 
                'product_brand', 
                'product_model', 
                'units',
                'price',
                'image'
            ])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Updated' : 'Error Updating Product'
        ]);
    }

    public function updateUnits(Request $request, Product $product)
    {
        $product->units = $product->units + $request->get('units');
        $status = $product->save();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Units Added.' : 'Error Add Product Units'
        ]);
    }

    public function destroy(Product $product)
    {
        $status = $product->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Deleted.' : 'Error Deleting Product'
        ]);
    }
}
