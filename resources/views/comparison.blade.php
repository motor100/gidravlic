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

  @if($products->count() > 0)
    <a href="/clear-comparison" class="primary-btn comparison-clear-btn btn-305">ОЧИСТИТЬ СРАВНЕНИЕ</a>

    <div class="comparison-products">
      <div class="row">
        @foreach($products as $product)
          <div class="col-4">
            @include('regular-product-item')
          </div>
        @endforeach
      </div>
    </div>
  @else
    <div class="comparison-is-empty ccf-is-empty">
      <div class="comparison-is-empty-image ccf-is-empty-image">
        <img src="/img/comparison-is-empty-chart.svg" alt="">
      </div>
      <div class="comparison-is-empty-text ccf-is-empty-text">Нет товаров для сравнения</div>
      <button class="primary-btn btn-305 ccf-is-empty-btn" onclick="history.back();">ВЕРНУТЬСЯ НАЗАД</button>
    </div>
  @endif

</div>

@endsection