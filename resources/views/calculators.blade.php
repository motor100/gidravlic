@section('title', 'Калькуляторы')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Калькуляторы</div>
</div>

<div class="calculators">
  <div class="page-title">Калькуляторы (расчет гидропривода)</div>

  <div class="calculators-description">
    <p>Гидравлические калькуляторы помогут Вам быстро рассчитать параметры гидравлической системы.</p>
    <p>В данном разделе находятся наиболее распространенные типы расчетов элементов гидропривода.</p>
    <p>Воспользовавшись калькуляторами Вы можете произвести ориентировочный расчет гидравлической станции, гидроцилиндров и гидромоторов:</p>
  </div>
  
  <div class="calculators-list">
    <div class="calculators-list-item snc-list-item main-list-item">
      <a href="/calculators/raschet-moshchnosti-raskhoda-i-davleniya-gidroprivoda" class="calculators-list-item__link snc-list-item__link main-list-item__link">РАСЧЕТ МОЩНОСТИ, РАСХОДА И ДАВЛЕНИЯ ГИДРОПРИВОДА</a>
    </div>
    <div class="calculators-list-item snc-list-item main-list-item">
      <a href="/calculators/raschet-diametra-truboprovoda-skorosti-potoka" class="calculators-list-item__link snc-list-item__link main-list-item__link">РАСЧЕТ ДИАМЕТРА ТРУБОПРОВОДА, СКОРОСТИ ПОТОКА</a>
    </div>
    <div class="calculators-list-item snc-list-item main-list-item">
      <a href="/calculators/raschet-parametrov-gidrocilindra-po-ego-razmeram" class="calculators-list-item__link snc-list-item__link main-list-item__link">РАСЧЕТ ПАРАМЕТРОВ ГИДРОЦИЛИНДРА ПО ЕГО РАЗМЕРАМ</a>
    </div>
    <div class="calculators-list-item snc-list-item main-list-item">
      <a href="/calculators/raschet-razmerov-gidrocilindra-po-tekhnicheskim-parametram" class="calculators-list-item__link snc-list-item__link main-list-item__link">РАСЧЕТ РАЗМЕРОВ ГИДРОЦИЛИНДРА ПО ТЕХНИЧЕСКИМ ПАРАМЕТРАМ</a>
    </div>
    <div class="calculators-list-item snc-list-item main-list-item">
      <a href="/calculators/raschet-podachi-nasosa" class="calculators-list-item__link snc-list-item__link main-list-item__link">РАСЧЕТ ПОДАЧИ НАСОСА</a>
    </div>
    <div class="calculators-list-item snc-list-item main-list-item">
      <a href="/calculators/raschet-oborotov-gidromotora" class="calculators-list-item__link snc-list-item__link main-list-item__link">РАСЧЕТ ОБОРОТОВ ГИДРОМОТОРА</a>
    </div>
    <div class="calculators-list-item snc-list-item main-list-item">
      <a href="/calculators/raschet-krutyashchego-momenta-gidromotora-obem-i-davlenie" class="calculators-list-item__link snc-list-item__link main-list-item__link">РАСЧЕТ КРУТЯЩЕГО МОМЕНТА ГИДРОМОТОРА (ОБЪЕМ И ДАВЛЕНИЕ)</a>
    </div>
    <div class="calculators-list-item snc-list-item main-list-item">
      <a href="/calculators/raschet-krutyashchego-momenta-na-valu-moshchnost-i-oboroty" class="calculators-list-item__link snc-list-item__link main-list-item__link">РАСЧЕТ КРУТЯЩЕГО МОМЕНТА НА ВАЛУ (МОЩНОСТЬ И ОБОРОТЫ)</a>
    </div>
    <div class="calculators-list-item snc-list-item main-list-item">
      <a href="/calculators/raschet-obema-plastinchatogo-nasosa-po-geometricheskim-razmeram" class="calculators-list-item__link snc-list-item__link main-list-item__link">РАСЧЕТ ОБЪЕМА ПЛАСТИНЧАТОГО НАСОСА ПО ГЕОМЕТРИЧЕСКИМ РАЗМЕРАМ</a>
    </div>
    <div class="calculators-list-item snc-list-item main-list-item">
      <a href="/calculators/raschet-obema-shesterennogo-nasosa-po-geometricheskim-razmeram" class="calculators-list-item__link snc-list-item__link main-list-item__link">РАСЧЕТ ОБЪЕМА ШЕСТЕРЕННОГО НАСОСА ПО ГЕОМЕТРИЧЕСКИМ РАЗМЕРАМ</a>
    </div>
  </div>

</div>

@endsection