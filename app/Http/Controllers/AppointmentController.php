<?php

namespace App\Http\Controllers;

use App\Appointment;
use Auth;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {
        return response()->json(Appointment::with(['user', 'service'])->get(), 200);
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
            'date' => 'required',
            'contact_num' => 'required',
            'address' => 'required'
        ]);

        $appointment = Appointment::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service,
            'date' => $request->date,
            'contact_num' => $request->contact_num,
            'address' => $request->address
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
        //
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
