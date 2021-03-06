<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\genre;
use App\Models\Review;
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

        $comments = array();
        foreach($shops as $shop) {
            $count = 0;
            $score = 0;
            $reviews = Review::where('shop_id', $shop->id)->get();
            foreach($reviews as $review) {
                $count += 1;
                $score += $review->score;
            }
            $score = round($score/$count,1);
            $comments[] = [
                'shop_id' => $shop->id,
                'score' => $score,
                'count' => $count
            ];
        }

        $items = [
            'shops' => $shops,
            'genres' => $genres,
            'areas' => $areas,
            'shop_name' => $shop_name,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'count' => $count,
            'comments' => $comments
        ];


        return view('index', $items);
    }
    public function detail($id) {
        $now = Carbon::now();
        $shop = Shop::find($id);
        $time = $now->format('H:i');

        $tomorrow = $now->tomorrow()->format('Y-m-d');

        $reviews = Review::where('shop_id', $id)->paginate(5);
        // $courses = Course::where('shop_id', $id)->get();

        $items = [
            'shop' => $shop,
            'time' => $time,
            'tomorrow' => $tomorrow,
            'reviews' => $reviews,
            // 'courses' => $courses,
        ];

        return view('detail', $items);
    }
}
