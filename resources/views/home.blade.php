@section('title', 'Главная')

@extends('layouts.main')

@section('content')

<div class="home">

  <div class="main-slider-wrapper">
    <div class="main-slider swiper">
      <div class="swiper-wrapper">
        <div class="main-slider-item swiper-slide">
          <div class="slider-item-image">
            <img src="/img/main-slide1.jpg" alt="">
          </div>
          <a href="#" class="primary-btn view-more-btn">Подробнее</a>
        </div>
        <div class="main-slider-item swiper-slide">
          <div class="slider-item-image">
            <img src="/img/temp-main-slide2.jpg" alt="">
          </div>
          <a href="#" class="primary-btn view-more-btn">Подробнее</a>
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <div class="advantages">
    <div class="flex-container">
      <div class="advantages-item">
        <div class="advantages-item__image">
          <img src="/img/advantages-document.svg" alt="">
        </div>
        <div class="advantages-item__title">Широкий ассортимент более 3000 позиций</div>
      </div>
      <div class="advantages-item">
        <div class="advantages-item__image">
          <img src="/img/advantages-star.svg" alt="">
        </div>
        <div class="advantages-item__title">Вся продукция имеет сертификат</div>
      </div>
      <div class="advantages-item">
        <div class="advantages-item__image">
          <img src="/img/advantages-like.svg" alt="">
        </div>
        <div class="advantages-item__title">200 дней гарантия на продукцию</div>
      </div>
      <div class="advantages-item">
        <div class="advantages-item__image">
          <img src="/img/advantages-truck.svg" alt="">
        </div>
        <div class="advantages-item__title">Доставка в любой регион по России</div>
      </div>
    </div>
  </div>
  <div class="categories">
    <div class="row">
      <div class="col-8">
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="/img/category-gidravlicheskie-raspredeliteli.jpg" alt="">
          </div>
          <div class="categories-item__title">ГИДРАВЛИЧЕСКИЕ РАСПРЕДЕЛИТЕЛИ</div>
        </div>
      </div>
      <div class="col-4">
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="/img/category-klapannaya-apparatura.jpg" alt="">
          </div>
          <div class="categories-item__title">КЛАПАННАЯ АППАРАТУРА</div>
        </div>
      </div>
      <div class="col-4">
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="/img/category-gidronasosy.jpg" alt="">
          </div>
          <div class="categories-item__title">ГИДРОНАСОСЫ</div>
        </div>
      </div>
      <div class="col-8">
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="/img/category-rvd-fitingi-mufty-dlya-rvd.jpg" alt="">
          </div>
          <div class="categories-item__title">РВД. ФИТИНГИ, МУФТЫ ДЛЯ РВД</div>
        </div>
      </div>
      
    </div>
  </div>

</div>

@endsection