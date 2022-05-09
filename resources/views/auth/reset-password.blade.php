
@extends('layouts.app')

@section('title', '会員登録画面')

@section('content')
    <div class="register-container">
        <div class="register-wrapper">
            <div class="register-box">
                <p class="register-title">Registration</p>
                <form class="register-form" action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
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
                            placeholder="Password" value="">
                    </div>
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <i class="icon fa-solid fa-lock fa-lg"></i>
                        <x-input id="password_confirmation" class="block mt-1 w-full register-input register-password" type="password"
                            name="password_confirmation" required placeholder="PasswordConfirmation"/>
                    </div>
                    <button type="submit" class="register-bottom">会員登録</button>
                </form>
            </div>
        </div>
    </div>
@endsection
