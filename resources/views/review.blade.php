@extends('layouts.detail')

@section('title', '詳細画面')

@section('content')
    <div class="container">
        <div class="detail-wrapper">
            <div class="detail-left">
                <div class="detail-head">
                    <a href="/" class="back-shop-page">Topへ</a>
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
            <form class="detail-right" action="/review" method="post">
                @csrf
                <div class="review-input">
                    <div class="review-flex">
                        <h1 class="review-head">レビュー記入欄</h1>
                        <h1 class="review-user-name">{{ $user->name }}さん</h1>
                    </div>
                    <input type="hidden" value="{{ $shop->id }}" name="shop_id">
                    <h1 class="review-five">5段階評価</h1>
                    <div class="shop-review-star rate-form">
                        @for($i=5;$i>=1;$i--)
                            <input name="score" id="{{$i}}" class="star" type="radio" value="{{$i}}">
                            <label for="{{$i}}">★</label>
                        @endfor
                    </div>
                    <div class="shop-review-area">
                        <h1 class="review-content">レビュー内容</h1>
                        <textarea class="review-area" name="comment" id="" cols="10" rows="10"></textarea>
                    </div>
                </div>
                <button class="detail-button">レビューする</button>
            </form>
        </div>
    </div>
@endsection
