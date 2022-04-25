@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-box">
                <p class="login-title">Password Reset</p>
                <form class="login-form" action="{{ route('password.email') }}" method="post">
                    @csrf
                    @if ($errors->any())
                        <div class="card-text text-left alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="card-text alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="email">
                        <i class="icon fa-solid fa-envelope fa-lg"></i>
                        <input class="login-input login-email" type="email" name="email" placeholder="Email" value="">
                    </div>
                    <div class="login-flex">
                        <button type="submit" class="login-bottom">メール送信</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
