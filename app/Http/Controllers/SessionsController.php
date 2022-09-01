<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {
        // Validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Authenticate and login the user based on the provided credentials
        if (!auth()->attempt($attributes)) {
            // Auth failed
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
            // return back()
            //  ->withInput()
            //  ->withErrors(['email' => 'Your provided credentials could not be verified']);
        }

        // Redirect with a success flash message
        session()->regenerate(); // Session Fixation
        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy() {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye');
    }
}

// LARAVEL BREEZE DOES ALL THAT FOR YOU
