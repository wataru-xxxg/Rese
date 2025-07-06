@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/favorite.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/restaurant-card.css') }}">
@endsection

@section('livewire')
@livewireStyles
@endsection

@section('content')
<div class="user-greeting">
    <h2 class="user-name">{{ Auth::user()->name }}さん</h2>
</div>

<div class="content-wrapper">
    <div class="reservation-section">
        <h3 class="section-title">予約状況</h3>
        @foreach ($reservations as $reservation)
        <div class="reservation-card">
            <div class="reservation-header">
                <div class="clock-icon">🕐</div>
                <span class="reservation-number">予約{{ $loop->iteration }}</span>
                <button class="close-btn">✕</button>
            </div>
            <div class="reservation-details">
                <div class="detail-row">
                    <span class="shop-label">Shop</span>
                    <span class="value">{{ $reservation->shop->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="date-label">Date</span>
                    <span class="value">{{ $reservation->date }}</span>
                </div>
                <div class="detail-row">
                    <span class="time-label">Time</span>
                    <span class="value">{{ Carbon\Carbon::parse($reservation->time)->format('H:i') }}</span>
                </div>
                <div class="detail-row">
                    <span class="number-label">Number</span>
                    <span class="value">{{ $reservation->number }}人</span>
                </div>
                <div class="button-container">
                    <a href="{{ route('reservation-change', $reservation->id) }}" class="change-btn">予約変更</a>
                    <a href="{{ route('review', $reservation->id) }}" class="review-btn">レビュー</a>
                    <a href="{{ route('qrcode.reservation', $reservation->id) }}" class="qrcode-btn">QRコード</a>
                    <a href="{{ route('stripe.payment', $reservation->id) }}" class="payment-btn">支払</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="favorites-section">
        <h3 class="section-title">お気に入り店舗</h3>
        <div class="restaurant-cards">
            @foreach ($favorites as $favorite)
            @include('components.restaurant-card', ['shop' => $favorite->shop])
            @endforeach
        </div>
    </div>
</div>
@livewireScripts
@endsection