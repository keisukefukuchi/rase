@extends('layouts.app')

@section('title', 'メイン画面')

@section('content')
    <div class="container">
        <div class="wrapper">
            @foreach($shops as $shop)
                <div class="card">
                    <img src="{{$shop->img_url}}" alt="">
                    {{$shop->name}}
                </div>
            @endforeach
        </div>
    </div>
@endsection
