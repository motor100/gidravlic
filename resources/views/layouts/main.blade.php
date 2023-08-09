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
              <button id="callback-btn" class="header-feedback-btn">Оставить заявку</button>
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
      <div class="logo">
        <img src="/img/header-logo.png" alt="">
      </div>
      <div class="footer-nav">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-2">
            <div class="footer-nav__title">Компания</div>
            <div class="footer-nav-item">
              <a href="/company" class="footer-nav-item__link">О компании</a>
            </div>
            <div class="footer-nav-item">
              <a href="/calculators" class="footer-nav-item__link">Калькуляторы</a>
            </div>
            <div class="footer-nav-item">
              <a href="#" class="footer-nav-item__link">Реквизиты</a>
            </div>
            <div class="footer-nav-item">
              <a href="/contacts" class="footer-nav-item__link">Контакты</a>
            </div>
          </div>
          <div class="col-md-2">
            <div class="footer-nav__title">Покупателям</div>
            <div class="footer-nav-item">
              <a href="/services" class="footer-nav-item__link">Услуги</a>
            </div>
            <div class="footer-nav-item">
              <a href="/payment" class="footer-nav-item__link">Оплата</a>
            </div>
            <div class="footer-nav-item">
              <a href="/delivery" class="footer-nav-item__link">Доставка</a>
            </div>
            <div class="footer-nav-item">
              <a href="/warranty" class="footer-nav-item__link">Гарантия</a>
            </div>
          </div>
          <div class="col-md-7">
            <div class="footer-nav__title">Оставайтесь на связи</div>
            <div class="footer-nav-item footer-contacts-item">
              <div class="footer-contacts-item__image">
                <img src="/img/footer-whatsapp.png" alt="">
              </div>
              <div class="footer-contacts-item__text">+7 (982) 292-88-79</div>
            </div>
            <div class="footer-nav-item footer-contacts-item">
              <div class="footer-contacts-item__image">
                <img src="/img/footer-geolocation.png" alt="">
              </div>
              <div class="footer-contacts-item__text">г. Миасс, Тургоякское шоссе, 5/11</div>
            </div>
            <div class="footer-nav-item footer-contacts-item">
              <div class="footer-contacts-item__image">
                <img src="/img/footer-clock.png" alt="">
              </div>
              <div class="footer-contacts-item__text">с 9:00 до 18:00 (СБ, ВС - выходной)</div>
            </div>
            <div class="footer-nav-item footer-contacts-item">
              <div class="footer-contacts-item__image">
                <img src="/img/footer-mail.png" alt="">
              </div>
              <div class="footer-contacts-item__text">zakaz@gidravlic.com</div>
            </div>
          </div>
        </div>
      </div>
      <a href="/politika-konfidencialnosti">Политика конфиденциальности</a>
    </div>
  </footer>

  <div id="to-top" class="to-top hidden-mobile">
    <div class="circle"></div>
  </div>

  <div id="callback-modal" class="modal-window callback-modal">
    <div class="modal-wrapper">
      <div class="modal-area">
        <div class="modal-close">
          <div class="close"></div>
        </div>
        <div class="modal-title">Оставить заявку</div>
        <form id="callback-modal-form" class="form" method="post">
          <div class="form-group">
            <label for="name-callback-modal" class="label">Ф.И.О <span class="accentcolor">*</span></label>
            <input type="text" id="name-callback-modal" class="input-field js-name-callback-modal" name="name" required minlength="3" maxlength="20">
          </div>
          <div class="form-group">
            <label for="email-callback-modal" class="label">E-mail <span class="accentcolor">*</span></label>
            <input type="email" id="email-callback-modal" class="input-field js-email-callback-modal" name="email" required>
          </div>
          <div class="form-group">
            <label for="phone-callback-modal" class="label">Телефон <span class="accentcolor">*</span></label>
            <input type="text" id="phone-callback-modal" class="input-field js-phone-callback-modal js-input-phone-mask" name="phone" required maxlength="18">
          </div>
          <div class="form-group">
            <label for="message-callback-modal" class="label">Сообщение</label>
            <textarea name="message" id="message-callback-modal" class="input-field textarea" minlength="3" maxlength="100"></textarea>
          </div>
          <div class="checkbox-wrapper">
            <input type="checkbox" name="checkbox-agree" class="custom-checkbox js-checkbox-callback-modal" id="checkbox-agree-callback-modal" checked required>
            <label for="checkbox-agree-callback-modal" class="custom-checkbox-label"></label>
            <span class="checkbox-text">Согласен на обработку персональных данных</span>
          </div>
          <div class="checkbox-wrapper">
            <input type="checkbox" name="checkbox-read" class="custom-checkbox js-checkbox-callback-modal" id="checkbox-read-callback-modal" checked required>
            <label for="checkbox-read-callback-modal" class="custom-checkbox-label"></label>
            <span class="checkbox-text">Ознакомлен с <a href="/politika-konfidencialnosti" class="privacy-policy-btn" target="_blank">политикой конфиденциальности</a></span>
          </div>

          @csrf
          <button type="button" id="callback-submit-btn" class="submit-btn">ОТПРАВИТЬ СООБЩЕНИЕ</button>
        </form>
      </div>
    </div>
  </div>

  @if(!request()->cookie('we-use-cookie'))
    <div class="messages-cookies">

      <div class="messages-cookies-wrapper">
        <div class="messages-cookies-text">Этот сайт использует cookie-файлы и другие технологии для улучшения его работы. Продолжая работу с сайтом, вы разрешаете использование cookie-файлов. Вы всегда можете отключить файлы cookie в настройках Вашего браузера.</div>
        <button class="messages-cookies-close">ХОРОШО</button>
      </div>

    </div>
  @endif

  @vite(['resources/js/main.js'])

</body>
</html>
