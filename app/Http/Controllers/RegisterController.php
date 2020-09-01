<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        $user = User::create(request(['name', 'email', 'password']));
        Auth::login($user);
        return redirect()->to('/');
    }
}
