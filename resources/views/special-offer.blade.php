@section('title', 'Специальные предложения')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Специальные предложения</div>
</div>

<div class="contacts">
  <div class="page-title">Специальные предложения</div>

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