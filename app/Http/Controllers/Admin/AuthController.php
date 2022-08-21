<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        if (Auth::check())
            return redirect('/admin');

        return view('admin.login');
    }

    public function logingIn(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        Auth::attempt($valid);


        if (Auth::check()) {
            $request->session()->regenerate();
            return redirect('/admin');
        } else {
            return redirect('/login')->withInput()
                ->with('status', "Incorrect user login details!");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
