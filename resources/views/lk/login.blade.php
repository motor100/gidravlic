@section('title', 'Войти в личный кабинет')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Войти в личный кабинет</div>
</div>

<div class="login">
  <div class="page-title">Войти в личный кабинет</div>

  <form class="form" action="{{ route('login') }}" method="POST">
    <div class="form-group">
      <label for="email-register" class="label">Емайл <span class="accentcolor">*</span></label>
      <input type="email" name="email" id="email-register" class="input-field" required autofocus minlength="3" maxlength="50" value="{{ old('email') }}">
    </div>
    <div class="form-group mb30">
      <label for="password-register" class="label">Пароль</label>
      <input type="password" name="password" id="password-register" class="input-field" required minlength="8" maxlength="50">
    </div>

    <div class="checkbox-wrapper mb30">
      <input type="checkbox" name="remember_me" class="custom-checkbox" id="remember_me" checked>
      <label for="remember_me" class="custom-checkbox-label"></label>
      <span class="checkbox-text">Запомнить меня</span>
    </div>

    @csrf
    <button type="submit" class="primary-btn login-btn btn-195">Войти</button>

  </form>

  <div class="create-account">
    <div class="create-account__title">Нет личного кабинета?</div>
    <a href="{{ route('register') }}" class="primary-btn login-btn btn-195">РЕГИСТРАЦИЯ</a>
  </div>

</div>

@endsection