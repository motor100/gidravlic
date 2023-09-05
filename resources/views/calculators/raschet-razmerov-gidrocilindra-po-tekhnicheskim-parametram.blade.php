@section('title', 'Расчет размеров гидроцилиндра по техническим параметрам')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет размеров гидроцилиндра по техническим параметрам</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет размеров гидроцилиндра по техническим параметрам</div>

  <div class="calculators-description">
    <p>Здесь Вы можете вычислить геометрический размер цилиндра, зная необходимое усилие и рабочее давление гидроситемы.</p>
  </div>

  <div class="calc">
    <form name="unknown-cylinder">
      <div class="calc-rows">
        <div class="calc-row">
          <div class="calc-row-label">Общее усилие (Fst), Кг</div>
          <input type="text" name="Fst" class="calc-row-input">
          <button type="button" name="get_Sp" class="calc-row-btn">Вычислить Sp</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Количество цилиндров</div>
          <input type="text" name="n" class="calc-row-input">
          <button type="button" name="get_P" class="calc-row-btn">Вычислить P</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Давление (P), бар</div>
          <input type="text" name="P" class="calc-row-input">
          <button type="button" name="get_fi" class="calc-row-btn">Вычислить fi</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Диаметр поршня (fi), мм</div>
          <input type="text" name="fi" class="calc-row-input">
          <button type="button" name="get_v" class="calc-row-btn">Вычислить v</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Длина хода (L), мм</div>
          <input type="text" name="L" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Время выдвижения, сек.</div>
          <input type="text" name="t" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Площадь поршня (Sp), см2</div>
          <input type="text" name="Sp" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Результат</div>
          <input type="text" name="result" class="calc-row-input">
        </div>
      </div>
    </form>

    <div class="calc-text">v - скорость выдвижения штока м/с</div>
  </div>

</div>

@endsection

@section('script')
  <script src="{{ asset('/js/calculators.js') }}"></script>
@endsection