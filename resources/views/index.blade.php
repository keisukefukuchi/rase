@extends('layouts.app')

@section('title', 'メイン画面')

@section('content')
    <div class="container">
        <div class="wrapper">
            @foreach($items as $item)
                <div class="card">
                    <img class="shop-img" src="{{$item['shop']->img_url}}" alt="">
                    <h1>{{$item['shop']->name}}</h1>
                    <p>#{{$item['area_name']}}</p>
                    <p>#{{$item['genre_name']}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
