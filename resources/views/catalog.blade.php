@section('title', 'Каталог')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Каталог</div>
</div>

<div class="category">
  <div class="page-title-wrapper">
    <div class="page-title">Каталог</div>
    <div class="count_products">
      <span class="count_products__text">Найдено:</span>
      <span class="count_products__value">230</span>
      <span class="count_products__text">товаров</span>
    </div>
  </div>

  <div class="subcategories">
    <div class="row">
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Гидрозамки</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Тормозные клапаны</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Предохранительные клапаны</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Клапаны обратные</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Делители потока</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Регуляторы расхода</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Клапаны управления давлением</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Клапаны редукционные</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Клапаны ограничения перемещения</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Диверторы</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Дроссели</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Краны шаровые</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Гидравлические соединения</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Пропорциональные регуляторы расхода</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="subcategories-item">
          <div class="subcategories-item__image">
            <img src="/img/temp-category-image.png" alt="">
          </div>
          <div class="subcategories-item__title">Диверторы электромагнитные</div>
          <a href="/category/subcategory" class="full-link"></a>
        </div>
      </div>
    </div>
  </div>

  <div class="products">
    <div class="row">
      @foreach($products as $product)
        <div class="col-md-4">
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