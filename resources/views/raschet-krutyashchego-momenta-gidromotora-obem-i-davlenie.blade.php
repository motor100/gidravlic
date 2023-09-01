@section('title', 'Расчет крутящего момента гидромотора (объем и давление)')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет крутящего момента гидромотора (объем и давление)</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет крутящего момента гидромотора (объем и давление)</div>

  <div class="calculators-description">
    <p>Крутящий момент на валу гидромотора М (кгм) может быть вычислен с использованием следующих параметров:</p>
      <ol>
        <li>Давление P (бар).</li>
        <li>Коэффициент объемных потерь, для гидромоторов он находится в диапазоне 0.85-0.95.</li>
        <li>Объем гидромотора Vg, задается в пределах от 5cм3 до 250cм3</li>
      </ol>
    <p>Затем нажмите «М», чтобы вычислить.</p>
    <p>Если необходимый крутящий момент известен, тогда можно подобрать гидромотор, объем Vg (cm3) может быть вычислен с использованием следующих параметров:</p>
    <ol>
      <li>Давление P (бар).</li>
      <li>Коэффициент объемных потерь (КПД), для гидромоторов он находится в диапазоне 0.85-0.95.</li>
      <li>Вращающий момент на валу гидромотора М (кгм).</li>
    </ol>
    <p>Затем нажмите «Q», чтобы вычислить.</p>
    <p>Если необходимый вращающий момент и объем гидромотора заданы, то давление P (бар) может быть определено с использованием следующих параметров:</p>
    <ol>
      <li>Объем гидромотора Vg, задается в пределах от 5cм3 до 250cм3</li>
      <li>Коэффициент объемных потерь (КПД), для гидромоторов он находится в диапазоне 0.85-0.95.
      <li>Вращающий момент на валу гидромотора М (кгм).
    </ol>
    <p>Затем нажмите «P», чтобы вычислить.</p>
  </div>

  <div class="calc">
    <form name="output-torque">
      <div class="calc-rows">
        <div class="calc-row">
          <div class="calc-row-label">Момент (M), кгм</div>
          <input type="text" name="M" class="calc-row-input">
          <button type="button" name="get_M" class="calc-row-btn">Вычислить M</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Объем(Vg), cm3</div>
          <input type="text" name="Vg" class="calc-row-input">
          <button type="button" name="get_P" class="calc-row-btn">Вычислить P</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Давление (P), бар</div>
          <input type="text" name="P" class="calc-row-input">
          <button type="button" name="get_Q" class="calc-row-btn">Вычислить Q</button>
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

    <div class="calc-text">1Нм=0,102кгм</div>
  </div>

  <div class="convert">
    <form name="output-torque-convert">
      <div class="convert-title">Пересчет единиц крутящего момента</div>
      <div class="convert-item">
        <input type="text" name="Kgm" class="convert-input">
        <div class="convert-label">кгм</div>
        <button type="button" name="to_nm" class="convert-btn">в Nm</button>
      </div>
      <div class="convert-item">
        <input type="text" name="Nm" class="convert-input">
        <div class="convert-label">Нм</div>
      </div>
    </form>
  </div>

</div>

@endsection

@section('script')
  <script src="{{ asset('/js/calculators.js') }}"></script>
@endsection