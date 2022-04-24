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
                        <div class="hashtag">
                            <p class="area-name">#{{ $shop->area->name }}</p>
                            <p class="genre-name">#{{ $shop->genre->name }}</p>
                        </div>
                        <div class="shop-link">
                            <form action="{{route('shop.detail',$shop->id)}}" method="get">
                                <button class="shop-details">詳しく見る</button>
                            </form>
                            <form  class="shop-like" action="/like" method="post">
                                @csrf
                                <i class="fa-solid fa-heart fa-2x"></i>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
