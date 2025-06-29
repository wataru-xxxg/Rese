<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shop;

class Grid extends Component
{
    public $shops;
    public $area;
    public $genre;
    public $search;

    public function mount()
    {
        $this->shops = Shop::all();
    }

    protected $listeners = [
        'areaUpdated' => 'handleAreaUpdate',
        'genreUpdated' => 'handleGenreUpdate',
        'searchUpdated' => 'handleSearchUpdate'
    ];

    public function handleAreaUpdate($value)
    {
        $this->area = $value;
        $this->search();
    }

    public function handleGenreUpdate($value)
    {
        $this->genre = $value;
        $this->search();
    }

    public function handleSearchUpdate($value)
    {
        $this->search = $value;
        $this->search();
    }

    public function search()
    {
        $query = Shop::query();
        if ($this->area) {
            $query->where('area_id', $this->area);
        }
        if ($this->genre) {
            $query->where('genre_id', $this->genre);
        }
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        $this->shops = $query->get();
    }

    public function render()
    {
        return view('livewire.grid');
    }
}
