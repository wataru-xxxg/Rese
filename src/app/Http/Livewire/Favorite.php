<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Favorite as FavoriteModel;
use Illuminate\Support\Facades\Auth;

class Favorite extends Component
{
    public $shop;
    public $isFavorite;

    public function mount($shop)
    {
        $this->shop = $shop;
        $this->isFavorite = FavoriteModel::where('shop_id', $this->shop->id)->where('user_id', Auth::user()->id)->exists();
    }

    public function toggleFavorite()
    {
        if ($this->isFavorite) {
            FavoriteModel::where('shop_id', $this->shop->id)->where('user_id', Auth::user()->id)->delete();
        } else {
            FavoriteModel::create([
                'shop_id' => $this->shop->id,
                'user_id' => Auth::user()->id,
            ]);
        }
        $this->isFavorite = !$this->isFavorite;
    }

    public function render()
    {
        return view('livewire.favorite');
    }
}
