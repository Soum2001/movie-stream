<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $user = User::select()->where('email', $request->email)->get();
        session()->put('id', $user[0]['id']);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('trending');
        } else {
            return view('Login');
        }
    }
    public function loginPage()
    {
        return view('Login');
    }

}
