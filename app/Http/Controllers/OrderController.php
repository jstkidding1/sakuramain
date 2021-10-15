<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use DB;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        if($request->has('search')) {

            $order = Order::with(['user', 'product'])->whereHas('user', function($query) use($request) {
                $query->where('fname', 'like', '%' . $request->search . '%')
                ->orWhere('mname', 'like', '%' . $request->search . '%')
                ->orWhere('lname', 'like', '%' . $request->search . '%');  
            })->orWhereHas('product', function($query) use($request) {
                $query->where('product_name', 'like', '%' . $request->search . '%')
                ->orWhere('product_brand', 'like', '%' . $request->search . '%')
                ->orWhere('product_model', 'like', '%' . $request->search . '%');
            })->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhere('contact_num', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'orders' => $order,
                'order_count' => $order->count()
            ]);

        } else {

            $order = Order::with(['user', 'product'])->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'orders' => $order,
                'order_count' => $order->count()
            ]);
        }

    }

    public function deliverOrder(Order $order)
    {
        $order->is_delivered = true;
        $status = $order->save();

        return response()->json([
            'status' => $status,
            'data' => $order,
            'message' => $status ? 'Order Delivered' : 'Error Delivering Order'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'delivery_option' => 'required|bool',
            'contact_num' => 'required',
            'quantity' => 'required|numeric|gt:0',
            'region' => 'exclude_if:delivery_option,false|required|string',
            'province' => 'exclude_if:delivery_option,false|required|string',
            'city' => 'exclude_if:delivery_option,false|required|string',
            'barangay' => 'exclude_if:delivery_option,false|required|string',
            'postal_code' => 'exclude_if:delivery_option,false|required|string',
            'street_name' => 'exclude_if:delivery_option,false|required|string',
            'building' => 'exclude_if:delivery_option,false|required|string',
            'house_num' => 'exclude_if:delivery_option,false|required|string',
        ]);

        $order = new Order();
        $order->product_id = $request->product;
        $order->user_id = Auth::id();
        $order->delivery_option = $request->delivery_option;
        $order->contact_num = $request->contact_num;
        $order->quantity = $request->quantity;
        $order->region = $request->region;
        $order->province = $request->province;
        $order->city = $request->city;
        $order->barangay = $request->barangay;
        $order->postal_code = $request->postal_code;
        $order->street_name = $request->street_name;
        $order->building = $request->building;
        $order->house_num = $request->house_num;

        $order->save();

        return response()->json([
            'status' => (bool) $order,
            'data' => $order,
            'message' => $order ? 'Order Created' : 'Error Creating Order'
        ]);
    }

    public function show(Order $order)
    {
        return response()->json($order->load(['user', 'product']), 200);
    }


    public function update(Request $request, Order $order)
    {
        $status = $order->update(
            $request->only(['quantity', 'status'])
        );

        $product = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.status', '=', 'Preparing')
        ->decrement('products.units', (int) $request->quantity);

        return response()->json([
            'effect' => $product,
            'status' => $status,
            'message' => $status ? 'Order Updated' : 'Error Updating Error'
        ]);
    }

    public function destroy(Order $order)
    {
        $status = $order->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Order Deleted' : 'Error Deleting Order'
        ]);
    }
}
