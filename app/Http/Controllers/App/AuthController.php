<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    function index()
    {
        return redirect()->route('login');
    }

    function registration()
    {
        return view('auth.registration');
    }

    public function postRegistration(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->create($data);
        return redirect()->route('login')->with('success', 'User Registered Successfully');
    }
}
