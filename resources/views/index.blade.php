@extends('layouts.app')

@section('title', 'メイン画面')

@section('content')
    <div class="container">
        <div class="wrapper">
            @foreach ($items as $item)
                <div class="card">
                    <img class="shop-img" src="{{ $item['shop']->img_url }}" alt="">
                    <div class="content">
                        <h1 class="shop-name">{{ $item['shop']->name }}</h1>
                        <div class="hashtag">
                            <p class="area-name">#{{ $item['area_name'] }}</p>
                            <p class="genre-name">#{{ $item['genre_name'] }}</p>
                        </div>
                        <div class="shop-link">
                            <button class="shop-details">詳しく見る</button>
                            <a href="" class="shop-like">
                                <i class="fa-solid fa-heart fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
