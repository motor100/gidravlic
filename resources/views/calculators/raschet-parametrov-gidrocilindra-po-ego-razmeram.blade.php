@section('title', 'Расчет параметров гидроцилиндра по его размерам')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет параметров гидроцилиндра по его размерам</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет параметров гидроцилиндра по его размерам</div>

  <div class="calculators-description">
    <p>Если известны геометрические размеры цилиндра, то можно вычислить площади поршня и объемы полостей цилиндра.</p>
    <p>Если известно давление гидравлической системы, то дополнительно можно вычислить усилие при выдвижении и втягивании штока.</p>
    <p>Мощность и скорость при выдвижении и втягивании штока можно определить, зная подачу (расход) рабочей жидкости от насоса.</p>
  </div>

  <div class="calc">
    <form name="known-cylinder">
      <div class="calc-rows">
        <div class="calc-row">
          <div class="calc-row-label">Количество цилиндров (n)</div>
          <input type="text" name="n" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Диаметр поршня, мм</div>
          <input type="text" name="fi" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Диаметр штока, мм</div>
          <input type="text" name="fs" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Ход штока (L), мм</div>
          <input type="text" name="L" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Рабочее давление(P), бар</div>
          <input type="text" name="P" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Скорость хода(v), м/мин</div>
          <input type="text" name="v" class="calc-row-input">
        </div>
        <div class="calc-row">
          <div class="calc-row-label">Результат</div>
          <input type="text" name="result" class="calc-row-input">
        </div>
      </div>

      <div class="info-table">
        <div class="calc-text">Значения для одного цилиндра</div>
        <div class="table raschet-parametrov">
          <div class="tr">
            <div class="td first-column">Площадь поршня (cm2)</div>
            <button type="button" name="get_Sp" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Площадь кольца (шток. полость) (cm2)</div>
            <button type="button" name="get_Sa" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Общий объем поршневой полости (л)</div>
            <button type="button" name="get_Vispt" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Общий объем штоковой полости (л)</div>
            <button type="button" name="get_Viat" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Расход в поршневой полости (л/мин)</div>
            <button type="button" name="get_Qt" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Мощность втягивания штока (kW)</div>
            <button type="button" name="get_Ns" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Усилие выталкивания штока цилиндра (Кг)</div>
            <button type="button" name="get_Fs" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Усилие втягивания штока цилиндра (Кг)</div>
            <button type="button" name="get_Ft" class="calc-btn">Вычислить</button>
          </div>
        </div>

        <div class="calc-text">Значения для n-количества</div>
        <div class="table raschet-parametrov">
          <div class="tr">
            <div class="td first-column">Площадь штока (см2)</div>
            <button type="button" name="get_Sst" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Объем поршневой полости (л)</div>
            <button type="button" name="get_Visp" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Объем штоковой полости (л)</div>
            <button type="button" name="get_Via" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Расход при втягивании штока (l/мин)</div>
            <button type="button" name="get_Qs" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Разница расхода полостей (л/мин)</div>
            <button type="button" name="get_Kq" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Мощность выталкивания штока цилиндра (kW) </div>
            <button type="button" name="get_Nt" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Суммарное усилие втягивания (Кг)</div>
            <button type="button" name="get_Fst" class="calc-btn">Вычислить</button>
          </div>
          <div class="tr">
            <div class="td first-column">Суммарное усилие выталкивания (Кг)</div>
            <button type="button" name="get_Fft" class="calc-btn">Вычислить</button>
          </div>
        </div>
      </div>





    </form>
  </div>

    


</div>

@endsection

@section('script')
  <script src="{{ asset('/js/calculators.js') }}"></script>
@endsection