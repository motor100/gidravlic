@section('title', 'Расчет параметров гидроцилиндра по его размерам')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет параметров гидроцилиндра по его размерам</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет параметров гидроцилиндра по его размерам</div>

  <div class="calculators-description">
    <p>Если известны геометрические размеры цилиндра, то можно вычислить площади поршня и объемы полостей цилиндра.</p>
    <p>Если известно давление гидравлической системы, то дополнительно можно вычислить усилие при выдвижении и втягивании штока.</p>
    <p>Мощность и скорость при выдвижении и втягивании штока можно определить, зная подачу (расход) рабочей жидкости от насоса.</p>
  </div>

  <div class="calc">
    <form name="known-cylinder">
      <div class="calc-rows">
        <div class="calc-row">
          <div class="calc-row-label">Количество цилиндров (n)</div>
          <input type="text" name="n" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Диаметр поршня, мм</div>
          <input type="text" name="fi" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Диаметр штока, мм</div>
          <input type="text" name="fs" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Ход штока (L), мм</div>
          <input type="text" name="L" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Рабочее давление(P), бар</div>
          <input type="text" name="P" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Скорость хода(v), м/мин</div>
          <input type="text" name="v" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Результат</div>
          <input type="text" name="result" class="calc-row-input">
        </div>
      </div>
    </form>
  </div>

  <div class="info-table">

  </div>

</div>

@endsection

@section('script')
  <script src="{{ asset('/js/calculators.js') }}"></script>
@endsection