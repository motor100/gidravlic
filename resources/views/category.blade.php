@section('title', 'Каталог')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">{{ $category[0]->title }}</div>
</div>

<div class="category">
  <div class="page-title-wrapper">
    <div class="page-title">{{ $category[0]->title }}</div>
    <div class="count_products">
      <span class="count_products__text">Найдено:</span>
      <span class="count_products__value">{{ $products->total() }}</span>
      <span class="count_products__text">товаров</span>
    </div>
  </div>

  <div class="subcategories">
    <div class="row">
      @foreach($subcategories as $scat)
        <div class="col-md-4 col-sm-6">
          <div class="subcategories-item">
            <div class="subcategories-item__image">
              <img src="" alt="">
            </div>
            <div class="subcategories-item__title">{{ $scat->title }}</div>
            <a href="/category/{{ $category[0]->slug }}/{{ $scat->slug }}" class="full-link"></a>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- <div class="category-description">Клапанная аппаратура входит в состав каждой гидросистемы (помимо насоса, гидрораспределителей и исполнительных гидродвигателей). Клапана могут использоваться в системе в количестве от единиц до нескольких десятков.</div> -->

  <!-- 
  <div class="products-filter">
    <div class="products-filter-title">
      <div class="products-filter-title__image">
        <img src="/img/services-gear.png" alt="">
      </div>
      <div class="products-filter-title__text">Подобрать товары по параметрам</div>
      <div class="products-filter-title__plus"></div>
    </div>
    <div class="products-filter-content active">
      <p>Рыбатекст используется дизайнерами, проектировщиками и фронтендерами, когда нужно быстро заполнить макеты или прототипы содержимым. Это тестовый контент, который не должен нести никакого смысла, лишь показать наличие самого текста или продемонстрировать типографику в деле.</p>
      <p>Также как начало повседневной работы по формированию позиции обеспечивает широкому кругу (специалистов) участие в формировании приоретизации разума над эмоциями. Лишь предприниматели в сети интернет функционально разнесены на независимые элементы. Есть над чем задуматься: элементы политического процесса представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом и должны быть призваны к ответу!</p>
    </div>
  </div>
   -->

  <div class="products">
    <div class="row">
      @foreach($products as $product)
        <div class="col-lg-4 col-6">
          @include('regular-product-item')
        </div>
      @endforeach
    </div>
  </div>

  <div class="pagination-links">
    {{ $products->onEachSide(1)->links() }}
  </div>

</div>
@endsection