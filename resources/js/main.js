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

searchInput.onfocus = () => {
  searchInput.classList.add('search-input-active');
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
          let str = '<div class="search-list-item__image"></div>';
          str += '<a href="/catalog/' + item.slug + '" class="search-list-item__link">' + item.title + '</a>';
          tmpEl.innerHTML = str;
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

  