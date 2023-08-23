@section('title', 'Компания')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">Компания</div>
</div>

<div class="company">
  <div class="page-title">Компания</div>

  <div class="company-item page-item">
    <div class="company-title page-item__title">О НАС</div>
    <div class="company-content page-item__content">
      <p>Интернет-магазин специализируется на поставках и продаже гидравлических систем и компонентов для автомобилей, спецтехники, промышленного оборудования. 20-тилетний опыт работы на рынке и опытные специалисты помогли нам создать современный бизнес.</p>
      <p>Наши поставщики — лучшие заводы-изготовители Болгарии, Китая, Италии, Турции. Наши клиенты — оптовые организации, крупные предприятия России, магазины по продаже запчастей для спецтехники, конечные покупатели.</p>
      <p>Наша компания станет надежным партнером вашего бизнеса и поможет поддерживать ваше оборудование, транспорт и спецтехнику в рабочем состоянии.</p>
      <p>В ассортименте интернет-магазина представлено более 10 тысяч наименований, все они имеются вП наличии на складе. Представленные в каталоге системы, узлы и механизмы соответствуют техническим требованиям, имеют соответствующее качество. Все поставки в интернет-магазин осуществляются официально, продукция имеет необходимые сертификаты соответствия.</p>
      <p>Все наименования, отраженные на сайте в каталогах, в постоянном наличии на складе в Москве — поставки обеспечиваются в рекордные сроки.</p>
      <p>Мы предлагаем широчайший ассортимент следующей продукции:</p>
      <ul>
        <li>Гидрораспределители производства Болгарии и Китая</li>
        <li>Гидромоторы производства Болгарии и Китая</li>
        <li>Гидрорули и насос-дозаторы производства Болгарии и Китая</li>
        <li>Клапанная аппаратура производства Италии</li>
        <li>Шестеренные насосы производства Болгарии и Китая</li>
        <li>Манометры, уровнемеры, заливные горловины производства Турции</li>
        <li>Гидростанции производства Турции и Болгарии</li>
        <li>Джойстики, тросики, рычаги управления производства Италия</li>
        <li>Гидроцилиндры производства Болгарии</li>
        <li>Редуктора и мультипликаторы Итальянского производства</li>
      </ul>
      <p>Интернет-магазин имеет статус официального дилера следующих производителей гидравлических систем и компонентов: Badestnost, SJ-Technology, Oleodinamica Marchesini, Caproni, M+S Hydraulic, ZIHYD, Pakkens, Hydro-pack, Hanshang Hydraulic, CMR, Indemar, OLEODINAMICA BORELLI, HidroPnevmoTehnika, Balkan, Fer-Ro.</p>
      <p>Тесное сотрудничество с производителями дает возможность предлагать самые выгодные цены на гидравлическое оборудование и гарантировать качество продукции. На гидравлику, приобретенную в нашем магазине, распространяется гарантия производителя.</p>
      <p>Все поставки в интернет-магазин осуществляются официально, продукция имеет необходимые сертификаты соответствия.</p>
      <p>Собственный склад в Миассе позволяет быстро собирать и отгружать заказы.</p>
      <div class="company-subtitle">Наши преимущества:</div>
      <ul>
        <li>Большой выбор гидравлических систем и компонентов;</li>
        <li>Конкурентные цены на гидравлику;</li>
        <li>Доставка во все регионы России;</li>
        <li>Опытные специалисты.</li>
      </ul>
      <p>Высококвалифицированные сотрудники нашей компании, всегда рады помочь Вам в выборе запчастей, ответить на интересующие вас вопросы и организовать доставку запчастей в удобное для вас место.</p>
      <p>Индивидуальный подход к каждому нашему клиенту - залог успеха нашей работы!</p>
      <p>Наш офис и склад расположены в одном месте и имеют удобные подъездные пути.</p>
      <div class="company-image">
        <img src="/img/company-image.jpg" alt="">
      </div>
    </div>
  </div>

  <div class="company-item page-item">
    <div id="company-info" class="company-title page-item__title">Реквизиты</div>
    <div class="company-content page-item__content">
      <p>ОГРН: 5147746226030</p>
      <p>ИНН: 7724939863</p>
      <p>КПП: 772101001</p>
      <p>Р/счёт: № 40702810502290000229 в АО «АЛЬФА-БАНК»</p>
      <p>К/счёт: № 30101810200000000593</p>
      <p>БИК: 044525593</p>
      <p>ОКПО: 40023471</p>
      <p>ОКАТО: 45296553000</p>
    </div>
  </div>

  <div class="company-item page-item">
    <div class="company-title page-item__title">СЕРТИФИКАТЫ</div>
    <div class="certificates">
      <div class="certificates-item">
        <img src="/img/company-certificate.jpg" alt="">
      </div>
      <div class="certificates-item">
        <img src="/img/company-certificate.jpg" alt="">
      </div>
      <div class="certificates-item">
        <img src="/img/company-certificate.jpg" alt="">
      </div>
      <div class="certificates-item">
        <img src="/img/company-certificate.jpg" alt="">
      </div>
      <div class="certificates-item">
        <img src="/img/company-certificate.jpg" alt="">
      </div>
      <div class="certificates-item">
        <img src="/img/company-certificate.jpg" alt="">
      </div>
      <div class="certificates-item">
        <img src="/img/company-certificate.jpg" alt="">
      </div>
      <div class="certificates-item">
        <img src="/img/company-certificate.jpg" alt="">
      </div>
    </div>
  </div>

  <div class="company-item page-item">
    <div class="company-title page-item__title">ОТЗЫВЫ О КОМПАНИИ</div>
    <div class="testimonials-content">
      <a href="#add-testimonial" class="primary-btn add-testimonial-btn btn-415">ОСТАВИТЬ ОТЗЫВ</a>
      <div class="testimonials">
        @foreach($testimonials as $testimonial)
          <div class="testimonials-item">
            <div class="testimonials-item__name">{{ $testimonial->name }}</div>
            <div class="testimonials-item__date">{{ $testimonial->created_at->format("d.m.Y") }}</div>
            <div class="testimonials-item__text">{{ $testimonial->text }}</div>
          </div>
        @endforeach
      </div>

    </div>
  </div>

  <div class="pagination-links">
    {{ $testimonials->onEachSide(1)->links() }}
  </div>

  <div id="add-testimonial" class="add-testimonial">
    <div class="add-testimonial-title">НАПИСАТЬ ОТЗЫВ</div>
  
    <form class="form add-testimonial-form" method="post">
      <div class="form-group">
        <label for="name-callback-modal" class="label">Имя <span class="accentcolor">*</span></label>
        <input type="text" name="name" id="name-callback-modal" class="input-field js-name-callback-modal" required minlength="3" maxlength="20">
      </div>
      <div class="form-group">
        <label for="email-callback-modal" class="label">E-mail <span class="accentcolor">*</span></label>
        <input type="email" name="email" id="email-callback-modal" class="input-field js-email-callback-modal" required minlength="3" maxlength="50">
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
      <div class="g-recaptcha mb30" data-sitekey="{{ config('google.client_key') }}"></div>

      <button type="button" id="callback-submit-btn" class="primary-btn add-testimonial-submit-btn btn-415">Оставить отзыв</button>

    </form>

  </div>

</div>

@endsection

@section('script')
  <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection