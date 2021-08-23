<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reservation;
use App\Appointment;
use Auth;

class UserController extends Controller
{
    public function showReservations(User $user)
    {
        return response()->json($user->reservations()->with('vehicle')->get());
        // $user->reservations()->with('vehicle')->when(request('search'), function($query) {
        //     $query->where('vehicle.brand_name', 'like', '%' . request('search') . '%');
        // })->orderBy('id', 'desc')->paginate(5);
    }

    public function showOrders(User $user)
    {
        return response()->json($user->orders()->with(['product'])->get());
    }

    public function showAppointments(User $user)
    {
        return response()->json($user->appointments()->with(['service'])->get());
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

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->Customer = true;

        if ($user->save()) {
            return response()->json([
                'user' => $user,
                'message' => 'User created successfully.',
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

        $user = new User();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->Admin = true;

        if ($user->save()) {
            return response()->json([
                'user' => $user,
                'message' => 'User created successfully.',
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

        $user = new User();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->Secretary = true;

        if ($user->save()) {
            return response()->json([
                'user' => $user,
                'message' => 'User created successfully.',
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

        $user = new User();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->Manager = true;

        if ($user->save()) {
            return response()->json([
                'user' => $user,
                'message' => 'User created successfully.',
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
                'image'
            ])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'User Updated' : 'Error Updating User'
        ]);
    }

    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();

        return response()->json([
            'status' => $user,
            'message' => $user ? 'User Deleted' : 'Error Deleting user'
        ]);
        // $status = $user->delete();

        // return response()->json([
        //     'status' => $status,
        //     'message' => $status ? 'User Deleted.' : 'Error Deleting User'
        // ]);
    }
}
