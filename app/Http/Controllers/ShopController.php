<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\genre;
use App\Models\Shop;
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
    public function search(Request $request) {
        $all = $request->all();
        $area = (int)$all['area'];
        $genre = (int)$all['genre'];

        if($area == 0) {
            $areas = Area::all();
        }

        if($genre == 0) {
            $genres = Genre::all();
        }
    }
}
