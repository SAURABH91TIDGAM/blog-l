<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    
    
    
    public function create()
    {

        return view('sessions.create');
    }
    
    public function store(){

        $attributes = request()->validate([
            'email' =>'required|email',
            'password' =>'required',
        ]);

        if (! auth()->attempt($attributes))
        { 
            
            throw ValidationException::withMessages(['email' => 'your provided credentials are not verified']);

            // return back();
            //     ->withInput()
            //     ->withErrors(['email' => 'your provided email address does not exists']);
            
        }
            session()->regenerate();
            return redirect ('/')->with('success', 'welcome back!');


        
    }
    
    public function destroy(){

       
       
        auth()->logout();

        return redirect()->route('home')->with('success', 'Goodbye');


    }
}
