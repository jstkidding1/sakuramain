<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;
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
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'address' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->contact_num = $request->contact_num;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->image = $request->image;
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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
    
        // $response = ['error' => 'Unauthorized'];
        
        if (Auth::attempt($credentials)) {

            if(Auth::user()->Customer || Auth::user()->Secretary || Auth::user()->Manager ) {
                $status = 200;
                $response = [
                    'user' => Auth::user(),
                    'token' => Auth::user()->createToken('bigStore')->accessToken,
                ];
    
                return response()->json($response, $status);
            } else {

                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.']
                ]);
    
                $status = 401;
                $response = 'Unauthorized';
                return response()->json(['error' => $response, $status]);

            }

        } else {

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);

            $status = 401;
            $response = 'Unauthorized';
            return response()->json(['error' => $response, $status]);

        }
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
    
        // $response = ['error' => 'Unauthorized'];
        
        if (Auth::attempt($credentials)) {

            if(Auth::user()->Admin ) {
                $status = 200;
                $response = [
                    'user' => Auth::user(),
                    'token' => Auth::user()->createToken('bigStore')->accessToken,
                ];
    
                return response()->json($response, $status);
            } else {

                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.']
                ]);
    
                $status = 401;
                $response = 'Unauthorized';
                return response()->json(['error' => $response, $status]);

            }

        } else {

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);

            $status = 401;
            $response = 'Unauthorized';
            return response()->json(['error' => $response, $status]);

        }
    }
}
