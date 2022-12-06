<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    
    function register(Request $request)
    {
        $input = $request->all();
        $hashedPassword  = Hash::make($request->password);
        $input['password']  = $hashedPassword;
        $user = User::create($input);
        if ($user) {
            session()->put('id', $user['id']);
            return view('Login');
        }
    }

    function loadRegistrationPage()
    {
        return view('Register');
    }
}
