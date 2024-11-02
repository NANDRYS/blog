<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }
    public function store(Request $request)
    {

        // если лень
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:16'
        ]);

        //eсли не лень

        // $rules = [
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|confirmed|min:4|max:16',
        // ];

        // $messages = [
        //     'email.required' => 'Поле не должно быть пустым',
        //     'email.email' => 'Значение должно быть почтой',
        //     'email.unique' => 'Такой пользователь уже существует',
        //     'password.required' => 'Поле не должно быть пустым',
        //     'password.confirmed' => 'Пароли не совпадают',
        //     'password.min' => 'Мало символов в пароле',
        //     'password.max' => 'Превышено количество символов в пароле',
        // ];

        // Validator::make($request->all(), $rules, $messages)->validate();

        $inputData = $request->all();
        $inputData['password'] = bcrypt($inputData['password']);
        $user = User::create($inputData);

        Auth::login($user);
        return redirect()->route('home')->with('success', "Поздравляю, теперь вы не гэй!");
    }

    public function login()
    {
        return view('user.login');
    }
    public function loginCheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors(['fuck' => "Не правильно заполнил данные"]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
