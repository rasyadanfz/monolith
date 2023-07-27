<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use JWTAuth;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create new user
    public function store(Request $request){
        $customMessages = ['email.unique' => "Email has been taken", 'username.unique' => "Username has been taken"];
        $formFields = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'string']
        ], $customMessages);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        // Login
        $token = auth()->login($user);

        return redirect('/')->with('message', "User created and logged in")->withCookie(cookie('access_token', $token, auth('api')->factory()->getTTL() * 60));
    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

}
