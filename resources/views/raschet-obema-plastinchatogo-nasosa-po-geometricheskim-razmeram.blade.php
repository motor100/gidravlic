@section('title', 'Расчет объема пластинчатого насоса по геометрическим размерам')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет объема пластинчатого насоса по геометрическим размерам</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет объема пластинчатого насоса по геометрическим размерам</div>

  <div class="calculators-description">
    <p>Этот калькулятор позволяет вычислить объемную подачу пластинчатого насоса за один оборот по геометрическим размерам.</p>
  </div>

  <div class="calc">
    <form name="pump-cubv">
      <div class="calc-rows">
        <div class="calc-row">
          <div class="calc-row-label">Ширина (W)</div>
          <input type="text" name="W" class="calc-row-input">
          <button type="button" name="getres" class="calc-row-btn">Вычислить N</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Диаметр (D)</div>
          <input type="text" name="D" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Длина (L)</div>
          <input type="text" name="L" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Результат</div>
          <input type="text" name="result" class="calc-row-input">
        </div>
      </div>
    </form>
  </div>

</div>

@endsection

@section('script')
  <script src="{{ asset('/js/calculators.js') }}"></script>
@endsection