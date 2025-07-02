@extends('layouts.detail')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
@endsection

@section('livewire')
@livewireStyles
@endsection

@section('right-section')
<div class="reservation-form">
    <h2 class="reservation-title">予約</h2>

    @livewire('reservation', ['shop' => $shop])
</div>

<button form="reservation-form" type="submit" class="reserve-button">予約する</button>
@endsection