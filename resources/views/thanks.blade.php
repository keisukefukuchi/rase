@extends('layouts.thanks')

@section('title', '会員登録画面')

@section('content')
    <div class="thanks-container">
        <div class="thanks-wrapper">
            <div class="thanks-box">
                <h1 class="thanks-title">会員登録ありがとうございます</h1>
                <div class="thanks">
                    <form class="resend" method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button class="button thanks-bottom">
                                メール再送信
                            </button>
                        </div>
                    </form>

                    <form class="logout" method="POST" action="{{ route('logout') }}">
                        @csrf

                        <div class="button">
                            <button type="submit" class="button thanks-bottom">ログアウト</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
