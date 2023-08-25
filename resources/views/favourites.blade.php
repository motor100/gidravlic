@section('title', 'Избранное')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Избранное</div>
</div>

<div class="favourites">
  <div class="page-title">Избранное</div>

  @if($products->count() > 0)
    <a href="/clear-favourites" class="primary-btn favourites-clear-btn btn-305">ОЧИСТИТЬ ИЗБРАННОЕ</a>

    <div class="favourites-products">
      <div class="row">
        @foreach($products as $product)
          <div class="col-4">
            @include('regular-product-item')
          </div>
        @endforeach
      </div>
    </div>
  @else
    <div class="favourites-is-empty">
      <div class="favourites-is-empty-image">
        <img src="/img/favourites-is-empty-heart.svg" alt="">
      </div>
      <div class="favourites-is-empty-text">В списке желаемых покупок нет товаров</div>
      <button class="primary-btn btn-305 favourites-is-empty-btn" onclick="history.back();">ВЕРНУТЬСЯ НАЗАД</button>
    </div>
  @endif

</div>

@endsection