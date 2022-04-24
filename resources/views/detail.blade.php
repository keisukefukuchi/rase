@extends('layouts.detail')

@section('title', '詳細画面')

@section('content')
    <div class="container">
        <div class="detail-wrapper">
            <div class="detail-left">
                <div class="detail-head">
                    <a href="/" class="back-shop-page"><</a>
                    <h1 class="detail-shop-name">{{ $shop->name }}</h1>
                </div>
                <div class="detail-shop_image">
                    <img src="{{ $shop->img_url }}" alt="">
                </div>
                <div class="detail-hashtag">
                    <p class="area-name">#{{ $shop->area->name }}</p>
                    <p class="genre-name">#{{ $shop->genre->name }}</p>
                </div>
                <p class="detail-shop-content">{{ $shop->description }}</p>
            </div>
            <form class="detail-right" action="/reservation" method="post">
                @csrf
                <div class="reservation-input">
                    <h1 class="reservation-head">予約</h1>
                    <div class="reservation-day">
                        <input type="date" name="date" value="{{$date}}" id="tomorrow" min="{{$tomorrow}}">
                    </div>
                    <div class="reservation-time">
                        <input type="time" name="time" value="{{$time}}">
                    </div>
                    <div class="reservation-person">
                        <select name="num_of_users">
                            @for($i=1;$i<=20;$i++)
                                <option value="{{$i}}">{{$i}}人</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <button class="detail-button">予約する</button>
            </form>
        </div>
    </div>
@endsection
