<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Reservation extends Component
{
    public $shop;
    public $date;
    public $time;
    public $number;

    public function mount($shop)
    {
        $this->shop = $shop;
        $this->date = date('Y-m-d');
        $this->time = '17:00';
        $this->number = 1;
    }

    public function render()
    {
        return view('livewire.reservation');
    }
}
