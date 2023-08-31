@section('title', 'Расчет подачи насоса')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет подачи насоса</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет подачи насоса</div>

  <div class="calculators-description">
    <p>Этот калькулятор позволяет Вам вычислить или подачу Q (л/мин) или объем насоса Vg (cm3).</p>
    <p>Чтобы вычислить подачу насоса Q (l/min), Вы должны ввести следующие данные:</p>
    <ol>
      <li>Скорость вращения вала насоса n, для электродвигателей переменного тока это обычно – 960, 1370, 1450 или 2850 оборотов в минуту</li>
      <li>Коэффициент подачи насоса (КПД), для гидравлического привода обычно находится в диапазоне 0.85-0.95.</li>
      <li>Объем рабочей камеры насоса Vg, наиболее распространенные в диапазоне от 0.17cm3 до 90cm3</li>
    </ol>
    <p>Затем нажмите «Q», чтобы вычислить.</p>
    <p>Чтобы вычислить объем рабочей камеры насоса Vg (см3), Вы должны ввести следующие данные:</p>
    <ol>
      <li>Подачу насоса Q (l/min)</li>
      <li>Коэффициент подачи насоса (КПД), для гидравлического привода обычно находится в диапазоне 0.85-0.95.</li>
      <li>Скорость вращения вала насоса n, для электродвигателей переменного тока это обычно – 960, 1370, 1450 или 2850 оборотов в минуту</li>
    </ol>
    <p>Затем нажмите «Vg», чтобы вычислить.</p>
  </div>

  <div class="calc">
    <form name="pump-flow">
      <div class="calc-rows">
        <div class="calc-row">
          <div class="calc-row-label">Подача насоса (Q), л/мин</div>
          <input type="text" name="Q" class="calc-row-input">
          <button type="button" name="get_Vg" class="calc-row-btn">Вычислить Vg</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Обороты вала (n), об/мин</div>
          <input type="text" name="n" class="calc-row-input">
          <button type="button" name="get_Q" class="calc-row-btn">Вычислить Q</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Объем камеры (Vg), cm3</div>
          <input type="text" name="Vg" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">КПД насоса</div>
          <input type="text" name="eta" class="calc-row-input">
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