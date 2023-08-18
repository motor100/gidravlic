@section('title', 'Регистрация')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Регистрация</div>
</div>

<div class="register">
  <div class="page-title">Регистрация</div>

  <form action="" class="form register-form">
    <div class="form-group">
      <label for="name-register" class="label">Имя <span class="accentcolor">*</span></label>
      <input type="text" name="name" id="name-register" class="input-field" required minlength="3" maxlength="20">
    </div>
    <div class="form-group">
      <label for="email-register" class="label">E-mail <span class="accentcolor">*</span></label>
      <input type="email" name="email" id="email-register" class="input-field" required minlength="3" maxlength="50">
    </div>
    <div class="form-group">
      <label for="password-register" class="label">Пароль</label>
      <input type="password" name="password" id="password-register" class="input-field" required minlength="8" maxlength="50">
    </div>
    <div class="form-group mb30">
      <label for="confirm-password-register" class="label">Подтверждение пароля</label>
      <input type="password" name="confirm_password" id="confirm-password-register" class="input-field" required minlength="8" maxlength="50">
    </div>
    <div class="checkbox-wrapper">
      <input type="checkbox" name="checkbox-agree" class="custom-checkbox" id="checkbox-agree-register" checked required>
      <label for="checkbox-agree-register" class="custom-checkbox-label"></label>
      <span class="checkbox-text">Согласен на обработку персональных данных</span>
    </div>
    <div class="checkbox-wrapper mb30">
      <input type="checkbox" name="checkbox-read" class="custom-checkbox" id="checkbox-read-register" checked required>
      <label for="checkbox-read-register" class="custom-checkbox-label"></label>
      <span class="checkbox-text">Ознакомлен с <a href="/politika-konfidencialnosti" class="privacy-policy-link" target="_blank">политикой конфиденциальности</a></span>
    </div>

    @csrf
    <div class="g-recaptcha mb30" data-sitekey="{{ config('google.client_key') }}"></div>

    <button type="button" class="primary-btn register-btn">ЗАРЕГИСТРИРОВАТЬСЯ</button>

  </form>

</div>

@endsection

@section('script')
  <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection