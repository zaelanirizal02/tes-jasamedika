<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\http\Controllers\flash;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:250'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        // $request->session()->all('success', 'Registration success');
        return redirect('/login')->with('success', 'Registration Success');
    }
}
