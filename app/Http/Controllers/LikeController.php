<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $shop_id = $request->input('shop_id');

        Like::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
        ]);
        return back();
    }

    public function destroy($id)
    {
        $user_id = Auth::id();
        $shop_id = $id;

        Like::where('user_id',$user_id)->where('shop_id',$shop_id)->delete();
        return back();
    }
}
