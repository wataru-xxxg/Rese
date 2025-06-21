@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<body>
    <header>
        @include('components.menu')
        <div class="header-container">
            <div class="logo">
                <a class="menu-button" href="#modal-menu">
                    <div class="logo-icon"></div>
                </a>
                <h1>Rese</h1>
            </div>
            <div class="search-container">
                <select class="filter-select">
                    <option>All area</option>
                </select>
                <select class="filter-select">
                    <option>All genre</option>
                </select>
                <input type="text" class="search-input" placeholder="Search ...">
            </div>
        </div>
    </header>

    <main>
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
    </main>
</body>

</html>