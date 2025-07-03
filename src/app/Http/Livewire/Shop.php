<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Area;
use App\Models\Genre;

class Shop extends Component
{
    use WithFileUploads;
    public $shop;
    public $image;
    public $image_path;
    public $area_id;
    public $areaName;
    public $areas;
    public $genre_id;
    public $genreName;
    public $genres;
    public $name;
    public $description;

    public function mount($shop)
    {
        $this->areas = Area::all();
        $this->genres = Genre::all();

        if ($shop) {
            $this->shop = $shop;
            $this->image_path = $shop->image_path;
            $this->area_id = $shop->area_id;
            $this->areaName = $shop->area->name;
            $this->genre_id = $shop->genre_id;
            $this->genreName = $shop->genre->name;
            $this->name = $shop->name;
            $this->description = $shop->description;
        }
    }

    public function updatedAreaId()
    {
        $this->areaName = Area::find($this->area_id)->name;
    }

    public function updatedGenreId()
    {
        $this->genreName = Genre::find($this->genre_id)->name;
    }

    public function render()
    {
        return view('livewire.shop');
    }
}
