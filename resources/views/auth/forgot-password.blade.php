@extends('layouts.app')

@section('title', '会員登録画面')

@section('content')
    <div class="register-container">
        <div class="register-wrapper">
            <div class="register-box">
                <p class="register-title">Registration</p>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4 reset-path" :status="session('status')" />
                <form class="register-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <div class="email">
                            @error('email')
                                <p class="error">{{ $message }}</p>
                            @enderror
                            <i class="icon fa-solid fa-envelope fa-lg"></i>
                            <input class="register-input register-email" type="email" name="email" placeholder="Email" value="">
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="password-reset-bottom">
                            {{ __('Email Password Reset Link') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
