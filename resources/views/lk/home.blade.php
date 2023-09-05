@section('title', 'Заказы')

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

<div class="lk-home">
  <div class="page-title">Заказы</div>

  @include('lk.lk-navigation')

  <!-- @ if($orders->count() > 0) -->
    <div class="orders">
      <!-- @ foreach($orders as $order) -->
        <div class="order-item">
          <div class="order-item__number">456823 {{-- $order->id --}}</div>
          <div class="order-item__date">28.07.2023 {{-- $order->created_at->format("d.m.Y") --}}</div>
          <a href="/lk/1{{-- $order->id --}}" class="full-link"></a>
        </div>
      <!-- @ endforeach -->

      <div class="order-item">
        <div class="order-item__number">456823</div>
        <div class="order-item__date">28.07.2023</div>
        <a href="/lk/{{-- $order->id --}}" class="full-link"></a>
      </div>
      <div class="order-item">
        <div class="order-item__number">456823</div>
        <div class="order-item__date">28.07.2023</div>
        <a href="/lk/{{-- $order->id --}}" class="full-link"></a>
      </div>
    </div>

  <!-- @ else -->
    <div class="no-orders">У вас пока нет заказов</div>
  <!-- @ endif -->

</div>
@endsection