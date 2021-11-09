<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Auth;

class AddressController extends Controller
{
    public function index()
    {
        $address = Address::when(request('search'), function($query) {
            $query->where('address', 'like', '%' . request('search') . '%')
            ->orWhere('contact_num', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'address' => $address,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'contact_num' => 'required',
        ]);

        $location = new Address();
        $location->user_id = Auth::id();
        $location->address = $request['address'];
        $location->contact_num = $request['contact_num'];

        
        $location->save();

        return response()->json([
            'status' => (bool) $location,
            'data' => $location,
            'message' => $location ? 'Address Created.' : 'Error Creating Address'
        ]);
    }

    public function show(Address $address)
    {
        return response()->json($address, 200);
    }

    public function update(Request $request, Address $address)
    {
        $request->validate([
            'address' => 'required',
            'contact_num' => 'required',
        ]);

        $status = $address->update(
            $request->only([
                'address',
                'contact_num'
            ])
        );

        return response()->json([
            'status' => 200,
            'message' => $status ? 'Address Updated' : 'Error Updating Address',
            'data' => $status
        ]);
    }

    public function destroy(Address $address)
    {
        $status = $address->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Address Deleted.' : 'Error Deleting Address'
        ]);
    }
}
