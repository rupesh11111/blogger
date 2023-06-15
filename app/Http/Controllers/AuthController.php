<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        $data['action'] = route('postLogin');
        $data['redirect'] = route('dashboard');
        return view('login',$data);
    }


    public function postLogin(LoginRequest $request)
    {
        try{
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return response()->json(['message' => 'Logged in successfully']);
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()],419);
        }
    }



    public function signup()
    {
        $data['action'] = route('postSignup');
        $data['redirect'] = route('login');
        return view('signup',$data);
    }


    public function postSignup(SignupRequest $request)
    {
        try {
            $credentials = $request->only('email', 'phone','name','password');
            $credentials['password'] = Hash::make(request('password'));
            $credentials['email_verified_at'] = date('Y-m-d H:i:s');
            if (User::create($credentials)) {
                return response()->json(['message' => 'Signup succussfully']);
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()],419);
        }
    }


    public function logout(){
        if(Auth::check()) {
            Auth::logout();
            return redirect('auth/login');
        }
    }
}
