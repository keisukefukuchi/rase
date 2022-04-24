@extends('layouts.thanks')

@section('title', 'マイページ画面')

@section('content')
    <div class="container">
        <div class="mypage-wrapper">
            <div class="mypage-left">
                <h2 class="reservation-informations">予約状況</h2>
                @foreach ($items['reservations'] as $reservation)
                    <div class="reservation-card">
                        <div class="reservation-card-head">
                            <div class="reservation-card-head-left">
                                <i class="fa-solid fa-clock fa-2x"></i>
                                <p class="reservation-id">予約{{$reservation->id}}</p>
                            </div>
                            <form action="{{route('reservation.destory', ['id' => $reservation->id])}}" method="get">
                                <button class="reservation-delite-button">
                                    <i class="reservation-delite fa-solid fa-circle-xmark fa-2x"></i>
                                </button>
                            </form>
                        </div>
                        <table class="reservation-info">
                            <tr>
                                <th>Shop</th>
                                <td>{{$reservation->shop->name}}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{$reservation->start_date}}</td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td>{{$reservation->start_time}}</td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td>{{$reservation->num_of_users}}人</td>
                            </tr>
                        </table>
                        <div class="mypage-button-flex">
                            <form class="reservation-update-form" action="{{route('reservation.update', ['id' => $reservation->id])}}" method="get">
                                <button class="reservation-update-button">
                                    予約情報変更
                                </button>
                            </form>
                            <form class="review-form" action="{{route('review.index', ['id' => $reservation->id])}}" method="get">
                                <button class="review-button">
                                    レビュー
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mypage-right">
                <h1 class="mypage-user-name">{{ $items['user']->name }}さん</h1>
                <h3 class="user-like-shop">お気に入り店舗</h3>
                <div class="mypage-like">
                    @foreach ($items['shops'] as $shops)
                        @foreach ($shops as $shop)
                            <div class="card">
                                <img class="shop-img" src="{{ $shop->img_url }}" alt="">
                                <div class="content">
                                    <h1 class="shop-name">{{ $shop->name }}</h1>
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
                                                action="{{ route('shop.unlike', ['id' => $shop->id]) }}" method="get">
                                                @csrf
                                                <button class="shop-like-on">
                                                    <i class="fa-solid fa-heart fa-2x"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form class="shop-like"
                                                action="{{ route('shop.like', ['id' => $shop->id]) }}" method="get">
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
        </div>
    </div>
@endsection
