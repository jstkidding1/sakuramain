<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;
use Validator;
use Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(Request $request)
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

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        
        $status = 401;
        $response = ['error' => 'Unauthorized'];
        
        if (Auth::attempt($credentials)) {
            $status = 200;
            $response = [
                'user' => Auth::user(),
                'token' => Auth::user()->createToken('bigStore')->accessToken,
            ];
        }

        // throw ValidationException::withMessages([
        //     'email' => ['The provided credentials are incorrect']
        // ]);
        
        return response()->json($response, $status);
    }

    // public function logout(Request $request)
    // {
    //     $request->user()->token()->revoke();
    //     return response()->json([
    //         'message' => 'Logout successfully.',
    //         'status_code' => 200
    //     ], 200);
    // }
}
