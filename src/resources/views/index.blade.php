@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="restaurant-grid">
    @foreach ($shops as $shop)
    <div class="restaurant-card">
        <div class="restaurant-image">
            <img src="{{ asset(Storage::url($shop->image_path)) }}" alt="イメージ画像">
        </div>
        <div class="restaurant-info">
            <h3>{{ $shop->name }}</h3>
            <p class="restaurant-tags">#{{ $shop->area->name }} #{{ $shop->genre->name }}</p>
            <div class="card-actions">
                <button class="details-btn">詳しくみる</button>
                <button class="heart-btn">♡</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection