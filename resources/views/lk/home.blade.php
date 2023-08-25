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

<div class="lk-home">
  <div class="page-title">Личный кабинет</div>

  @include('lk.lk-navigation')

  <div class="orders-wrapper">
    <div class="orders-title">Заказы</div>
    <div class="orders">
      <div class="order-item">
        <div class="order-item__number">456823</div>
        <div class="order-item__date">28.07.2023</div>
        <a href="#" class="full-link">{{-- $order->id --}}</a>
      </div>
      <div class="order-item">
        <div class="order-item__number">456823</div>
        <div class="order-item__date">28.07.2023</div>
        <a href="#" class="full-link">{{-- $order->id --}}</a>
      </div>
      <div class="order-item">
        <div class="order-item__number">456823</div>
        <div class="order-item__date">28.07.2023</div>
        <a href="#" class="full-link">{{-- $order->id --}}</a>
      </div>
    </div>
  </div>



  <div class="no-orders">Заказов нет</div>

</div>
@endsection