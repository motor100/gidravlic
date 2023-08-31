@section('title', 'Расчет крутящего момента на валу (мощность и обороты)')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет крутящего момента на валу (мощность и обороты)</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет крутящего момента на валу (мощность и обороты)</div>

  <div class="calculators-description">
    <p>Крутящий момент М (Нм), который требуется передать гидравлическому насосу от двигателя может быть вычислен с использованием следующих параметров:</p>
    <ol>
      <li>Скорость вращения вала насоса n, для электродвигателей переменного тока это обычно – 960, 1370, 1450 или 2850 оборотов в минуту</li>
      <li>Мощность N (кВт), это может находиться в пределах от 0.25 до 55 кВт</li>
    </ol>
    <p>Затем нажмите «M», чтобы вычислить.</p>
  </div>

  <div class="calc">
    <form name="input-torque">
      <div class="calc-rows">
        <div class="calc-row">
          <div class="calc-row-label">Мощность (N), кВт</div>
          <input type="text" name="N" class="calc-row-input">
          <button type="button" name="get_M" class="calc-row-btn">Вычислить M</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Частота вала (n), об/мин</div>
          <input type="text" name="n" class="calc-row-input">
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