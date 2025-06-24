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
    @yield('css')
</head>

<body>
    <header class="header">
        @include('components.menu')
        <div class="header-container">
            <div class="logo">
                <a class="menu-button" href="#modal-menu">
                    <div class="logo-icon"></div>
                </a>
                <h1 class="logo-text">Rese</h1>
            </div>
            @if (Route::is('index'))
            @include('components.search')
            @endif
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>

</html>