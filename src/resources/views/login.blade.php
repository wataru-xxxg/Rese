<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese - ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <div class="logo-icon"></div>
                <span class="logo-text">Rese</span>
            </div>
        </header>
        
        <main>
            <div class="login-form">
                <div class="form-header">
                    <h1>Login</h1>
                </div>
                <form action="/login" method="POST">
                    @csrf
                    <div class="input-group">
                        <div class="input-icon">✉</div>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <div class="input-icon">🔒</div>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="login-btn">ログイン</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>