<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Гидравлика">
  <meta name="keywords" content="Гидравлика">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('robots')
  <link rel="shortcut icon" href="{{ asset('/img/favicon.svg') }}" type="image/x-icon">
  <title>@yield('title', config('app.name') )</title>
  @vite(['resources/sass/main.scss'])
</head>

<body>
  <header class="header">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="logo">
              <img src="/img/header-logo.png" alt="">
            </div>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-2">
            <div class="header-phone">+7 (982) 292-88-79</div>
            <div class="header-phone">8 (800) 575-55-88</div>
          </div>
          <div class="col-md-2">
            <div class="header-feedback-btn">Оставить заявку</div>
          </div>
          <div class="col-md-1">
            <div class="cart">
              <div class="header-cart-image">
                <img src="/img/header-cart.png" alt="">
              </div>
              <div id="header-cart-counter" class="counter {{ isset($cart_count) ? 'active' : '' }}">{{ isset($cart_count) ? $cart_count : '' }}</div>
              <a href="/cart" class="full-link"></a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="underlogo-text">ГИДРАВЛИЧЕСКОЕ ОБОРУДОВАНИЕ</div>
          </div>
          <div class="col-md-6">
            <form class="search-form" action="/poisk" method="get">
              <input type="text" name="search_query" class="search-input" minlength="3" maxlength="20" autocomplete="off" required placeholder="Поиск по товарам">
              <button type="submit" class="search-submit-btn">
                <img src="/img/header-search-lens.png" alt="">
              </button>
              <div class="search-close"></div>
              <div class="search-dropdown">
                <div class="search-list js-search-rezult"></div>
              </div>
            </form>
          </div>
          <div class="col-md-1">
            <div class="header-bottom-item">
              <div class="header-bottom-item__image">
                <img src="/img/header-heart.png" alt="">
              </div>
              <div class="header-bottom-item__text">Избранное</div>
            </div>
          </div>
          <div class="col-md-1">
            <div class="header-bottom-item">
              <div class="header-bottom-item__image">
                <img src="/img/header-chart.png" alt="">
              </div>
              <div class="header-bottom-item__text">Сравнение</div>
            </div>
          </div>
          <div class="col-md-1">
            <div class="header-bottom-item">
              <div class="header-bottom-item__image">
                <img src="/img/header-user.png" alt="">
              </div>
              <div class="header-bottom-item__text">Войти</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="top-menu">
      <div class="container">
        <ul class="menu">
          <li class="menu-item">
            <a href="#">КОМПАНИЯ</a>
          </li>
          <li class="menu-item">
            <a href="#">УСЛУГИ</a>
          </li>
          <li class="menu-item">
            <a href="#">ОПЛАТА</a>
          </li>
          <li class="menu-item">
            <a href="#">ДОСТАВКА</a>
          </li>
          <li class="menu-item">
            <a href="#">ГАРАНТИЯ</a>
          </li>
          <li class="menu-item">
            <a href="#">КАЛЬКУЛЯТОРЫ</a>
          </li>
          <li class="menu-item">
            <a href="#">КОНТАКТЫ</a>
          </li>
        </ul>
      </div>
    </div>
  </header>
  
  @yield('content')

  <footer class="footer">
    <div class="container">
      <a href="/politika-konfidencialnosti">Политика конфиденциальности</a>
    </div>
  </footer>

  @vite(['resources/js/main.js'])

</body>
</html>
