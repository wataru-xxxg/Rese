<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>
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
            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="https://via.placeholder.com/300x200/f5f5f5/666?text=Sushi+Chef" alt="仙人">
                </div>
                <div class="restaurant-info">
                    <h3>仙人</h3>
                    <p class="restaurant-tags">#東京都 #寿司</p>
                    <div class="card-actions">
                        <button class="details-btn">詳しくみる</button>
                        <button class="heart-btn">♡</button>
                    </div>
                </div>
            </div>

            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="https://via.placeholder.com/300x200/f5f5f5/666?text=Wagyu+Beef" alt="牛助">
                </div>
                <div class="restaurant-info">
                    <h3>牛助</h3>
                    <p class="restaurant-tags">#大阪府 #焼肉</p>
                    <div class="card-actions">
                        <button class="details-btn">詳しくみる</button>
                        <button class="heart-btn liked">♥</button>
                    </div>
                </div>
            </div>

            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="https://via.placeholder.com/300x200/f5f5f5/666?text=Japanese+Room" alt="戦慄">
                </div>
                <div class="restaurant-info">
                    <h3>戦慄</h3>
                    <p class="restaurant-tags">#福岡県 #居酒屋</p>
                    <div class="card-actions">
                        <button class="details-btn">詳しくみる</button>
                        <button class="heart-btn liked">♥</button>
                    </div>
                </div>
            </div>

            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="https://via.placeholder.com/300x200/f5f5f5/666?text=Italian+Pizza" alt="ルーク">
                </div>
                <div class="restaurant-info">
                    <h3>ルーク</h3>
                    <p class="restaurant-tags">#東京都 #イタリアン</p>
                    <div class="card-actions">
                        <button class="details-btn">詳しくみる</button>
                        <button class="heart-btn">♡</button>
                    </div>
                </div>
            </div>

            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="https://via.placeholder.com/300x200/f5f5f5/666?text=Ramen+Chef" alt="志摩屋">
                </div>
                <div class="restaurant-info">
                    <h3>志摩屋</h3>
                    <p class="restaurant-tags">#福岡県 #ラーメン</p>
                    <div class="card-actions">
                        <button class="details-btn">詳しくみる</button>
                        <button class="heart-btn">♡</button>
                    </div>
                </div>
            </div>

            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="https://via.placeholder.com/300x200/f5f5f5/666?text=Wagyu+Meat" alt="香">
                </div>
                <div class="restaurant-info">
                    <h3>香</h3>
                    <p class="restaurant-tags">#東京都 #焼肉</p>
                    <div class="card-actions">
                        <button class="details-btn">詳しくみる</button>
                        <button class="heart-btn">♡</button>
                    </div>
                </div>
            </div>

            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="https://via.placeholder.com/300x200/f5f5f5/666?text=Italian+Pizza" alt="JJ">
                </div>
                <div class="restaurant-info">
                    <h3>JJ</h3>
                    <p class="restaurant-tags">#大阪府 #イタリアン</p>
                    <div class="card-actions">
                        <button class="details-btn">詳しくみる</button>
                        <button class="heart-btn">♡</button>
                    </div>
                </div>
            </div>

            <div class="restaurant-card">
                <div class="restaurant-image">
                    <img src="https://via.placeholder.com/300x200/f5f5f5/666?text=Ramen+Shop" alt="らーめん極み">
                </div>
                <div class="restaurant-info">
                    <h3>らーめん極み</h3>
                    <p class="restaurant-tags">#東京都 #ラーメン</p>
                    <div class="card-actions">
                        <button class="details-btn">詳しくみる</button>
                        <button class="heart-btn">♡</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>