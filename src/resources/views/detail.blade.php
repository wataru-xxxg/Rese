<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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

                <div class="restaurant-image">
                    <img src="{{ asset(Storage::url($shop->image_path)) }}" alt="イメージ画像">
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
                <h2>予約</h2>

                <form>
                    <div class="form-group">
                        <input type="date" value="2021-04-01" class="form-input">
                    </div>

                    <div class="form-group">
                        <input type="time" value="17:00" class="form-input">
                    </div>

                    <div class="form-group">
                        <select class="form-input">
                            <option>1人</option>
                            <option>2人</option>
                            <option>3人</option>
                            <option>4人</option>
                        </select>
                    </div>

                    <div class="reservation-summary">
                        <div class="summary-row">
                            <span class="label">Shop</span>
                            <span class="value">仙人</span>
                        </div>
                        <div class="summary-row">
                            <span class="label">Date</span>
                            <span class="value">2021-04-01</span>
                        </div>
                        <div class="summary-row">
                            <span class="label">Time</span>
                            <span class="value">17:00</span>
                        </div>
                        <div class="summary-row">
                            <span class="label">Number</span>
                            <span class="value">1人</span>
                        </div>
                    </div>

                    <button type="submit" class="reserve-button">予約する</button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>