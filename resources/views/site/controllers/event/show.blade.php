@extends('site.layouts.app')

@section('content')
    @include('site.includes.index.mobileMenu')
    <header class="main main--course main--background">
        <div class="container container--header">
            <nav class="nav nav--inline nav--align-center">
                <div class="main__logo main__logo--small logo">
                    @includeSvg('images/logo.svg')
                    <span class="logo__text logo__text--small">@lang('site.logo')</span>
                </div>
                <div class="nav__main">
                    <ul class="menu menu--small">
                        @foreach($mainMenu as $menuItem)
                            {{-- menu__item--small menu__link--active --}}
                            <li class="menu__item menu__item--no-margin">
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
    </header>

    @dump($event)
@stop
