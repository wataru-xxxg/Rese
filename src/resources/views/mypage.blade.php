@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="user-greeting">
    <h2>{{ Auth::user()->name }}さん</h2>
</div>

<div class="content-wrapper">
    <div class="reservation-section">
        <h3>予約状況</h3>
        <div class="reservation-card">
            <div class="reservation-header">
                <div class="clock-icon">🕐</div>
                <span class="reservation-number">予約1</span>
                <button class="close-btn">✕</button>
            </div>
            <div class="reservation-details">
                <div class="detail-row">
                    <span class="label">Shop</span>
                    <span class="value">仙人</span>
                </div>
                <div class="detail-row">
                    <span class="label">Date</span>
                    <span class="value">2021-04-01</span>
                </div>
                <div class="detail-row">
                    <span class="label">Time</span>
                    <span class="value">17:00</span>
                </div>
                <div class="detail-row">
                    <span class="label">Number</span>
                    <span class="value">1人</span>
                </div>
            </div>
        </div>
    </div>

    <div class="favorites-section">
        <h3>お気に入り店舗</h3>
        <div class="restaurant-cards">
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="https://images.unsplash.com/photo-1579027989536-b7b1f875659b?w=300&h=200&fit=crop" alt="仙人">
                </div>
                <div class="restaurant-info">
                    <h4>仙人</h4>
                    <p>#東京都 #寿司</p>
                    <div class="restaurant-actions">
                        <button class="details-btn">詳しくみる</button>
                        <button class="favorite-btn active">❤️</button>
                    </div>
                </div>
            </div>

            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=300&h=200&fit=crop" alt="牛助">
                </div>
                <div class="restaurant-info">
                    <h4>牛助</h4>
                    <p>#大阪府 #焼肉</p>
                    <div class="restaurant-actions">
                        <button class="details-btn">詳しくみる</button>
                        <button class="favorite-btn active">❤️</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection