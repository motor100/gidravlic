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
            <div class="regular-product-item">
              <div class="regular-product-item__image">
                <a href="/catalog/{{ $product->slug }}" class="regular-product-item__link">
                  <img src="{{ Storage::url($product->image) }}" alt="">
                </a>
              </div>
              <a href="/catalog/{{ $product->slug }}" class="regular-product-item__title">{{ $product->title }}</a>
              <div class="regular-product-item__price">
                <span class="regular-product-item__value">{{ number_format($product->price, 0, "", " ") }}</span>
                <span class="regular-product-item__currency">р</span>
              </div>
              <button class="secondary-btn add-to-cart-btn add-to-cart" data-id="{{ $product->id }}">КУПИТЬ</button>
              @if($product->hit)
                <div class="regular-product-item__label">
                  <span class="regular-product-item__label-text">ХИТ</span>
                </div>
              @endif
              <div class="regular-product-item-favourites add-to-favourites active" data-id="{{ $product->id }}">
                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.9293 0C13.7428 0 12.0708 1.28617 10.6239 2.66881C9.27339 1.22186 7.53705 0 5.31841 0C2.19943 0 0.0129395 2.66881 0.0129395 5.59485C0.0129395 7.17042 0.656026 8.29582 1.36342 9.35691L9.59493 19.2604C10.5274 20.2251 10.7203 20.2251 11.6528 19.2604L19.9165 9.35691C20.7203 8.29582 21.267 7.17042 21.267 5.59485C21.267 2.66881 19.0483 0 15.9293 0Z"/>
                </svg>
              </div>
              <div class="regular-product-item-comparison add-to-comparison" data-id="{{ $product->id }}">
                <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.9856 10.0185H13.7307C13.0663 10.0185 12.4757 10.5721 12.4757 11.2734V18.7663C12.4757 19.4306 13.0663 19.9843 13.7307 19.9843H14.9856C15.6869 19.9843 16.2406 19.4306 16.2406 18.7663V11.2734C16.2406 10.5721 15.6869 10.0185 14.9856 10.0185ZM8.74778 0.0157471H7.49282C6.79152 0.0157471 6.23787 0.569404 6.23787 1.2707V18.7663C6.23787 19.4306 6.79152 19.9843 7.49282 19.9843H8.74778C9.44908 19.9843 10.0027 19.4306 10.0027 18.7663V1.2707C10.0027 0.569404 9.44908 0.0157471 8.74778 0.0157471ZM2.50991 5.62614H1.25496C0.553657 5.62614 0 6.17979 0 6.88109V18.7663C0 19.4306 0.553657 19.9843 1.25496 19.9843H2.50991C3.1743 19.9843 3.76487 19.4306 3.76487 18.7663V6.88109C3.76487 6.17979 3.1743 5.62614 2.50991 5.62614Z"/>
                </svg>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @else
    <div class="favourites-is-empty ccf-is-empty">
      <div class="favourites-is-empty-image ccf-is-empty-image">
        <img src="/img/favourites-is-empty-heart.svg" alt="">
      </div>
      <div class="favourites-is-empty-text ccf-is-empty-text">В списке желаемых покупок нет товаров</div>
      <button class="primary-btn btn-305 ccf-is-empty-btn" onclick="history.back();">ВЕРНУТЬСЯ НАЗАД</button>
    </div>
  @endif

</div>

@endsection