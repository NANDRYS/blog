<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:16'
        ]);

        $inputData = $request->all();
        $inputData['password'] = bcrypt($inputData['password']);
        $user = User::create($inputData);

        Auth::login($user);
        return redirect()->route('home');
    }
}
