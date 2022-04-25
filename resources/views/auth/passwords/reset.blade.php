@extends('layouts.app')

@section('title', '会員登録画面')

@section('content')
    <div class="register-container">
        <div class="register-wrapper">
            <div class="register-box">
                <p class="register-title">Registration</p>
                <form class="register-form" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="email">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <i class="icon fa-solid fa-envelope fa-lg"></i>
                        <input class="register-input register-email" type="email" name="email" placeholder="Email" value="">
                    </div>

                    <div class="password">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <i class="icon fa-solid fa-lock fa-lg"></i>
                        <input class="register-input register-password" type="password" name="password"
                            placeholder="Password" value="" autocomplete="new-password">
                    </div>

                    <div class="password">
                        <i class="icon fa-solid fa-lock fa-lg"></i>
                        <input id="password-confirm" type="password" class="register-input register-password" name="password_confirmation" placeholder="PasswordConfirm" required autocomplete="new-password">
                    </div>

                    <button type="submit" class="register-reset">パスワードリセット</button>
                </form>

            </div>
        </div>
    </div>Ï
@endsection
