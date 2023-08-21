@section('title', 'Расчет мощности, расхода и давления гидропривода')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Расчет мощности, расхода и давления гидропривода</div>
</div>

<div class="calculators">
  <div class="page-title">Расчет мощности, расхода и давления гидропривода</div>
  <div class="calculators-description">
    <p>Этот калькулятор позволяет Вам вычислить три параметра, важные для проектирования гидравлической станции:</p>
    <ul>
      <li>скорость потока Q (л/мин);</li>
      <li>мощность N (кВт);</li>
      <li>давление P (бар).</li>
    </ul>
    <p>Чтобы вычислить потребную мощность N (кВт), Вы должны ввести следующие данные:
    <ol>
      <li>Подача насоса Q ( л/мин).</li>
      <li>Коэффициент подачи насоса (КПД), для гидравлического привода обычно находится в диапазоне 0.85-0.95.</li>
      <li>Давление P (бар).</li>
    </ol>
    <p>Затем нажмите «N», чтобы вычислить.</p>
    <p>Чтобы вычислить давление P (бар), которое может быть получено при комбинации заданного двигателя и насоса, вы должны ввести следующие данные:</p>
    <ol>
      <li>Подача насоса Q ( л/мин).</li>
      <li>Коэффициент подачи насоса (КПД), для гидравлического привода обычно находится в диапазоне 0.85-0.95.</li>
      <li>Мощность N (кВт), это может находиться в пределах от 0.25 до 55 кВт.</li>
    </ol>
    <p>Затем нажмите «Р», чтобы вычислить.</p>
    <p>Чтобы вычислить подачу насоса Q (l/min), Вы должны ввести следующие данные:</p>
    <ol>
      <li>Мощность N (кВт), это может находиться в пределах от 0.25 до 55 кВт.</li>
      <li>Коэффициент подачи насоса (КПД), для гидравлического привода обычно находится в диапазоне 0.85-0.95.</li>
      <li>Давление P (бар).</li>
    </ol>
    <p>Затем нажмите «Q», чтобы вычислить.</p>
  </div>
  <div class="calc">
    <div class="calc-rows">
      <div class="calc-row">
        <div class="calc-row-label">Мощность (N), кВт</div>
        <input type="text" class="calc-row-input">
        <button class="calc-row-btn">Вычислить N</button>
      </div>
      <div class="calc-row">
        <div class="calc-row-label">Расход (Q), л/мин</div>
        <input type="text" class="calc-row-input">
        <button class="calc-row-btn">Вычислить Q</button>
      </div>
      <div class="calc-row">
        <div class="calc-row-label">Давление (P), бар</div>
        <input type="text" class="calc-row-input">
        <button class="calc-row-btn">Вычислить P</button>
      </div>
      <div class="calc-row">
        <div class="calc-row-label">КПД насоса</div>
        <input type="text" class="calc-row-input">
      </div>
      <div class="calc-row">
        <div class="calc-row-label">Результат</div>
        <input type="text" class="calc-row-input">
      </div>
    </div>
    <div class="calc-rezult">КПД насоса 0.85-0.99</div>
  </div>
  <div class="convert">
    <div class="convert-title">Пересчет единиц мощности</div>
    <div class="convert-item">
      <input type="text" class="convert-input">
      <div class="convert-label">кВт</div>
      <button class="convert-btn">в ЛС</button>
    </div>
    <div class="convert-item">
      <input type="text" class="convert-input">
      <div class="convert-label">ЛС</div>
      <button class="convert-btn">в кВт</button>
    </div>
  </div>

</div>
@endsection