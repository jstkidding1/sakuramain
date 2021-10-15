<?php

namespace App\Http\Controllers;

use App\Appointment;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{

    public function index(Request $request)
    {
        
        if ($request->has('search')) {

            $appointment = Appointment::with(['user', 'service'])->whereHas('user', function($query) use($request) {
                $query->where('fname', 'like', '%' . $request->search . '%')
                ->orWhere('mname', 'like', '%' . $request->search . '%')
                ->orWhere('lname', 'like', '%' . $request->search . '%');
            })->orWhereHas('service', function($query) use($request) {
                $query->where('service_name', 'like', '%' . $request->search . '%');
            })->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhere('contact_num', 'like', '%' . $request->search . '%')
            ->orWhere('time', 'like', '%' . $request->search . '%')
            ->orWhere('date', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

            return response()->json([
                'appointments' => $appointment,
                'appointment_count' => $appointment->count()
            ]);

        } else {
            
            $appointment = Appointment::with(['user', 'service'])->orderBy('id', 'desc')->paginate(10); 

            return response()->json([
                'appointments' => $appointment,
                'appointment_count' => $appointment->count()
            ]);

        }

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
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'address' => 'required',
            'date' => 'required',
            'time' => 'required',
            'car_model' => 'required',
            'plate_number' => 'required',
            'engine_number' => 'required',
            'chassis_number' => 'required',
            'message' => 'required',
        ]);

        $appointment = Appointment::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service,
            'date' => $request->date,
            'time' => $request->time,
            'contact_num' => $request->contact_num,
            'address' => $request->address,
            'car_model' => $request->car_model,
            'plate_number' => $request->plate_number,
            'engine_number' => $request->engine_number,
            'chassis_number' => $request->chassis_number,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => (bool) $appointment,
            'data' => $appointment,
            'message' => $appointment ? 'Appointment Created' : 'Error Creating Appointment'
        ]);
    }

    public function show(Appointment $appointment)
    {
        return response()->json($appointment->load(['user', 'service'], 200));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $status = $appointment->update(
            $request->only([
                'status', 
                'start_time', 
                'end_time'
            ])
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
