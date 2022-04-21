@extends('layouts.app')

@section('title', '会員登録画面')

@section('content')
    <div class="thanks-container">
        <div class="thanks-wrapper">
            <div class="thanks-box">
                <h1 class="thanks-title">会員登録ありがとうございます</h1>
                <form class="thanks-form" action="/login" method="post">
                    @csrf
                    <div class="email">
                        <input class="thanks-input thanks-email" type="hidden" name="email" placeholder="Email" value="{{ $email }}">
                    </div>
                    <div class="password">
                        <input class="thanks-input thanks-password" type="hidden" name="password" placeholder="Password" value="{{ $password }}">
                    </div>
                    <div class="button">
                        <button type="submit" class="button thanks-bottom">ログインする</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
