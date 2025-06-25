<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

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

    public function mypage()
    {
        return view('mypage');
    }

    public function reservation(Request $request)
    {
        $reservation = new Reservation();
        $reservation->shop_id = $request->shop_id;
        $reservation->user_id = Auth::user()->id;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->number = $request->number;
        $reservation->save();
        return redirect()->route('done');
    }

    public function done()
    {
        return view('done');
    }
}
