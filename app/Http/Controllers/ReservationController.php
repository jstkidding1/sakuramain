<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Auth;

class ReservationController extends Controller
{

    public function index()
    {
        return response()->json(Reservation::with(['user', 'vehicle'])->get(), 200);
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
            'contact_num' => 'required',
            'comments' => 'required'
        ]);

        $reservation = Reservation::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => Auth::id(),
            'address' => $request->address,
            'contact_num' => $request->contact_num,
            'comments' => $request->comments
        ]);

        return response()->json([
            'status' => (bool) $reservation,
            'message' => 'Successfully Reserved.',
            'data' => $reservation, 
        ]);
    }

    public function show(Reservation $reservation)
    {
        return response()->json($reservation, 200);
    }

    public function edit(Reservation $reservation)
    {
        //
    }

    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    public function destroy(Reservation $reservation)
    {
        //
    }
}
