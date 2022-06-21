<header class="main">
    <div class="main__inner">
        <div class="container">
            <nav class="nav">
                <div class="nav__main">
                    <ul class="menu">
                        @foreach($mainMenu as $menuItem)
                            <li class="menu__item">
                                {{-- menu__link--active --}}
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

                    @include('site.includes.personalLink')

                    @include('site.includes.burger')
                </div>
            </nav>

            <div class="main__content">
                <div class="main__logo logo">
                    @includeSvg('images/logo.svg')
                    <span class="logo__text">@lang('site.logo')</span>
                </div>

                <div class="main__text">
                    {!! \App\Services\Helpers\Block::get('header')->text() !!}
                </div>
            </div>
        </div>

        <div class="numbers">
            <div class="numbers__text">
                {!! \App\Services\Helpers\Block::get('header')->text() !!}
            </div>

            <div class="container numbers__list">
                <div class="number">
                    <div class="number__number">
                        {!! \App\Services\Helpers\Block::get('statistic_1')->text() !!}
                    </div>
                    <div class="number__text">
                        {!! \App\Services\Helpers\Block::get('statistic_1')->name() !!}
                    </div>
                </div>

                <div class="number">
                    <div class="number__number">
                        {!! \App\Services\Helpers\Block::get('statistic_2')->text() !!}
                    </div>
                    <div class="number__text">
                        {!! \App\Services\Helpers\Block::get('statistic_2')->name() !!}
                    </div>
                </div>

                <div class="number">
                    <div class="number__number">
                        {!! \App\Services\Helpers\Block::get('statistic_3')->text() !!}
                    </div>
                    <div class="number__text">
                        {!! \App\Services\Helpers\Block::get('statistic_3')->name() !!}
                    </div>
                </div>

                <div class="number number--hidden-mobile">
                    <div class="number__number">
                        {!! \App\Services\Helpers\Block::get('statistic_4')->text() !!}
                    </div>
                    <div class="number__text">
                        {!! \App\Services\Helpers\Block::get('statistic_4')->name() !!}
                    </div>
                </div>

                <div class="number">
                    <div class="number__number">
                        {!! \App\Services\Helpers\Block::get('statistic_5')->text() !!}
                    </div>
                    <div class="number__text number__text--clear">
                        {!! \App\Services\Helpers\Block::get('statistic_5')->name() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
