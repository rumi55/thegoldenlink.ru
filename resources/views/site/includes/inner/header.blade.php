<header class="main main--short">
    <div class="main__inner main__inner--short">
        <div class="container container--header">
            <nav class="nav nav--inline">
                <div class="main__logo main__logo--small logo">
                    @includeSvg('images/logo.svg')
                    <span class="logo__text logo__text--small">@lang('site.logo')</span>
                </div>
                <div class="nav__main">
                    <ul class="menu menu--small">
                        @foreach($mainMenu as $menuItem)
                            {{-- menu__item--small menu__link--active --}}
                            <li class="menu__item">
                                <a href="{{ data_get($menuItem, 'link') }}" class="menu__link">
                                    {{ data_get($menuItem, 'title') }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    @include('site.includes.personalLink')
                    @include('site.includes.socialList')
                </div>

                <div class="nav__additional">
                    @include('site.includes.langSwitcher')

                    @include('site.includes.burger')
                </div>
            </nav>
        </div>

        <div class="main__text main__text--bottom">
            @yield('title')
        </div>
    </div>
</header>
