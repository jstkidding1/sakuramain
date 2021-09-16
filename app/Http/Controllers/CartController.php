<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $product_id = $request->product_id;
        $user_id = Auth::id();
        $quantity = 1;
        $product = Product::find($product_id)->first();

        return response()->json([
            'data' => [$product, $quantity]
            // 'product' => $product,
            // 'quantity' => $quantity
        ]);
    }

    public function show(Cart $cart)
    {
        //
    }

    public function update(Request $request, Cart $cart)
    {
        //
    }

    public function destroy(Cart $cart)
    {
        //
    }
}
