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
            'address' => 'required',
            'contact_num' => 'required',
        ]);

        $order = new Order();
        $order->product_id = $request->product;
        $order->user_id = Auth::id();
        $order->address = $request->address;
        $order->contact_num = $request->contact_num;
        $order->quantity = $request->quantity;

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
