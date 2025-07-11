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
    @yield('css')
    @yield('livewire')
</head>

<body>
    <header class="header">
        @include('components.menu')
        <div class="header-container">
            <div class="logo">
                <a class="menu-button" href="#modal-menu">
                    <img src="{{ asset('logo.png') }}" alt="ロゴ画像" class="logo-icon">
                </a>
                <h1 class="logo-text"><a class="logo-link" href="{{ route('index') }}">Rese</a></h1>
            </div>
            @if (Route::is('index'))
            @livewire('search')
            @endif
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>

</html>