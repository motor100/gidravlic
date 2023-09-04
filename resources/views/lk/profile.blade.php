@extends('layouts.main')

@section('title', 'Личные данные')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="parent">
    <a href="{{ route('lk.index') }}">Личный кабинет</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Профиль</div>
</div>

<div class="lk-profile">
  <div class="page-title">ПРОФИЛЬ</div>

  @include('lk.lk-navigation')

  <div class="lk-profile-wrapper">

    <div class="edit-item">

      @if($errors->has('email'))
        <div class="alert alert-danger">
          <div>{{ $errors->first('email') }}</div>
        </div>
      @endif

      <div class="row">
        <div class="col-md-8">
          <div class="lk-profile-text">Обновить данные</div>
          <form id="send-verification" class="form" action="{{ route('verification.send') }}" method="post">
            @csrf
          </form>
          <form class="form" action="" method="post">
            @csrf
            @method('patch')

            <div class="form-group">
              <label for="name" class="label">Имя</label>
              <input type="text" name="name" id="name" class="input-field" required autofocus minlength="3" maxlength="100" value="{{ $user->name }}">
            </div>

            <div class="form-group">
              <label for="email" class="label">Емайл</label>
              <input type="email" name="email" id="email" class="input-field" required minlength="3" maxlength="100" value="{{ $user->email }}">
            </div>

            <button type="submit" class="primary-btn btn-195 profile-update-btn">Обновить</button>
          </form>
        </div>
      </div>
    </div>

    <div class="edit-item">

      @if($errors->updatePassword->any())
        <div class="alert alert-danger">
          <div>{{ $errors->updatePassword->first('current_password') }}</div>
          <div>{{ $errors->updatePassword->first('password') }}</div>
        </div>
      @endif

      <div class="row">
        <div class="col-md-8">
          <div class="lk-profile-text">Обновить пароль</div>
          
          <form class="form" action="{{ route('password.update') }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
              <label for="current_password" class="label">Текущий пароль</label>
              <input type="password" name="current_password" id="current_password" class="input-field" min="8" max="20" required>
            </div>

            <div class="form-group">
              <label for="password" class="label">Новый пароль</label>
              <input type="password" name="password" id="password" class="input-field" min="8" max="20" required>
            </div>

            <div class="form-group">
              <label for="password_confirmation" class="label">Подтвердить пароль</label>
              <input type="password" name="password_confirmation" id="password_confirmation" class="input-field" min="8" max="20" required>
            </div>

            <button type="submit" class="primary-btn btn-195 password-update-btn">Обновить</button>
          </form>
        </div>
      </div>
    </div>

    <div class="edit-item">

      @if($errors->userDeletion->any())
        <div class="alert alert-danger">
          <div>{{ $errors->userDeletion->first('password') }}</div>
        </div>
      @endif

      <div class="row">
        <div class="col-md-8">
          <div class="lk-profile-text">Удалить профиль</div>
          <form class="form" action="{{ route('profile.destroy') }}" method="post">
              @csrf
              @method('delete')

              <p>Введите пароль чтобы подтвердить удаление</p>

              <div class="form-group">
                <label for="destroy-profile-password" class="label">Пароль</label>
                <input type="password" name="password" id="destroy-profile-password" class="input-field" min="8" max="20" required>
              </div>

              <button type="submit" class="primary-btn btn-195 profile-delete-btn">Удалить</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection 