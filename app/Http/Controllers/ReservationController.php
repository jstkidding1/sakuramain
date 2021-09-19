<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Nexmo\Laravel\Facade\Nexmo;
use App\Http\Requests\ReservationPostRequest;

class ReservationController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) {

            return Reservation::with(['user', 'vehicle'])->whereHas('user', function($query) use($request) {
                $query->where('fname', 'like', '%' . $request->search . '%')
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

        } else {
            
            return Reservation::with(['user', 'vehicle'])->orderBy('id', 'desc')->paginate(10); 

        }
        // return response()->json(Reservation::with(['user', 'vehicle'])->get(), 200);
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

    public function hasSMS($contact) {

        Nexmo::message()->send([
            'to' => '63'.$contact,
            'from' => '16105552344',
            'text' => 'You have successfully reserved. Wait for our staff to contact you.'
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

    public function update(Request $request, Reservation $reservation)
    {
        $status = $reservation->update(
            $request->only('status')
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
