@extends('layouts.detail')

@section('title', '詳細画面')

@section('content')
    <div class="container">
        <div class="detail-wrapper">
            <div class="detail-left">
                <div class="detail-head">
                    <a href="/mypage" class="back-shop-page"><</a>
                    <h1 class="detail-shop-name">{{ $reservation->shop->name }}</h1>
                </div>
                <div class="detail-shop_image">
                    <img src="{{ $reservation->shop->img_url }}" alt="">
                </div>
                <div class="detail-hashtag">
                    <p class="area-name">#{{ $reservation->shop->area->name }}</p>
                    <p class="genre-name">#{{ $reservation->shop->genre->name }}</p>
                </div>
                <p class="detail-shop-content">{{ $reservation->shop->description }}</p>
            </div>
            <form class="detail-right" action="{{route('reservation.update', ['id' => $reservation->id])}}" method="post">
                @csrf
                <div class="reservation-input">
                    <h1 class="reservation-head">予約</h1>
                    <input type="hidden" value="{{$reservation->shop->id}}" name="shop_id">
                    <div class="reservation-day">
                        <input type="date" name="start_date" value="{{$reservation->start_date}}" id="tomorrow" min="{{$reservation->start_date}}">
                    </div>
                    <div class="reservation-time">
                        <input type="time" name="start_time" value="{{$reservation->start_time}}" min="{{$reservation->start_time}}">
                    </div>
                    <div class="reservation-person">
                        <select name="num_of_users">
                            @for($i=1;$i<=20;$i++)
                                @if($i == $reservation->num_of_users)
                                <option value="{{$reservation->num_of_users}}" selected>{{$reservation->num_of_users}}人</option>
                                @else
                                    <option value="{{$i}}">{{$i}}人</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <button class="detail-button">予約し直す</button>
            </form>
        </div>
    </div>
@endsection
