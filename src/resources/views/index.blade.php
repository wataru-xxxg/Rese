@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/favorite.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/restaurant-card.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/search.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/grid.css') }}">
@endsection

@section('livewire')
@livewireStyles
@endsection

@section('content')
@livewire('grid')
@livewireScripts
@endsection