<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['login']]);
    }
    
    public function login(Request $request){
        $credentials = $request->validate([
            'username/email' => ['required'],
            'password' => ['required']
        ]);
        $identifier = $credentials['username/email'];
        $password = $credentials['password'];

        $field = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (!$token = Auth::attempt([$field => $identifier, 'password' => $password])){
            return back()->withErrors(['Error' => "Invalid Credentials"]);
        }

        return redirect('/')->withCookie(cookie('access_token', $this->respondWithToken($token)));
    }

    public function me(){
        return response()->json(auth()->user());
    }

    public function logout() {
        auth()->logout();
        cookie()->forget('access_token');

        return redirect('/')->with(['message' => "Logged out succesfully"]);
    }

    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
