@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<div class="registration-container">
    <div class="registration-header">
        <h1 class="registration-title">Registration</h1>
    </div>
    <form class="registration-form" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="input-group">
            <div class="input-icon user-icon"></div>
            <input type="text" placeholder="Username" required name="name" class="input-field">
        </div>

        <div class="input-group">
            <div class="input-icon email-icon"></div>
            <input type="email" placeholder="Email" required name="email" class="input-field">
        </div>

        <div class="input-group">
            <div class="input-icon password-icon"></div>
            <input type="password" placeholder="Password" required name="password" class="input-field">
        </div>

        <button type="submit" class="submit-btn">登録</button>
    </form>
</div>
@endsection