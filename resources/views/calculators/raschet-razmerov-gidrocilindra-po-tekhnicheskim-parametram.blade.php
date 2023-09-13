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
          <label for="Fst" class="calc-row-label">Общее усилие (Fst), Кг</label>
          <input type="text" id="Fst" name="Fst" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="n" class="calc-row-label">Количество цилиндров</label>
          <input type="text" id="n" name="n" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="P" class="calc-row-label">Давление (P), бар</label>
          <input type="text" id="P" name="P" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="fi" class="calc-row-label">Диаметр поршня (fi), мм</label>
          <input type="text" id="fi" name="fi" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="L" class="calc-row-label">Длина хода (L), мм</label>
          <input type="text" id="L" name="L" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="t" class="calc-row-label">Время выдвижения, сек.</label>
          <input type="text" id="t" name="t" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="Sp" class="calc-row-label">Площадь поршня (Sp), см2</label>
          <input type="text" id="Sp" name="Sp" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Результат</div>
          <input type="text" name="result" class="calc-row-input" readonly>
        </div>
      </div>
      <div class="calc-btns">
        <button type="button" name="get_Sp" class="primary-btn btn-195 calc-btn">Вычислить Sp</button>
        <button type="button" name="get_P" class="primary-btn btn-195 calc-btn">Вычислить P</button>
        <button type="button" name="get_fi" class="primary-btn btn-195 calc-btn">Вычислить fi</button>
        <button type="button" name="get_v" class="primary-btn btn-195 calc-btn">Вычислить v</button>
      </div>
    </form>

    <div class="calc-text">v - скорость выдвижения штока м/с</div>
  </div>

</div>

@endsection

@section('script')
  <script src="{{ asset('/js/calculators.js') }}"></script>
@endsection