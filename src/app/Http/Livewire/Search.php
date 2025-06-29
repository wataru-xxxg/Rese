<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Area;
use App\Models\Genre;

class Search extends Component
{
    public $areas;
    public $genres;
    public $area;
    public $genre;
    public $search;

    public function mount()
    {
        $this->areas = Area::all();
        $this->genres = Genre::all();
        $this->area = null;
        $this->genre = null;
        $this->search = null;
    }

    public function updatedArea($value)
    {
        $this->area = $value;
        $this->emit('areaUpdated', $this->area);
    }

    public function updatedGenre($value)
    {
        $this->genre = $value;
        $this->emit('genreUpdated', $this->genre);
    }

    public function updatedSearch($value)
    {
        $this->search = $value;
        $this->emit('searchUpdated', $this->search);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
