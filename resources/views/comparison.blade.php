@section('title', 'Сравнение')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Сравнение</div>
</div>

<div class="comparison">
  <div class="page-title">Сравнение</div>
  <button class="primary-btn comparison-clear-btn btn-305">ОЧИСТИТЬ СРАВНЕНИЕ</button>
  <div class="favourites-products">
    <div class="row">
      <div class="col-4">
        @include('regular-product-item')
      </div>
    </div>
  </div>


</div>

@endsection