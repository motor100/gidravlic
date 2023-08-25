@section('title', '404')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">404</div>
</div>

<div class="page404">
  <div class="page404-image">
    <img src="/img/404-cloud.svg" alt="">
  </div>
  <div class="page404-title">404</div>
  <div class="page404-subtitle">СТРАНИЦА НЕ НАЙДЕНА</div>
  <div class="page404-text">страница, на которую вы пытаетесь попасть<br>
    не существует или была удалена.<br>
    Перейдите на <a href="/">Главную страницу</a></div>
</div>

@endsection