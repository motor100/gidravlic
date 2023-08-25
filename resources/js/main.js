import IMask from 'imask';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';


// Common
const body = document.querySelector('body');


// Products search dropdown
const searchForm = document.querySelector('.search-form');
const searchInput = document.querySelector('.search-input');
const searchClose = document.querySelector('.search-close');
const searchDropdown = document.querySelector('.search-dropdown');
const searchRezult = document.querySelector('.js-search-rezult');

function searchDropdownClose() {
  searchDropdown.classList.remove('search-dropdown-active');
  searchClose.classList.remove('search-close-active');
  searchInput.classList.remove('search-input-dp');
}

function searchResetForm() {
  searchForm.reset();
  searchDropdown.classList.remove('search-dropdown-active');
  searchClose.classList.remove('search-close-active');
  searchInput.classList.remove('search-input-active');
  searchInput.classList.remove('search-input-dp');
}

searchInput.onblur = () => {
  searchInput.classList.remove('search-input-active');
  searchDropdownClose();
}

function searchOnInput() {

  if (searchInput.value.length > 3 && searchInput.value.length < 40) {

    function searchDropdownRender(json) {
      
      searchRezult.innerHTML = '';

      // Если товаров 0, то не найдено
      if (json.length == 0) {
        let tmpEl = document.createElement('div');
        tmpEl.className = "no-product";
        tmpEl.innerHTML = 'Товаров не найдено';
        searchRezult.append(tmpEl);
      }

      // Вывод результатов поиска
      if (json.length > 0) {

        // Ограничение количества выводимых результатов
        if (json.length > 4) {
          json.length = 4;
        }

        // Формирую html из массива данных
        json.forEach((item) => {
          let tmpEl = document.createElement('div');
          tmpEl.className = "search-list-item main-list-item";
          tmpEl.innerHTML = '<a href="/catalog/' + item.slug + '" class="search-list-item__link main-list-item__link">' + item.title + '</a>';
          searchRezult.append(tmpEl);
        });

        // Показать все результаты
        let tmpEl = document.createElement('a');
        tmpEl.className = "secondary-btn search-see-all-btn";
        tmpEl.href = '/poisk?search_query=' + searchInput.value;
        tmpEl.innerText = 'Показать все';
        tmpEl.onclick = searchResetForm;
        searchRezult.append(tmpEl);

        // Добавляю клик на найденные элементы
        let searchListItemLink = document.querySelectorAll('.search-list-item__link');

        searchListItemLink.forEach((item) => {
          item.onclick = searchResetForm;
        });
      }

      searchClose.classList.add('search-close-active');
      searchInput.classList.add('search-input-dp');
      searchDropdown.classList.add('search-dropdown-active');
    }

    fetch('/api/products-search?search_query=' + searchInput.value, {
      method: 'get',
      cache: 'no-cache',
    })
    .then((response) => response.json())
    .then((json) => {
      searchDropdownRender(json);      
    })
    .catch((error) => {
      console.log(error);
    })

  } else {
    // Если менее 3 символов, то скрываю результаты поиска
    searchDropdownClose();
    searchRezult.innerHTML = '';
  }

}

searchClose.onclick = searchResetForm;

searchInput.oninput = searchOnInput;


// Slider
const mainSlider = new Swiper('.main-slider', {
  modules: [Navigation, Pagination],
  slidesPerView: 1,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: ".swiper-pagination",
  },
});


// Add to cart
const addToCartBtns = document.querySelectorAll('.add-to-cart');

function addToCart(elem) {

  // Add class to elem (set active)
  elem.classList.add('active');
  elem.innerText = 'В корзине';

  /**
   * Функция обновления счетчиков товара в избранном
   * В хедере, в закрепленном меню, в мобильном меню
   * str строка
   * return false
   * @param {*} str 
   * @returns void
   */
  function cartCounterUpdate(str) {

    // Header cart counter
    const headerCartCounter = document.querySelector('#header-cart-counter');
    headerCartCounter.innerText = str;
    headerCartCounter.classList.add('active');

    // Sticky desktop menu cart counter
    /*
    const stickyDesktopMenuCartCounter = document.querySelector('#sticky-desktop-menu-cart-counter');
    stickyDesktopMenuCartCounter.innerText = str;
    stickyDesktopMenuCartCounter.classList.add('active');
    */

    // Mobile cart counter
    /*
    const mobileCartCounter = document.querySelector('#mobile-cart-counter');
    mobileCartCounter.innerText = str;
    mobileCartCounter.classList.add('active');
    */
  }

  fetch('/ajax/add-to-cart?id=' + elem.dataset.id, {
    method: 'GET',
    cache: 'no-cache',
  })
  .then((response) => response.text())
  .then((text) => {
    cartCounterUpdate(text);
  })
  .catch((error) => {
    console.log(error);
  })
}

addToCartBtns.forEach((item) => {
  item.onclick = function() {
    addToCart(item);
  }
});


// Add to favourites
const addToFavouritesBtns = document.querySelectorAll('.add-to-favourites');

function addToFavourites(elem) {

  // Add class to elem
  elem.classList.add('active');

  /**
   * Функция обновления счетчиков товара в избранном
   * В хедере, в закрепленном меню, в мобильном меню
   * str строка
   * return false
   * @param {*} str 
   * @returns void
   */
  function favouritesCounterUpdate(str) {

    // Header favourites counter
    const headerFavouritesCounter = document.querySelector('#header-favourites-counter');
    headerFavouritesCounter.innerText = str;
    headerFavouritesCounter.classList.add('active');

    // Sticky desktop menu favourites counter
    /*
    const stickyDesktopMenuFavouritesCounter = document.querySelector('#sticky-desktop-menu-favourites-counter');
    stickyDesktopMenuFavouritesCounter.innerText = str;
    stickyDesktopMenuFavouritesCounter.classList.add('active');
    */

    // Mobile favourites counter
    /*
    const mobileFavouritesCounter = document.querySelector('#mobile-favourites-counter');
    mobileFavouritesCounter.innerText = str;
    mobileFavouritesCounter.classList.add('active');
    */
  }

  fetch('/ajax/add-to-favourites?id=' + elem.dataset.id, {
    method: 'GET',
    cache: 'no-cache',
  })
  .then((response) => response.text())
  .then((text) => {
    favouritesCounterUpdate(text);
  })
  .catch((error) => {
    console.log(error);
  })
}

addToFavouritesBtns.forEach((item) => {
  item.onclick = function() {
    addToFavourites(item);
  }
});


// Add to comparison
const addToComparisonBtns = document.querySelectorAll('.add-to-comparison');

function addToComparison(elem) {

  // Add class to elem
  elem.classList.add('active');

  /**
   * Функция обновления счетчиков товара в избранном
   * В хедере, в закрепленном меню, в мобильном меню
   * str строка
   * return false
   * @param {*} str 
   * @returns void
   */
  function comparisonCounterUpdate(str) {

    // Header comparison counter
    const headerComparisonCounter = document.querySelector('#header-comparison-counter');
    headerComparisonCounter.innerText = str;
    headerComparisonCounter.classList.add('active');

    // Sticky desktop menu comparison counter
    /*
    const stickyDesktopMenuComparisonCounter = document.querySelector('#sticky-desktop-menu-comparison-counter');
    stickyDesktopMenuComparisonCounter.innerText = str;
    stickyDesktopMenuComparisonCounter.classList.add('active');
    */

    // Mobile comparison counter
    /*
    const mobileComparisonCounter = document.querySelector('#mobile-comparison-counter');
    mobileComparisonCounter.innerText = str;
    mobileComparisonCounter.classList.add('active');
    */
  }

  fetch('/ajax/add-to-comparison?id=' + elem.dataset.id, {
    method: 'GET',
    cache: 'no-cache',
  })
  .then((response) => response.text())
  .then((text) => {
    comparisonCounterUpdate(text);
  })
  .catch((error) => {
    console.log(error);
  })
}

addToComparisonBtns.forEach((item) => {
  item.onclick = function() {
    addToComparison(item);
  }
});


// Окна
const modalWindow = document.querySelectorAll('.modal-window');
const callbackBtns = document.querySelectorAll('.js-callback-btn');
const callbackModal = document.querySelector('#callback-modal');
const modalCloseBtn = document.querySelector('.modal-window .modal-close');

function modalWindowOpen(win) {
  body.classList.add('overflow-hidden');
  win.classList.add('active');
  setTimeout(() => {
    win.childNodes[1].classList.add('active');
  }, 200);
}

function modalWindowClose(win) {
  body.classList.remove('overflow-hidden');
  win.childNodes[1].classList.remove('active');
  setTimeout(() => {
    win.classList.remove('active');
  }, 300);
}

callbackBtns.forEach((item) => {
  item.onclick = () => {
    modalWindowOpen(callbackModal);
  }
});

modalCloseBtn.onclick = () => {
  modalWindowClose(callbackModal);
}

// Закрытие окна если клик за его пределами
for (let i = 0; i < modalWindow.length; i++) {
  modalWindow[i].onclick = function(event) {
    let classList = event.target.classList;
    for (let j = 0; j < classList.length; j++) {
      if (classList[j] == "modal-wrapper" || classList[j] == "modal-window") {
        modalWindowClose(modalWindow[i])
      }
    }
  }
}

// Callback modal checkbox I agree and I read
const checkboxCallbackModal = document.querySelectorAll('.js-checkbox-callback-modal');
const callbackSubmitBtn = document.querySelector('#callback-submit-btn');

function callbackModalCheckboxOnchange() {
  if (!checkboxCallbackModal[0].checked || !checkboxCallbackModal[1].checked) {
    callbackSubmitBtn.disabled = true;
  } else {
    callbackSubmitBtn.disabled = '';
  }
}

checkboxCallbackModal.forEach((item) => {
  item.onchange = callbackModalCheckboxOnchange;
});


// Input mask
const elementPhone = document.querySelector('#phone-callback-modal');

const maskOptionsPhone = {
  mask: '+{7} (000) 000 00 00'
};

const mask = IMask(elementPhone, maskOptionsPhone);


// Отправка формы ajax в модальном окне
const callbackModalForm = document.querySelector('#callback-modal-form');

function ajaxCallback(form) {

  const inputs = form.querySelectorAll('.input-field');
  let arr = [];

  const inputName = form.querySelector('.js-name-callback-modal');
  if (inputName.value.length < 3 || inputName.value.length > 20) {
    inputName.classList.add('required');
    arr.push(false);
  }

  let inputEmail = form.querySelector('.js-email-callback-modal');
  if (inputName.value.length < 3 || inputName.value.length > 20) {
    inputEmail.classList.add('required');
    arr.push(false);
  }

  const inputPhone = form.querySelector('.js-phone-callback-modal');
  if (inputPhone.value.length != 18) {
    inputPhone.classList.add('required');
    arr.push(false);
  }

  const inputCheckboxes = form.querySelectorAll('.js-checkbox-callback-modal');

  inputCheckboxes.forEach((item) => {
    if (!item.checked) {
      arr.push(false);
    }
  });

  if (arr.length == 0) {
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].classList.remove('required');
    }

    fetch('/api/callback', {
      method: 'POST',
      cache: 'no-cache',
      body: new FormData(form)
    })
    .catch((error) => {
      console.log(error);
    })

    alert("Спасибо. Мы свяжемся с вами.");

    form.reset();

  }

  return false;
}

callbackSubmitBtn.onclick = () => {
  ajaxCallback(callbackModalForm);
}


// Скрывание кнопки Мы используем куки we use cookie
const weUseCookie = document.querySelector('.we-use-cookie');
const weUseCookieClose = document.querySelector('.we-use-cookie-close');

if (weUseCookie) {

  weUseCookieClose.onclick = () => {
    weUseCookie.classList.add('hidden');

    fetch('/ajax/we-use-cookie', {
      method: 'GET',
      cache: 'no-cache',
    })
    .catch((error) => {
      console.log(error);
    })
  }

}


// To top
const toTop = document.getElementById("to-top");

/*
if (toTop) {

  toTop.onclick = () => {
    scroll(0, 0);
  }

  // Показать to-top при скролле
  window.onscroll = () => {
    
    let scrToTop = window.pageYOffset || document.documentElement.scrollTop;
    
    if (scrToTop > 400) {
      toTop.classList.add('active');
    } else {
      toTop.classList.remove('active');
    }

  }

}
*/







  