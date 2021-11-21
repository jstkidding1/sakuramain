<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Reservation;
use App\Appointment;
use App\Quote;
use App\Inquiry;
use App\Test;
use App\Vehicle;
use App\Product;
use App\Service;
use App\Gallery;
use App\Contact;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use Auth;
use Hash;
use DB;

class UserController extends Controller
{
    public function showReservations(Request $request, User $user)
    {
        if($request->has('search')) {

            return $user->reservations()->with('vehicle')->whereHas('vehicle', function($query) use($request) {
                $query->where('brand_name', 'like', '%' . $request->search . '%')
                ->orWhere('year_model', 'like', '%' . $request->search . '%')
                ->orWhere('model_type', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%');
            })->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhere('contact_num', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

        } else {

            return $user->reservations()->with('vehicle')->orderBy('id', 'desc')->paginate(10);

        }
    }

    public function showOrders(Request $request, User $user)
    {
        if($request->has('search')) {

            return $user->orders()->with('product')->whereHas('product', function($query) use($request) {
                $query->where('product_name', 'like', '%' . $request->search . '%')
                ->orWhere('product_brand', 'like', '%' . $request->search . '%')
                ->orWhere('product_model', 'like', '%' . $request->search . '%');
            })->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhere('contact_num', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

        } else {

            return $user->orders()->with('product')->orderBy('id', 'desc')->paginate(10);

        }
        // return response()->json($user->orders()->with(['product'])->get());
    }

    public function showAppointments(Request $request, User $user)
    {
        if($request->has('search')) {

            return $user->appointments()->with('service')->whereHas('service', function($query) use($request) {
                $query->where('service_name', 'like', '%' . $request->search . '%');
            })->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhere('contact_num', 'like', '%' . $request->search . '%')
            ->orWhere('date', 'like', '%' . $request->search . '%')
            ->orWhere('time', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

        } else {

            return $user->appointments()->with('service')->orderBy('id', 'desc')->paginate(10);

        }
    }

    public function showInquiry(Request $request, User $user)
    {
        if($request->has('search')) {

            return $user->inquiries()->with('vehicle')->whereHas('vehicle', function($query) use($request) {
                $query->where('brand_name', 'like', '%' . $request->search . '%')
                ->orWhere('year_model', 'like', '%' . $request->search . '%')
                ->orWhere('model_type', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%');
            })->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhere('contact_num', 'like', '%' . $request->search . '%')
            ->orWhere('purchase_in', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

        } else {

            return $user->inquiries()->with('vehicle')->orderBy('id', 'desc')->paginate(10);

        }
    }

    public function showQuotations(Request $request, User $user)
    {
        if($request->has('search')) {

            return $user->quotes()->with('vehicle')->whereHas('vehicle', function($query) use($request) {
                $query->where('brand_name', 'like', '%' . $request->search . '%')
                ->orWhere('year_model', 'like', '%' . $request->search . '%')
                ->orWhere('model_type', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%');
            })->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhere('contact_num', 'like', '%' . $request->search . '%')
            ->orWhere('purchase_in', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

        } else {

            return $user->quotes()->with('vehicle')->orderBy('id', 'desc')->paginate(10);

        }
    }

    public function showRequests(Request $request, User $user)
    {
        if($request->has('search')) {

            return $user->tests()->with('vehicle')->whereHas('vehicle', function($query) use($request) {
                $query->where('brand_name', 'like', '%' . $request->search . '%')
                ->orWhere('year_model', 'like', '%' . $request->search . '%')
                ->orWhere('model_type', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%');
            })->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhere('contact_num', 'like', '%' . $request->search . '%')
            ->orWhere('purchase_in', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(10);

        } else {

            return $user->tests()->with('vehicle')->orderBy('id', 'desc')->paginate(10);
            
        }
    }

    public function userPurchases(User $user)
    {   
        return response()->json($user->load(['reservations', 'inquiries', 'tests', 'orders', 'appointments']), 200);
    }

    public function countAllData()
    {
        $user = User::count();
        $vehicle = Vehicle::count();
        $product = Product::count();
        $gallery = Gallery::count();
        $service = Service::count();
        $order = Order::count();
        $reservation = Reservation::count();
        $appointment = Appointment::count();
        $inquiry = Inquiry::count();
        $request = Test::count();
        $contact = Contact::count();

        return response()->json([
            'user' => $user,
            'vehicle' => $vehicle,
            'product' => $product,
            'gallery' => $gallery,
            'service' => $service,
            'order' => $order,
            'reservation' => $reservation,
            'appointment' => $appointment,
            'inquiry' => $inquiry,
            'request' => $request,
            'contact' => $contact
        ]);
    }

    public function weeklyOrderReport()
    {
        $weeks = [
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
            'Sunday' => 0,
        ];

        $sales = Order::where('status', 'Delivered')->get();

        foreach ($sales as $sale) {
            $daily = new Carbon($sale->created_at);

            if($daily->week == Carbon::now()->week) {
                $weeks[$daily->isoFormat('dddd')] += $sale->quantity;
            }
        }

        return response()->json($weeks);
    }

    public function monthlyOrderReport()
    {
        $days = ['1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0,
        '6' => 0, '7' => 0, '8' => 0, '9' => 0, '10' => 0, '11' => 0,
        '12' => 0, '13' => 0, '14' => 0, '15' => 0, '16' => 0, '17' => 0,
        '18' => 0, '19' => 0, '20' => 0, '11' => 0, '22' => 0, '23' => 0,
        '24' => 0, '25' => 0, '26' => 0, '27' => 0, '28' => 0, '29' => 0,
        '30' => 0, '31' => 0
        ];

        $orders = Order::where('status', 'Delivered')->get();

        foreach ($orders as $order) {
            $day = new Carbon($order->created_at);

            if($day->month == Carbon::now()->month) {
                $days[$day->format('d')] += $order->count();
            }
        }

        return response()->json($days);
    }

    public function yearlyOrderReport()
    {
        $months = [
            'January' => 0, 
            'February' => 0, 
            'March' => 0, 
            'April' => 0, 
            'May' => 0, 
            'June' => 0, 
            'July' => 0, 
            'August' => 0, 
            'September' => 0, 
            'October' => 0, 
            'November' => 0, 
            'December' => 0,
        ];

        $sales = Order::where('status', 'Delivered')->get();

        foreach ($sales as $sale) {
            $month = new Carbon($sale->created_at);

            if($month->year == Carbon::now()->year) {
                $months[$month->format('F')] += $sale->quantity;
            }
        }

        return response()->json($months);
    }

    public function weeklyReservationReport()
    {
        $weeks = [
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
            'Sunday' => 0,
        ];

        $reservations = Reservation::where('status', 'Reserved')->get();

        foreach ($reservations as $reservation) {
            $daily = new Carbon($reservation->created_at);

            if($daily->week == Carbon::now()->week) {
                $weeks[$daily->isoFormat('dddd')] += $reservation->count();
            }
        }

        return response()->json($weeks);
    }

    public function monthlyReservationChart()
    {
        $days = ['1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0,
        '6' => 0, '7' => 0, '8' => 0, '9' => 0, '10' => 0, '11' => 0,
        '12' => 0, '13' => 0, '14' => 0, '15' => 0, '16' => 0, '17' => 0,
        '18' => 0, '19' => 0, '20' => 0, '11' => 0, '22' => 0, '23' => 0,
        '24' => 0, '25' => 0, '26' => 0, '27' => 0, '28' => 0, '29' => 0,
        '30' => 0, '31' => 0
        ];

        $reservations = Reservation::where('status', 'Reserved')->get();

        foreach ($reservations as $reservation) {
            $day = new Carbon($reservation->created_at);

            if($day->month == Carbon::now()->month) {
                $days[$day->format('d')] += $reservation->count();
            }
        }

        return response()->json($days);
    }

    public function yearlyReservationChart()
    {
        $months = [
            'January' => 0, 
            'February' => 0, 
            'March' => 0, 
            'April' => 0, 
            'May' => 0, 
            'June' => 0, 
            'July' => 0, 
            'August' => 0, 
            'September' => 0, 
            'October' => 0, 
            'November' => 0, 
            'December' => 0,
        ];

        $reservations = Reservation::where('status', 'Reserved')->get();

        foreach ($reservations as $reservation) {
            $month = new Carbon($reservation->created_at);

            if($month->year == Carbon::now()->year) {
                $months[$month->format('F')] += $reservation->count();
            }
        }

        return response()->json($months);
    }

    public function resetPass(Request $request, User $user)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        if (Hash::check($request->old_password, $user->password)) { 

            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
            
            return response()->json('Password changed successfully', 200);
        }
        return response()->json(['errors' => ['old_password' => ['The old password does not match our records.']]], 422);
    }

    public function viewReservation(Reservation $reservation)
    {
        return response()->json($reservation->load(['user', 'vehicle']), 200);
    }

    public function viewQuotation(Quote $quote)
    {
        return response()->json($quote->load(['user', 'vehicle']), 200);
    }
    
    public function viewInquiry(Inquiry $inquiry)
    {
        return response()->json($inquiry->load(['user', 'vehicle']), 200);
    }

    public function viewRequest(Test $test)
    {
        return response()->json($test->load(['user', 'vehicle']), 200);
    }

    public function viewOrder(Order $order)
    {
        return response()->json($order->load(['user', 'product']), 200);
    }

    public function viewAppointment(Appointment $appointment)
    {
        return response()->json($appointment->load(['user', 'service']), 200);
    }

    public function index(Request $request)
    {
        
        $user = User::when(request('search'), function($query) {
            $query->where('fname', 'like', '%' . request('search') . '%')
                ->orWhere('lname', 'like', '%' . request('search') . '%')
                ->orWhere('mname', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'user' => $user,
            'user_count' => $user->count()
        ]);
    }

    public function uploadImage(Request $request, User $user)
    {

        $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = ('images/');
            $file->move($destinationPath, $filename);
            return response()->json($filename);
        }

    }

    public function adminUpdateUser(Request $request, User $user) 
    {   
        $role = $request->input('role');

        if($role == 'Administrator') {
            $user->Admin = true;
            $user->Secretary = false;
            $user->Manager = false;
            $user->Customer = false;
        } else if($role == 'Secretary') {
            $user->Admin = false;
            $user->Secretary = true;
            $user->Manager = false;
            $user->Customer = false;
        } else if($role == 'Managaer') {
            $user->Admin = false;
            $user->Secretary = false;
            $user->Manager = true;
            $user->Customer = false;
        } else if($role == 'Customer') {
            $user->Admin = false;
            $user->Secretary = false;
            $user->Manager = false;
            $user->Customer = true;
        } else {
            $user->Admin = false;
            $user->Secretary = false;
            $user->Manager = false;
            $user->Customer = false;
        }
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->update();

        return response()->json($role, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'address' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->birth_date = $request->birth_date;
        $user->contact_num = $request->contact_num;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->Customer = true;

        if($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = ('images/');
            $file->move($destinationPath, $filename);
            $user->image = $filename;
        }

        if ($user->save()) {
            return response()->json([
                'user' => $user,
                'message' => 'Customer created successfully.',
                'token' => $user->createToken('bigStore')->accessToken, 
                'status_code' => 201
            ], 201);
        } else {
            return response()->json([
                'message' => 'Some error occured, Please try again.',
                'status_code' => 500
            ], 500);
        }
    }

    public function createAdmin(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'address' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->birth_date = $request->birth_date;
        $user->contact_num = $request->contact_num;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->Admin = true;

        if($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = ('images/');
            $file->move($destinationPath, $filename);
            $user->image = $filename;
        }

        if ($user->save()) {
            return response()->json([
                'user' => $user,
                'message' => 'Customer created successfully.',
                'token' => $user->createToken('bigStore')->accessToken, 
                'status_code' => 201
            ], 201);
        } else {
            return response()->json([
                'message' => 'Some error occured, Please try again.',
                'status_code' => 500
            ], 500);
        }
    }

    public function createSecretary(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'address' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->birth_date = $request->birth_date;
        $user->contact_num = $request->contact_num;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->Secretary = true;

        if($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = ('images/');
            $file->move($destinationPath, $filename);
            $user->image = $filename;
        }

        if ($user->save()) {
            return response()->json([
                'user' => $user,
                'message' => 'Secretary created successfully.',
                'token' => $user->createToken('bigStore')->accessToken, 
                'status_code' => 201
            ], 201);
        } else {
            return response()->json([
                'message' => 'Some error occured, Please try again.',
                'status_code' => 500
            ], 500);
        }
    }

    public function createManager(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'address' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->birth_date = $request->birth_date;
        $user->contact_num = $request->contact_num;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->Manager = true;

        if($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $randomFilename = Str::random(20);
            $filename = $randomFilename.'.'.$extension;
            $destinationPath = ('images/');
            $file->move($destinationPath, $filename);
            $user->image = $filename;
        }

        if ($user->save()) {
            return response()->json([
                'user' => $user,
                'message' => 'Manager created successfully.',
                'token' => $user->createToken('bigStore')->accessToken, 
                'status_code' => 201
            ], 201);
        } else {
            return response()->json([
                'message' => 'Some error occured, Please try again.',
                'status_code' => 500
            ], 500);
        }
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'age' => 'nullable|numeric|digits:2',
            'address' => 'required',
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            // 'old_password' => 'required',
            // 'password' => 'required', 'string', 'min:8', 'confirmed'
        ]);

        $status = $user->update(
            $request->only([
                'fname',
                'mname',
                'lname',
                'age',
                'birth_date',
                'contact_num',
                'address',
                'gender',
                'image',
                'status',
                'password',
            ])
        );

        return response()->json([
            'user' => $user,
            'status' => $status,
            'message' => $status ? 'User Updated' : 'Error Updating User'
        ]);
    }

    public function archive(User $user) 
    {
        $user->archive = true;
        $user->update();
        return response()->json($user, 200);
    }

    public function unArchive(User $user) 
    {
        $user->archive = false;
        $user->update();
        return response()->json($user, 200);
    }

    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();

        return response()->json([
            'status' => $user,
            'message' => $user ? 'User Deleted' : 'Error Deleting user'
        ]);
    }
}
