<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $credentials = $request->all();
        unset($credentials["_token"]);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return view('thanks')->with([
            'email'=>$request['email'],
            'password'=>$request['password']
        ]);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->all();
        unset($credentials["_token"]);
        if (Auth::attempt($credentials)) {
            return redirect('/')->with('sucess','成功メッセージ');;
        } else {
            return redirect('login')->with('error','エラーメッセージ');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('login');
    }
}
