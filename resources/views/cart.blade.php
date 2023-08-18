@section('title', 'Корзина')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Корзина</div>
</div>

<div class="cart">
  <div class="page-title">Корзина</div>
  <a href="/clear-cart" class="primary-btn cart-btn">ОЧИСТИТЬ КОРЗИНУ</a>
  <div class="products">
    <div class="product-item">
      <div class="product-item__title">Шланг гидравлический высокого давления TR-1721 d32мм</div>
      <div class="product-item__stock">в наличии</div>
      <div class="product-item__quantity">
        <button type="button" class="quantity-button quantity-minus" data-id="1">
          <div class="circle"></div>
        </button>
        <input class="quantity-number js-item-quantity" type="number" name="quantity" max="1" min="1" step="1" data-id="1" value="1" readonly>
        <button type="button" class="quantity-button quantity-plus" data-id="1">
          <div class="circle"></div>
        </button>
      </div>
      <div class="product-item__price">
        <span class="product-item__value">17 994</span>
        <span class="product-item__currency">p</span>
      </div>
      <div class="product-item-favourites add-to-favourites" data-id="1">
        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15.9293 0C13.7428 0 12.0708 1.28617 10.6239 2.66881C9.27339 1.22186 7.53705 0 5.31841 0C2.19943 0 0.0129395 2.66881 0.0129395 5.59485C0.0129395 7.17042 0.656026 8.29582 1.36342 9.35691L9.59493 19.2604C10.5274 20.2251 10.7203 20.2251 11.6528 19.2604L19.9165 9.35691C20.7203 8.29582 21.267 7.17042 21.267 5.59485C21.267 2.66881 19.0483 0 15.9293 0Z"/>
        </svg>
      </div>
      <div class="product-item-remove">
        <form class="form rm-from-cart-form" action="/rmfromcart" method="post">
          <input type="hidden" name="id" value="1">
          <button type="submit" class="rm-from-cart-btn">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.5659 0.434191C14.0133 -0.157914 13.1054 -0.157914 12.5527 0.434191L7.5001 5.48682L2.44747 0.434191C1.89484 -0.157914 0.986945 -0.157914 0.434313 0.434191C-0.157792 0.986823 -0.157792 1.89472 0.434313 2.44735L5.48694 7.49998L0.434313 12.5526C-0.157792 13.1052 -0.157792 14.0131 0.434313 14.5658C0.986945 15.1579 1.89484 15.1579 2.44747 14.5658L7.5001 9.51314L12.5527 14.5658C13.1054 15.1579 14.0133 15.1579 14.5659 14.5658C15.158 14.0131 15.158 13.1052 14.5659 12.5526L9.51326 7.49998L14.5659 2.44735C15.158 1.89472 15.158 0.986823 14.5659 0.434191Z"/>
            </svg>
          </button>
        </form>
      </div>
    </div>
    <div class="product-item">
      <div class="product-item__title">Шланг гидравлический высокого давления TR-1721 d32мм</div>
      <div class="product-item__stock">в наличии</div>
      <div class="product-item__quantity">
        <button type="button" class="quantity-button quantity-minus" data-id="1">
          <div class="circle"></div>
        </button>
        <input class="quantity-number js-item-quantity" type="number" name="quantity" max="1" min="1" step="1" data-id="1" value="1" readonly>
        <button type="button" class="quantity-button quantity-plus" data-id="1">
          <div class="circle"></div>
        </button>
      </div>
      <div class="product-item__price">
        <span class="product-item__value">17 994</span>
        <span class="product-item__currency">p</span>
      </div>
      <div class="product-item-favourites add-to-favourites" data-id="1">
        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15.9293 0C13.7428 0 12.0708 1.28617 10.6239 2.66881C9.27339 1.22186 7.53705 0 5.31841 0C2.19943 0 0.0129395 2.66881 0.0129395 5.59485C0.0129395 7.17042 0.656026 8.29582 1.36342 9.35691L9.59493 19.2604C10.5274 20.2251 10.7203 20.2251 11.6528 19.2604L19.9165 9.35691C20.7203 8.29582 21.267 7.17042 21.267 5.59485C21.267 2.66881 19.0483 0 15.9293 0Z"/>
        </svg>
      </div>
      <div class="product-item-remove">
        <form class="form rm-from-cart-form" action="/rmfromcart" method="post">
          <input type="hidden" name="id" value="1">
          <button type="submit" class="rm-from-cart-btn">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.5659 0.434191C14.0133 -0.157914 13.1054 -0.157914 12.5527 0.434191L7.5001 5.48682L2.44747 0.434191C1.89484 -0.157914 0.986945 -0.157914 0.434313 0.434191C-0.157792 0.986823 -0.157792 1.89472 0.434313 2.44735L5.48694 7.49998L0.434313 12.5526C-0.157792 13.1052 -0.157792 14.0131 0.434313 14.5658C0.986945 15.1579 1.89484 15.1579 2.44747 14.5658L7.5001 9.51314L12.5527 14.5658C13.1054 15.1579 14.0133 15.1579 14.5659 14.5658C15.158 14.0131 15.158 13.1052 14.5659 12.5526L9.51326 7.49998L14.5659 2.44735C15.158 1.89472 15.158 0.986823 14.5659 0.434191Z"/>
            </svg>
          </button>
        </form>
      </div>
    </div>
  </div>

  @include('order-info')

</div>

@endsection