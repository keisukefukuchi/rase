@extends('layouts.thanks')

@section('title', 'マイページ画面')

@section('content')
    <div class="container">
        <div class="mypage-review-wrapper">
            <div class="mypage-review-left">
                <div class="mypage-review-head">
                    <h1 class="mypage-user-name">{{ $items['user']->name }}さん</h1>
                    <a href="/mypage" class="back-mypage">Mypageへ</a>
                </div>
                <h2 class="reservation-informations">レビューできる店舗</h2>
                @foreach ($items['reservations'] as $items)
                    @foreach ($items as $reservation)
                        <div class="mypage-review-card">
                            <div class="reservation-card-head">
                                <div class="reservation-card-head-left">
                                    <i class="fa-solid fa-clock fa-2x"></i>
                                    <p class="reservation-id">予約{{ $reservation->id }}</p>
                                </div>
                            </div>
                            <table class="reservation-info">
                                <tr>
                                    <th>Shop</th>
                                    <td>{{ $reservation->shop->name }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{ $reservation->start_date }}</td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td>{{ $reservation->start_time }}</td>
                                </tr>
                                <tr>
                                    <th>Number</th>
                                    <td>{{ $reservation->num_of_users }}人</td>
                                </tr>
                            </table>
                            <div class="mypage-button-flex">
                                <form class="reservation-update-form"
                                    action="{{ route('review.index', ['id' => $reservation->id]) }}" method="get">
                                    <button class="reservation-update-button">
                                        レビュー
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection
