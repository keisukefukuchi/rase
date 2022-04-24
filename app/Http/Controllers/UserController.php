<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function index() {
        $user_id = Auth::id();
        $user =  User::where('id',$user_id)->first();
        $reservations = Reservation::with(['shop'])->where('user_id',$user_id)->get();

        foreach($reservations as $reservation) {
            $start_time = $reservation->start_time;
            $reservation->start_time = date('H:i',strtotime($start_time));
        }

        $likes = Like::where('user_id',$user_id)->get();
        $shops = array();
        foreach($likes as $like) {
            $shops[] = Shop::where('id',$like['shop_id'])->get();
        }

        $items = [
            'user' => $user,
            'reservations' => $reservations,
            'shops' => $shops,
        ];

        return view('mypage',['items' => $items]);
    }

    public function review() {
        $user_id = Auth::id();
        $user =  User::where('id',$user_id)->first();
        $now = Carbon::now();
        $now_date = $now->format('y-m-d');
        $now_time = $now->format('H:i');

        $items = Reservation::with(['shop'])->where('user_id',$user_id)->get();
        $reservations = array();
        foreach($items as $item) {
            $start_time = $item->start_time;
            $item->start_time = date('H:i',strtotime($start_time));

            if($now_date <= $item->start_date && $now_time <= $item->start_time) {
                $reservations[] = [
                    'item' => $item
                ];
            }
        }


        $items = [
            'user' => $user,
            'reservations' => $reservations,
        ];

        return view('mypage_review',['items' => $items]);
    }
}
