@section('title', 'Избранное')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Избранное</div>
</div>

<div class="favourites">
  <div class="page-title">Избранное</div>

  @if($products->count() > 0)
    <a href="/clear-favourites" class="primary-btn favourites-clear-btn btn-305">ОЧИСТИТЬ ИЗБРАННОЕ</a>

    <div class="favourites-products">
      <div class="row">
        @foreach($products as $product)
          <div class="col-4">
            @include('regular-product-item')
          </div>
        @endforeach
      </div>
    </div>
  @endif

</div>

@endsection