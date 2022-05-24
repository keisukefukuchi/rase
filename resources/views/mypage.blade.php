@extends('layouts.thanks')

@section('title', 'マイページ画面')

@section('content')
    <div class="container">
        <div class="mypage-wrapper">
            <div class="tab">
                <ul class="tab-menu">
                    <li class="tab-menu__item active">お気に入り</li>
                    <li class="tab-menu__item">予約一覧</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-content__item show">
                        <div class="mypage-like">
                            @foreach ($items['shops'] as $shops)
                                @foreach ($shops as $shop)
                                    <div class="card">
                                        <img class="shop-img" src="{{ $shop->img_url }}" alt="">
                                        <div class="content">
                                            <h1 class="shop-name">{{ $shop->name }}</h1>
                                            @foreach ($items['comments'] as $comment)
                                                @if ($comment['shop_id'] == $shop->id)
                                                    <div class="average-score mb-3">
                                                        <div class="star-rating ml-2">
                                                            <div class="star-rating-front"
                                                                style="width: {{ ($comment['score'] * 100) / 5 }}%">
                                                                ★★★★★</div>
                                                            <div class="star-rating-back">★★★★★</div>
                                                        </div>
                                                        <div class="average-score-display">
                                                            <p class="comment">{{ $comment['score'] }}</p>
                                                        </div>
                                                        <p class="comment">({{ $comment['count'] }}件)</p>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="hashtag">
                                                <p class="area-name">#{{ $shop->area->name }}</p>
                                                <p class="genre-name">#{{ $shop->genre->name }}</p>
                                            </div>
                                            <div class="shop-link">
                                                <form action="{{ route('shop.detail', $shop->id) }}" method="get">
                                                    <button class="shop-details">詳しく見る</button>
                                                </form>
                                                @if ($shop->is_liked_by_auth_user())
                                                    <form class="shop-like"
                                                        action="{{ route('shop.unlike', ['id' => $shop->id]) }}"
                                                        method="get">
                                                        @csrf
                                                        <button class="shop-like-on">
                                                            <i class="fa-solid fa-heart fa-2x"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form class="shop-like"
                                                        action="{{ route('shop.like', ['id' => $shop->id]) }}"
                                                        method="get">
                                                        @csrf
                                                        <button class="shop-like">
                                                            <i class="fa-solid fa-heart fa-2x"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-content__item">
                        @foreach ($items['reservations'] as $reservation)
                            <div class="reservation-card">
                                <div class="reservation-card-head">
                                    <div class="reservation-card-head-left">
                                        <i class="fa-solid fa-clock fa-2x"></i>
                                        <p class="reservation-id">予約{{ $reservation->id }}</p>
                                    </div>
                                </div>
                                <div class="reservation-shop-detail">
                                    <div class="reservation-shop-img">
                                        <img class="shop-img" src="{{ $reservation->shop->img_url }}" alt="">
                                    </div>
                                    <table class="reservation-info">
                                        <tr>
                                            <th>店舗名</th>
                                            <td>{{ $reservation->shop->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>来店日</th>
                                            <td>{{ $reservation->start_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>来店時刻</th>
                                            <td>{{ $reservation->start_time }}</td>
                                        </tr>
                                        <tr>
                                            <th>来店人数</th>
                                            <td>{{ $reservation->num_of_users }}人</td>
                                        </tr>
                                    </table>
                                    <div class="mypage-button-flex">
                                        <form class="reservation-update-form"
                                            action="{{ route('reservation.update', ['id' => $reservation->id]) }}"
                                            method="get">
                                            <button class="reservation-update-button">
                                                予約情報変更
                                            </button>
                                        </form>
                                        <form action="{{ route('shop.detail', $reservation->shop->id) }}" method="get" class="reservation-update-form">
                                            <button class="reservation-detail">詳しく見る</button>
                                        </form>
                                        @if ($items['now_date'] >= $reservation->start_date && $items['now_time'] >= $reservation->start_time)
                                        <form action="{{ route('shop.detail', $reservation->shop->id) }}" method="get" class="reservation-update-form">
                                            <button class="reservation-detail rereservation">もう一度予約する</button>
                                        </form>
                                        <form action="{{ route('review.index', ['id' => $reservation->id]) }}" method="get" class="reservation-update-form">
                                            <button class="mypage-review">Reviewする</button>
                                        </form>
                                        @else
                                        <form action="{{ route('reservation.destory', ['id' => $reservation->id]) }}"
                                            method="get" class="reservation-update-form">
                                            <button class="reservation-delite-button">
                                                キャンセル
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
