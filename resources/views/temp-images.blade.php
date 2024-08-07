@section('title', 'Изображения')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">изображения</div>
</div>

<div class="category">
  <div class="page-title-wrapper">
    <div class="page-title">Изображения</div>
    <div class="count_products">
      <span class="count_products__text">Найдено:</span>
      <span class="count_products__value">{{ $products->count() }}</span>
      <span class="count_products__text">товаров</span>
    </div>
  </div>

  <div class="products">
    <div class="row">
      @foreach($products as $product)
        <div class="col-lg-4 col-6">
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