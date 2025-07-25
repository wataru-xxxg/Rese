<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ReviewRequest;

class ShopController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function detail($id)
    {
        $shop = Shop::with(['reviews.user'])->find($id);
        if (url()->previous() == route('mypage')) { 
            $back_url = route('mypage');
        } else {
            $back_url = route('index');
        }
        return view('reservation', compact('shop', 'back_url'));
    }

    public function mypage()
    {
        $reservations = Reservation::where('user_id', Auth::user()->id)->orderBy('date', 'asc')->get();
        $favorites = Favorite::with(['shop.area', 'shop.genre', 'shop.reviews'])->where('user_id', Auth::user()->id)->get();
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
        $message = 'ご予約ありがとうございます';
        return redirect()->route('done', compact('message'));
    }

    public function reservationChangePage(Request $request)
    {
        $id = $request->id;
        $reservation = Reservation::find($id);
        $shop = Shop::find($reservation->shop_id);
        $back_url = route('mypage');
        return view('reservation-change', compact('reservation', 'shop', 'back_url'));
    }

    public function reservationChange(ReservationRequest $request, $id)
    {
        $reservation = Reservation::find($id);
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->number = $request->number;
        $reservation->save();
        $message = '予約を変更しました';
        return redirect()->route('done', compact('message'));
    }

    public function done($message = null)
    {
        return view('done', compact('message'));
    }

    public function reviewPage($id)
    {
        $reservation = Reservation::find($id);
        $shop = Shop::find($reservation->shop_id);
        $existingReview = Review::where('reservation_id', $id)->first();
        $back_url = route('mypage');
        return view('review', compact('reservation', 'shop', 'existingReview', 'back_url'));
    }

    public function review(ReviewRequest $request, $id)
    {
        $reservation = Reservation::find($id);

        // 既存のレビューがあるかチェック
        $existingReview = Review::where('reservation_id', $id)->first();

        if ($existingReview) {
            // 既存のレビューを更新
            $existingReview->update([
                'rating' => $request->rating,
                'comment' => $request->comment
            ]);
            $message = 'レビューを更新しました';
        } else {
            // 新しいレビューを作成
            Review::create([
                'user_id' => Auth::user()->id,
                'reservation_id' => $id,
                'shop_id' => $reservation->shop_id,
                'rating' => $request->rating,
                'comment' => $request->comment
            ]);
            $message = 'レビューを投稿しました';
        }

        return redirect()->route('done', compact('message'));
    }
}
