<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::when(request('search'), function($query) {
            $query->where('product_name', 'like', '%' . request('search') . '%')
            ->orWhere('product_model', 'like', '%' . request('search') . '%')
            ->orWhere('product_brand', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'products' => $product,
            'products_count' => $product->count()
        ]);
    }

    public function getAvailableProducts()
    {
        $product = Product::where('units', '>=', '1')->when(request('search'), function($query) {
            $query->where('product_name', 'like', '%' . request('search') . '%')
            ->orWhere('product_model', 'like', '%' . request('search') . '%')
            ->orWhere('product_brand', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'products' => $product,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'product_brand' => 'required',
            'product_model' => 'required',
            'description' => 'required',
            'units' => 'required|numeric|min:1|regex:/^([0-9\s\-\+\(\)]*)$/',
            'price' => 'required|numeric|min:1|regex:/^([0-9\s\-\+\(\)]*)$/',
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        $product = new Product();
        $product->product_name = $validateData['product_name'];
        $product->product_brand = $validateData['product_brand'];
        $product->product_model = $validateData['product_model'];
        $product->description = $validateData['description'];
        $product->units = $validateData['units'];
        $product->price = $validateData['price'];


        if($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = public_path('images/');
            $file->move($destinationPath, $filename);
            $product->image = $filename;
            
        }

        $product->save();

        return response()->json([
            'status' => (bool) $product,
            'data' => $product,
            'message' => $product ? 'Product Created.' : 'Error Creating Product'
        ]);
    }

    public function uploadProduct(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048',
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

    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    public function update(Request $request, Product $product)
    {        
        $request->validate([
            'product_name' => 'required|max:255',
            'product_brand' => 'required',
            'product_model' => 'required',
            'units' => 'required|numeric|min:1|regex:/^([0-9\s\-\+\(\)]*)$/',
            'price' => 'required|numeric|min:1|regex:/^([0-9\s\-\+\(\)]*)$/',
            'description' => 'required',
        ]);

        $status = $product->update(
            $request->only([
                'product_name', 
                'product_brand', 
                'product_model', 
                'units',
                'price',
                'description',
                'status',
                'image'
            ])
        );

        return response()->json([
            'status' => 200,
            'message' => $status ? 'Product Updated' : 'Error Updating Product',
            'data' => $status
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
