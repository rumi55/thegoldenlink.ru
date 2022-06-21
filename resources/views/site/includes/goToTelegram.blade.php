<section class="section-temple">
    <div class="container">
        <p class="section-temple__text">
            @lang('site.goToTelegram')
            <a href="{{ $socialLinks['telegram'] }}"
               class="section-temple__link"
               target="_blank"
            > Telegram !</a>
        </p>

        <a href="{{ $socialLinks['telegram'] }}" target="_blank" class="btn">
            @lang('site.join')
        </a>
    </div>
</section>
