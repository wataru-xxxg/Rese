<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;
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
        $shop = Shop::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|url',
        ]);

        $name = $request->name;
        $area_id = $request->area_id;
        $genre_id = $request->genre_id;
        $description = $request->description;

        $shop->update([
            'name' => $name,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'description' => $description,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('public/image/shop');
            $shop->image_path = $image_path;
            $shop->save();
        }

        $message = '店舗情報を更新しました';

        return redirect()->route('done', compact('message'));
    }
}
