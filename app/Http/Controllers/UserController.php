<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    // registration form
    public function register(){
        return view('users.register');
    }

    // create new user
    public function store(Request $req){
        $formFields = $req->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            // matched password with password_confirmed
            'password' => 'required|confirmed|min:6'
        ]);
        // Hash password using bcrypt
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        $user = User::create($formFields);

        // login
        auth()->login($user);

        return redirect('/');
    }

    // logout
    public function logout(Request $req){
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/');
    }
    
    // login
    public function login(Request $req){
        return view('users.login');
    }

    // authentication
    public function authenticate(Request $req){
        $formFields = $req->validate([
            'email'=>['required', 'email'],
            'password' => 'required',
        ]);

        if(auth()->attempt($formFields)) {
            $req->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email'=>'invalid credentials'])->onlyInput('email');

    }
}
