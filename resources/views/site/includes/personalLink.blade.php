@auth
    <a href="{{ route('filament.pages.dashboard') }}" class="btn nav__personal-mobile" aria-hidden="true">
        <span class="btn__icon" aria-hidden="true">
            <img src="{{ asset('images/icons/user.svg') }}" width="18" height="21" alt="">
        </span>

        @lang('site.personal')
    </a>
@endauth
