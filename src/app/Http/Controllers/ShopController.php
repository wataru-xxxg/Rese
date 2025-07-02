<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Http\Requests\ReservationRequest;

class ShopController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function detail($id)
    {
        $shop = Shop::find($id);
        return view('detail', compact('shop'));
    }

    public function mypage()
    {
        $reservations = Reservation::where('user_id', Auth::user()->id)->where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->get();
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        return view('mypage', compact('reservations', 'favorites'));
    }

    public function reservation(ReservationRequest $request)
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

    public function reservationChangePage(Request $request)
    {
        $id = $request->id;
        $reservation = Reservation::find($id);
        $shop = Shop::find($reservation->shop_id);
        return view('reservation-change', compact('reservation', 'shop'));
    }

    public function reservationChange(ReservationRequest $request, $id)
    {
        $reservation = Reservation::find($id);
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
