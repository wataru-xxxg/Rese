<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese - Registration</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
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
        </div>
    </header>

    <main>
        <div class="registration-container">
            <div class="registration-header">
                <h2>Registration</h2>
            </div>
            <form class="registration-form" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-group">
                    <div class="input-icon user-icon"></div>
                    <input type="text" placeholder="Username" required name="name">
                </div>

                <div class="input-group">
                    <div class="input-icon email-icon"></div>
                    <input type="email" placeholder="Email" required name="email">
                </div>

                <div class="input-group">
                    <div class="input-icon password-icon"></div>
                    <input type="password" placeholder="Password" required name="password">
                </div>

                <button type="submit" class="submit-btn">登録</button>
            </form>
        </div>
    </main>
</body>

</html>