@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/verify-email.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="verification-message">
        <p>登録していただいたメールアドレスに</p>
        <p>認証メールを送付しました。</p>
        <p>メール認証を完了してください。</p>
    </div>

    <a href="/login" class="verification-button">認証はこちらから</a>

    <form action="/email/verification-notification" method="post">
        @csrf
        <input type="submit" value="認証メールを再送する" class="resend-button">
    </form>

    @if (session('message'))
        <div class="alert-message">
            {{ session('message') }}
        </div>
    @endif
</div>
@endsection