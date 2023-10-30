@section('title', $product->title)

@extends('layouts.main')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/photoswipe.css') }}">
@endsection

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="parent">
    <a href="/catalog">Каталог</a>
  </div>
  <div class="arrow">></div>
  <div class="active">{{ $product->title }}</div>
</div>

<div class="single-product">
  <div class="page-title">{{ $product->title }}</div>

  <div class="single-product-content">

    @if($product->gallery->count() > 0)
      <div class="single-product-gallery">
        @foreach($product->gallery as $gl)
          <figure class="figure single-product-gallery-item">
            <a href="{{ Storage::url($gl->image) }}" data-pswp-width="800" data-pswp-height="800" target="_blank">
              <img src="{{ Storage::url($gl->image) }}" alt="">
            </a>
          </figure>
        @endforeach
      </div>
    @endif

    <div class="single-product-image-wrapper">
      <div class="single-product-image">
        <img src="{{ Storage::url($product->content->image) }}" alt="">
      </div>
      @if($product->content->hit)
        <div class="product-label-hit">
          <span class="product-label-hit-text">ХИТ</span>
        </div>
      @endif
    </div>
    <div class="single-product-info">
      <div class="single-product-sku mb75">
        <span class="single-product-sku__text">Артикул:</span>
        <span class="single-product-sku__value">{{ $product->sku }}</span>
      </div>
      <!-- <div class="single-product-maker mb75">Производитель: Китай</div> -->
      <div class="single-product-price">{{ $product->price }} р</div>
      <button class="primary-btn add-to-cart add-to-cart-btn btn-195" data-id="{{ $product->id }}">КУПИТЬ</button>
      <div class="single-product-stock">
        @if($product->stock)
          <div class="single-product-stock__image">
            <img src="/img/single-product-in-stock.png" alt="">
          </div>
          <div class="single-product-stock__text">В наличии:&nbsp;</div>
          <div class="single-product-stock__value">{{ $product->stock }}</div>
        @else
          <div class="single-product-stock__image">
            <img src="/img/single-product-out-of-stock.png" alt="">
          </div>
          <div class="single-product-stock__text">Нет в наличии</div>
        @endif
      </div>
    </div>
    <div class="single-product-actions">
      <div class="product-item-favourites add-to-favourites" data-id="{{ $product->id }}">
        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15.9293 0C13.7428 0 12.0708 1.28617 10.6239 2.66881C9.27339 1.22186 7.53705 0 5.31841 0C2.19943 0 0.0129395 2.66881 0.0129395 5.59485C0.0129395 7.17042 0.656026 8.29582 1.36342 9.35691L9.59493 19.2604C10.5274 20.2251 10.7203 20.2251 11.6528 19.2604L19.9165 9.35691C20.7203 8.29582 21.267 7.17042 21.267 5.59485C21.267 2.66881 19.0483 0 15.9293 0Z"/>
        </svg>
      </div>
      <div class="product-item-comparison add-to-comparison" data-id="{{ $product->id }}">
        <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14.9856 10.0185H13.7307C13.0663 10.0185 12.4757 10.5721 12.4757 11.2734V18.7663C12.4757 19.4306 13.0663 19.9843 13.7307 19.9843H14.9856C15.6869 19.9843 16.2406 19.4306 16.2406 18.7663V11.2734C16.2406 10.5721 15.6869 10.0185 14.9856 10.0185ZM8.74778 0.0157471H7.49282C6.79152 0.0157471 6.23787 0.569404 6.23787 1.2707V18.7663C6.23787 19.4306 6.79152 19.9843 7.49282 19.9843H8.74778C9.44908 19.9843 10.0027 19.4306 10.0027 18.7663V1.2707C10.0027 0.569404 9.44908 0.0157471 8.74778 0.0157471ZM2.50991 5.62614H1.25496C0.553657 5.62614 0 6.17979 0 6.88109V18.7663C0 19.4306 0.553657 19.9843 1.25496 19.9843H2.50991C3.1743 19.9843 3.76487 19.4306 3.76487 18.7663V6.88109C3.76487 6.17979 3.1743 5.62614 2.50991 5.62614Z"/>
        </svg>
      </div>
    </div>
  </div>
  <div class="single-product-description">
    <p>Описание</p>
    {!! $product->description !!}
  </div>
  <!-- 
  <div class="single-product-documents">
    <div class="single-product-document-item">
      <div class="single-product-document-item__image">
        <img src="/img/single-product-pdf.png" alt="">
      </div>
      <a href="{{-- Storage::url('uploads/documents/doc.pdf') --}}" class="single-product-document-item__link" target="_blank">Сертификат</a>
    </div>
    <div class="single-product-document-item">
      <div class="single-product-document-item__image">
        <img src="/img/single-product-pdf.png" alt="">
      </div>
      <a href="{{-- Storage::url('uploads/documents/doc.pdf') --}}" class="single-product-document-item__link" target="_blank">Свидетельство</a>
    </div>
  </div>
   -->
</div>

@endsection

@section('script')
  <script type="module" src="{{ asset('/js/photoswipe-lightbox.esm.min.js') }}"></script>
  <script type="module">
    import PhotoSwipeLightbox from '/js/photoswipe-lightbox.esm.min.js';
    // Photoswipe
    const lightbox = new PhotoSwipeLightbox({
      gallery: '.single-product-gallery',
      children: 'a',
      pswpModule: () => import('/js/photoswipe.esm.js'),
      loop: true
    });
    lightbox.init();
  </script>
@endsection