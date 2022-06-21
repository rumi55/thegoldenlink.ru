<ul class="nav__lang lang">
    <li class="lang__item">
        <a href="{{ route('locale', ['locale' => 'ru']) }}"
            @class([
              'lang__link',
              'lang__link--active' => app()->getLocale() == 'ru'
            ])
        >
            @lang('RU')
        </a>
    </li>

    <li class="lang__item">
        <a href="{{ route('locale', ['locale' => 'en']) }}"
            @class([
              'lang__link',
              'lang__link--active' => app()->getLocale() == 'en'
            ])
        >
            @lang('EN')
        </a>
    </li>
</ul>
