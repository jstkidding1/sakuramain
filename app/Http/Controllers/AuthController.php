<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Hash;
use Auth;

class AuthController extends Controller
{
    use SendsPasswordResetEmails;

    public function register(Request $request)
    {

        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255|regex:/^[a-zA-Z]+$/u',
            'lname' => 'required|string|max:255|regex:/^[a-zA-Z]+$/u',
            'contact_num' => 'required|regex:/(9)[0-9]{9}/|max:10',
            'address' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:6|confirmed|regex:/^(?=[^A-Z\n]*[A-Z])(?=[^\d\n]*\d)(?=[^!@?\n]*[!@?]).{10,}/'
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

        // $user->sendEmailVerificationNotification();

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
        
        if (Auth::attempt($credentials)) {

            if(Auth::user()->Customer && Auth::user()->is_verified == 1 || 
            Auth::user()->Secretary && Auth::user()->is_verified == 1 || 
            Auth::user()->Manager && Auth::user()->is_verified == 1 ) 
            {
                $status = 200;
                $response = [
                    'user' => Auth::user(),
                    'token' => Auth::user()->createToken('bigStore')->accessToken,
                ];
    
                return response()->json($response, $status);
            } else {

                throw ValidationException::withMessages([
                    'email' => ['Your account needs to be verified.']
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
            // 'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        
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

    public function sendPasswordResetLink(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns'
        ]);

        return response()->json([
            'message' => 'Password reset email sent.',
            'data' => $response
        ]);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Email could not be sent to this email address.']);
    }

    public function callResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
        event(new PasswordReset($user));
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Password reset successfully.']);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Failed, Invalid Token.']);
    }
}
