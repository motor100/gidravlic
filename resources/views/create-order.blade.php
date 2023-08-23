@section('title', 'Оформление заказа')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="parent">
    <a href="/cart">Корзина</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Оформление заказа</div>
</div>

<div class="create-order">
  <div class="page-title-wrapper">
    <div class="page-title">Оформление заказа</div>
    <a href="/cart" class="primary-btn back-to-cart-btn btn-245">ВЕРНУТЬСЯ В КОРЗИНУ</a>
  </div>
  <form action="" class="form">
    <div class="create-order-item customer-type">
      <div class="create-order-item__title">1. Покупатель</div>
      <div class="flex-container">
        <div class="checkbox-wrapper">
          <input type="radio" name="customer-type" id="customer-type-client" class="custom-checkbox" required>
          <label for="customer-type-client" class="custom-checkbox-label"></label>
          <span class="checkbox-text">Физическое лицо</span>
        </div>
        <div class="checkbox-wrapper">
          <input type="radio" name="customer-type" id="customer-type-company" class="custom-checkbox" required>
          <label for="customer-type-company" class="custom-checkbox-label"></label>
          <span class="checkbox-text">Юридическое лицо</span>
        </div>
      </div>
    </div>
    <div class="create-order-item customer-info">
      <div class="create-order-item__title">2. Личные данные</div>
      <div class="form-group">
        <label for="name-create-order" class="label">Имя <span class="accentcolor">*</span></label>
        <input type="text" name="name" id="name-create-order" class="input-field" required minlength="3" maxlength="20">
      </div>
      <div class="form-group">
        <label for="email-create-order" class="label">E-mail <span class="accentcolor">*</span></label>
        <input type="email" name="email" id="email-create-order" class="input-field" required minlength="3" maxlength="50">
      </div>
      <div class="form-group">
        <label for="phone-create-order" class="label">Телефон <span class="accentcolor">*</span></label>
        <input type="email" name="phone" id="phone-create-order" class="input-field" required size="18">
      </div>
      <div class="form-group">
        <label for="message-create-order" class="label">Комментарии к заказу</label>
        <textarea name="message" id="message-create-order" class="input-field textarea" minlength="3" maxlength="100"></textarea>
      </div>
    </div>
    <div class="create-order-item delivery-method">
      <div class="create-order-item__title">3. Способ доставки</div>
      <div class="flex-container">
        <div class="delivery-method-item">
          <input type="radio" name="delivery-method" id="delivery-method-pickup" class="custom-checkbox">
          <label for="delivery-method-pickup" class="label">Самовывоз</label>
        </div>
        <div class="delivery-method-item">
          <input type="radio" name="delivery-method" id="delivery-method-transport-company" class="custom-checkbox">
          <label for="delivery-method-transport-company" class="label">Транспортная компания</label>
        </div>
      </div>
      <div class="delivery-method-description">
        <div class="content">
          <div class="text">Стоимость: бесплатно<br>Вы можете самостоятельно забрать заказ с нашего<br> склада по адресу:</div>
          <div class="description-item first-description-item">
            <div class="description-item__image">
              <img src="/img/create-order-geolocation.png" alt="">
            </div>
            <div class="description-item__text">​Миасс, Челябинская область, 456300<br>Тургоякское шоссе, 5/11<br>1 этаж</div>
          </div>
          <div class="description-item">
            <div class="description-item__image">
              <img src="/img/create-order-clock.png" alt="">
            </div>
            <div class="description-item__text">с 9:00 до 18:00</div>
          </div>
        </div>
        <div class="map">
          <img src="/img/create-order-map.jpg" alt="">
        </div>
      </div>
    </div>
    <div class="create-order-item payment-method">
      <div class="create-order-item__title">4. Способ оплаты</div>
      <div class="checkbox-wrapper">
        <input type="radio" name="payment-method" id="payment-method-online" class="custom-checkbox" required>
        <label for="payment-method-online" class="custom-checkbox-label"></label>
        <span class="checkbox-text">Онлайн</span>
      </div>

      

      <div class="checkbox-wrapper">
        <input type="radio" name="payment-method" id="payment-method-transfer" class="custom-checkbox" required>
        <label for="payment-method-transfer" class="custom-checkbox-label"></label>
        <span class="checkbox-text">Банковский перевод</span>
      </div>
      <div class="checkbox-wrapper">
        <input type="radio" name="payment-method" id="payment-method-cash" class="custom-checkbox" required>
        <label for="payment-method-cash" class="custom-checkbox-label"></label>
        <span class="checkbox-text">Наличными в офисе</span>
      </div>



    </div>
  </form>

  @include('order-info')

</div>

@endsection