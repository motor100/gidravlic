@section('title', 'Поиск')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Поиск</div>
</div>

<div class="poisk">

  @if (count($products) > 0)
    <div class="page-title">Результаты поиска «{{ $search_query }}»</div>
    <div class="products">
      <div class="row">
        @foreach($products as $product)
          <div class="col-4">
            @include('regular-product-item')
          </div>
        @endforeach
      </div>
    </div>
  @else
    <div class="poisk-title page-title">По запросу «{{ $search_query }}» ничего не найдено</div>
  @endif

  </div>
</div>

@endsection