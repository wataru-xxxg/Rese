@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/owner/notification.css') }}">
@endsection

@section('content')
<div class="notification-container">
    <div class="notification-header">
        <h1 class="notification-title">お知らせメール送信</h1>
        <p class="notification-subtitle">予約者にお知らせメールを送信します</p>
    </div>

    <div class="reservation-info">
        <h3>予約情報</h3>
        <div class="info-grid">
            <div class="info-item">
                <span class="label">店舗名:</span>
                <span class="value">{{ $reservation->shop->name }}</span>
            </div>
            <div class="info-item">
                <span class="label">予約者:</span>
                <span class="value">{{ $reservation->user->name }}</span>
            </div>
            <div class="info-item">
                <span class="label">予約日:</span>
                <span class="value">{{ $reservation->date }}</span>
            </div>
            <div class="info-item">
                <span class="label">時間:</span>
                <span class="value">{{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}</span>
            </div>
            <div class="info-item">
                <span class="label">人数:</span>
                <span class="value">{{ $reservation->number }}人</span>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="error-message">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('owner.notification.send', $reservation->id) }}" method="POST" class="notification-form">
        @csrf

        <div class="form-group">
            <label for="message_type" class="form-label">メッセージタイプ</label>
            <select name="message_type" id="message_type" class="form-select" required>
                <option value="">選択してください</option>
                <option value="info">お知らせ</option>
                <option value="reminder">リマインダー</option>
                <option value="change">予約変更</option>
                <option value="cancel">予約キャンセル</option>
            </select>
        </div>

        <div class="form-group">
            <label for="custom_message" class="form-label">カスタムメッセージ（任意）</label>
            <textarea name="custom_message" id="custom_message" class="form-textarea" rows="4" placeholder="追加のメッセージがあれば入力してください"></textarea>
        </div>

        <div class="button-group">
            <button type="submit" class="send-button">メール送信</button>
            <a href="{{ route('owner.mypage') }}" class="cancel-button">キャンセル</a>
        </div>
    </form>
</div>
@endsection