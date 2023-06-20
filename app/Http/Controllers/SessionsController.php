<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
       return view('sessions.create') ;
    }
    public function store()
    {

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/visitor')->with('success', 'welcome Back');
        }

        throw ValidationException::withMessages([
            'email' => 'your provided credentials could not be verified.'

        ]);
    }




public function destroy()
    {
    auth()->logout();

    return redirect('/')->with('success','Goodbye!');
    }
}
