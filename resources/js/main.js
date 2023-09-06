import IMask from 'imask';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';


// Common
const body = document.querySelector('body');
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // csrf token


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


// Top menu nav item set active
const topMenuItems = document.querySelectorAll('.top-menu .menu-item');

if(typeof(menuItemActive) != "undefined" && menuItemActive !== null) {
  topMenuItems[menuItemActive].classList.add('active');
}


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


// Добавление отзывов
const addTestimonialForm = document.querySelector("#add-testimonial-form");
const addTestimonialBtn = document.querySelector('#add-testimonial-btn');

if (addTestimonialBtn) {
  addTestimonialBtn.onclick = function() {
    ajaxAddTestimonial(addTestimonialForm);
  }
}

function ajaxAddTestimonial(form) {

  const inputs = form.querySelectorAll('.input-field');
  let arr = [];

  const inputName = form.querySelector('#testimonial-name');
  if (inputName.value.length < 3 || inputName.value.length > 50 ) {
    inputName.classList.add('required');
    arr.push(false);
  }

  const inputEmail = form.querySelector('#testimonial-email');
  if (inputEmail.value.length < 3 || inputEmail.value.length > 50 ) {
    inputEmail.classList.add('required');
    arr.push(false);
  }

  const inputText = form.querySelector('#testimonial-text');
  if (inputText.value.length < 3 || inputText.value.length > 500 ) {
    inputText.classList.add('required');
    arr.push(false);
  }

  const inputCheckboxAgree = form.querySelector('#testimonial-checkbox-agree');
  if (!inputCheckboxAgree.checked) {
    inputCheckboxAgree.classList.add('required');
    arr.push(false);
  }

  const inputCheckboxRead = form.querySelector('#testimonial-checkbox-read');
  if (!inputCheckboxRead.checked) {
    inputCheckboxRead.classList.add('required');
    arr.push(false);
  }

  if (arr.length == 0) {
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].classList.remove('required');
    }

    fetch('/api/add-testimonial', {
      method: 'POST',
      cache: 'no-cache',
      body: new FormData(form)
    })
    .then((response) => response.json())
    .then((json) => {
      // Если в объекте есть ключ message, то ошибка
      typeof json.message !== "undefined" ? alert("Ошибка") : alert("Спасибо за отзыв.");
    })
    .catch((error) => {
      console.log(error);
    })

    form.reset();
  }
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


// Фильтр товаров в категории
const productsFilter = document.querySelector('.products-filter');

if (productsFilter) {
  const productsFilterTitle = document.querySelector('.products-filter-title');

  productsFilterTitle.onclick = () => {
    productsFilter.classList.toggle('active');
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

const cartPage = document.querySelector('.cart-page');

if (cartPage) {
  
  /**
   * Расчет количества всех товаров в корзине
   * @param NodeList
   * @returns Boolean
   */
  function quantityCalc(cartItems) {

    // const summaryQuantity = document.querySelectorAll('.js-summary-quantity');
    const summaryQuantity = document.querySelector('.js-summary-quantity');

    let quantitySumm = 0;

    cartItems.forEach((item) => {
      const itemQuantity = item.querySelector('.js-item-quantity');

      let itemQuantityValue = typeof itemQuantity.value !== 'undefined' ? itemQuantity.value : itemQuantity.innerText;

      itemQuantityValue = Number(itemQuantityValue);
      quantitySumm += itemQuantityValue;

    });
    
    /*
    summaryQuantity.forEach((item) => {
      item.innerText = quantitySumm;
    });
    */
    summaryQuantity.innerText = quantitySumm;

    return false;
  }

  /**
   * Расчет суммы всех товаров
   * @param NodeList
   * @returns Number
   */
  function summCalc(cartItems) {

    const summarySumm = document.querySelector('.js-summary-summ');

    let totalSumm = 0;

    cartItems.forEach((item) => {
      const quantityNumber = item.querySelector('.js-item-quantity');

      let itemPrice = item.querySelector('.js-item-price').innerText,
          summItemSumm = 0;

      let quantityNumberValue = typeof quantityNumber.value !== 'undefined' ? quantityNumber.value : quantityNumber.innerText;
        
      summItemSumm = Number(quantityNumberValue) * Number(itemPrice);
      totalSumm += summItemSumm;
    });

    /*
    summarySumm.forEach((item) => {
      item.innerText = totalSumm;
    });
    */
    summarySumm.innerText = totalSumm;

    return totalSumm;
  }

  const cartItems = document.querySelectorAll('.product-item');

  quantityCalc(cartItems);
  summCalc(cartItems);

  // Увеличение количество одного товара в корзине
  function ajax_plus_cart(elem) {

    fetch('/ajax/pluscart', {
      method: 'POST',
      headers: {'Content-Type':'application/x-www-form-urlencoded'},
      cache: 'no-cache',
      body: 'id=' + encodeURIComponent(elem.dataset.id) + '&_token=' + encodeURIComponent(token),
    })
    .catch((error) => {
      console.log(error);
    })

  }

  // Уменьшение количество одного товара в корзине
  function ajax_minus_cart(elem) {

    fetch('/ajax/minuscart', {
      method: 'POST',
      headers: {'Content-Type':'application/x-www-form-urlencoded'},
      cache: 'no-cache',
      body: 'id=' + encodeURIComponent(elem.dataset.id) + '&_token=' + encodeURIComponent(token),
    })
    .catch((error) => {
      console.log(error);
    })

  }

  cartItems.forEach((item) => {

    // quantity step
    const quantityMinus = item.querySelector('.quantity-minus'),
        quantityPlus = item.querySelector('.quantity-plus'),
        quantityNumber = item.querySelector('.js-item-quantity');

    // Расчет товар +1
    quantityPlus.onclick = function() {

      // Ограничение на увеличение количества если больше max
      if (Number(quantityNumber.value) >= Number(quantityNumber.max)) {
        return false;
      }

      quantityNumber.stepUp();
      ajax_plus_cart(this);

      quantityCalc(cartItems);
      summCalc(cartItems);

    }

    // Расчет товар -1
    quantityMinus.onclick = function() {

      // Ограничение на уменьшение количества если меньше 1
      if (Number(quantityNumber.value) == 1) {
        return false;
      }

      quantityNumber.stepDown();
      ajax_minus_cart(this);

      quantityCalc(cartItems);
      summCalc(cartItems);

    }

  });

}

