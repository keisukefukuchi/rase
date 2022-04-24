<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request) {
        $items = $request->all();
        $date = $items['date'];
        $time = $items['time'];
        $num_of_users = $items['num_of_users'];

        dd($num_of_users);
    }
}
