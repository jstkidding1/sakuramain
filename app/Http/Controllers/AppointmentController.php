<?php

namespace App\Http\Controllers;

use App\Appointment;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{

    public function index()
    {
        return response()->json(Appointment::with(['user', 'service'])->get(), 200);
        // return Appointment::whereHas(['user', 'service'], request('search', function($query)) {) 
        //     $query->where('fname', 'like', '%' . request('search') . '%');
        // })->orderBy('id', 'desc')->paginate(10);
        

    }

    public function setAppointment(Appointment $appointment)
    {
        $appointment->is_approved = true;
        $status = $appointment->save();

        return response()->json([
            'status' => $status,
            'data' => $appointment,
            'message' => $status ? 'Appointment Sent' : 'Error Sending Appointment'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_num' => 'required',
            'address' => 'required',
        ]);

        $appointment = Appointment::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service,
            'date' => $request->date,
            'time' => $request->time,
            'contact_num' => $request->contact_num,
            'address' => $request->address,
        ]);

        return response()->json([
            'status' => (bool) $appointment,
            'data' => $appointment,
            'message' => $appointment ? 'Appointment Created' : 'Error Creating Appointment'
        ]);
    }

    public function show(Appointment $appointment)
    {
        // return response()->json($appointment, 200);
        return response()->json($appointment->load(['user', 'service'], 200));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $status = $appointment->update(
            $request->only(['status'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Appointment Updated' : 'Error Updating Appointment'
        ]);
    }

    public function destroy(Appointment $appointment)
    {
        $status = $appointment->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Appointment Deleted' : 'Error Deleting Appointment'
        ]);
    }
}
