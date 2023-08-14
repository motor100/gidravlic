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
        <img src="/img/temp-cart-heart.png" alt="">
      </div>
      <div class="product-item-remove">
        <form class="form rm-from-cart-form" action="/rmfromcart" method="post">
          <input type="hidden" name="id" value="1">
          <button type="submit" class="rm-from-cart-btn">
            <img src="/img/temp-cart-remove.png" alt="">
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
        <img src="/img/temp-cart-heart.png" alt="">
      </div>
      <div class="product-item-remove">
        <form class="form rm-from-cart-form" action="/rmfromcart" method="post">
          <input type="hidden" name="id" value="1">
          <button type="submit" class="rm-from-cart-btn">
            <img src="/img/temp-cart-remove.png" alt="">
          </button>
        </form>
      </div>
    </div>
  </div>
  <div class="order-info">
    <div class="order-info__title">Ваш заказ:</div>
    <div class="order-info-row order-info-row__quantity">
      <div class="order-info-row__text">Выбрано товаров</div>
      <div class="order-info-row__content">
        <span class="order-info-row__value">1</span>
        <span class="order-info-row__currency">шт</span>
      </div>
    </div>
    <div class="order-info-row order-info-row__discount">
      <div class="order-info-row__text">Скидка:</div>
      <div class="order-info-row__content">
        <span class="order-info-row__value">0</span>
        <span class="order-info-row__currency">р</span>
      </div>
    </div>      
    <div class="order-info-row order-info-row__total-summ">
      <div class="order-info-row__text">Общая сумма:</div>
      <div class="order-info-row__content">
        <span class="order-info-row__value">17 994</span>
        <span class="order-info-row__currency">р</span>
      </div>
    </div>
    <a href="#" class="primary-btn cart-btn place-order-btn">ОФОРМИТЬ ЗАКАЗ</a>
    <div class="delivery-description">Дата и стоимость доставки определяются при оформлении заказа</div>
  </div>
</div>

@endsection