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

  <div class="advantages"></div>
  <div class="categories"></div>

</div>

@endsection