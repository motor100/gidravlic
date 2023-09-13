@section('title', 'Расчет объема шестеренного насоса по геометрическим размерам')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет объема шестеренного насоса по геометрическим размерам</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет объема шестеренного насоса по геометрическим размерам</div>

  <div class="calculators-description">
    <p>Данный калькулятор позволяет вычислить объемную подачу шестеренного насоса по его геометрическим размерам.</p>
    <p>Для этого необходимо замерить 3 размера в сантиметрах, в результате вычисления получается подача насоса с см3 за один оборот. Можно измерять в других единицах.</p>
  </div>

  <div class="calc">
    <form name="pump-cub">
      <div class="calc-rows">
        <div class="calc-row">
          <label for="W" class="calc-row-label">Ширина (W)</label>
          <input type="text" id="W" name="W" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="D" class="calc-row-label">Диаметр (D)</label>
          <input type="text" id="D" name="D" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="L" class="calc-row-label">Длина (L)</label>
          <input type="text" id="L" name="L" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Результат</div>
          <input type="text" name="result" class="calc-row-input" readonly>
        </div>
      </div>
      <div class="calc-btns">
        <button type="button" name="getres" class="primary-btn btn-195 calc-btn">Вычислить N</button>
      </div>
    </form>
  </div>

</div>

@endsection

@section('script')
  <script src="{{ asset('/js/calculators.js') }}"></script>
@endsection