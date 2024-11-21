<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    //
    public function create () {
        return view('auth.register');
    }

    public function store () {

        $attributes = request()->validate([
            'first_name' => ['required', 'min:3'],
            'second_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        // User::create([
        //     'first_name' => request('first_name'),
        //     'second_name' => request('second_name'),
        //     'email' => request('email'), 
        //     'password' => request('password')
        // ]);

        $user = User::create($attributes);
        Auth::login($user);
    
        return redirect('/jobs');

    }
}
