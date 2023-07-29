<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web_jwt', ['except' => ['login']]);
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

        $cookie = Cookie::make('access_token', $token, 3600, null, null, false, true);
        return redirect('/')->withCookie($cookie);
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
