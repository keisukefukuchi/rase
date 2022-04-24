<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

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
}
