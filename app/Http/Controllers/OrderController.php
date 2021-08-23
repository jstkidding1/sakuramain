<?php

namespace App\Http\Controllers;

use App\Order;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::with(['user', 'product'])->get(), 200);
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

        $order = Order::create([
            'product_id' => $request->product,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'address' => $request->address,
            'contact_num' => $request->contact_num,
        ]);

        return response()->json([
            'status' => (bool) $order,
            'data' => $order,
            'message' => $order ? 'Order Created' : 'Error Creating Order'
        ]);
    }

    public function show(Order $order)
    {
        return response()->json($order->load(['user', 'product']), 200);
        // return response()->json(Order::with(['user', 'product'])->get(), 200);
    }


    public function update(Request $request, Order $order)
    {
        $status = $order->update(
            $request->only(['quantity', 'status'])
        );

        return response()->json([
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
