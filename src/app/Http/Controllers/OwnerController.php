<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:owner');
    }

    /**
     * オーナーマイページ
     */
    public function myPage()
    {
        $user = Auth::user();
        $shops = Shop::where('owner_id', $user->id)->get();
        $reservations = Reservation::whereIn('shop_id', $shops->pluck('id'))->get();
        $isOwner = true;

        return view('owner.mypage', compact('shops', 'reservations', 'isOwner'));
    }

    /**
     * 店舗作成ページ
     */
    public function createShop()
    {
        return view('owner.edit');
    }

    /**
     * 店舗作成処理
     */
    public function storeShop(Request $request)
    {
        $name = $request->name;
        $description = $request->description;
        $image = $request->file('image');
        $image_path = $image->store('public/image/shop');
        $area_id = $request->area_id;
        $genre_id = $request->genre_id;
        $user = Auth::user();

        Shop::create([
            'name' => $name,
            'description' => $description,
            'image_path' => $image_path,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'owner_id' => $user->id,
        ]);

        $message = '店舗情報を更新しました';

        return redirect()->route('done', compact('message'));
    }

    /**
     * 店舗編集ページ
     */
    public function editShop($id)
    {
        $shop = Shop::find($id);

        return view('owner.edit', compact('shop'));
    }

    /**
     * 店舗更新処理
     */
    public function updateShop(Request $request, $id)
    {
        $user = Auth::user();
        $shop = Shop::where('id', $id)
            ->where('owner_id', $user->id)
            ->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|url',
        ]);

        $shop->update($request->all());

        return redirect()->route('owner.shops')->with('success', '店舗情報を更新しました');
    }

    /**
     * 予約一覧
     */
    public function reservations()
    {
        $user = Auth::user();
        $reservations = Reservation::whereIn('shop_id', function ($query) use ($user) {
            $query->select('id')->from('shops')->where('owner_id', $user->id);
        })->with(['user', 'shop'])->paginate(10);

        return view('owner.reservations.index', compact('reservations'));
    }

    /**
     * 予約詳細
     */
    public function reservationDetail($id)
    {
        $user = Auth::user();
        $reservation = Reservation::where('id', $id)
            ->whereIn('shop_id', function ($query) use ($user) {
                $query->select('id')->from('shops')->where('owner_id', $user->id);
            })->with(['user', 'shop'])->firstOrFail();

        return view('owner.reservations.detail', compact('reservation'));
    }

    /**
     * レビュー一覧
     */
    public function reviews()
    {
        $user = Auth::user();
        $reviews = Review::whereIn('shop_id', function ($query) use ($user) {
            $query->select('id')->from('shops')->where('owner_id', $user->id);
        })->with(['user', 'shop'])->paginate(10);

        return view('owner.reviews.index', compact('reviews'));
    }

    /**
     * レビュー詳細
     */
    public function reviewDetail($id)
    {
        $user = Auth::user();
        $review = Review::where('id', $id)
            ->whereIn('shop_id', function ($query) use ($user) {
                $query->select('id')->from('shops')->where('owner_id', $user->id);
            })->with(['user', 'shop'])->firstOrFail();

        return view('owner.reviews.detail', compact('review'));
    }
}
