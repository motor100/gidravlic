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
              <a href="/" class="logo-link">
                <img src="/img/header-logo.png" alt="">
              </a>
            </div>
          </div>
          <div class="col-xxl-4 col-md-3"></div>
          <div class="col-md-2">
            <div class="flex-container">
              <a href="tel:+79822928879" class="header-phone">+7 (982) 292-88-79</a>
              <a href="tel:+78005755588" class="header-phone">8 (800) 575-55-88</a>
            </div>
          </div>
          <div class="col-xxl-2 col-md-3">
            <div class="flex-container">
              <button class="header-feedback-btn">Оставить заявку</button>
            </div>
          </div>
          <div class="col-md-1">
            <div class="flex-container">
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
    </div>
    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="underlogo-text">ГИДРАВЛИЧЕСКОЕ ОБОРУДОВАНИЕ</div>
          </div>
          <div class="col-md-6">
            <div class="flex-container">
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
          </div>
          <div class="col-md-1">
            <div class="header-bottom-item">
              <div class="header-bottom-item__image">
                <img src="/img/header-heart.png" alt="">
              </div>
              <div class="header-bottom-item__text">Избранное</div>
              <a href="/favourites" class="full-link"></a>
            </div>
          </div>
          <div class="col-md-1">
            <div class="header-bottom-item">
              <div class="header-bottom-item__image">
                <img src="/img/header-chart.png" alt="">
              </div>
              <div class="header-bottom-item__text">Сравнение</div>
              <a href="/comparison" class="full-link"></a>
            </div>
          </div>
          <div class="col-md-1">
            <div class="header-bottom-item">
              <div class="header-bottom-item__image">
                <img src="/img/header-user.png" alt="">
              </div>
              <div class="header-bottom-item__text">Войти</div>
              <a href="/lk" class="full-link"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="top-menu">
      <div class="container">
        <ul class="menu">
          <li class="menu-item">
            <a href="/company">КОМПАНИЯ</a>
          </li>
          <li class="menu-item">
            <a href="/services">УСЛУГИ</a>
          </li>
          <li class="menu-item">
            <a href="/payment">ОПЛАТА</a>
          </li>
          <li class="menu-item">
            <a href="/delivery">ДОСТАВКА</a>
          </li>
          <li class="menu-item">
            <a href="/warranty">ГАРАНТИЯ</a>
          </li>
          <li class="menu-item">
            <a href="/calculators">КАЛЬКУЛЯТОРЫ</a>
          </li>
          <li class="menu-item">
            <a href="/contacts">КОНТАКТЫ</a>
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
