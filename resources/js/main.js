import IMask from 'imask';

// common
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
          tmpEl.className = "search-list-item";
          tmpEl.innerHTML = '<a href="/catalog/' + item.slug + '" class="search-list-item__link">' + item.title + '</a>';
          searchRezult.append(tmpEl);
        });

        // Показать все результаты
        let tmpEl = document.createElement('a');
        tmpEl.className = "search-see-all";
        tmpEl.href = '/poisk?search_query=' + searchInput.value;
        tmpEl.innerText = 'Показать все результаты';
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


// Окна
const modalWindow = document.querySelectorAll('.modal-window');
const callbackBtn = document.querySelector('#callback-btn');
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

callbackBtn.onclick = () => {
  modalWindowOpen(callbackModal);
}

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

// Checkbox I agree and I read
const checkboxCallbackModal = document.querySelectorAll('.js-checkbox-callback-modal');
const callbackSubmitBtn = document.querySelector('#callback-submit-btn');

/*
function callbackModalCheckboxOnchange() {
  checkboxCallbackModal.forEach((item) => {
    if (!item.checked) {
      callbackSubmitBtn.disabled = true;
    }
    console.log(item.checked);
  });
}

checkboxCallbackModal.forEach((item) => {
  item.onchange = callbackModalCheckboxOnchange;
});
*/


// Input mask
let elementPhone = document.querySelector('#phone-callback-modal');

let maskOptionsPhone = {
  mask: '+{7} (000) 000 00 00'
};

let mask = IMask(elementPhone, maskOptionsPhone);


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
    console.log(new FormData(form));
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
const messagesCookies = document.querySelector('.messages-cookies');
const messagesCookiesClose = document.querySelector('.messages-cookies-close');

if (messagesCookiesClose) {

  messagesCookiesClose.onclick = () => {
    messagesCookies.classList.add('hidden');

    fetch('/ajax/we-use-cookie', {
      method: 'GET',
      cache: 'no-cache',
    })
    .catch((error) => {
      console.log(error);
    })
  }

}

  