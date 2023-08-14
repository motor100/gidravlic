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
    <div class="thank-you-content__text">Ваш заказ №C733 от 24.07.2023 09:02 успешно создан. Номер вашей оплаты: №C733/1</div>
    <div class="thank-you-content__text">Вы можете следить за выполнением своего заказа В ПЕРСОНАЛЬНОМ РАЗДЕЛЕ САЙТА.<br>Обратите внимание, что для входа в этот раздел вам необходимо будет ввести логин и пароль пользователя сайта.</div>
  </div>

  <div class="thank-you-payment">
    <div class="thank-you-payment__title">Оплата заказа</div>
    <div class="thank-you-payment__text">Вы выбрали способ оплаты: Оплата онлайн</div>
    <div class="thank-you-payment__summ">
      <span class="text">Сумма к оплате:</span>
      <span class="value">2 160</span>
      <span class="currency">р</span>
    </div>
  </div>

  <div class="primary-btn payment-btn">ОПЛАТИТЬ</div>

</div>

@endsection