@extends('layouts.app')

@section('title', '会員登録画面')

@section('content')
    <div class="register-container">
        <div class="register-wrapper">
            <div class="register-box">
                <p class="register-title">Registration</p>
                <form class="register-form" action="/register" method="post">
                    @csrf
                    <div class="user-name">
                        <i class="icon fa-solid fa-user fa-lg"></i>
                        <input class="register-input register-user-name" type="text" name="name" placeholder="Username" value="">
                    </div>
                    <div class="email">
                        <i class="icon fa-solid fa-envelope fa-lg"></i>
                        <input class="register-input register-email" type="email" name="email" placeholder="Email" value="">
                    </div>
                    <div class="password">
                        <i class="icon fa-solid fa-lock fa-lg"></i>
                        <input class="register-input register-password" type="password" name="password" placeholder="Password" value="">
                    </div>
                    <button type="submit" class="register-bottom">会員登録</button>
                </form>
            </div>
        </div>
    </div>
@endsection
