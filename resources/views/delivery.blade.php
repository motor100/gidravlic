@section('title', 'Доставка')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Доставка</div>
</div>

<div class="delivery">
  <div class="page-title">Доставка</div>
  <div class="delivery-description">Выбор способа доставки, сроков, временных интервалов и стоимости производится в Корзине при оформлении заказа. Ограничения, актуальные для каждого из способов доставки, учитываются автоматически. При доставке транспортными компаниями может потребоваться документ, подтверждающий личность получателя.</div>
  <div class="delivery-item page-item">
    <div class="page-item__title">САМОВЫВОЗ</div>
    <div class="page-item__content">
      <ul>
        <li>Вы можете самостоятельно (либо через доверенное лицо)  забрать заказ в одном из розничных магазинов ГИДРАВЛИКА</li>
        <li>Принимаем к оплате как наличные, так и пластиковые карты.</li>
      </ul>
      <div class="map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aacd74efbff533d7ec22ecf2b646d7fbcf5ea179505e342c8dbd67af0e3ac1202&amp;width=100%25&amp;height=100%25&amp;lang=ru_RU&amp;scroll=true"></script>
      </div>
    </div>
  </div>
  <div class="delivery-item page-item">
    <div class="page-item__title">ДОСТАВКА ТРАНСПОРТНЫМИ КОМПАНИЯМИ</div>
    <div class="page-item__content">
      <p>Доставка на территории РФ осуществляется транспортными компаниями:</p>
      <div class="flex-container">
        <div class="transport-companies-item">
          <div class="transport-companies-item__image">
            <img src="/img/delilvery-delovye-linii.png" alt="">
          </div>
          <div class="transport-companies-item__text">
            <div class="transport-companies-item__title">Деловые Линии</div>
            <ul class="list">
              <li class="list-item">275 пунктов самовывоза</li>
              <li class="list-item">1 700 городов доставки</li>
              <li class="list-item">от 2 дней</li>
            </ul>
          </div>
        </div>
        <div class="transport-companies-item">
          <div class="transport-companies-item__image">
            <img src="/img/delilvery-cdek.png" alt="">
          </div>
          <div class="transport-companies-item__text">
            <div class="transport-companies-item__title">СДЭК</div>
            <ul>
              <li>2900 пунктов самовывоза</li>
              <li>более 2000 городов </li>
              <li>от 2 дней</li>
            </ul>
          </div>
        </div>
        <div class="transport-companies-item">
          <div class="transport-companies-item__image">
            <img src="/img/delilvery-pek.png" alt="">
          </div>
          <div class="transport-companies-item__text">
            <div class="transport-companies-item__title">ПЭК</div>
            <ul>
              <li>300+ отделений компаний</li>
              <li>200+ городов</li>
              <li>от 2 дней</li>
            </ul>
          </div>
        </div>
      </div>
      <p>Доставка до склада осуществляется бесплатно, Вы оплачиваете только доставку между городами. Тарифы доставки определяются транспортной компанией и зависят от веса, объема и пункта назначения. Ориентировочную стоимость доставки Вы можете рассчитать на сайте одной из перечисленных выше транспортных компаний.</p>
    </div>
  </div>
  <div class="delivery-item page-item">
    <div class="page-item__title">ПРОВЕРКА И ПОЛУЧЕНИЕ ЗАКАЗА</div>
    <div class="page-item__content">
      <p>При получении товара внимательно осмотрите его внешний вид. Убедитесь в отсутствии видимых механических повреждений, в соответствии количества и комплектации товара согласно накладной.</p>
      <p>Расписываясь в документах, подтверждающих получение товара и выполнение доставки (Товарная накладная), Вы подтверждаете прием Вами товара по внешнему виду, комплектации и количеству, а также отсутствие претензий к товару.</p>
      <p>В случае отказа покупателя от подписания документов, подтверждающих получение товара и выполнение доставки, передача товара не производится.</p>
      <p>Водитель-экспедитор не консультирует по вопросам технических параметров и функциональных особенностей товаров, их совместимости, стоимости и т.д.</p>
      <p>При получении товара представителем юридического лица необходимо предъявить доверенность на получение материальных ценностей, оформленную в соответствии с законодательством РФ. Доставка возможна также при наличии на объекте круглой печати.</p>
  </div>
</div>
@endsection