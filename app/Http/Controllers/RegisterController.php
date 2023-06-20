<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required|max:225',
            'email' => 'required|email|max:225|unique:users,username',
            'password' => 'required|min:7|max:225',
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/visitor')->with('success', 'Account created');
    }
}
