@section('title', 'Расчет оборотов гидромотора')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет оборотов гидромотора</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет оборотов гидромотора</div>

  <div class="calculators-description">
    <p>Для того чтобы вычислить количество оборотов гидромотора n (rpm), Вы должны знать следующие параметры</p>
    <ol>
      <li>Подача насоса Q (л/мин), которая подается к гидромотору</li>
      <li>коэффициент объемных потерь (КПД) , для гидромоторов он находится в диапазоне 0.85-0.95.</li>
      <li>Объем гидромотора Vg, задается в пределах от 5cм3 до 250cм3</li>
    </ol>
  </div>

  <div class="calc">
    <form name="motor-speed">
      <div class="calc-rows">
        <div class="calc-row">
          <label for="Q" class="calc-row-label">Расход (Q), л/мин</label>
          <input type="text" id="Q" name="Q" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="Vg" class="calc-row-label">Объем камеры (Vg), cm3</label>
          <input type="text" id="Vg" name="Vg" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="eta" class="calc-row-label">КПД насоса</label>
          <input type="text" id="eta" name="eta" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Результат</div>
          <input type="text" name="result" class="calc-row-input" readonly>
        </div>
      </div>
      <div class="calc-btns">
        <button type="button" name="get_n" class="primary-btn btn-195 calc-btn">Вычислить n</button>
      </div>
    </form>
  </div>

</div>

@endsection

@section('script')
  <script src="{{ asset('/js/calculators.js') }}"></script>
@endsection