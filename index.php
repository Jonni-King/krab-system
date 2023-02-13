<?php include 'db-config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>КРАБ-СИСТЕМА Для быстровозводимых каркасных конструкций</title>
    <link rel="stylesheet" href="/assets/styles/index.css">
    <link rel="stylesheet" href="/assets/styles/media.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">

</head>

<body>
    <header class="header">
        <div class="container header__container">
            <a href="#" class="logo">
                <img src="/assets/img/svg/Logo.jpg" alt="Logo" class="logo__unit" height="55" width="220">
            </a>
            <ul class="header__navigations-list">
                <li class="header__navigations-item"><a class="header__navigations-link" href="#instock">Каталог</a>
                </li>
                <li class="header__navigations-item"><a class="header__navigations-link" href="#calculation">Расчет
                        стоимости</a></li>
                <li class="header__navigations-item"><a class="header__navigations-link" href="#partners">Партнеры</a>
                </li>
                <li class="header__navigations-item"><a class="header__navigations-link" href="#reviews">Отзывы</a></li>
            </ul>

            <div class="header__box-cities">
                <div id="main-city-item" class="header__city-item">
                    <a target="_blank"  href="https://yandex.uz/maps/-/CCUzF4D43A" class="header__city-link">
                        <svg class=" header__city-marker" height="17" width="17">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-2"></use>
                        </svg>
                        <span class="header__city-name" id="selected-city">Москва</span>
                    </a>
                </div>
                <button class="header__city-all" id="open-modal">Все города</button>
            </div>

            <div id="city-modal" class="modal modal__city">
                <div class="modal-content modal-content__city">
                    <span class="close-modal">&times;</span>

                    <ul class="city-list">
                    <?php
                    
                        if ($result->num_rows > 0) {
                                
                            while($row = $result->fetch_assoc()) {
                    ?>
                        
                        <li 
                            id="<?=$row["id"]?>" 
                            class="city-item" 
                            data-city="<?=$row["name"]?>" 
                            data-phone="<?=$row["phone"]?>"
                            data-link="https://yandex.uz/maps/-/<?=$row["link"]?>"

                            tel:="+7<?=$row["phone"]?>"
                        >
                            <?=$row["name"]?>
                        </li>
                    <?
                                
                            }
                        } else {
                            echo "0 results";
                        }
                        
                    ?>
                    </ul>
                </div>
            </div>

            <div class="header__box-phones">
                <a href=”tel:+89853447646” class="header__phone-number">
                    <svg class="header__phone-mobile" height="17" width="17">
                        <use xlink:href="/assets/img/svg/sprite.svg#icon-3"></use>
                    </svg>
                    <span id="phone-number">8-985-344-76-46</span>
                </a>
                <button id="feedback-btn" class="header__phone-call">Заказать звонок</button>
            </div>

            <div class="burger">
                <svg class="burger-icon" height="26" width="26">
                    <use xlink:href="/assets/img/svg/sprite.svg#icon-4"></use>
                </svg>
            </div>
        </div>
    </header>

    <main class="main">
        <section class="first-screen">
            <div class="container first-screen__container">
                <h1 class="first-screen__title">Краб - система</h1>
                <p class="first-screen__text">Для быстровозводимых <br>
                    каркасных конструкций</p>
                <button id="consultation-btn" class="btn btn_primary first-screen__btn">Получить консультацию</button>
            </div>
        </section>

        <section class="benefits">
            <div class="container benefits__container">
                <h2 class="title-h2 benefits__title">ПРЕИМУЩЕСТВА СИСТЕМЫ</h2>
                <div class="benifits__items">
                    <div class="card-mini">
                        <svg class="benefitscard-mini__icon card-mini__icon" height="100" width="100">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-5"></use>
                        </svg>
                        <h3 class="card-mini__title">Высокая прочность,<br>
                            жёсткость и надёжность</h3>
                        <p class="card-mini__text">По прочности соединение с помощью
                            краб-системы ничем не уступает сварке</p>
                    </div>
                    <div class="card-mini">
                        <svg class="benefitscard-mini__icon card-mini__icon" height="100" width="100">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-6"></use>
                        </svg>
                        <h3 class="card-mini__title">Низкая стоимость</h3>
                        <p class="card-mini__text">Цена конструкции относительна низка, так как:
                            Вам не нужно использовать сварочный аппарат;
                            работу Вы можете сделать своими руками</p>
                    </div>
                    <div class="card-mini">
                        <svg class="benefitscard-mini__icon card-mini__icon" height="100" width="100">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-7"></use>
                        </svg>
                        <h3 class="card-mini__title">Возможность многоразового
                            использования</h3>
                        <p class="card-mini__text">Система соединения позволяет перестроить
                            конструкцию – уменьшить, увеличить размеры</p>
                    </div>
                    <div class="card-mini">
                        <svg class="benefitscard-mini__icon card-mini__icon" height="100" width="100">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-8"></use>
                        </svg>
                        <h3 class="card-mini__title">Простота монтажа</h3>
                        <p class="card-mini__text">Для выполнения работ Вам не требуется
                            специальных знаний, Краб-система
                            закрепляется при помощи болтов и гаек </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="instock" class="instock">
            <div class="container instock__container">
                <h2 class="title-h2 instock__title">ВСЕГДА В НАЛИЧИИ</h2>

                <div class="instock__items">

                    <div class="card">
                        <img src="/assets/img/svg/card/T-crab1.jpg" alt="Т-образная краб-система" class="card__img">
                        <p class="card__description">Т-образная краб-система<br>20х20</p>
                        <div class="card__setprice">
                            <div class="card__price">
                                <span class="card__price-meaning">20</span>
                                <span class="card__price-currencyset">руб/комп</span>
                            </div>
                            <div class="card__set">
                                <input type="text" class="card__set-number">
                                <span class="card__set-text">комп.</span>
                            </div>
                        </div>
                        <button class="btn_secondary card__btn">Заказать</button>
                    </div>

                    <div class="card">
                        <img src="/assets/img/svg/card/T-crab2.jpg" alt="Х-образная краб-система" class="card__img">
                        <p class="card__description">Х-образная краб-система<br>20х20</p>
                        <div class="card__setprice">
                            <div class="card__price">
                                <span class="card__price-meaning">20</span>
                                <span class="card__price-currencyset">руб/комп</span>
                            </div>
                            <div class="card__set">
                                <input type="text" class="card__set-number">
                                <span class="card__set-text">комп.</span>
                            </div>
                        </div>
                        <button class="btn_secondary card__btn">Заказать</button>
                    </div>

                    <div class="card">
                        <img src="/assets/img/svg/card/T-crab3.jpg" alt="Т-образная краб-система" class="card__img">
                        <p class="card__description">Т-образная краб-система<br>25х25</p>
                        <div class="card__setprice">
                            <div class="card__price">
                                <span class="card__price-meaning">25</span>
                                <span class="card__price-currencyset">руб/комп</span>
                            </div>
                            <div class="card__set">
                                <input type="text" class="card__set-number">
                                <span class="card__set-text">комп.</span>
                            </div>
                        </div>
                        <button class="btn_secondary card__btn">Заказать</button>
                    </div>

                    <div class="card">
                        <img src="/assets/img/svg/card/T-crab4.jpg" alt="Х-образная краб-система" class="card__img">
                        <p class="card__description">Х-образная краб-система<br>25х25</p>
                        <div class="card__setprice">
                            <div class="card__price">
                                <span class="card__price-meaning">25</span>
                                <span class="card__price-currencyset">руб/комп</span>
                            </div>
                            <div class="card__set">
                                <input type="text" class="card__set-number">
                                <span class="card__set-text">комп.</span>
                            </div>
                        </div>
                        <button id="card__btn" class="btn_secondary card__btn">Заказать</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="whywe">
            <div class="container whywe__container">
                <h2 class="title-h2 whywe__title">Почему мы?</h2>
                <div class="whywe__box">

                    <div class="card-mini whywe__card-mini">
                        <svg class="whywecard-mini__icon card-mini__icon" height="100" width="100">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-5"></use>
                        </svg>
                        <h3 class="card-mini__title whywecard-mini__title">
                            Собственное
                            производство
                        </h3>
                        <p class="card-mini__text whywecard-mini__text">Мы изготавливаем элементы краб-системы на
                            собственном производстве в
                            Вологде, уделяя особое внимание качеству.
                        </p>
                    </div>

                    <div class="card-mini whywe__card-mini">
                        <svg class="whywecard-mini__icon card-mini__icon" height="100" width="100">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-5"></use>
                        </svg>
                        <h3 class="card-mini__title whywecard-mini__title">
                            Доставка
                            по всей России
                        </h3>
                        <p class="card-mini__text whywecard-mini__text">Мы осуществляем
                            доставку нашей продукции
                            по всей России.
                        </p>
                    </div>

                    <div class="card-mini whywe__card-mini">
                        <svg class="whywecard-mini__icon card-mini__icon" height="100" width="100">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-5"></use>
                        </svg>
                        <h3 class="card-mini__title whywecard-mini__title">Доступные
                            цены
                        </h3>
                        <p class="card-mini__text whywecard-mini__text">Так как мы являемся производителем, мы
                            предлагаем нашу продукцию
                            без лишних наценок.
                        </p>
                    </div>

                    <div class="card-mini whywe__card-mini">
                        <svg class="whywecard-mini__icon card-mini__icon" height="100" width="100">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-5"></use>
                        </svg>
                        <h3 class="card-mini__title whywecard-mini__title">Гарантия
                            качества
                        </h3>
                        <p class="card-mini__text whywecard-mini__text">Мы уделяем особое внимание качеству нашей
                            продукции и дорожим нашими
                            клиентами.
                        </p>
                    </div>
                </div>
        </section>

        <section class="production">
            <div class="container container__production">
                <h2 class="title-h2 production__title">наше производство</h2>
                <div id="player" class="production__content">
                </div>
            </div>
        </section>

        <section id="calculation" class="calculation">
            <div class="container calculation__container">
                <form action="mail.php" method="post" class="calculation-form">
                    <h2 class="title-h2">ОСТАВИТЬ ЗАЯВКУ</h2> <br>
                    <p class="calculation-form__p">НА РАСЧЕТ СТОИМОСТИ</p>
                    <div class="input"><input  name="phone" class="form-phone" placeholder="Номер телефона" type="phone" id="phone"
                    required>
                        <svg class="calculation-input__icon" height="25" width="25">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-9"></use>
                        </svg>
                    </div>
                    <div class="input"><input name="email" class="form-email" placeholder="E-mail:" type="email" id="email"
                    required>
                        <svg class="calculation-input__icon" height="25" width="25">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-10"></use>
                        </svg>
                    </div>
                    <input class="btn btn_primary form-btn modal-btn" type="submit" value="Заказать расчёт цены">
                    <label class="calculation__label" for="terms"><input class="form-checkbox" type="checkbox"
                            id="terms" name="terms">Соглашаюсь с условиями передачи данных</label>
                </form>
            </div>
        </section>

        <section id="partners" class="partners">
            <div class="container partners__container">
                <h2 class="title-h2 partners__title">наши партнеры</h2>
                <div class="partners__items">
                    <img src="/assets/img/partners/partners1.jpg" alt="наши партнеры" class="partners__item">
                    <img src="/assets/img/partners/partners2.jpg" alt="наши партнеры" class="partners__item">
                    <img src="/assets/img/partners/partners3.jpg" alt="наши партнеры" class="partners__item">
                </div>
            </div>
        </section>

        <section id="reviews" class="reviews">
            <div class="container reviews__container">
                <h2 class="title-h2 reviews__title">отзывы наших клиентов</h2>
                <div class="reviews__card-box">

                    <div class="reviews__card-item">
                        <img class="reviews__card-img" src="/assets/img/reviews__card/1.png" alt="Отзывы клиентов">
                        <div class="reviews__card-info">
                            <h3 class="card-item__title">Михаил Викторович</h3>
                            <p class="card-item__text">Kрaб-сиcтeмa в тeчение нескoльких лeт заcлужилa выcoкую репутацию
                                cpeди дaчникoв и пpоизводителей тeплиц и дpугих малыx дачных сoopужений. Прoстaя и
                                быстpая сбоpка, oтcутствие свapки, оцинкованный кpепеж пoзволяют cоздaвать тeплицы,
                                душeвые, веpcтaки, стeллaжи из крепежа за минимальнoе время.</p>
                        </div>
                    </div>

                    <div class="reviews__card-item">
                        <img class="reviews__card-img" src="/assets/img/reviews__card/2.png" alt="Отзывы клиентов">
                        <div class="reviews__card-info">
                            <h3 class="card-item__title">Светлана Альбертовна</h3>
                            <p class="card-item__text">Kрaб-сиcтeмa в тeчение нескoльких лeт заcлужилa выcoкую репутацию
                                cpeди дaчникoв и пpоизводителей тeплиц и дpугих малыx дачных сoopужений. Прoстaя и
                                быстpая сбоpка, oтcутствие свapки, оцинкованный кpепеж пoзволяют cоздaвать тeплицы,
                                душeвые, веpcтaки, стeллaжи из крепежа за минимальнoе время.</p>
                        </div>
                    </div>

                    <div class="reviews__card-item">
                        <img class="reviews__card-img" src="/assets/img/reviews__card/3.png" alt="Отзывы клиентов">
                        <div class="reviews__card-info">
                            <h3 class="card-item__title">Андрей Олегович</h3>
                            <p class="card-item__text">Kрaб-сиcтeмa в тeчение нескoльких лeт заcлужилa выcoкую репутацию
                                cpeди дaчникoв и пpоизводителей тeплиц и дpугих малыx дачных сoopужений. Прoстaя и
                                быстpая сбоpка, oтcутствие свapки, оцинкованный кpепеж пoзволяют cоздaвать тeплицы,
                                душeвые, веpcтaки, стeллaжи из крепежа за минимальнoе время.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="map">
            <div class="container__map">
                <h2 class="title-h2 map__title">мы на карте</h2>
                <div class="map__mobil">

                </div>
                <a class="map-link"
                    href="https://yandex.ru/maps/?um=constructor%3Aed675cf82c12a17ff2252856b01debbb9aece9c2f1476077b972387b89602968&amp;source=constructorStatic"
                    target="_blank">
                    <h3 class="map__text">Смотреть на карте</h3>
                    <img class="map-img"
                        src="https://api-maps.yandex.ru/services/constructor/1.0/static/?um=constructor%3Aed675cf82c12a17ff2252856b01debbb9aece9c2f1476077b972387b89602968&amp;width=600&amp;height=400&amp;lang=ru_RU"
                        alt="" style="border: 0;" />
                </a>
            </div>
            <iframe class="map__iframe"
                src="https://yandex.ru/map-widget/v1/?um=constructor%3Aed675cf82c12a17ff2252856b01debbb9aece9c2f1476077b972387b89602968&amp;source=constructor"
                width="100%" height="400" frameborder="0"></iframe>
            </div>

            <footer class="footer">
                <div class="container footer__container">
                    <a href="#" class="logo">
                        <img src="/assets/img/svg/Logo.jpg" alt="Logo" class="logo__unit" height="55" width="220">
                    </a>
                    <a href="https://yandex.ru/maps/?um=constructor%3Aed675cf82c12a17ff2252856b01debbb9aece9c2f1476077b972387b89602968&amp;source=constructorStatic" class="footer__container-adress">
                        <svg class="footer__city-marker" height="17" width="17">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-2"></use>
                        </svg>Москва, ул. Лениниа, д. 25
                    </a>
                    <a href=”tel:+89853447646” class="footer__container-phone">
                        <svg class="footer__phone-mobile" height="17" width="17">
                            <use xlink:href="/assets/img/svg/sprite.svg#icon-3"></use>
                        </svg>8-985-344-76-46</a>
                </div>
            </footer>
        </section>
    </main>


    <div class="modal" id="feedback-modal">
        <div class="modal-content">
            <span class="close" id="close-btn-feedback">&times;</span>
            <form action="mail.php" method="post" class="modal-form">
                <input name="name" class="modal-input" type="text" placeholder="Ваше имя"  id="name" required>
                <input name="phone" class="modal-input" type="phone" placeholder="Ваш телефон" id="phone" required>
                <input class="modal-input btn_primary modal-btn" type="submit" value="Отправить">
            </form>
        </div>
    </div>

<!-- 
    <div class="modal" id="orderModal">
    <div class="modal-content modal-card">
        
        <form action="mail.php" method="post" class="modal-form">
        <h3 class="modal-card_title">Заказ продукта</h3>
        <inpun type="hidden" name="productName" class="modal-card_text modal-input">Название продукта: <span class="card_text-span" id="productName"></span>
        <input type="hidden" name="productAmount" class="modal-card_text modal-input">Количество: <span class="card_text-span" id="productAmount"></span>&ensp;шт
        <input type="hidden" name="productPrice" class="modal-card_text modal-input">Цена: <span class="card_text-span" id="productPrice"></span>&ensp;руб
                <input name="name" class="modal-input" placeholder="Ваше имя" type="text" id="name" required>
                <input name="phone" class="modal-input" placeholder="Телефон" type="phone" id="phone" required>
                <input name="email"  class="modal-input" placeholder="Email" type="email" id="email" required>
                <input class="btn_primary modal-btn" type="submit" value="Отправить">
        </form>
            <span class="modal-close close" id="close-btn-card">&times;</span>
    </div>
</div> -->



<div class="modal" id="orderModal">
    <div class="modal-content modal-card">
        <h3 class="modal-card_title">Заказ продукта</h3>
        <p class="modal-card_text">Название продукта: <span class="card_text-span" id="productName"></span></p>
        <p class="modal-card_text">Количество: <span class="card_text-span" id="productAmount"></span>&ensp;шт</p>
        <p class="modal-card_text">Цена: <span class="card_text-span" id="productPrice"></span>&ensp;руб</p>
        <form action="mail.php" method="post" class="modal-form">
                <input name="name" class="modal-input" placeholder="Ваше имя" type="text" id="name" required>
                <input name="phone" class="modal-input" placeholder="Телефон" type="phone" id="phone" required>
                <input name="email"  class="modal-input" placeholder="Email" type="email" id="email" required>
                <input class="btn_primary modal-btn" type="submit" value="Отправить">
        </form>
            <span class="modal-close close" id="close-btn-card">&times;</span>
    </div>
</div>

<div  class="modal" id="consultation-modal">
        <div class="modal-content">
            <span class="close" id="close-btn-consultation">&times;</span>
            <form action="mail.php" method="post" class="modal-form">
                <input name="name" class="modal-input" placeholder="Ваше имя" type="text" id="name" required>
                <input name="phone" class="modal-input" placeholder="Телефон" type="phone" id="phone" required>
                <input name="email"  class="modal-input" placeholder="Email" type="email" id="email" required>
                <input class="btn_primary modal-btn" type="submit" value="Отправить">
            </form>
        </div>
    </div>






    <!-- <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="/assets/scripts/playerjs.js" type="text/javascript"></script>
    <script src="/assets/scripts/main.js" type="text/javascript"></script>


</body>

</html>