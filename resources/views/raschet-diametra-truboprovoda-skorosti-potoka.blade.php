@section('title', 'Расчет диаметра трубопровода, скорости потока')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет диаметра трубопровода, скорости потока</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет диаметра трубопровода, скорости потока</div>
  <div class="calculators-description">
    <p>Для правильного расчета должно быть известно назначение трубопровода: всасывающая магистраль, напорная или сливная.</p>
    <p>Справочник по допустимой скорости жидкости в пределах этих типов магистралей приведен ниже. Расчетная скорость жидкости (м/с) должна находится в пределах этих диапазонов.</p>
    <p>Чтобы вычислить скорость жидкости v (м/с), Вы должны ввести следующие данные:</p>
    <ol>
      <li>Диаметр d (мм) - внутренний диаметр трубы.</li>
      <li>Подача насоса Q (л/мин)</li>
    </ol>
    <p>Чтобы правильно подобрать трубу для всасывающей, напорной или сливной магистралей:</p>
    <ol>
      <li>Выберите в таблице оптимальную скорость для соответствующей магистрали (v), м/сек</li>
      <li>Введите подачу насоса Q (л/мин)</li>
    </ol>
    <p>Нажмите "Вычислить D"</p>
  </div>

  <div class="calc">
    <form name="oil-pipe">
      <div class="">
        <div class="calc-row">
          <div class="calc-row-label">Диаметр (d), мм</div>
          <input type="text" name="d" class="calc-row-input">
          <button type="button" name="get_Q" class="calc-row-btn">Вычислить Q</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Скорость потока (v), м/сек</div>
          <input type="text" name="v" class="calc-row-input">
          <button type="button" name="get_d" class="calc-row-btn">Вычислить d</button>
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Подача насоса (Q), л/мин</div>
          <input type="text" name="Q" class="calc-row-input">
          <button type="button" name="get_v" class="calc-row-btn">Вычислить v</button>
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