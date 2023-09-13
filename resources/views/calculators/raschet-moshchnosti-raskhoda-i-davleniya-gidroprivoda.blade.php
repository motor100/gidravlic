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
    <p>Этот калькулятор позволяет вам вычислить три параметра, важные для проектирования гидравлической станции:</p>
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
    <form name="output-power">
      <div class="calc-rows">
        <div class="calc-row">
          <label for="N" class="calc-row-label">Мощность (N), кВт</label>
          <input type="text" id="N" name="N" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="Q" class="calc-row-label">Расход (Q), л/мин</label>
          <input type="text" id="Q" name="Q" class="calc-row-input">
        </div>
        <div class="calc-row">
          <label for="P" class="calc-row-label">Давление (P), бар</label>
          <input type="text" id="P" name="P" class="calc-row-input">
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
        <button type="button" name="get_N" class="primary-btn btn-195 calc-btn">Вычислить N</button>
        <button type="button" name="get_Q" class="primary-btn btn-195 calc-btn">Вычислить Q</button>
        <button type="button" name="get_P" class="primary-btn btn-195 calc-btn">Вычислить P</button>
      </div>
    </form>

    <div class="calc-text">КПД насоса 0.85-0.99</div>
  </div>
  
  <div class="convert">
    <form name="output-power-convert">
      <div class="convert-title">Пересчет единиц мощности</div>
      <div class="convert-item">
        <input type="text" name="kW" class="convert-input">
        <div class="convert-label">кВт</div>
        <button type="button" name="to_cv" class="convert-btn">в ЛС</button>
      </div>
      <div class="convert-item">
        <input type="text" name="CV" class="convert-input">
        <div class="convert-label">ЛС</div>
        <button type="button" name="to_kw" class="convert-btn">в кВт</button>
      </div>
    </form>
  </div>

</div>

@endsection

@section('script')
  <script src="{{ asset('/js/calculators.js') }}"></script>
@endsection