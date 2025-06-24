<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('index', compact('shops'));
    }

    public function detail($id)
    {
        $shop = Shop::find($id);
        return view('detail', compact('shop'));
    }

    public function reservation(Request $request)
    {
        $shop = Shop::find($request->id);
        $shop->reservation = $request->reservation;
        $shop->save();
        return redirect()->route('detail', $shop->id);
    }
}
