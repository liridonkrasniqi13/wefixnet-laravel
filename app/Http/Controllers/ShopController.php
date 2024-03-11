<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    //
    public function getAllShop()
    {

        $shops = Shop::orderBy('id', 'desc')->paginate(20);

		// return response()->json(['data' => $posts], 200);
        // $shops = Shop::all();
        return response()->json($shops);
    }
}
