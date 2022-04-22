<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\genre;
use App\Models\Shop;
use Illuminate\Http\Request;



class ShopController extends Controller
{
    public function index() {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        $items = array();
        foreach($shops as $shop) {
            $area = Area::find($shop->area_id);

            $area_name = $area->name;
            $genre = Genre::find($shop->genre_id);
            $genre_name = $genre->name;

            $items[] = [
                'shop' => $shop,
                'area_name' => $area_name,
                'genre_name' => $genre_name,
            ];
        }
        return view('index',[
            'items' => $items,
            'areas' => $areas,
            'genres' => $genres
        ]);
    }
}
