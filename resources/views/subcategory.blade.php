@section('title', 'Каталог')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">ТОРМОЗНЫЕ КЛАПАНЫ</div>
</div>

<div class="category">
  <div class="page-title-wrapper">
    <div class="page-title">ТОРМОЗНЫЕ КЛАПАНЫ</div>
    <div class="count_products">
      <span class="count_products__text">Найдено:</span>
      <span class="count_products__value">30</span>
      <span class="count_products__text">товаров</span>
    </div>
  </div>

  <div class="products">
    <div class="row">
      @foreach($products as $product)
        <div class="col-md-4">
          @include('regular-product-item')
        </div>
      @endforeach
    </div>
  </div>

  <div class="pagination-links">
    {{ $products->onEachSide(1)->links() }}
  </div>

</div>
@endsection