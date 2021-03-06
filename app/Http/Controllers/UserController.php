<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $now_date = $now->format('Y-m-d');
        $now_time = $now->format('H:i');

        $user_id = Auth::id();
        $user =  User::where('id', $user_id)->first();
        $reservations = Reservation::join('shops','reservations.shop_id', '=', 'shops.id')
        ->select('reservations.*','shops.name','shops.img_url','shops.description')
        ->where('user_id', $user_id)->get();

        foreach ($reservations as $reservation) {
            $start_time = $reservation->start_time;
            $reservation->start_time = date('H:i', strtotime($start_time));
        }

        $likes = Like::where('user_id', $user_id)->get();

        $shops = array();
        foreach ($likes as $like) {
            $shops[] = Shop::where('id', $like['shop_id'])->get();
        }

        $comments = array();
        foreach ($shops as $items) {
            foreach ($items as $shop) {
                $count = 0;
                $score = 0;
                $reviews = Review::where('shop_id', $shop->id)->get();
                foreach ($reviews as $review) {
                    $count += 1;
                    $score += $review->score;
                }
                $score = round($score / $count, 1);
                $comments[] = [
                    'shop_id' => $shop->id,
                    'score' => $score,
                    'count' => $count
                ];
            }
        }

        $items = [
            'user' => $user,
            'reservations' => $reservations,
            'shops' => $shops,
            'comments' => $comments,
            'now_date' => $now_date,
            'now_time' => $now_time
        ];
        
        return view('mypage', ['items' => $items]);
    }

    public function review()
    {
        $user_id = Auth::id();
        $user =  User::where('id', $user_id)->first();
        $now = Carbon::now();
        $now_date = $now->format('yyyy-m-d');
        $now_time = $now->format('H:i');

        $items = Reservation::with(['shop'])->where('user_id', $user_id)->get();
        $reservations = array();
        foreach ($items as $item) {
            $start_time = $item->start_time;
            $item->start_time = date('H:i', strtotime($start_time));
            if ($now_date >= $item->start_date && $now_time >= $item->start_time) {

                $reservations[] = [
                    'item' => $item
                ];
            }
        }

        $items = [
            'user' => $user,
            'reservations' => $reservations,
        ];

        return view('mypage_review', ['items' => $items]);
    }
}
