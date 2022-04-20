@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-form">
                <p class="login-title">Login</p>
                <form action="/login" method="post">
                    @csrf
                    <div class="email login-input">
                        <input type="email" name="email" placeholder="メールアドレス" value="">
                    </div>
                    <div class="password login-input">
                        <input type="password" name="password" placeholder="パスワード" value="">
                    </div>
                    <button type="submit" class="button">ログイン</button>
                </form>
            </div>
        </div>
    </div>
@endsection
