<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Review;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ReviewController extends Controller
{
    public function index($id) {
        $reservation = Reservation::find($id);
        $user_id = $reservation->user_id;
        $shop_id = $reservation->shop_id;
        $shop = Shop::where('id',$shop_id)->first();
        $user = User::where('id',$user_id)->first();

        return view('review',[
            'shop' => $shop,
            'user' => $user
        ]);
    }

    public function store(Request $request) {
        $items = $request->all();
        unset($items['_token']);
        $user_id = Auth::id();
        $shop_id = (int)$items['shop_id'];
        $score = (int)$items['score'];
        $comment = $items['comment'];

        Review::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'score' => $score,
            'comment' => $comment,
        ]);

        return redirect()->back();
    }
}
