<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        if($request->has('search')) {

            $order = Order::with(['user', 'product'])->whereHas('user', function($query) use($request) {
                $query->where('fname', 'like', '%' . $request->search . '%')
                ->orWhere('mname', 'like', '%' . $request->search . '%')
                ->orWhere('lname', 'like', '%' . $request->search . '%')
                ->orWhere('contact_num', 'like', '%' . $request->search . '%');
            })->orWhereHas('product', function($query) use($request) {
                $query->where('product_name', 'like', '%' . $request->search . '%')
                ->orWhere('product_brand', 'like', '%' . $request->search . '%')
                ->orWhere('product_model', 'like', '%' . $request->search . '%');
            })->orWhere('status', 'like', '%' . $request->search . '%')
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

    public function deliverOrder(Request $request, Order $order)
    {
        $product = Product::where('id', $request->product_id)->get();

        if ($product[0]->units < $request->quantity) {
            throw ValidationException::withMessages([
                'message' => ['The requested order exceeds product quantity.']
            ]);
        } else {
            $order->is_delivered = true;
            $status = $order->update();

            $product = DB::table('orders')
                ->join('products', 'orders.product_id', 'products.id')
                ->decrement('products.units', (int) $request->quantity);
    
                return response()->json([
                    'order_deduct' => $product,
                    'status' => $status,
                    'message' => $status ? 'Order Delivered' : 'Error Delivering Order'
                ]);
        }

        // $order->is_delivered = true;
        // $status = $order->update();

        // return response()->json([
        //     'status' => $status,
        //     'data' => $order,
        //     'message' => $status ? 'Order Delivered' : 'Error Delivering Order'
        // ]);
    }

    public function deliverCancel(Order $order)
    {
        $order->is_delivered = false;
        $status = $order->update();

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

        $order = Order::create([
            'product_id' => $request->product,
            'user_id' => Auth::id(),
            'delivery_option' => $request->delivery_option,
            'quantity' => $request->quantity,
            'region' => $request->region,
            'province' => $request->province,
            'city' => $request->city,
            'barangay' => $request->barangay,
            'postal_code' => $request->postal_code,
            'street_name' => $request->street_name,
            'building' => $request->building,
            'house_num' => $request->house_num,
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
    }

    public function sendRemarks(Request $request, Order $order)
    {
        $status = $order->update(
            $request->only(['remarks', 'status'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Order Updated' : 'Error Updating Error'
        ]);
    }

    public function update(Request $request, Order $order)
    {
        
        $status = $order->update(
            $request->only(['quantity', 'status', 'remarks'])
        );

        // $product = Product::where('id', $request->product_id)->get();

        // if ($product[0]->units < $request->quantity) {
        //     throw ValidationException::withMessages([
        //         'message' => ['The requested order exceeds product quantity.']
        //     ]);
        // } 

        // $product = DB::table('orders')
        //     ->join('products', 'orders.product_id', 'products.id')
        //     ->decrement('products.units', (int) $request->quantity);

        //     return response()->json([
        //         'order_deduct' => $product,
        //         'status' => $status,
        //         'message' => $status ? 'Order Updated' : 'Error Updating Error'
        //     ]);
        
        
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
