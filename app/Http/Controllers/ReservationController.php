<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ReservationController extends Controller
{
    public function store(Request $request) {
        $items = $request->all();
        unset($items['_token']);
        $start_date = $items['start_date'];
        $start_time = $items['start_time'];
        $num_of_users = (int)$items['num_of_users'];
        $shop_id = (int)$items['shop_id'];
        $user_id = Auth::id();
        Reservation::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'num_of_users' => $num_of_users,
            'start_date' => $start_date,
            'start_time' => $start_time
        ]);

        return view('reservation');
    }
    public function destroy($id)
    {
        Reservation::where('id', $id)->first()->delete();
        return redirect()->back();
    }
}
