<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //Register
    public function register(){

        return view("auth.register");
    }

    public function store(){

        // steps to do the registration
        // Validate
        // create the user
        // redirect

        // Validating
        $validated = request()->validate(
            [
                'name'=>'required|min:3|max:40',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|confirmed|min:8',
            ]
        );

        //Creating the user

        $user= User::create(
            [
                'name'=> $validated['name'],
                'email'=> $validated['email'],
                'password'=> Hash::make($validated['password']),
            ]
        );

        //Sending the email

        Mail::to($user->email)->send(new WelcomeEmail($user));

        //Redirecting the user to the dasboard page
        return redirect()->route('dashboard')->with('success','Account created succesfully');

    }

    //Login

    public function login(){

        return view("auth.login");
    }

    public function authenticate(){
        //Testing
        // dd(request()->all());

        // Validating
        $validated = request()->validate(
            [
                'email'=>'required|email',
                'password'=>'required|min:8',
            ]
        );

        if((auth()->attempt($validated))){
            //Clearing the session
            //In case we had any session from the previously logged in user
            request()->session()->regenerate();
            //Redirecting the user to the dasboard page
            return redirect()->route('dashboard')->with('success','Logged succesfully');
        }

        //Redirecting the user to the login page
        return redirect()->route('login')->withErrors([
            'email'=> 'Not matching user found with the provided email and password'
        ]);

    }

    //Logout

    public function logout(){
       auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success','Logged out succesfully');
    }


}
