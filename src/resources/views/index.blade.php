@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/favorite.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/restaurant-card.css') }}">
@endsection

@section('livewire')
@livewireStyles
@endsection

@section('content')
<div class="restaurant-grid">
    @foreach ($shops as $shop)
    @include('components.restaurant-card', ['shop' => $shop])
    @endforeach
</div>
@livewireScripts
@endsection