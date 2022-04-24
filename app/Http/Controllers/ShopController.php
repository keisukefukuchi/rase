<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\genre;
use App\Models\Shop;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request) {
        $shop_name = $request->input('shop_name');
        $area_id = $request->input('area');
        $genre_id = $request->input('genre');

        $query = Shop::query();


        if (!empty($shop_name)) {
            $query->where('name', 'like', '%' . $shop_name . '%');
        }
        if (!empty($area_id)) {
            $query->where('area_id', $area_id);
        }
        if (!empty($genre_id)) {
            $query->where('genre_id', $genre_id);
        }

        $shops = $query->get();
        $genres = Genre::all();
        $areas = Area::all();

        $items = [
            'shops' => $shops,
            'genres' => $genres,
            'areas' => $areas,
            'shop_name' => $shop_name,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
        ];


        return view('index', $items);
    }
    public function detail(Request $request,$id) {
        $now = Carbon::now();
        $shop = Shop::find($id);
        $times = config('times');
        $numbers = config('numbers');

        // $reviews = Review::where('shop_id', $id)
        //     ->orderBy('score', 'desc')
        //     ->limit(3)
        //     ->get();
        // $courses = Course::where('shop_id', $id)->get();

        $items = [
            'shop' => $shop,

            'times' => $times,
            'numbers' => $numbers,
            // 'reviews' => $reviews,
            // 'courses' => $courses,
        ];

        return view('detail', $items);
    }
}
