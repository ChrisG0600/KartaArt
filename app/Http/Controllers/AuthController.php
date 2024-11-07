<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    // Display only the Login Form
    public function showLoginForm(){
        if(Auth::check()){
            return redirect('/users/artworks');
        }
        return view('login');
    }

    // Process the Login Form
    public function login(Request $request){
        $validated = $request->validate([
            'username' => ['required', 'string'], // fetching table column
            'password' => ['required', 'string'], 
        ]);

        // Condition to handle if err occurs
        if(Auth::attempt($validated)){
            $request->session()->regenerate(); // Search the purpose of this
            
            return redirect()->route('home')->with('message', 'Successful Login');
        }
        return back()->withErrors([
            'username' => 'Username or Password is incorrect.',
        ]);
    }

    // Display only the Register Form
    public function showRegistrationForm(){
        if(Auth::check()){
            return redirect('/users/artworks');
        }
        return view('register');
    }

    // Process the Register Form
    public function register(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users', 
            'email')],
            'password' => 'required|string|min:8|confirmed'
        ]);

        // After Validate hash the password
        $validated['password'] = Hash::make($validated['password']);

        // After validating and hashing 
        // Insert to database

        User::create($validated);

        return redirect('/login')->with('message', 'Successfully Creation of Account!');
    }

    // Logout the user
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        
        return redirect('/')->with('message', 'Logout successful.');
    }

    // MyCart Navbar Increment
    
}
