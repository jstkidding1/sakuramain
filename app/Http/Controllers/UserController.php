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
use Auth;
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

    public function chart()
    {
        $getTotalUsers = DB::table('users')->count(); 

        $customer = DB::table('users')->where('Customer', '=', true)->count();
        $admin = DB::table('users')->where('Admin', '=', true)->count();
        $secretary = DB::table('users')->where('Secretary', '=', true)->count();
        $manager = DB::table('users')->where('Manager', '=', true)->count();

        $apporvedAppointment = DB::table('appointments')->where('status', '=', 'Approved')->count();
        $checkedAppointment = DB::table('appointments')->where('status', '=', 'Checked')->count();
        $declinedAppointment = DB::table('appointments')->where('status', '=', 'Declined')->count();
        $pendingAppointment = DB::table('appointments')->where('status', '=', 'Pending')->count();
        $inProgressAppointment = DB::table('appointments')->where('status', '=', 'In Progress')->count();

        $pending = DB::table('reservations')->where('status', '=', 'Pending')->count();
        $reserved = DB::table('reservations')->where('status', '=', 'Reserved')->count();
        $sold = DB::table('reservations')->where('status', '=', 'Sold')->count();
        $declined = DB::table('reservations')->where('status', '=', 'Declined')->count();

        $approveInquiry = DB::table('inquiries')->where('status', '=', 'Approved')->count();
        $pendingInquiry = DB::table('inquiries')->where('status', '=', 'Pending')->count();
        $deniedInquiry = DB::table('inquiries')->where('status', '=', 'Denied')->count();

        $approveRequest = DB::table('tests')->where('status', '=', 'Approved')->count();
        $pendingRequest = DB::table('tests')->where('status', '=', 'Pending')->count();
        $deniedRequest = DB::table('tests')->where('status', '=', 'Denied')->count();

        $approveQuotation = DB::table('quotes')->where('status', '=', 'Approved')->count();
        $pendingQuotation = DB::table('quotes')->where('status', '=', 'Pending')->count();
        $deniedQuotation = DB::table('quotes')->where('status', '=', 'Denied')->count();

        $totalOrders = DB::table('orders')
                        ->join('users', 'orders.user_id', '=', 'users.id')
                        ->join('products', 'orders.product_id', '=', 'products.id')
                        ->where('products.price', 'orders.quantity')->count();

        $labelReservation = 'Reservation';
        $labelPending = 'Pending';
        $labelSold = 'Sold';
        $labelDeclined = 'Declined';
        $labelApprove = 'Approved';
        $labelChecked = 'Checked';
        $labelInProgress = 'In Progress';
        $labelDenied = 'Denied';
        $labelAdmin = 'Admin';
        $labelSecretary = 'Secretary';
        $labelManager = 'Manager';
        $labelCustomer = 'Customer';
        $labelOrders = 'Orders';

        $total = array($totalOrders);

        $roleAdmin = array($admin);
        $roleSecretary = array($secretary);
        $roleManager = array($manager);
        $roleCustomer = array($customer);

        $reservedData = array($reserved);
        $pendingData = array($pending);
        $soldData = array($sold);
        $declinedData = array($declined);

        $approvedAppointmentData = array($apporvedAppointment);
        $checkedAppointmentData = array($checkedAppointment);
        $declinedAppointmentData = array($declinedAppointment);
        $pendingAppointmentData = array($pendingAppointment);
        $inProgressAppointmentData = array($inProgressAppointment);

        $approveInquiryData = array($approveInquiry);
        $pendingInquiryData = array($pendingInquiry);
        $deniedInquiryData = array($deniedInquiry);

        $approveRequestData = array($approveRequest);
        $pendingRequestData = array($pendingRequest);
        $deniedRequestData = array($deniedRequest);

        $approveQuotationData = array($approveQuotation);
        $pendingQuotationData = array($pendingQuotation);
        $deniedQuotationData = array($deniedQuotation);
                
        return response()->json([
            'admin' => $labelAdmin,
            'secretary' => $labelSecretary,
            'manager' => $labelManager,
            'customer' => $labelCustomer,
            'roleAdmin' => $roleAdmin,
            'roleSecretary' => $roleSecretary,
            'roleManager' => $roleManager,
            'roleCustomer' => $roleCustomer,
            'labelReservation' => $labelReservation,
            'labelPending' => $labelPending,
            'labelSold' => $labelSold,
            'labelDeclined' => $labelDeclined,
            'labelApprove' => $labelApprove,
            'labelChecked' => $labelChecked,
            'labelInProgress' => $labelInProgress,
            'labelDenied' => $labelDenied,
            'labelOrders' => $labelOrders,
            'reserved' => $reservedData,
            'pending' => $pendingData,
            'sold' => $soldData,
            'declined' => $declinedData,
            'appointmentDeclined' => $declinedAppointmentData,
            'appointmentApproved' => $approvedAppointmentData,
            'appointmentChecked' => $checkedAppointmentData,
            'appointmentPending' => $pendingAppointmentData,
            'appointmentInProgress' => $inProgressAppointmentData,
            'inquiryApprove' => $approveInquiryData,
            'inquiryPending' => $pendingInquiryData,
            'inquiryDenied' => $deniedInquiryData,
            'requestApprove' => $approveRequestData,
            'requestPending' => $pendingRequestData,
            'requestDenied' => $deniedRequestData,
            'approveQuotation' => $approveQuotationData,
            'pendingQuotation' => $pendingQuotationData,
            'deniedQuotation' => $deniedQuotationData,
            'total' => $getTotalUsers,
        ]);
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
        
        return User::when(request('search'), function($query) {
            $query->where('fname', 'like', '%' . request('search') . '%')
                ->orWhere('lname', 'like', '%' . request('search') . '%')
                ->orWhere('mname', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);

    }

    public function uploadImage(Request $request, User $user)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        if($request->hasFile('image')){
            $name = time()."_".$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $name);
        }

        return response()->json(asset("images/$name"),201);
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
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = date('mdYHis'). uniqid();
            $desinationPath = public_path(). '/images';
            $image->move($desinationPath, $imageName);
        }

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
        $user->image = $imageName;
        $user->password = bcrypt($request->password);
        $user->Customer = true;

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
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = date('mdYHis'). uniqid();
            $desinationPath = public_path(). '/images';
            $image->move($desinationPath, $imageName);
        }

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
        $user->image = $imageName;
        $user->password = bcrypt($request->password);
        $user->Admin = true;

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
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = date('mdYHis'). uniqid();
            $desinationPath = public_path(). '/images';
            $image->move($desinationPath, $imageName);
        }

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
        $user->image = $imageName;
        $user->password = bcrypt($request->password);
        $user->Secretary = true;

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
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = date('mdYHis'). uniqid();
            $desinationPath = public_path(). '/images';
            $image->move($desinationPath, $imageName);
        }

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
        $user->image = $imageName;
        $user->password = bcrypt($request->password);
        $user->Manager = true;

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
                'status'
            ])
        );

        return response()->json([
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
