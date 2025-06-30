@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
<div class="login-container">
    <div class="login-header">
        <h1 class="login-title">Login</h1>
    </div>
    <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf
        <div class="input-group">
            <div class="input-icon email-icon"></div>
            <input type="email" placeholder="Email" name="email" class="input-field">
        </div>
        @error('email')
        <div class="form-error">
            {{ $message }}
        </div>
        @enderror

        <div class="input-group">
            <div class="input-icon password-icon"></div>
            <input type="password" placeholder="Password" name="password" class="input-field">
        </div>
        @error('password')
        <div class="form-error">
            {{ $message }}
        </div>
        @enderror

        <button type="submit" class="login-btn">ログイン</button>
    </form>
</div>
@endsection