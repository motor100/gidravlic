@section('title', 'Личный кабинет')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="parent">
    <a href="{{ route('lk.index') }}">Личный кабинет</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Заказы</div>
</div>

<div class="lk-order">
  <div class="page-title">Заказ {{ $order->id }}</div>

    @include('lk.lk-navigation')

    <div class="order-description">
      <div class="order-description-row">
        <div class="order-description__title">Дата:</div>
        <div class="order-description__text">{{ $order->created_at->format("d.m.Y") }}</div>
      </div>
      <div class="order-description-row">
        <div class="order-description__title">Сумма:</div>
        <div class="order-description__text">{{ $order->summ }} р</div>
      </div>
    </div>

    <div class="order-products">
      <div class="order-products__title">Состав заказа:</div>
      <div class="table">
        @foreach($order->products as $product)
        <div class="tr">
          <div class="title">{{ $product->title }}</div>
          <div class="quantity">{{ $product->pivot->quantity }} шт</div>
          <div class="price">{{ $product->price }} р</div>
          <div class="button-wrapper">
            <button class="secondary-btn add-to-cart-btn add-to-cart" data-id="{{ $product->id }}">Купить</button>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <a href="{{ route('lk.index') }}" class="primary-btn btn-305 to-home-btn ">ВЕРНУТЬСЯ К СПИСКУ ЗАКАЗОВ</a>

</div>

@endsection
