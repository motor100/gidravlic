<div class="lk-nav">
  <div class="lk-nav-item">
    <a href="#" class="lk-nav-item__link">ЗАКАЗЫ</a>
  </div>
  <div class="lk-nav-item">
    <a href="#" class="lk-nav-item__link">ПРОФИЛЬ</a>
  </div>
  <form action="{{ route('logout') }}" class="lk-nav-item logout-form" method="post">
    @csrf
    <button type="submit" class="logout-submit-btn">ВЫЙТИ</button>
  </form>
</div>