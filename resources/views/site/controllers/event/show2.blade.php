<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta')

    <title>@yield('title', $title ?? config('app.name'))</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')
</head>
<body>
<div class="mobile-menu">
    <button class="mobile-menu__close">
        <svg xmlns="http://www.w3.org/2000/svg"
             width="24" height="24"
             viewBox="0 0 24 24">
            <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666
                            8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
        </svg>
    </button>
    <div class="logo logo--mobile">
        @includeSvg('images/logo.svg')
        <span class="logo__text">@lang('Школа Кундалини Йоги и Медитации')</span>
    </div>
    <ul class="mobile-menu__list">
        <li class="mobile-menu__item">
            <a href="/" class="mobile-menu__link mobile-menu__link--active">
                @lang('Главная')
            </a>
        </li>

        <li class="mobile-menu__item">
            <a href="schedule" class="mobile-menu__link">
                @lang('Расписание')
            </a>
        </li>

        <li class="mobile-menu__item">
            <a href="#" class="mobile-menu__link">
                @lang('Консультации')
            </a>
        </li>

        <li class="mobile-menu__item">
            <a href="#" class="mobile-menu__link">
                @lang('Учителя')
            </a>
        </li>

        <li class="mobile-menu__item">
            <a href="#" class="mobile-menu__link">
                @lang('Контакты')
            </a>
        </li>
    </ul>

    <a href="#" class="btn nav__personal-mobile__menu">
                        <span class="btn__icon">
                            <img src="{{ asset('images/icons/user.svg') }}" width="18" height="21" alt="">
                        </span>
        @lang('Личный кабинет')
    </a>

    <div class="menu__footer">
        <a href="" class="social social--mobile">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-instagram bi_menu" viewBox="0 0 16 16" aria-hidden="true" aria-label="Instagram">
                <path
                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </svg>
        </a>

        <a href="" class="social social--mobile">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-instagram bi_menu" viewBox="0 0 16 16" aria-hidden="true" aria-label="Instagram">
                <path
                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </svg>
        </a>

        <a href="" class="social social--mobile">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-instagram bi_menu" viewBox="0 0 16 16" aria-hidden="true" aria-label="Instagram">
                <path
                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </svg>
        </a>
    </div>

    <div class="mobile-menu__overlay"></div>
</div>

<header class="main main--course main--background">
    <div class="container container--header">
        <nav class="nav nav--inline nav--align-center">
            <div class="main__logo main__logo--small logo">
                @includeSvg('images/logo.svg')
                <span class="logo__text logo__text--small">@lang('Школа Кундалини Йоги и Медитации')</span>
            </div>
            <div class="nav__main">
                <ul class="menu menu--small">
                    <li class="menu__item menu__item--no-margin">
                        <a href="/" class="menu__link">
                            @lang('Главная')
                        </a>
                    </li>

                    <li class="menu__item menu__item--no-margin">
                        <a href="schedule" class="menu__link menu__link--active">
                            @lang('Расписание')
                        </a>
                    </li>

                    <li class="menu__item menu__item--no-margin">
                        <a href="#" class="menu__link">
                            @lang('Консультации')
                        </a>
                    </li>

                    <li class="menu__item menu__item--no-margin">
                        <a href="#" class="menu__link">
                            @lang('Учителя')
                        </a>
                    </li>

                    <li class="menu__item menu__item--no-margin">
                        <a href="#" class="menu__link">
                            @lang('Контакты')
                        </a>
                    </li>
                </ul>

                <a href="#" class="btn nav__personal-mobile" aria-hidden="true">
                        <span class="btn__icon" aria-hidden="true">
                            <img src="{{ asset('images/icons/user.svg') }}" width="18" height="21" alt="">
                        </span>
                    @lang('Личный кабинет')
                </a>

                <div class="social nav__social" aria-hidden="true">
                    <ul class="social__list">
                        <li class="social__item">
                            <a href="" class="social__link">

                            </a>
                        </li>

                        <li class="social__item">
                            <a href="" class="social__link">

                            </a>
                        </li>

                        <li class="social__item">
                            <a href="" class="social__link">

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav__additional">
                <ul class="nav__lang nav__lang--small lang">
                    <li class="lang__item">
                        <a href="#" class="lang__link lang__link--active">
                            @lang('RU')
                        </a>
                    </li>

                    <li class="lang__item--last">
                        <a href="#" class="lang__link lang__link--course">
                            @lang('EN')
                        </a>
                    </li>
                </ul>

                <a href="#" class="btn nav__personal nav__personal--small">
                        <span class="btn__icon" aria-hidden="true">
                            <img src="{{ asset('images/icons/user.svg') }}" width="18" height="21" alt="">
                        </span>
                    @lang('Личный кабинет')
                </a>

                <button class="nav__hamburger btn btn--round mobile-menu__open">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="20px" height="14px">
                        <defs>
                            <filter id="Filter_0">
                                <feFlood flood-color="rgb(247, 233, 209)" flood-opacity="1" result="floodOut"/>
                                <feComposite operator="atop" in="floodOut" in2="SourceGraphic" result="compOut"/>
                                <feBlend mode="normal" in="compOut" in2="SourceGraphic"/>
                            </filter>

                        </defs>
                        <g filter="url(#Filter_0)">
                            <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                  d="M-0.000,-0.000 L20.000,-0.000 L20.000,2.000 L-0.000,2.000 L-0.000,-0.000 Z"/>
                            <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                  d="M-0.000,6.000 L20.000,6.000 L20.000,8.000 L-0.000,8.000 L-0.000,6.000 Z"/>
                            <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                  d="M-0.000,12.000 L20.000,12.000 L20.000,14.000 L-0.000,14.000 L-0.000,12.000 Z"/>
                        </g>
                    </svg>
                </button>
            </div>
        </nav>
    </div>
</header>

<section class="section section--no-padding">
    <div class="course-info">
        <div class="course-info__img">
            <img class="course-info__pic" src="{{ asset('images/desktop/course-photo-1-1.jpg') }}" alt="Фото ведущих курс">
        </div>
        <div class="course-info__content course-info--padding-left">
            <div class="course-info__meeting">
                <div class="course-info__date">
                    <div class="course-info__icon">
                        <img src="{{ asset('images/icons/calendar.svg') }}" width="29" height="27" alt="">
                    </div>
                    12 апреля,
                    <div class="course-info__time">
                        20:30-22:00 МСК
                    </div>
                </div>

                <div class="course-info__city">
                    <div class="course-info__icon">
                        <img src="{{ asset('images/icons/tag.svg') }}" width="29" height="27" alt="">
                    </div>
                    г. Москва,
                    <div class="course-info__place">
                        м. Добрынинская
                    </div>
                </div>
            </div>
            <div class="course-info__main">
                <div class="course-info__subtitle course-info--padding">
                    Онлайн класс в новолуние
                </div>
                <div class="course-info__title course-info--padding">
                    &laquo;Обновление <br>
                    и омоложение&raquo;
                </div>
                <div class="course-info__lead course-info--padding">
                    с Хари Нам Каур и Хари Сингх
                </div>
            </div>
            <div class="course-info__additional-items">
                <div class="course-info__additional-item">
                    в Zoom
                </div>
                <div class="course-info__additional-item">
                    с доступом к видеозаписи
                </div>
                <div class="course-info__additional-item">
                    с переводом на русский язык
                </div>
            </div>
            <button class="btn btn--round btn--fit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
        </div>
    </div>
</section>

<section class="section section--no-padding">
    <div class="course-additional">
        <div class="course-additional__bg">
            <div class="course-additional__holder">
                <h2 class="course-additional__title">
                    Онлайн класс в новолуние для пробуждения <br> и омоложения дремлющей части вашей души!
                </h2>
                <div class="container">
                    <p class="course-additional__text">
                        Приглашаем вас 12 апреля в 20:30 по МСК на онлайн класс в новолуние  &laquo;Обновление и омоложение&raquo;.
                        На классе вы пройдете через сильный ментальный опыт и сделаете медитацию, которая пробудит дремлющую часть вашей души.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section--no-padding">
    <div class="course-details">
        <div class="course-details__content">
            <h2 class="course-details__title">
                ПОДРОБНЕЕ О КЛАССЕ
            </h2>
            <p class="course-details__text">
                Наша душа красива и существует для того, чтобы сохранять нас живыми. Но часто она дремлет в нашем  прекрасном теле. Поэтому на классе вы пройдете через сильный ментальный опыт и сделаете медитацию, которая пробудит дремлюущую часть вашей души. После этой медитации вы примете ванну в звуках Гонга, чтобы ваши нервы и душа слились и успакоились
            </p>
            <p class="course-details__text-thesis">Вы пройдете через сильный ментальный опыт и сделаете медитацию, которая пробудит дремлющую часть вашей души</p>
            <button class="btn btn--round btn--fit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
        </div>
        <div class="course-details__img">
            <img class="course-details__pic" src="{{ asset('images/desktop/course-in-process.jpg') }}" alt="Курс в процессе">
        </div>
    </div>
</section>

<section class="section section__quote">
    <div class="quote">
        <div class="quote__photo">
            <img
                src="/images/content/photo-reviews/quote.png"
                alt=""
                class="quote__img"
            >
        </div>

        <div class="quote__content">
            <p>
                ДЛЯ ТОГО, ЧТОБЫ СТАТЬ ДЕЙСТВИТЕЛЬНО СЧАСТЛИВЫМИ, ВЫ ДОЛЖНЫ РАЗВИТЬ У СЕБЯ ТАКОЕ ОТНОШЕНИЕ К ЖИЗНИ,
                КОТОРОЕ ПОЗВОЛИТ ВАМ ПОДНЯТЬСЯ НАД ВРЕМЕНЕМ И ПРОСТРАНСТВОМ, И ИСПОЛЬЗОВАТЬ СВОИ УМ НА ЧАСТОТЕ СВОЕЙ
                ДУШИ
            </p>

            <h1 class="quote__subtitle">
                Йоги Бхаджан
            </h1>

        </div>
    </div>
</section>

<section class="section section__about-teachers section--colored">
    <div class="about-teachers">
        <div class="about-teachers__photo">
            <img
                src="/images/content/photo-reviews/aboutTeachers.png"
                alt=""
                class="about-teachers__img"
            >
        </div>

        <div class="about-teachers__content">
            <h1 class="about-teachers__subtitle">
                ОБ УЧИТЕЛЯХ
            </h1>

            <p class="about-teachers__text">
                Хари Сингх и Хари Нам Каур — одни из сильнейших Учителей Кундалини йоги, медитации и Сат Нам Расаян
                мирового уровня с опытом практики
                более 30 лет.
            </p>

            <p class="about-teachers__text">
                Они долгие годы напрямую обучались у Мастера
                Кундалини йоги Йоги Бхаджана и Мастера Сат Нам Расаян Гуру Дева Сингха, получая от них бесценные
                опыт и знания.
            </p>

            <p class="about-teachers__text about-teachers__text--bold">
                Хари Сингх и Хари Нам Каур преподают по всему миру, собирая сотни людей из разных стран
                регулярно практиковать вживую и онлайн.
            </p>
        </div>
    </div>
</section>

<section class="section section__prices">
    <div class="container">
        <div class="prices">
            <img class="prices__image" src="/images/content/photo-reviews/priceImage.png" alt="">
            <div class="prices__content">
                <div class="prices__title">
                    <h1 class="prices__subtitle subtitle">
                        РЕГИСТРАЦИЯ И ОПЛАТА
                    </h1>
                    <div class="prices__span">
                        (дополнительно предостовляется доступ к видеозаписи)
                    </div>
                </div>

                <div class="course-info__meeting course-info__meeting--order-none">
                    <div class="course-info__date">
                        <div class="course-info__icon">
                            <img src="{{ asset('images/icons/calendar.svg') }}" width="29" height="27" alt="">
                        </div>
                        12 апреля,
                        <div class="course-info__time">
                            20:30-22:00 МСК
                        </div>
                    </div>

                    <div class="course-info__city">
                        <div class="course-info__icon">
                            <img src="{{ asset('images/icons/tag.svg') }}" width="29" height="27" alt="">
                        </div>
                        г. Москва,
                        <div class="course-info__place">
                            м. Добрынинская
                        </div>
                    </div>
                </div>

                <div class="prices__price">
                    <b>
                        1950 р.
                    </b>
                </div>

                <a href="#" class="btn">Зарегистрироваться</a>

            </div>
            <p class="prices__text">
                По всем дополнительным вопросам обращайтесь по адресу <a href="#" class="prices__link">info@thegoldenlink.ru</a>
            </p>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="footer__bg">
        <div class="container footer__container">
            <h2 class="title footer__title">
                Подпишитесь на нашу рассылку
            </h2>
            <div class="subtitle footer__subtitle">
                И узнавайте о всех предстоящих мероприятиях
            </div>

            <form action="" method="get" class="footer__subscribe">
                <input type="email" name="email" placeholder="Email" class="input footer__input" required>
                <button class="btn footer__btn">
                    Подписаться
                </button>
            </form>

            <div class="footer__policy">
                Нажимая кнопку «Подписаться», <br>
                Вы соглашаетесь с <a href="#">Политикой Конфиденциальности</a>
            </div>
        </div>

        <div class="socials footer__socials">
            <div class="footer__list">
                <a href="" class="social">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                         class="bi bi-instagram" viewBox="0 0 16 16" aria-hidden="true" aria-label="Instagram">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a>

                <a href="" class="social">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                         class="bi bi-instagram" viewBox="0 0 16 16" aria-hidden="true" aria-label="Instagram">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a>

                <a href="" class="social">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                         class="bi bi-instagram" viewBox="0 0 16 16" aria-hidden="true" aria-label="Instagram">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="footer__contacts">
            <a href="tel:+7-903-116-15-22" class="footer__phone">+7-903-116-15-22</a>
            <span class="footer__separator"> | </span>
            <a href="mailto:info@thegoldenlink.ru" class="footer__email">info@thegoldenlink.ru</a>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <div class="footer__legal-links">
                <a href="#" class="footer__link">Публичная Оферта</a>
                <span class="footer__separator"> | </span>
                <a href="#" class="footer__link">Политика Конфиденциальности</a>
            </div>

            <div class="footer__legal-text">
                Индивидуальный предприниматель Коровайная Надежда Николаевна <br>
                ИНН 504790890746 ОГРНИП 319505300006081
            </div>
        </div>
    </div>
</footer>

<script src="{{ mix('js/app.js') }}"></script>
@stack('js')
</body>
</html>
