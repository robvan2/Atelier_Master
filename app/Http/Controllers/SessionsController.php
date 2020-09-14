<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = false;
        if ($request->rememberMe) {
            $remember = true;
        }
        if (!Auth::attempt($credentials, $remember)) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        return redirect()->intended();
    }
    public function create()
    {
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->to('/');
    }
}
