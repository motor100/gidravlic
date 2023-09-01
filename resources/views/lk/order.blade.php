@section('title', 'Личный кабинет')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Личный кабинет</div>
</div>

<div class="lk-order">
  <div class="page-title">Личный кабинет</div>

  @include('lk.lk-navigation')

    <div class="orders-title">Заказ 1 {{-- $rd->id --}}</div>

    <div class="order-description">
      <div class="order-description-row">
        <div class="order-description__title">Дата:</div>
        <div class="order-description__text">28.07.2023 {{-- $order->created_at->format("d.m.Y") --}}</div>
      </div>
      <div class="order-description-row">
        <div class="order-description__title">Сумма:</div>
        <div class="order-description__text">17 254 {{-- $order->price --}} р</div>
      </div>
    </div>

    <div class="order-products">
      <div class="order-products__title">Состав заказа:</div>

        <div class="table">

          <!-- @ foreach($order->products as $product) -->
          <div class="tr">
            <div class="title">Шланг может быть длинное название бла-блабла гидравлический</div>
            <div class="quantity">10 {{-- $order->quantity --}} шт</div>
            <div class="price">2522 {{-- $order->price --}} р</div>
            <div class="button-wrapper">
              <button class="secondary-btn add-to-cart-btn add-to-cart" data-id="{{-- $order->id --}}">Купить</button>
            </div>
          </div>
          <!-- @ endforeach -->

          <div class="tr">
            <div class="title">Фитинг 10 мм</div>
            <div class="quantity">5 шт</div>
            <div class="price">522 р</div>
            <div class="button-wrapper">
              <button class="secondary-btn add-to-cart-btn add-to-cart" data-id="{{-- $order->id --}}">Купить</button>
            </div>
          </div>
          <div class="tr">
            <div class="title">Кран полумерный</div>
            <div class="quantity">2 шт</div>
            <div class="price">17 р</div>
            <div class="button-wrapper">
              <button class="secondary-btn add-to-cart-btn add-to-cart" data-id="{{-- $order->id --}}">Купить</button>
            </div>
          </div>
          <div class="tr">
            <div class="title">Фитинг 10 мм</div>
            <div class="quantity">1 шт</div>
            <div class="price">100 р</div>
            <div class="button-wrapper">
              <button class="secondary-btn add-to-cart-btn add-to-cart" data-id="{{-- $order->id --}}">Купить</button>
            </div>
          </div>


        </div>

    </div>

    <a href="{{ route('lk.index') }}" class="primary-btn btn-305 to-home-btn ">ВЕРНУТЬСЯ К СПИСКУ ЗАКАЗОВ</a>

</div>

@endsection
