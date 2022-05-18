@extends('layouts.app')

@section('title', 'メイン画面')

@section('content')
    <div class="container">
        <div class="wrapper">
            @foreach ($shops as $shop)
                <div class="card">
                    <img class="shop-img" src="{{ $shop->img_url }}" alt="">
                    <div class="content">
                        <h1 class="shop-name">{{ $shop->name }}</h1>
                        @foreach ($comments as $comment)
                            @if($comment['shop_id'] == $shop->id)
                            <div class="average-score mb-3">
                                <div class="star-rating ml-2">
                                  <div class="star-rating-front" style="width: {{$comment['score']*100/5}}%">★★★★★</div>
                                  <div class="star-rating-back">★★★★★</div>
                                </div>
                                <div class="average-score-display">
                                    <p class="comment">{{$comment['score']}}</p>
                                </div>
                                <p class="comment">({{$comment['count']}}件)</p>
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
                                <form class="shop-like" action="{{route('shop.unlike', ['id' => $shop->id])}}" method="get">
                                    @csrf
                                    <button class="shop-like-on">
                                        <i class="fa-solid fa-heart fa-2x"></i>
                                    </button>
                                </form>
                            @else
                                <form class="shop-like" action="{{ route('shop.like', ['id' => $shop->id]) }}" method="get">
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
        </div>
    </div>
@endsection
