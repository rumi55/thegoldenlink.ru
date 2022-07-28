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

<section class="section section--no-padding section--h790">
    <div class="course-head">
        <div class="course-head__subject">
            Онлайн тренинг
        </div>
        <h2 class="course-head__title">
            &laquoОсознание себя&raquo
        </h2>

        <p class="course-head__lead">
            С Хари Нам Каур и Хари Сингх
        </p>

        <div class="course-head__meeting">
            <div class="course-head__date">
                <div class="course-head__icon">
                    <img src="{{ asset('images/icons/calendar.svg') }}" width="29" height="27" alt="Дата проведения курса">
                </div>
                15-16 мая,
                <div class="course-head__year">
                    2021
                </div>
            </div>

            <div class="course-head__city">
                <div class="course-head__icon">
                    <img src="{{ asset('images/icons/tag.svg') }}" width="29" height="27" alt="Адрес проведения курса">
                </div>
                г. Москва,
                <div class="course-head__place">
                    м. Добрынинская
                </div>
            </div>
        </div>

        <button class="btn btn--round btn--fit">ЗАРЕГИСТРОВАТЬСЯ</button>
    </div>
</section>

<section class="section section--no-padding section--colored section--h590">
    <div class="course-training">
        <div class="container--learn">
            <div class="course-training__content">
                <p class="course__training-text">
                    Школа Кундалини йоги и Медитации "The Golden Link School" приглашает вас на обучающий Тренинг &laquo;Осознание
                    себя&raquo;, Модуль 1 (год 2) под руководством Хари Нам Каур и Хари Сингх!
                </p>
                <span class="course-training__date">
                         Модуль 1 (год 2), 15-16 мая, 2021 год
                    </span>
                <div class="course-training__title">
                    Тема модуля &laquo;Ты существуешь в тишине&raquo;
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
            </div>
        </div>
    </div>
</section>

<section class="section section--no-padding section--colored-darker section--h820">
    <div class="course-video">
        <h2 class="course-video__text">
            Хари Нам Каур о теме модуля 1 (год 2)
        </h2>
        <div class="course-video__holder">
            <iframe width="880" height="515" src="https://www.youtube.com/embed/tAGnKpE4NCI"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </div>
</section>

<section class="section section--no-padding section--h875">
    <div class="container container--learn">
        <div class="course-results">
            <div class="course-results__header">
                <h2 class="course-results__title">
                    Чему вы научитесь на Тренинге?
                </h2>
                <span class="course-results__subtitle">
                    (Первый год обучения закончился в 2020 году. При желании, его можно пройти полностью в записи)
                </span>
            </div>

            <div class="course-results__achievements">
                <div class="course-results__achievement">

                    <div class="course-results__achievement-img">
                        <img class="course-results__achievement-icon" src="{{ asset('images/desktop/lotus-dark.png') }}" alt="Изображение лотоса">
                    </div>

                    <div class="course-results__achievement-content">
                        <h2 class="course-results__achievement-title">

                            Состоянию Тишины
                        </h2>
                        <p class="course-results__achievement-text">
                            Вы овладеете состоянием Шуньи (внутренней тишины, которая оказывает влияние на любую ситуацию), научитесь быстро переключатся в него и действовать из этого состояния.
                        </p>
                    </div>

                </div>

                <div class="course-results__achievement">

                    <div class="course-results__achievement-img">
                        <img class="course-results__achievement-icon" src="{{ asset('images/desktop/lotus-dark.png') }}" alt="Изображение лотоса">
                    </div>

                    <div class="course-results__achievement-content">
                        <h2 class="course-results__achievement-title">

                            Состоянию Тишины
                        </h2>
                        <p class="course-results__achievement-text">
                            Вы овладеете состоянием Шуньи (внутренней тишины, которая оказывает влияние на любую ситуацию), научитесь быстро переключатся в него и действовать из этого состояния.
                        </p>
                    </div>

                </div>

                <div class="course-results__achievement">

                    <div class="course-results__achievement-img">
                        <img class="course-results__achievement-icon" src="{{ asset('images/desktop/lotus-dark.png') }}" alt="Изображение лотоса">
                    </div>

                    <div class="course-results__achievement-content">
                        <h2 class="course-results__achievement-title">

                            Состоянию Тишины
                        </h2>
                        <p class="course-results__achievement-text">
                            Вы овладеете состоянием Шуньи (внутренней тишины, которая оказывает влияние на любую ситуацию), научитесь быстро переключатся в него и действовать из этого состояния.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section--no-padding">
    <div class="course-details">
        <div class="course-details__img">
            <img class="course-details__pic" src="{{ asset('images/desktop/course-in-process.jpg') }}" alt="Курс в процессе">
        </div>
        <div class="course-details__content">
            <h2 class="course-details__title">
                ДЛЯ КОГО ЭТОТ ТРЕНИНГ ?
            </h2>

            <div class="course-details__for">
                Студентов Сат Нам Расаян 1,2,2+ уровней
            </div>

            <div class="course-details__for">
                Учитилей и практиков Кундлалини йоги и любых других видов йоги
            </div>

            <div class="course-details__for">
                Ценителей других направлений и традиций
            </div>

            <div class="course-details__for">
                Для тех, кто никогда не занимался йогой и медитацией
            </div>
            <button class="btn btn--round btn--fit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
        </div>
    </div>
</section>

<section class="section section--no-padding section--h875">
    <div class="container container--timetable">
        <div class="course-timetable">
            <div class="course-timetable__header">
                <h2 class="course-timetable__header-title">
                    Расписание модуля 1
                </h2>
                <div class="course-timetable__header-date">
                    15-16 сентября,
                    <span class="course-timetable__header-year">
                        2021 год <br>
                    </span>
                    <span class="course-timetable__header-timezone">
                        время московское
                    </span>
                </div>
            </div>

            <div class="course-timetable__tables">
                <div class="course-timetable__table course-timetable__table--colored-darker">
                    <div class="course-timetable__calendar">
                        <img class="course-timetable__pic" src="{{ asset('images/icons/calendar.svg') }}" alt="Расписание времени занятий на курсе">
                        <div class="course-timetable__day">
                            15
                        </div>
                        <div class="course-timetable__month">
                            сентября
                            <div class="course-timetable__dayOfWeek">
                                Суббота
                            </div>
                        </div>

                    </div>

                    <div class="course-timetable__schedules">
                        <div class="course-timetable__schedule">
                            <div class="course-timetable__time">
                                4:00 - 5:00
                            </div>
                            <div class="course-timetable__title">
                                Садхана, утренняя практика
                            </div>
                        </div>

                        <div class="course-timetable__schedule">
                            <div class="course-timetable__time">
                                9:00 - 10:00
                            </div>
                            <div class="course-timetable__title">
                                Первая часть
                            </div>
                        </div>

                        <div class="course-timetable__schedule">
                            <div class="course-timetable__time">
                                11:00 - 12:30
                            </div>
                            <div class="course-timetable__title">
                                Перерыв
                            </div>
                        </div>

                        <div class="course-timetable__schedule">
                            <div class="course-timetable__time">
                                12:30 - 15:30
                            </div>
                            <div class="course-timetable__title">
                                Вторая часть
                            </div>
                        </div>
                    </div>
                </div>

                <div class="course-timetable__table course__timetable-table--colored">
                    <div class="course-timetable__calendar">
                        <img class="course-timetable__pic" src="{{ asset('images/icons/calendar.svg') }}" alt="Расписание времени занятий на курсе">
                        <div class="course-timetable__day">
                            15
                        </div>
                        <div class="course-timetable__month">
                            сентября
                            <div class="course-timetable__dayOfWeek">
                                Суббота
                            </div>
                        </div>
                    </div>

                    <div class="course-timetable__schedules">
                        <div class="course-timetable__schedule">
                            <div class="course-timetable__time">
                                4:00 - 5:00
                            </div>
                            <div class="course-timetable__title">
                                Садхана, утренняя практика
                            </div>
                        </div>

                        <div class="course-timetable__schedule">
                            <div class="course-timetable__time">
                                9:00 - 10:00
                            </div>
                            <div class="course-timetable__title">
                                Первая часть
                            </div>
                        </div>

                        <div class="course-timetable__schedule">
                            <div class="course-timetable__time">
                                11:00 - 12:30
                            </div>
                            <div class="course-timetable__title">
                                Перерыв
                            </div>
                        </div>

                        <div class="course-timetable__schedule">
                            <div class="course-timetable__time">
                                12:30 - 15:30
                            </div>
                            <div class="course-timetable__title">
                                Вторая часть
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</section>

<section class="section section--no-padding section--h560">
    <div class="course-continue">
        <div class="container--learn">
            <p class="course-continue__text">
                <span class="course-continue__text--dark">
                    Вы можете принять участие в любом годе обучения и присоединится с любого модуля, <br>
                </span>
                даже если не обучались на тренинге в 2020 году, первый год обучения закончился в прошлом году (при желании его можно пройти полностью в записи)
            </p>
        </div>
    </div>
</section>

<footer class="section section--no-padding section--colored-darker">
    <div class="course-register">
        <div class="course-register__header">
            <h2 class="course-register__title">
                Регистрация и оплата
            </h2>
            <span class="course-register__subtitle">
                дополнительно предоставляется доступ к видеозаписи
                </span>

            <div class="course-info__meeting course-info__meeting--flex">
                <div class="course-info__date course-info__date--center course-info__date--mr">
                    <div class="course-info__icon">
                        <img src="{{ asset('images/icons/calendar.svg') }}" width="29" height="27" alt="Иконка календаря">
                    </div>
                    12 апреля,
                    <div class="course-info__time">
                        2021 год
                    </div>
                </div>

                <div class="course-info__city">
                    <div class="course-info__icon">
                        <img src="{{ asset('images/icons/tag.svg') }}" width="29" height="27" alt="Иконка тег на карте">
                    </div>
                    г. Москва,
                    <div class="course-info__place">
                        м. Добрынинская
                    </div>
                </div>
            </div>
        </div>
        <div class="course-register__tables">
            <div class="course-register__table">
                <img src="{{ asset('images/desktop/training1.jpg') }}" class="course-register__pic" alt="Девушка духовность">
                <h3 class="course-register__table-title">
                    Оба дня тренинга
                </h3>
                <p class="course-register__table-text">
                    Участи в двух днях тренинга 15-16 сентября
                </p>
                <span class="course-register__table-price">
                    19300 Р.
                    </span>
                <button class="btn">
                    Зарегистрироваться
                </button>
            </div>

            <div class="course-register__table">
                <img src="{{ asset('images/desktop/training2.jpg') }}" class="course-register__pic" alt="Нирвана">
                <h3 class="course-register__table-title">
                    Оба дня тренинга
                </h3>
                <p class="course-register__table-text">
                    Участи в двух днях тренинга 15-16 сентября
                </p>
                <span class="course-register__table-price">
                19300 Р.
            </span>
                <button class="btn">
                    Зарегистрироваться
                </button>
            </div>

            <div class="course-register__table">
                <img src="{{ asset('images/desktop/training3.jpg') }}" class="course-register__pic" alt="Здравствуй мир !">
                <h3 class="course-register__table-title">
                    Оба дня тренинга
                </h3>
                <p class="course-register__table-text">
                    Участи в двух днях тренинга 15-16 сентября
                </p>
                <span class="course-register__table-price">
                19300 Р.
               </span>
                <button class="btn">
                    Зарегистрироваться
                </button>
            </div>
        </div>
        <div class="course-register__contact">
            по всем дополнительным вопросам <br> пишите нам на почту <a href="" class="course-register__link">
                info@thegoldenlink.ru
            </a>
        </div>
    </div>
</footer>

<script src="{{ mix('js/app.js') }}"></script>
@stack('js')
</body>
</html>
