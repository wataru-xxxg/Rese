<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reservation as ReservationModel;
use Carbon\Carbon;

class Reservation extends Component
{
    public $shop;
    public $date;
    public $time;
    public $number;
    public $availableTimes = ['17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00', '21:30'];
    public $reservedTimes = [];
    public $reservations;
    public $isChange = false;
    public $reservation;


    public function mount($shop, $reservation = null)
    {
        $this->shop = $shop;
        $this->date = date('Y-m-d');
        $this->number = 1;
        $this->reservations = ReservationModel::where('shop_id', $this->shop->id)->where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->get();
        $this->createAvailableTimes();
        $this->time = reset($this->availableTimes);
        $this->reservation = $reservation;
        $this->isChange = $reservation ? true : false;
    }

    public function updatedDate()
    {
        $this->createAvailableTimes();
    }

    public function createAvailableTimes()
    {
        $this->reservations = ReservationModel::where('shop_id', $this->shop->id)->where('date', '=', $this->date)->get();
        foreach ($this->reservations as $reservation) {
            $this->reservedTimes[] = Carbon::parse($reservation->time)->format('H:i');
        }
        $this->availableTimes = array_diff($this->availableTimes, $this->reservedTimes);
    }

    public function render()
    {
        return view('livewire.reservation');
    }
}
