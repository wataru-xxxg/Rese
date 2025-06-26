<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    @livewireStyles
</head>

<body>
    <div class="container">
        <section class="left-section">
            <header class="header">
                @include('components.menu')
                <div class="header-container">
                    <div class="logo">
                        <a class="menu-button" href="#modal-menu">
                            <div class="logo-icon"></div>
                        </a>
                        <h1 class="logo-text">Rese</h1>
                    </div>
                </div>
            </header>

            <div class="restaurant-info">
                <a href="{{ route('index') }}" class="back-button">
                    <span class="back-button-icon">&lt;</span>
                    <span>{{ $shop->name }}</span>
                </a>

                <div class="image-container">
                    <img src="{{ asset(Storage::url($shop->image_path)) }}" alt="イメージ画像" class="restaurant-image">
                </div>

                <div class="tags">
                    <span class="tag">#{{ $shop->area->name }}</span>
                    <span class="tag">#{{ $shop->genre->name }}</span>
                </div>

                <div class="description">
                    <p>{{ $shop->description }}</p>
                </div>
            </div>
        </section>
        <section class="right-section">
            <div class="reservation-form">
                <h2 class="reservation-title">予約</h2>

                @livewire('reservation', ['shop' => $shop])
            </div>

            <button form="reservation-form" type="submit" class="reserve-button">予約する</button>
        </section>
    </div>
    @livewireScripts
</body>

</html>