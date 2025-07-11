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
    <link rel="stylesheet" href="{{ asset('css/reviews.css') }}">
    @yield('css')
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
                            <img src="{{ asset('logo.png') }}" alt="ロゴ画像" class="logo-icon">
                        </a>
                        <h1 class="logo-text">Rese</h1>
                    </div>
                </div>
            </header>

            <div class="restaurant-info">
                <a href="{{ $back_url }}" class="back-button">
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

                <div class="reviews-section">
                    <h3 class="reviews-title">レビュー</h3>
                    @if($shop->reviews->count() > 0)
                    <div class="reviews-container">
                        @foreach($shop->reviews as $review)
                        <div class="review-item">
                            <div class="review-header">
                                <div class="review-info">
                                    <span class="review-date">{{ $review->created_at->format('Y/m/d') }}</span>
                                    @if($review->user)
                                    <span class="review-user">{{ $review->user->name }}さん</span>
                                    @endif
                                    <div class="review-rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <=$review->rating)
                                            <span class="star filled">★</span>
                                            @else
                                            <span class="star">☆</span>
                                            @endif
                                            @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="review-comment">
                                <p>{{ $review->comment }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="no-reviews">まだレビューがありません。</p>
                    @endif
                </div>
            </div>
        </section>
        <section class="right-section">
            @yield('right-section')
        </section>
    </div>
    @livewireScripts
</body>

</html>