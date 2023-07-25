<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    //show register/ create form
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => 'required| confirmed| min:6'
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);
        // Create user
        $user = User::create($formFields);

        //log in
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    //Logout user
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out!');
    }

    //show login form
    public function login(){
        return view('users.login');
    }
    //login user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required| min:6'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now logged in');
        }else{

            return back()->withErrors(['email'=> 'Invalid credentials'])->onlyInput('email'); 
        }
        
    }
}