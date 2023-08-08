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
    <div class="container">

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
