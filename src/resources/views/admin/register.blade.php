@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/register.css') }}">
@endsection

@section('content')
<div class="registration-container">
    <div class="registration-header">
        <h1 class="registration-title">Registration</h1>
    </div>
    <form class="registration-form" action="{{ route('admin.register.owner.store') }}" method="POST">
        @csrf
        <div class="input-group">
            <div class="input-icon user-icon"></div>
            <input type="text" placeholder="Owner Name" name="name" class="input-field">
        </div>
        @error('name')
        <div class="form-error">
            {{ $message }}
        </div>
        @enderror

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

        <input type="hidden" name="role_id" value="2">

        <button type="submit" class="submit-btn">登録</button>
    </form>
</div>
@endsection