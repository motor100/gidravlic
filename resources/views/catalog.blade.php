@section('title', 'Каталог')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Каталог</div>
</div>

<div class="category">
  <div class="page-title-wrapper">
    <div class="page-title">Каталог</div>
    <div class="count_products">
      <span class="count_products__text">Найдено:</span>
      <span class="count_products__value">{{ $products->total() }}</span>
      <span class="count_products__text">товаров</span>
    </div>
  </div>

  <div class="categories subcategories">
    <div class="row">
      @foreach($categories as $cat)
        <div class="col-md-4">
          <div class="subcategories-item">
            <div class="subcategories-item__image">
              <img src="{{ Storage::url($cat->image) }}" alt="">
            </div>
            <div class="subcategories-item__title">{{ $cat->title }}</div>
            <a href="/category/{{ $cat->slug }}" class="full-link"></a>
          </div>
        </div>
      @endforeach     
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