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
  @yield('style')
  @vite(['resources/sass/main.scss'])
</head>

<body>
  <header class="header">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4">
            <div class="logo">
              <a href="/" class="logo-link">
                <img src="/img/header-logo.png" alt="">
              </a>
            </div>
          </div>
          <div class="col-xxl-4 col-lg-2 d-lg-block d-none"></div>
          <div class="col-xxl-2 col-md-3 d-md-block d-none">
            <div class="flex-container">
              <a href="tel:+79822928879" class="header-phone">+7 (982) 292-88-79</a>
              <a href="tel:+78005755588" class="header-phone">8 (800) 575-55-88</a>
            </div>
          </div>
          <div class="col-xxl-2 col-lg-3 col-md-4 d-md-block d-none">
            <div class="flex-container">
              <button class="secondary-btn header-feedback-btn js-callback-btn">Оставить заявку</button>
            </div>
          </div>
          <div class="col-md-1 d-md-block d-none">
            <div class="flex-container">
              <div class="cart">
                <div class="header-cart-image">
                  <svg width="100%" height="100%" viewBox="0 0 43 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.9308 34.6287C30.4431 34.6287 29.2573 35.8145 29.2573 37.2806C29.2573 38.7467 30.4431 39.954 31.9308 39.954C33.3969 39.954 34.5827 38.7467 34.5827 37.2806C34.5827 35.8145 33.3969 34.6287 31.9308 34.6287ZM18.6281 34.6287C17.162 34.6287 15.9546 35.8145 15.9546 37.2806C15.9546 38.7467 17.162 39.954 18.6281 39.954C20.0942 39.954 21.28 38.7467 21.28 37.2806C21.28 35.8145 20.0942 34.6287 18.6281 34.6287ZM35.9194 26.6513C35.9194 28.1174 34.7121 29.3033 33.246 29.3033H18.6281C17.162 29.3033 15.9546 28.1174 15.9546 26.6513L13.7339 13.3487H39.2397L35.9194 26.6513ZM13.2596 10.6967L9.93929 0.0459566H1.33674C0.603688 0.0459566 0 0.649645 0 1.38269C0 2.11574 0.603688 2.69787 1.33674 2.69787H7.97731L10.6508 10.6967L13.3027 26.6513C13.3027 29.5835 15.6743 31.9767 18.6281 31.9767H33.246C36.1997 31.9767 38.5714 29.5835 38.5714 26.6513L42.56 10.6967H13.2596Z"/>
                  </svg>
                </div>
                <div id="header-cart-counter" class="badge-counter {{ isset($cart_count) ? 'active' : '' }}">{{ isset($cart_count) ? $cart_count : '' }}</div>
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
            <div class="underlogo-text hidden-mobile">ГИДРАВЛИЧЕСКОЕ ОБОРУДОВАНИЕ</div>
          </div>
          <div class="col-xxl-6 col-lg-5 col-md-4">
            <div class="search-wrapper">
              <form class="search-form" action="/poisk" method="get">
                <input type="text" name="search_query" class="search-input" minlength="3" maxlength="20" autocomplete="off" required placeholder="Поиск по товарам">
                <button type="submit" class="search-submit-btn">
                  <img src="/img/header-search-lens.svg" alt="">
                </button>
              </form>
              <div class="search-close"></div>
              <div class="search-dropdown">
                <div class="search-list js-search-rezult"></div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-md-5 d-md-block d-none">
            <div class="flex-container">
              <div class="header-bottom-item {{ Route::is('favourites') ? 'active' : '' }}">
                <div class="header-bottom-item__image">
                <svg width="100%" height="100%" viewBox="0 0 27 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M23.2585 11.3491L13.2841 23.2417L3.34165 11.3171C2.15879 9.65473 1.67925 8.53581 1.67925 7.00128C1.67925 4.15601 3.72529 1.5665 6.66646 1.5665C9.06416 1.53453 11.8135 3.99616 13.2841 5.88235C14.7227 4.0601 17.5041 1.5665 19.9337 1.5665C22.811 1.5665 24.9209 4.15601 24.9209 7.00128C24.9209 8.53581 24.5373 9.71867 23.2585 11.3491ZM19.9337 0C17.1524 0 15.0744 1.63043 13.2841 3.32481C11.5897 1.53453 9.41582 0 6.66646 0C2.76621 0 0.0168457 3.35678 0.0168457 7.00128C0.0168457 8.95141 0.816078 10.3581 1.71122 11.7008L12.0053 24.0729C13.1882 25.2877 13.38 25.2877 14.5629 24.0729L24.889 11.7008C25.912 10.3581 26.5833 8.95141 26.5833 7.00128C26.5833 3.35678 23.834 0 19.9337 0Z"/>
                  </svg>
                </div>
                <div class="header-bottom-item__text">Избранное</div>
                <div id="header-favourites-counter" class="badge-counter {{ isset($favourites_count) ? 'active' : '' }}">{{ isset($favourites_count) ? $favourites_count : '' }}</div>
                <a href="/favourites" class="full-link"></a>
              </div>
              <div class="header-bottom-item {{ Route::is('comparison') ? 'active' : '' }}">
                <div class="header-bottom-item__image">
                  <svg width="100%" height="100%" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.7411 22.6536C18.7411 23.0818 18.3896 23.4334 17.9613 23.4334C17.5267 23.4334 17.1815 23.0818 17.1815 22.6536V14.8426C17.1815 14.4144 17.5267 14.0628 17.9613 14.0628C18.3896 14.0628 18.7411 14.4144 18.7411 14.8426V22.6536ZM18.7411 12.5032H17.1815C16.3186 12.5032 15.6155 13.1999 15.6155 14.0628V23.4334C15.6155 24.2963 16.3186 24.993 17.1815 24.993H18.7411C19.604 24.993 20.3008 24.2963 20.3008 23.4334V14.0628C20.3008 13.1999 19.604 12.5032 18.7411 12.5032ZM3.12565 22.6536C3.12565 23.0818 2.7741 23.4334 2.33944 23.4334C1.91119 23.4334 1.55963 23.0818 1.55963 22.6536V9.37754C1.55963 8.94928 1.91119 8.59773 2.33944 8.59773C2.7741 8.59773 3.12565 8.94928 3.12565 9.37754V22.6536ZM3.12565 7.03171H1.55963C0.69672 7.03171 0 7.73482 0 8.59773V23.4334C0 24.2963 0.69672 24.993 1.55963 24.993H3.12565C3.98856 24.993 4.68528 24.2963 4.68528 23.4334V8.59773C4.68528 7.73482 3.98856 7.03171 3.12565 7.03171ZM10.9302 22.6536C10.9302 23.0818 10.585 23.4334 10.1504 23.4334C9.72212 23.4334 9.37056 23.0818 9.37056 22.6536V2.34643C9.37056 1.91817 9.72212 1.56661 10.1504 1.56661C10.585 1.56661 10.9302 1.91817 10.9302 2.34643V22.6536ZM10.9302 0.0069809H9.37056C8.50765 0.0069809 7.81093 0.703701 7.81093 1.56661V23.4334C7.81093 24.2963 8.50765 24.993 9.37056 24.993H10.9302C11.7931 24.993 12.4962 24.2963 12.4962 23.4334V1.56661C12.4962 0.703701 11.7931 0.0069809 10.9302 0.0069809Z"/>
                  </svg>
                </div>
                <div class="header-bottom-item__text">Сравнение</div>
                <div id="header-comparison-counter" class="badge-counter {{ isset($comparison_count) ? 'active' : '' }}">{{ isset($comparison_count) ? $comparison_count : '' }}</div>
                <a href="/comparison" class="full-link"></a>
              </div>
              <div class="header-bottom-item {{ Route::is('login') ? 'active' : '' }}">
                <div class="header-bottom-item__image">
                  <svg width="100%" height="100%" viewBox="0 0 18 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_376_40)">
                      <path d="M15.6777 19.9226C15.6777 21.8636 13.9608 23.4385 11.842 23.4385H5.44966C3.33233 23.4385 1.61546 21.8636 1.61546 19.9226V17.5781C1.61546 15.9166 2.8751 14.5344 4.56358 14.1668C5.71712 15.0813 7.1232 15.6252 8.64582 15.6252C10.1699 15.6252 11.576 15.0813 12.7281 14.1668C14.418 14.5344 15.6777 15.9166 15.6777 17.5781V19.9226ZM3.17693 7.81185C3.17693 4.36017 5.62598 1.56297 8.64582 1.56297C11.6672 1.56297 14.1147 4.36017 14.1147 7.81185C14.1147 11.265 11.6672 14.0622 8.64582 14.0622C5.62598 14.0622 3.17693 11.265 3.17693 7.81185ZM14.0774 12.7757C15.0755 11.4219 15.6777 9.69458 15.6777 7.81185C15.6777 3.49949 12.5293 0 8.64582 0C4.76231 0 1.61546 3.49949 1.61546 7.81185C1.61546 9.69458 2.21614 11.4219 3.21578 12.7757C1.37937 13.4107 0.0524902 15.1351 0.0524902 17.1882V20.3126C0.0524902 22.9006 2.15189 25 4.7399 25H12.5532C15.1412 25 17.2406 22.9006 17.2406 20.3126V17.1882C17.2406 15.1351 15.9123 13.4107 14.0774 12.7757Z"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_376_40">
                        <rect width="17.2932" height="25" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                </div>
                <div class="header-bottom-item__text">Войти</div>
                <a href="/lk" class="full-link"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="top-menu hidden-mobile">
      <div class="container">
        <ul class="menu">
          <li class="menu-item {{ Route::is('company') ? 'active' : '' }}">
            <a href="/company">КОМПАНИЯ</a>
          </li>
          <li class="menu-item {{ Route::is('services') ? 'active' : '' }}">
            <a href="/services">УСЛУГИ</a>
          </li>
          <li class="menu-item {{ Route::is('payment') ? 'active' : '' }}">
            <a href="/payment">ОПЛАТА</a>
          </li>
          <li class="menu-item {{ Route::is('delivery') ? 'active' : '' }}">
            <a href="/delivery">ДОСТАВКА</a>
          </li>
          <li class="menu-item {{ Route::is('warranty') ? 'active' : '' }}">
            <a href="/warranty">ГАРАНТИЯ</a>
          </li>
          <li class="menu-item {{ Route::is('calculators') ? 'active' : '' }}">
            <a href="/calculators">КАЛЬКУЛЯТОРЫ</a>
          </li>
          <li class="menu-item">
            <a href="/contacts {{ Route::is('contacts') ? 'active' : '' }}">КОНТАКТЫ</a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <div class="content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-3 d-md-block d-none">
          <div class="aside-nav">
            <div class="aside-nav-title">КАТАЛОГ</div>
            <div class="aside-nav-items">
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-1.png" alt="">
                </div>
                <div class="aside-nav-item__title">Гидравлические станции</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-2.png" alt="">
                </div>
                <div class="aside-nav-item__title">Гидравлические распределители</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-3.png" alt="">
                </div>
                <div class="aside-nav-item__title">Гидравлические насосы</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-4.png" alt="">
                </div>
                <div class="aside-nav-item__title">Гидравлические моторы</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-5.png" alt="">
                </div>
                <div class="aside-nav-item__title">Клапанная аппаратура</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-6.png" alt="">
                </div>
                <div class="aside-nav-item__title">Коробки отбора мощности</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-7.png" alt="">
                </div>
                <div class="aside-nav-item__title">Модульная гидроаппаратура</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-8.png" alt="">
                </div>
                <div class="aside-nav-item__title">Фильтры гидравлические</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-9.png" alt="">
                </div>
                <div class="aside-nav-item__title">Картриджная аппаратура</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-10.png" alt="">
                </div>
                <div class="aside-nav-item__title">Измерительная аппаратура</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-11.png" alt="">
                </div>
                <div class="aside-nav-item__title">Гидроцилиндры</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-12.png" alt="">
                </div>
                <div class="aside-nav-item__title">Быстроразъемные соединения БРС</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-13.png" alt="">
                </div>
                <div class="aside-nav-item__title">Редукторы и мультипликаторы</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-14.png" alt="">
                </div>
                <div class="aside-nav-item__title">Маслоохладители</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-15.png" alt="">
                </div>
                <div class="aside-nav-item__title">Гидропневмо-аккумуляторы</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-16.png" alt="">
                </div>
                <div class="aside-nav-item__title">Дистанционное управление</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-17.png" alt="">
                </div>
                <div class="aside-nav-item__title">Электроника и автоматика</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-18.png" alt="">
                </div>
                <div class="aside-nav-item__title">Сопутствующие товары</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
              <div class="aside-nav-item">
                <div class="aside-nav-item__image">
                  <img src="/img/aside-nav-19.png" alt="">
                </div>
                <div class="aside-nav-item__title">РВД</div>
                <a href="/category" class="full-link"></a>
                <div class="vertikal-line"></div>
                <div class="triangle-left"></div>
                <div class="triangle-right"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  @if(Route::is('home'))

    <div class="special-offer-section">
      <div class="container">
        <div class="section-title">Специальные предложения</div>
        <div class="special-offer-products">
          <div class="row">
            @foreach($special_offer_products as $product)
              <div class="col-lg-3 col-6">
                @include('regular-product-item')
              </div>
            @endforeach
          </div>
        </div>
        <a href="#" class="primary-btn see-all-btn btn-245">СМОТРЕТЬ ВСЕ</a>
      </div>
    </div>

    <div class="how-to-order-section main-how-to-order-section">
      <div class="container">
        @include('how-to-order')
      </div>
    </div>

  @endif

  <footer class="footer">
    <div class="container">
      <div class="logo">
        <img src="/img/header-logo.png" alt="">
      </div>
      <div class="footer-nav">
        <div class="row">
          <div class="col-xl-1"></div>
          <div class="col-xl-2 col-md-3">
            <div class="footer-nav__title">Компания</div>
            <div class="footer-nav-item">
              <a href="/company" class="footer-nav-item__link">О компании</a>
            </div>
            <div class="footer-nav-item">
              <a href="/calculators" class="footer-nav-item__link">Калькуляторы</a>
            </div>
            <div class="footer-nav-item">
              <a href="/company#company-info" class="footer-nav-item__link">Реквизиты</a>
            </div>
            <div class="footer-nav-item">
              <a href="/contacts" class="footer-nav-item__link">Контакты</a>
            </div>
          </div>
          <div class="col-xl-2 col-md-3">
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
          <div class="col-xl-4 col-md-6">
            <div class="footer-nav__title">Оставайтесь на связи</div>
            <div class="footer-nav-item footer-contacts-item">
              <div class="footer-contacts-item__image">
                <img src="/img/footer-whatsapp.svg" alt="">
              </div>
              <div class="footer-contacts-item__text">+7 (982) 292-88-79</div>
            </div>
            <div class="footer-nav-item footer-contacts-item">
              <div class="footer-contacts-item__image">
                <img src="/img/footer-geolocation.svg" alt="">
              </div>
              <div class="footer-contacts-item__text">г. Миасс, Тургоякское шоссе, 5/11</div>
            </div>
            <div class="footer-nav-item footer-contacts-item">
              <div class="footer-contacts-item__image">
                <img src="/img/footer-clock.svg" alt="">
              </div>
              <div class="footer-contacts-item__text">с 9:00 до 18:00 (СБ, ВС - выходной)</div>
            </div>
            <div class="footer-nav-item footer-contacts-item">
              <div class="footer-contacts-item__image">
                <img src="/img/footer-mail.svg" alt="">
              </div>
              <div class="footer-contacts-item__text">zakaz@gidravlic.com</div>
            </div>
          </div>
          <div class="col-md-3 d-xl-block d-none">
            <div class="footer-image">
              <img src="/img/footer-image.png" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="footer-links">
        <div class="row">
          <div class="col-xl-1"></div>
          <div class="col-md-11">
            <div class="footer-link">
              <a href="/politika-konfidencialnosti">Политика конфиденциальности</a>
            </div>
            <div class="footer-link">
              <a href="/polzovatelskoe-soglashenie-s-publichnoj-ofertoj">Пользовательское соглашение с публичной офертой</a>
            </div>
            <div class="footer-link">
              <a href="/garantiya-vozvrata-denezhnyh-sredstv">Гарантия возврата денежных средств</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="burger-menu-wrapper hidden-desktop">
    <div class="burger-menu">
      <span class="span"></span>
    </div>
  </div>
  <div class="mobile-menu hidden-desktop">

    <div class="lk-login header-btn">
      <div class="lk-login-select__image header-btn__image">
        <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7.49988 8.5C9.57095 8.5 11.2499 6.82107 11.2499 4.75C11.2499 2.67893 9.57095 1 7.49988 1C5.42881 1 3.74988 2.67893 3.74988 4.75C3.74988 6.82107 5.42881 8.5 7.49988 8.5Z"/>
          <path d="M11.25 9.99991H11.5138C12.6484 9.99991 13.6056 10.8449 13.7464 11.9708L14.0392 14.3138C14.1511 15.2091 13.453 15.9999 12.5508 15.9999H2.44916C1.54692 15.9999 0.84884 15.2091 0.960748 14.3138L1.25362 11.9708C1.39437 10.8449 2.35153 9.99991 3.48625 9.99991H3.74999" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <div class="lk-login-select__text header-btn__text">Личный кабинет</div>
      <!-- <a href="/lk" class="full-link header-btn__link"></a> -->
    </div>

    <ul class="menu">
      <li class="menu-item {{ Route::is('company') ? 'active' : '' }}">
        <a href="/company">КОМПАНИЯ</a>
      </li>
      <li class="menu-item {{ Route::is('services') ? 'active' : '' }}">
        <a href="/services">УСЛУГИ</a>
      </li>
      <li class="menu-item {{ Route::is('payment') ? 'active' : '' }}">
        <a href="/payment">ОПЛАТА</a>
      </li>
      <li class="menu-item {{ Route::is('delivery') ? 'active' : '' }}">
        <a href="/delivery">ДОСТАВКА</a>
      </li>
      <li class="menu-item {{ Route::is('warranty') ? 'active' : '' }}">
        <a href="/warranty">ГАРАНТИЯ</a>
      </li>
      <li class="menu-item {{ Route::is('calculators') ? 'active' : '' }}">
        <a href="/calculators">КАЛЬКУЛЯТОРЫ</a>
      </li>
      <li class="menu-item">
        <a href="/contacts {{ Route::is('contacts') ? 'active' : '' }}">КОНТАКТЫ</a>
      </li>
    </ul>

    <div class="info">
      <div class="info-phone">тел.: 8 (800) 575-55-88</div>
      <div class="callback-btn js-callback-btn">заказать обратный звонок</div>
    </div>          

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
            <label for="name-callback-modal" class="label">Имя <span class="accentcolor">*</span></label>
            <input type="text" name="name" id="name-callback-modal" class="input-field js-name-callback-modal" required minlength="3" maxlength="20">
          </div>
          <div class="form-group">
            <label for="email-callback-modal" class="label">E-mail <span class="accentcolor">*</span></label>
            <input type="email" name="email" id="email-callback-modal" class="input-field js-email-callback-modal" required minlength="3" maxlength="50">
          </div>
          <div class="form-group">
            <label for="phone-callback-modal" class="label">Телефон <span class="accentcolor">*</span></label>
            <input type="text" name="phone" id="phone-callback-modal" class="input-field js-phone-callback-modal js-input-phone-mask" required size="18">
          </div>
          <div class="form-group mb30">
            <label for="message-callback-modal" class="label">Сообщение</label>
            <textarea name="message" id="message-callback-modal" class="input-field textarea" minlength="3" maxlength="100"></textarea>
          </div>
          <div class="checkbox-wrapper">
            <input type="checkbox" name="checkbox-agree" class="custom-checkbox js-checkbox-callback-modal" id="checkbox-agree-callback-modal" checked required>
            <label for="checkbox-agree-callback-modal" class="custom-checkbox-label"></label>
            <span class="checkbox-text">Согласен на обработку персональных данных</span>
          </div>
          <div class="checkbox-wrapper mb30">
            <input type="checkbox" name="checkbox-read" class="custom-checkbox js-checkbox-callback-modal" id="checkbox-read-callback-modal" checked required>
            <label for="checkbox-read-callback-modal" class="custom-checkbox-label"></label>
            <span class="checkbox-text">Ознакомлен с <a href="/politika-konfidencialnosti" class="privacy-policy-link" target="_blank">политикой конфиденциальности</a></span>
          </div>

          @csrf
          <button type="button" id="callback-submit-btn" class="primary-btn modal-submit-btn btn-415">ОТПРАВИТЬ СООБЩЕНИЕ</button>
        </form>
      </div>
    </div>
  </div>

  @if(Route::is('home'))
    <div id="to-top" class="to-top hidden-mobile">
      <div class="circle"></div>
    </div>
  @endif

  @if(!request()->cookie('we-use-cookie'))
    <div class="we-use-cookie">

      <div class="we-use-cookie-wrapper">
        <div class="we-use-cookie-text">Этот сайт использует cookie-файлы и другие технологии для улучшения его работы. Продолжая работу с сайтом, вы разрешаете использование cookie-файлов. Вы всегда можете отключить файлы cookie в настройках Вашего браузера.</div>
        <button class="primary-btn btn-195 we-use-cookie-close">ХОРОШО</button>
      </div>

    </div>
  @endif

  <div class="fixed-bottom-menu hidden-desktop">
    <div class="menu-wrapper">
      <div class="menu-item">
        <div class="menu-item__image">
          <!-- <img src="/img/fixed-bottom-menu-house.svg" alt=""> -->
        </div>
        <div class="menu-item__title">Главная</div>
        <a href="/" class="full-link"></a>
      </div>
      <div id="fixed-bottom-menu-catalog-btn" class="menu-item fixed-bottom-menu-catalog-btn">
        <div class="menu-item__image">
          <!-- <img src="/img/fixed-bottom-menu-lens.svg" alt=""> -->
        </div>
        <div class="menu-item__title">Каталог</div>
      </div>
      <div class="menu-item cart-menu-item">
        <div class="menu-item__image">
          <!-- <img src="/img/fixed-bottom-menu-cart.svg" alt=""> -->
        </div>
        <div class="menu-item__title">Корзина</div>
        <div id="mobile-cart-counter" class="cart-counter {{ isset($cart_count) ? 'active' : '' }}">{{ isset($cart_count) ? $cart_count : '' }}</div>
        <a href="/cart" class="full-link"></a>
      </div>
      <div class="menu-item cart-menu-item">
        <div class="menu-item__image">
          <!-- <img src="/img/fixed-bottom-menu-heart.svg" alt=""> -->
        </div>
        <div class="menu-item__title">Избранное</div>
        <div id="mobile-favourites-counter" class="cart-counter {{ isset($favourites_count) ? 'active' : '' }}">{{ isset($favourites_count) ? $favourites_count : '' }}</div>
        <a href="/favourites" class="full-link"></a>
      </div>
    </div>
  </div>

  @if(Auth::guard('admin')->user())
    <div class="top-line-is-login">
      <div class="container-fluid">
        <div class="text-wrapper">
          <div class="top-line__text dashboard">
            <a href="/admin">Панель управления</a>
          </div>
          <div class="top-line__text logout">
            <form class="form" action="{{ route('admin.logout') }}" method="POST">
              @csrf
              <button class="logout-btn" type="submit">Выйти</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endif

  @yield('script')
  @vite(['resources/js/main.js'])

</body>
</html>
