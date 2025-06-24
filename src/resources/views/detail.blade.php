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

                <form action="{{ route('reservation') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="date" value="{{ date('Y/m/d') }}" class="date-input" name="date">
                    </div>

                    <div class="form-group">
                        <select class="form-input" name="time">
                            <option>17:00</option>
                            <option>17:30</option>
                            <option>18:00</option>
                            <option>18:30</option>
                            <option>19:00</option>
                            <option>19:30</option>
                            <option>20:00</option>
                            <option>20:30</option>
                            <option>21:00</option>
                            <option>21:30</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-input" name="number">
                            <option>1人</option>
                            <option>2人</option>
                            <option>3人</option>
                            <option>4人</option>
                            <option>5人</option>
                            <option>6人</option>
                            <option>7人</option>
                            <option>8人</option>
                            <option>9人</option>
                            <option>10人</option>
                        </select>
                    </div>

                    <div class="reservation-summary">
                        <div class="summary-row">
                            <span class="shop-label">Shop</span>
                            <span class="value">仙人</span>
                        </div>
                        <div class="summary-row">
                            <span class="date-label">Date</span>
                            <span class="value">2021-04-01</span>
                        </div>
                        <div class="summary-row">
                            <span class="time-label">Time</span>
                            <span class="value">17:00</span>
                        </div>
                        <div class="summary-row">
                            <span class="number-label">Number</span>
                            <span class="value">1人</span>
                        </div>
                    </div>
                </form>
            </div>

            <button type="submit" class="reserve-button">予約する</button>
        </section>
    </div>
</body>

</html>