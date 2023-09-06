@section('title', 'Оплата')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Контакты</div>
</div>

<div class="payment">
  <div class="page-title">Оплата</div>
  <div class="payment-description">Интернет-магазин работает круглосуточно без выходных и праздников, оформить заказ можно самостоятельно через сайт и по телефону. Сделать заказ по телефону можно каждый день с 9-00 до 18-00. Все заказы, оформленные после этого времени и в выходные дни, обрабатываются в рабочее время в порядке очередности.</div>

  <div class="how-to-order-section payment-how-to-order-section">
    @include('how-to-order')
  </div>

  <div class="payment-description">
    <p>Заказы отгружаются покупателям только после 100% предоплаты. Оплатить заказ можно по безналичному расчету на расчетный счет ООО «Гидравлика»:</p>
    <p>ОГРН: 5147746226030<br>
    ИНН: 7724939863<br>
    КПП: 772101001<br>
    Р/счёт: № 40702810502290000229 в АО «АЛЬФА-БАНК»<br>
    К/счёт: № 30101810200000000593<br>
    БИК: 044525593<br>
    ОКПО: 40023471<br>
    ОКАТО: 45296553000</p>
    <p>Обратите внимание, что счет на оплату действителен на протяжении трех банковских дней, после его мы не гарантируем наличие товара на складе и актуальность цен.</p>
    <p>Счет выставляется на юридическое лицо, указанное во время регистрации в интернет-магазине. Оплату от имени другого юридического лица магазин не принимает.</p>
    <p>Если у вас что-то поменялось, возникла необходимость перечислить оплату с другого счета, свяжитесь с нами, мы поможем решить этот вопрос.</p>
  </div>

  <div class="payment-description">
    <p>Способы оплаты
    <p>Уважаемые клиенты.<br>
    <p>В связи с нестабильным курсом валют - актуальную стоимость товаров уточняйте по телефону +7 (982) 292-88-79 или почте zakaz@gidravlic.com.
    <ul>
      <li>Оплата наличными или банковской картой в офисе при самовывозе.</li>
      <li>Оплата в офисе: Банковские карты/Безналичный расчет.</li>
      <li>На сайте: Безналичный расчет на основании счета.</li>
    </ul>
    <p>Дополнительная информация</p>
    <ul>
      <li>В зависимости от региона список возможных способов оплаты может меняться, подробности узнавайте у менеджеров компании.</li>
      <li>Возврат онлайн платежей осуществляется только безналичным способом по реквизитам указанным клиентом в заявлении на возврат денежных средств.</li>
    </ul>
  </div>
</div>
@endsection