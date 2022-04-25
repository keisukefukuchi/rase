@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-box">
                <p class="login-title">Login</p>
                <form class="login-form" action="/login" method="post">
                    @csrf
                    <div class="email">
                        <i class="icon fa-solid fa-envelope fa-lg"></i>
                        <input class="login-input login-email" type="email" name="email" placeholder="Email" value="">
                    </div>
                    <div class="password">
                        <i class="icon fa-solid fa-lock fa-lg"></i>
                        <input class="login-input login-password" type="password" name="password" placeholder="Password"
                            value="">
                    </div>
                    <div class="login-flex">
                        <a class="password-request" href="{{ route('password.request') }}">パスワードを忘れた方</a>
                        <button type="submit" class="login-bottom">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
