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
    <link rel="stylesheet" href="{{ asset('css/owner/edit.css') }}">
    @livewireStyles
</head>

<body>
    @if (isset($shop))
    @livewire('shop', ['shop' => $shop])
    @else
    @livewire('shop', ['shop' => null])
    @endif
    @livewireScripts
</body>

</html>