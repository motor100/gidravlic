@section('title', 'Контакты')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Контакты</div>
</div>

<div class="contacts">
  <div class="page-title">Контакты</div>
  <div class="contacts-item">
    <div class="contacts-text">ООО "ГИДРАВЛИК-КОМ"</div>
    <div class="contacts-text">Продажа гидравлического оборудования, обслуживание, гидрофикация</div>
  </div>
  <div class="contacts-item">
    <div class="contacts-text"><span class="text-bold">Юрид.адрес:</span> 456300 г. Миасс, Челябинская область, Тургоякское шоссе 5/11, 1 этаж</div>
    <div class="contacts-text"><span class="text-bold">Адрес:</span> 456300 г. Миасс, Челябинская область, Тургоякское шоссе 5/11, 1 этаж</div>
    <div class="contacts-text"><span class="text-bold">Телефон:</span> +7 (982) 292-88-79</div>
    <div class="contacts-text"><span class="text-bold">Whatsapp:</span> ......</div>
    <div class="contacts-text"><span class="text-bold">E-mail:</span> <a href="mailto:zakaz@gidravlic.com">zakaz@gidravlic.com</a></div>
    <div class="contacts-text"><span class="text-bold">График работы:</span> ПН-ПТ с 9:00 до 18:00, СБ-ВС выходной</div>
  </div>
  <div class="map">
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aacd74efbff533d7ec22ecf2b646d7fbcf5ea179505e342c8dbd67af0e3ac1202&amp;width=100%25&amp;height=100%25&amp;lang=ru_RU&amp;scroll=true"></script>
  </div>
</div>
@endsection