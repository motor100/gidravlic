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
              <button id="callback-btn" class="primary-btn header-feedback-btn">Оставить заявку</button>
            </div>
          </div>
          <div class="col-md-1">
            <div class="flex-container">
              <div class="cart">
                <div class="header-cart-image">
                  <svg width="43" height="40" viewBox="0 0 43 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.9308 34.6287C30.4431 34.6287 29.2573 35.8145 29.2573 37.2806C29.2573 38.7467 30.4431 39.954 31.9308 39.954C33.3969 39.954 34.5827 38.7467 34.5827 37.2806C34.5827 35.8145 33.3969 34.6287 31.9308 34.6287ZM18.6281 34.6287C17.162 34.6287 15.9546 35.8145 15.9546 37.2806C15.9546 38.7467 17.162 39.954 18.6281 39.954C20.0942 39.954 21.28 38.7467 21.28 37.2806C21.28 35.8145 20.0942 34.6287 18.6281 34.6287ZM35.9194 26.6513C35.9194 28.1174 34.7121 29.3033 33.246 29.3033H18.6281C17.162 29.3033 15.9546 28.1174 15.9546 26.6513L13.7339 13.3487H39.2397L35.9194 26.6513ZM13.2596 10.6967L9.93929 0.0459566H1.33674C0.603688 0.0459566 0 0.649645 0 1.38269C0 2.11574 0.603688 2.69787 1.33674 2.69787H7.97731L10.6508 10.6967L13.3027 26.6513C13.3027 29.5835 15.6743 31.9767 18.6281 31.9767H33.246C36.1997 31.9767 38.5714 29.5835 38.5714 26.6513L42.56 10.6967H13.2596Z"/>
                  </svg>
                </div>
                <!-- <div id="header-cart-counter" class="badge-counter {{ isset($cart_count) ? 'active' : '' }}">{{ isset($cart_count) ? $cart_count : '' }}</div> -->
                <div id="header-cart-counter" class="badge-counter active">1</div>
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
                  <img src="/img/header-search-lens.svg" alt="">
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
              <svg width="27" height="25" viewBox="0 0 27 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M23.2585 11.3491L13.2841 23.2417L3.34165 11.3171C2.15879 9.65473 1.67925 8.53581 1.67925 7.00128C1.67925 4.15601 3.72529 1.5665 6.66646 1.5665C9.06416 1.53453 11.8135 3.99616 13.2841 5.88235C14.7227 4.0601 17.5041 1.5665 19.9337 1.5665C22.811 1.5665 24.9209 4.15601 24.9209 7.00128C24.9209 8.53581 24.5373 9.71867 23.2585 11.3491ZM19.9337 0C17.1524 0 15.0744 1.63043 13.2841 3.32481C11.5897 1.53453 9.41582 0 6.66646 0C2.76621 0 0.0168457 3.35678 0.0168457 7.00128C0.0168457 8.95141 0.816078 10.3581 1.71122 11.7008L12.0053 24.0729C13.1882 25.2877 13.38 25.2877 14.5629 24.0729L24.889 11.7008C25.912 10.3581 26.5833 8.95141 26.5833 7.00128C26.5833 3.35678 23.834 0 19.9337 0Z"/>
                </svg>
              </div>
              <div class="header-bottom-item__text">Избранное</div>
              <!-- <div id="header-favourites-counter" class="badge-counter {{ isset($favourites_count) ? 'active' : '' }}">{{ isset($favourites_count) ? $favourites_count : '' }}</div> -->
              <div id="header-favourites-counter" class="badge-counter active">1</div>
              <a href="/favourites" class="full-link"></a>
            </div>
          </div>
          <div class="col-md-1">
            <div class="header-bottom-item">
              <div class="header-bottom-item__image">
                <svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.7411 22.6536C18.7411 23.0818 18.3896 23.4334 17.9613 23.4334C17.5267 23.4334 17.1815 23.0818 17.1815 22.6536V14.8426C17.1815 14.4144 17.5267 14.0628 17.9613 14.0628C18.3896 14.0628 18.7411 14.4144 18.7411 14.8426V22.6536ZM18.7411 12.5032H17.1815C16.3186 12.5032 15.6155 13.1999 15.6155 14.0628V23.4334C15.6155 24.2963 16.3186 24.993 17.1815 24.993H18.7411C19.604 24.993 20.3008 24.2963 20.3008 23.4334V14.0628C20.3008 13.1999 19.604 12.5032 18.7411 12.5032ZM3.12565 22.6536C3.12565 23.0818 2.7741 23.4334 2.33944 23.4334C1.91119 23.4334 1.55963 23.0818 1.55963 22.6536V9.37754C1.55963 8.94928 1.91119 8.59773 2.33944 8.59773C2.7741 8.59773 3.12565 8.94928 3.12565 9.37754V22.6536ZM3.12565 7.03171H1.55963C0.69672 7.03171 0 7.73482 0 8.59773V23.4334C0 24.2963 0.69672 24.993 1.55963 24.993H3.12565C3.98856 24.993 4.68528 24.2963 4.68528 23.4334V8.59773C4.68528 7.73482 3.98856 7.03171 3.12565 7.03171ZM10.9302 22.6536C10.9302 23.0818 10.585 23.4334 10.1504 23.4334C9.72212 23.4334 9.37056 23.0818 9.37056 22.6536V2.34643C9.37056 1.91817 9.72212 1.56661 10.1504 1.56661C10.585 1.56661 10.9302 1.91817 10.9302 2.34643V22.6536ZM10.9302 0.0069809H9.37056C8.50765 0.0069809 7.81093 0.703701 7.81093 1.56661V23.4334C7.81093 24.2963 8.50765 24.993 9.37056 24.993H10.9302C11.7931 24.993 12.4962 24.2963 12.4962 23.4334V1.56661C12.4962 0.703701 11.7931 0.0069809 10.9302 0.0069809Z"/>
                </svg>
              </div>
              <div class="header-bottom-item__text">Сравнение</div>
              <!-- <div id="header-comparison-counter" class="badge-counter {{ isset($comparison_count) ? 'active' : '' }}">{{ isset($comparison_count) ? $comparison_count : '' }}</div> -->
              <div id="header-comparison-counter" class="badge-counter active">1</div>
              <a href="/comparison" class="full-link"></a>
            </div>
          </div>
          <div class="col-md-1">
            <div class="header-bottom-item">
              <div class="header-bottom-item__image">
                <svg width="18" height="25" viewBox="0 0 18 25" fill="none" xmlns="http://www.w3.org/2000/svg">
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

  <div class="content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
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
            <div class="col-md-3">
              <div class="product-item">
                <div class="product-item__image">
                  <a href="#" class="product-item__link">
                    <img src="/img/temp-product-image1.jpg" alt="">
                  </a>
                </div>
                <a href="#" class="product-item__title">Шланг гидравлический высокого давление TR-1721 d32мм</a>
                <div class="product-item__price">
                  <span class="product-item__value">325</span>
                  <span class="product-item__currency">р</span>
                </div>
                <button class="primary-btn add-to-cart-btn add-to-cart" data-id="1">КУПИТЬ</button>
                <div class="product-item__label">
                  <span class="product-item__label-text">ХИТ</span>
                  </div>
                <div class="product-item-favourites add-to-favourites" data-id="1">
                  <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.9293 0C13.7428 0 12.0708 1.28617 10.6239 2.66881C9.27339 1.22186 7.53705 0 5.31841 0C2.19943 0 0.0129395 2.66881 0.0129395 5.59485C0.0129395 7.17042 0.656026 8.29582 1.36342 9.35691L9.59493 19.2604C10.5274 20.2251 10.7203 20.2251 11.6528 19.2604L19.9165 9.35691C20.7203 8.29582 21.267 7.17042 21.267 5.59485C21.267 2.66881 19.0483 0 15.9293 0Z"/>
                  </svg>
                </div>
                <div class="product-item-comparison add-to-comparison" data-id="1">
                  <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9856 10.0185H13.7307C13.0663 10.0185 12.4757 10.5721 12.4757 11.2734V18.7663C12.4757 19.4306 13.0663 19.9843 13.7307 19.9843H14.9856C15.6869 19.9843 16.2406 19.4306 16.2406 18.7663V11.2734C16.2406 10.5721 15.6869 10.0185 14.9856 10.0185ZM8.74778 0.0157471H7.49282C6.79152 0.0157471 6.23787 0.569404 6.23787 1.2707V18.7663C6.23787 19.4306 6.79152 19.9843 7.49282 19.9843H8.74778C9.44908 19.9843 10.0027 19.4306 10.0027 18.7663V1.2707C10.0027 0.569404 9.44908 0.0157471 8.74778 0.0157471ZM2.50991 5.62614H1.25496C0.553657 5.62614 0 6.17979 0 6.88109V18.7663C0 19.4306 0.553657 19.9843 1.25496 19.9843H2.50991C3.1743 19.9843 3.76487 19.4306 3.76487 18.7663V6.88109C3.76487 6.17979 3.1743 5.62614 2.50991 5.62614Z"/>
                  </svg>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-item">
                <div class="product-item__image">
                  <a href="#" class="product-item__link">
                    <img src="/img/temp-product-image1.jpg" alt="">
                  </a>
                </div>
                <a href="#" class="product-item__title">Шланг гидравлический высокого давление TR-1721 d32мм</a>
                <div class="product-item__price">
                  <span class="product-item__value">325</span>
                  <span class="product-item__currency">р</span>
                </div>
                <button class="primary-btn add-to-cart-btn add-to-cart" data-id="1">КУПИТЬ</button>
                <div class="product-item__label">
                  <span class="product-item__label-text">ХИТ</span>
                  </div>
                <div class="product-item-favourites add-to-favourites" data-id="1">
                  <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.9293 0C13.7428 0 12.0708 1.28617 10.6239 2.66881C9.27339 1.22186 7.53705 0 5.31841 0C2.19943 0 0.0129395 2.66881 0.0129395 5.59485C0.0129395 7.17042 0.656026 8.29582 1.36342 9.35691L9.59493 19.2604C10.5274 20.2251 10.7203 20.2251 11.6528 19.2604L19.9165 9.35691C20.7203 8.29582 21.267 7.17042 21.267 5.59485C21.267 2.66881 19.0483 0 15.9293 0Z"/>
                  </svg>
                </div>
                <div class="product-item-comparison add-to-comparison" data-id="1">
                  <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9856 10.0185H13.7307C13.0663 10.0185 12.4757 10.5721 12.4757 11.2734V18.7663C12.4757 19.4306 13.0663 19.9843 13.7307 19.9843H14.9856C15.6869 19.9843 16.2406 19.4306 16.2406 18.7663V11.2734C16.2406 10.5721 15.6869 10.0185 14.9856 10.0185ZM8.74778 0.0157471H7.49282C6.79152 0.0157471 6.23787 0.569404 6.23787 1.2707V18.7663C6.23787 19.4306 6.79152 19.9843 7.49282 19.9843H8.74778C9.44908 19.9843 10.0027 19.4306 10.0027 18.7663V1.2707C10.0027 0.569404 9.44908 0.0157471 8.74778 0.0157471ZM2.50991 5.62614H1.25496C0.553657 5.62614 0 6.17979 0 6.88109V18.7663C0 19.4306 0.553657 19.9843 1.25496 19.9843H2.50991C3.1743 19.9843 3.76487 19.4306 3.76487 18.7663V6.88109C3.76487 6.17979 3.1743 5.62614 2.50991 5.62614Z"/>
                  </svg>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-item">
                <div class="product-item__image">
                  <a href="#" class="product-item__link">
                    <img src="/img/temp-product-image1.jpg" alt="">
                  </a>
                </div>
                <a href="#" class="product-item__title">Шланг гидравлический высокого давление TR-1721 d32мм</a>
                <div class="product-item__price">
                  <span class="product-item__value">325</span>
                  <span class="product-item__currency">р</span>
                </div>
                <button class="primary-btn add-to-cart-btn add-to-cart" data-id="1">КУПИТЬ</button>
                <div class="product-item__label">
                  <span class="product-item__label-text">ХИТ</span>
                  </div>
                <div class="product-item-favourites add-to-favourites" data-id="1">
                  <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.9293 0C13.7428 0 12.0708 1.28617 10.6239 2.66881C9.27339 1.22186 7.53705 0 5.31841 0C2.19943 0 0.0129395 2.66881 0.0129395 5.59485C0.0129395 7.17042 0.656026 8.29582 1.36342 9.35691L9.59493 19.2604C10.5274 20.2251 10.7203 20.2251 11.6528 19.2604L19.9165 9.35691C20.7203 8.29582 21.267 7.17042 21.267 5.59485C21.267 2.66881 19.0483 0 15.9293 0Z"/>
                  </svg>
                </div>
                <div class="product-item-comparison add-to-comparison" data-id="1">
                  <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9856 10.0185H13.7307C13.0663 10.0185 12.4757 10.5721 12.4757 11.2734V18.7663C12.4757 19.4306 13.0663 19.9843 13.7307 19.9843H14.9856C15.6869 19.9843 16.2406 19.4306 16.2406 18.7663V11.2734C16.2406 10.5721 15.6869 10.0185 14.9856 10.0185ZM8.74778 0.0157471H7.49282C6.79152 0.0157471 6.23787 0.569404 6.23787 1.2707V18.7663C6.23787 19.4306 6.79152 19.9843 7.49282 19.9843H8.74778C9.44908 19.9843 10.0027 19.4306 10.0027 18.7663V1.2707C10.0027 0.569404 9.44908 0.0157471 8.74778 0.0157471ZM2.50991 5.62614H1.25496C0.553657 5.62614 0 6.17979 0 6.88109V18.7663C0 19.4306 0.553657 19.9843 1.25496 19.9843H2.50991C3.1743 19.9843 3.76487 19.4306 3.76487 18.7663V6.88109C3.76487 6.17979 3.1743 5.62614 2.50991 5.62614Z"/>
                  </svg>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-item">
                <div class="product-item__image">
                  <a href="#" class="product-item__link">
                    <img src="/img/temp-product-image1.jpg" alt="">
                  </a>
                </div>
                <a href="#" class="product-item__title">Шланг гидравлический высокого давление TR-1721 d32мм</a>
                <div class="product-item__price">
                  <span class="product-item__value">325</span>
                  <span class="product-item__currency">р</span>
                </div>
                <button class="primary-btn add-to-cart-btn add-to-cart" data-id="1">КУПИТЬ</button>
                <div class="product-item__label">
                  <span class="product-item__label-text">ХИТ</span>
                  </div>
                <div class="product-item-favourites add-to-favourites" data-id="1">
                  <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.9293 0C13.7428 0 12.0708 1.28617 10.6239 2.66881C9.27339 1.22186 7.53705 0 5.31841 0C2.19943 0 0.0129395 2.66881 0.0129395 5.59485C0.0129395 7.17042 0.656026 8.29582 1.36342 9.35691L9.59493 19.2604C10.5274 20.2251 10.7203 20.2251 11.6528 19.2604L19.9165 9.35691C20.7203 8.29582 21.267 7.17042 21.267 5.59485C21.267 2.66881 19.0483 0 15.9293 0Z"/>
                  </svg>
                </div>
                <div class="product-item-comparison add-to-comparison" data-id="1">
                  <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9856 10.0185H13.7307C13.0663 10.0185 12.4757 10.5721 12.4757 11.2734V18.7663C12.4757 19.4306 13.0663 19.9843 13.7307 19.9843H14.9856C15.6869 19.9843 16.2406 19.4306 16.2406 18.7663V11.2734C16.2406 10.5721 15.6869 10.0185 14.9856 10.0185ZM8.74778 0.0157471H7.49282C6.79152 0.0157471 6.23787 0.569404 6.23787 1.2707V18.7663C6.23787 19.4306 6.79152 19.9843 7.49282 19.9843H8.74778C9.44908 19.9843 10.0027 19.4306 10.0027 18.7663V1.2707C10.0027 0.569404 9.44908 0.0157471 8.74778 0.0157471ZM2.50991 5.62614H1.25496C0.553657 5.62614 0 6.17979 0 6.88109V18.7663C0 19.4306 0.553657 19.9843 1.25496 19.9843H2.50991C3.1743 19.9843 3.76487 19.4306 3.76487 18.7663V6.88109C3.76487 6.17979 3.1743 5.62614 2.50991 5.62614Z"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a href="#" class="primary-btn see-all-btn">СМОТРЕТЬ ВСЁ</a>
      </div>
    </div>

    <div class="how-to-order-section">
      <div class="container">
        <div class="section-title">КАК СДЕЛАТЬ ЗАКАЗ?</div>
        <div class="how-to-order-top">
          <div class="how-to-order-top__title">Сделать заказ очень просто! Для этого подойдет любой удобный способ:</div>
          <div class="how-to-order-top-items">
            <div class="how-to-order-top-item">
              <div class="how-to-order-top-item__image">
                <img src="/img/how-to-order-top-web.png" alt="">
              </div>
              <div class="how-to-order-top-item__content">
                <div class="how-to-order-top-item__title">Сайт</div>
                <div class="how-to-order-top-item__text">Сделать заказ онлайн</div>
              </div>
            </div>
            <div class="how-to-order-top-item">
              <div class="how-to-order-top-item__image">
                <img src="/img/how-to-order-top-phone.png" alt="">
              </div>
              <div class="how-to-order-top-item__content">
                <div class="how-to-order-top-item__title">Телефон</div>
                <div class="how-to-order-top-item__text">8 800 555-77-66<br>Звонок по России бесплатный</div>
              </div>
            </div>
            <div class="how-to-order-top-item">
              <div class="how-to-order-top-item__image">
                <img src="/img/how-to-order-top-email.png" alt="">
              </div>
              <div class="how-to-order-top-item__content">
                <div class="how-to-order-top-item__title">Электронная почта</div>
                <div class="how-to-order-top-item__text">zakaz@gidravlic.com</div>
              </div>
            </div>
            <div class="how-to-order-top-item">
              <div class="how-to-order-top-item__image">
                <img src="/img/how-to-order-top-chat.png" alt="">
              </div>
              <div class="how-to-order-top-item__content">
                <div class="how-to-order-top-item__title">Чат</div>
                <div class="how-to-order-top-item__text">Открыть чат</div>
              </div>
            </div>
          </div>
        </div>
        <div class="how-to-order-bottom">
          <div class="how-to-order-bottom-item">
            <div class="how-to-order-bottom-item__image">
              <img src="/img/how-to-order-bottom-web.png" alt="">
            </div>
            <div class="how-to-order-bottom-line"></div>
            <div class="how-to-order-bottom-item__content">
              <div class="how-to-order-bottom-item__title">Заказать на сайте</div>
              <div class="how-to-order-bottom-item__text">Добавьте нужные товары в корзину, нажав «Купить», и нажмите «Корзина» ---- Оформить заказ:</div>
              <div class="how-to-order-bottom-item__description">
                <div class="image">
                  <img src="/img/how-to-order-bottom-description-image.png" alt="">
                </div>
                <div class="content">
                  <div class="title">Оставить заявку</div>
                  <div class="text">Вы можете сделать заказ быстро, заполнив всего несколько полей: имя и телефон. Операторы колл-центра свяжутся с Вами для уточнения деталей заказа.</div>
                </div>
              </div>
            </div>
          </div>
          <div class="how-to-order-bottom-item">
            <div class="how-to-order-bottom-item__image">
              <img src="/img/how-to-order-bottom-phone.png" alt="">
            </div>
            <div class="how-to-order-bottom-line"></div>
            <div class="how-to-order-bottom-item__content">
              <div class="how-to-order-bottom-item__title">Заказать по телефону 8 800-555-77-66 (звонок по России бесплатный)</div>
              <div class="how-to-order-bottom-item__text">По телефону Вас проконсультируют по всем вопросам, расскажут про преимущества товаров, гарантию и примут заказ. Если Вы позвонили в не рабочее время (рабочее время с 9:00 до 19:00), оставьте свой номер, и Вам перезвонят.</div>
            </div>
          </div>
          <div class="how-to-order-bottom-item">
            <div class="how-to-order-bottom-item__image">
              <img src="/img/how-to-order-bottom-email.png" alt="">
            </div>
            <div class="how-to-order-bottom-line"></div>
            <div class="how-to-order-bottom-item__content">
              <div class="how-to-order-bottom-item__title">Заказать по электронной почте zakaz@gidravlic.com</div>
              <div class="how-to-order-bottom-item__text">Напишите нам какие товары Вам нужны, и мы поможем оформить заказ. Оставьте свой телефон, чтобы мы могли перезвонить для уточнения деталей. Вы также можете прислать заказ в любом удобном формате, например, excel или pdf. Если Вы представитель юридического лица, то пришлите нам реквизиты, чтобы мы смогли выставить счет.</div>
            </div>
          </div>
          <div class="how-to-order-bottom-item">
            <div class="how-to-order-bottom-item__image">
              <img src="/img/how-to-order-bottom-chat.png" alt="">
            </div>
            <div class="how-to-order-bottom-line"></div>
            <div class="how-to-order-bottom-item__content">
              <div class="how-to-order-bottom-item__title">Заказать через чат</div>
              <div class="how-to-order-bottom-item__text">Вам не придется ждать, мы отвечаем быстро. В чате Вы можете задать все интересующие вопросы и получить подробную консультацию по товару и оформлению заказа. Открыть чат</div>
            </div>
          </div>
        </div>
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
              <a href="/company#company-info" class="footer-nav-item__link">Реквизиты</a>
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
          <div class="col-md-4">
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
          <div class="col-md-3">
            <div class="footer-image">
              <img src="/img/footer-image.png" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="footer-links">
        <div class="row">
          <div class="col-md-1"></div>
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
            <span class="checkbox-text">Ознакомлен с <a href="/politika-konfidencialnosti" class="privacy-policy-link" target="_blank">политикой конфиденциальности</a></span>
          </div>

          @csrf
          <button type="button" id="callback-submit-btn" class="primary-btn submit-btn">ОТПРАВИТЬ СООБЩЕНИЕ</button>
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
        <button class="primary-btn we-use-cookie-close">ХОРОШО</button>
      </div>

    </div>
  @endif

  @vite(['resources/js/main.js'])

</body>
</html>
