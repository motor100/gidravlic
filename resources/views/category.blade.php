@section('title', 'Каталог')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">{{ $category[0]->title }}</div>
</div>

<div class="category">
  <div class="page-title-wrapper">
    <div class="page-title">{{ $category[0]->title }}</div>
    <div class="count_products">
      <span class="count_products__text">Найдено:</span>
      <span class="count_products__value">{{ $products->total() }}</span>
      <span class="count_products__text">товаров</span>
    </div>
  </div>

  <div class="subcategories">
    <div class="row">
      @foreach($subcategories as $subcat)
        <div class="col-md-4 col-sm-6">
          <div class="subcategories-item">
            <div class="subcategories-item__image">
              @if($subcat->image)
                <img src="{{ Storage::url($subcat->image->image) }}" alt="">
              @else
                <img src="/img/no-photo.svg" alt="">
              @endif
            </div>
            <div class="subcategories-item__title">{{ $subcat->title }}</div>
            <a href="/category/{{ $category[0]->slug }}/{{ $subcat->slug }}" class="full-link"></a>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  @if(count($products) > 0)
    <div class="products">
      <div class="row">
        @foreach($products as $product)
          <div class="col-lg-4 col-6">
            @include('regular-product-item')
          </div>
        @endforeach
      </div>
    </div>
  @else
    <div class="category-is-empty ccf-is-empty">
      <div class="category-is-empty-image ccf-is-empty-image">
        <img src="/img/category-is-empty-bell.svg" alt="">
      </div>
      <div class="category-is-empty-text ccf-is-empty-text">В этой категории нет товаров</div>
      <button class="primary-btn btn-305 ccf-is-empty-btn" onclick="history.back();">ВЕРНУТЬСЯ НАЗАД</button>
    </div>
  @endif

  <div class="pagination-links">
    {{ $products->onEachSide(1)->links() }}
  </div>

</div>
@endsection