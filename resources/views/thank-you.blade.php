@section('title', 'Заказ сформирован')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Заказ сформирован</div>
</div>

<div class="thank-you">
  <div class="page-title">Заказ сформирован</div>
  
  <div class="thank-you-content">
    <div class="thank-you-content__title">БЛАГОДАРИМ ЗА ЗАКАЗ!</div>
    <div class="thank-you-content__image">
      <img src="/img/thank-you-checkmark.png" alt="">
    </div>
    @if (isset($order_id) && isset($summ))
      <div class="thank-you-content__text">Ваш заказ {{ $order_id }} успешно создан.</div>
      <div class="thank-you-content__text">Вы можете следить за выполнением своего заказа В ПЕРСОНАЛЬНОМ РАЗДЕЛЕ САЙТА.<br>Обратите внимание, что для входа в этот раздел вам необходимо будет ввести логин и пароль пользователя сайта.</div>
    @endif
  </div>

  <div class="thank-you-payment">
    @if(isset($payment_method))
      <div class="thank-you-payment__title">Оплата заказа</div>
      <div class="thank-you-payment__text">Вы выбрали способ оплаты: {{ $payment_method }}</div>
      <div class="thank-you-payment__summ">
        <span class="text">Сумма к оплате:</span>
        <span class="value">{{ $summ }}</span>
        <span class="currency">р</span>
      </div>
    @endif
  </div>

  @if(isset($payment_method) && $payment_method == 'Онлайн')
    <a href="#" class="primary-btn thank-you-payment-btn btn-245">ОПЛАТИТЬ</a>
  @endif

</div>

@endsection