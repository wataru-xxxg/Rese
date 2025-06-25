@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="confirmation-card">
    <p class="confirmation-message">ご予約ありがとうございます</p>
    <a href="{{ route('index') }}" class="back-button">戻る</a>
</div>
@endsection