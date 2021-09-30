<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Nexmo\Laravel\Facade\Nexmo;
use App\Http\Requests\ReservationPostRequest;
use Illuminate\Support\Str;

class ReservationController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) {

            $reservation = Reservation::with(['user', 'vehicle'])->whereHas('user', function($query) use($request) {
                $query->where(Reservation::raw('CONCAT(fname," ", mname," ",lname)'), 'like', '%' . $request->search . '%')
                ->orWhere(Reservation::raw('CONCAT(fname," ", lname)'), 'like', '%' . $request->search . '%')
                ->orWhere(Reservation::raw('CONCAT(lname," ",fname)'), 'like', '%' . $request->search . '%')
                ->orWhere('fname', 'like', '%' . $request->search . '%')
                ->orWhere('mname', 'like', '%' . $request->search . '%')
                ->orWhere('lname', 'like', '%' . $request->search . '%');
            })->orWhereHas('vehicle', function($query) use($request) {
                $query->where('brand_name', 'like', '%' . $request->search . '%')
                ->orWhere('year_model', 'like', '%' . $request->search . '%')
                ->orWhere('model_type', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%');
            })->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhere('contact_num', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'reservations' => $reservation,
                'reservation_count' => $reservation->count()
            ]);

        } else {
            
            $reservation = Reservation::with(['user', 'vehicle'])->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'reservations' => $reservation,
                'reservation_count' => $reservation->count()
            ]);
        }
    }

    public function reserveCar(Reservation $reservation)
    {
        $reservation->is_approved = true;
        $status = $reservation->save();

        return response()->json([
            'status' => $status,
            'data' => $reservation,
            'message' => $status ? 'Reservation Approved' : 'Error Reservation'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'comments' => 'required',
            'vehicle_id' => 'required|unique:reservations,vehicle_id,NULL,id,user_id,'.\Auth::id(),
        ], [
            'unique' => 'You can only reserve once per vehicle.'
        ]);

        $now = Carbon::now();

            $reservation = Reservation::create([
                'vehicle_id' => $request->vehicle_id,
                'user_id' => Auth::id(),
                'address' => $request->address,
                'contact_num' => $request->contact_num,
                'comments' => $request->comments,
                'date_reserve' => $now->toDateTimeString(),
            ]);

            // $reservation = Nexmo::message()->send([
            //     'to' => '63'.$request->contact_num,
            //     'from' => '447700900000',
            //     'text' => 'You have successfully reserved. Wait for our staff to contact you.'
            // ]);

            return response()->json([
                'status' => (bool) $reservation,
                'message' => 'Successfully Reserved.',
                'data' => $reservation, 
            ]);

    }

    public function show(Reservation $reservation)
    {
        return response()->json($reservation->load(['user', 'vehicle']), 200);
    }

    public function uploadImage(Request $request)
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

    public function update(Request $request, Reservation $reservation)
    {
        $status = $reservation->update(
            $request->only([
                'status',
                'image'
            ])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Reservation Updated' : 'Error Updating Reservation'
        ]);
    }

    public function destroy(Reservation $reservation)
    {
        $status = $reservation->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Reservation Deleted' : 'Error Deleting Reservation'
        ]);
    }
}
