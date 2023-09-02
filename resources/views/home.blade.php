@section('title', 'Главная')

@extends('layouts.main')

@section('content')

<div class="home">

  <div class="main-slider-wrapper">
    <div class="main-slider swiper">
      <div class="swiper-wrapper">
        @foreach($sliders as $slide)
        <div class="main-slider-item swiper-slide">
          <div class="slider-item-image">
            <img src="{{ Storage::url($slide->image) }}" alt="">
          </div>
          <a href="#" class="primary-btn view-more-btn btn-195">Подробнее</a>
        </div>
        @endforeach
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
          <div class="categories-item__title bg-bluecolor">ГИДРАВЛИЧЕСКИЕ РАСПРЕДЕЛИТЕЛИ</div>
          <a href="/category" class="full-link"></a>
        </div>
      </div>
      <div class="col-4">
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="/img/category-klapannaya-apparatura.jpg" alt="">
          </div>
          <div class="categories-item__title bg-lightbluecolor">КЛАПАННАЯ АППАРАТУРА</div>
          <a href="/category" class="full-link"></a>
        </div>
      </div>
      <div class="col-4">
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="/img/category-gidronasosy.jpg" alt="">
          </div>
          <div class="categories-item__title bg-lightbluecolor">ГИДРОНАСОСЫ</div>
          <a href="/category" class="full-link"></a>
        </div>
      </div>
      <div class="col-8">
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="/img/category-rvd-fitingi-mufty-dlya-rvd.jpg" alt="">
          </div>
          <div class="categories-item__title bg-bluecolor">РВД. ФИТИНГИ, МУФТЫ ДЛЯ РВД</div>
          <a href="/category" class="full-link"></a>
        </div>
      </div>
      
    </div>
  </div>

</div>

@endsection