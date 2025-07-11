@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/qrcode/reservations.css') }}">
@endsection

@section('content')
<div class="reservation-qrcode-container">
    <div class="reservation-header">
        <h1 class="reservation-title">予約QRコード</h1>
        <p class="reservation-subtitle">このQRコードを店舗で提示してください</p>
    </div>

    <div class="qrcode-section">
        <div class="qrcode-display">
            <h3>QRコード</h3>
            <div class="qrcode-image">
                {!! $qrCode !!}
            </div>
            <p>スマートフォンでスキャンして予約情報を確認できます</p>
        </div>

        <div class="reservation-details">
            <h3>予約詳細</h3>
            <div class="detail-item">
                <span class="detail-label">店舗名:</span>
                <span class="detail-value">{{ $reservation->shop->name }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">予約日:</span>
                <span class="detail-value">{{ $reservation->date }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">時間:</span>
                <span class="detail-value">{{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">人数:</span>
                <span class="detail-value">{{ $reservation->number }}人</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">予約者:</span>
                <span class="detail-value">{{ $reservation->user->name }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">予約番号:</span>
                <span class="detail-value">#{{ $reservation->id }}</span>
            </div>
        </div>
    </div>

    <div class="action-buttons">
        <button class="print-button" onclick="window.print()">印刷</button>
        <a href="{{ route('qrcode.generate') }}?data={{ urlencode(json_encode([
            'reservation_id' => $reservation->id,
            'shop_name' => $reservation->shop->name,
            'date' => $reservation->date,
            'time' => $reservation->time,
            'number' => $reservation->number,
            'user_name' => $reservation->user->name
        ])) }}" class="download-button" download="reservation-qrcode.svg">QRコードをダウンロード</a>
        <a href="{{ route('mypage') }}" class="back-button">マイページに戻る</a>
    </div>
</div>
@endsection