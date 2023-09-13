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
          <label for="d" class="calc-row-label">Диаметр (d), мм</label>
          <input type="text" id="d" name="d" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="v" class="calc-row-label">Скорость потока (v), м/сек</label>
          <input type="text" id="v" name="v" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="Q" class="calc-row-label">Подача насоса (Q), л/мин</label>
          <input type="text" id="Q" name="Q" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Результат</div>
          <input type="text" name="result" class="calc-row-input" readonly>
        </div>
      </div>
      <div class="calc-btns">
        <button type="button" name="get_Q" class="primary-btn btn-195 calc-btn">Вычислить Q</button>
        <button type="button" name="get_d" class="primary-btn btn-195 calc-btn">Вычислить d</button>
        <button type="button" name="get_v" class="primary-btn btn-195 calc-btn">Вычислить v</button>
      </div>
    </form>
  </div>

  <div class="info-table">
    <div class="calc-text">Таблица рекомендуемой скорости потока рабочей жидкости в гидроприводе:</div>
    <div class="table raschet-diametra">
      <div class="tr">
        <div class="th first-column">Тип магистрали</div>
        <div class="th second-column">Допустимая скорость потока (V)</div>
      </div>
      <div class="tr">
        <div class="td first-column">всасывающая труба</div>
        <div class="td second-column">от 0.5 до 1 м/с</div>
      </div>
      <div class="tr">
        <div class="td first-column">сливная магистраль</div>
        <div class="td second-column">от 1.25 до 3 м/с</div>
      </div>
      <div class="tr">
        <div class="td first-column">напорная магистраль</div>
        <div class="td second-column">3.25 м/с при давлении более 100 бар</div>
      </div>
      <div class="tr">
        <div class="td first-column">напорная магистраль</div>
        <div class="td second-column">от 3.5 до 5 м/с при давлении более 150 бар</div>
      </div>
      <div class="tr">
        <div class="td first-column">напорная магистраль</div>
        <div class="td second-column">от 5.25 до 7 м/с при давлении более 200 бар</div>
      </div>
      <div class="tr">
        <div class="td first-column">напорная магистраль</div>
        <div class="td second-column">от 7.25 до 9 м/с при давлении более 350 бар</div>
      </div>
    </div>
  </div>

</div>

@endsection

@section('script')
  <script src="{{ asset('/js/calculators.js') }}"></script>
@endsection