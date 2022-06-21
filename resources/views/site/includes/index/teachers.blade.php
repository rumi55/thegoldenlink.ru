<section class="section section--colored">
    <div class="container">
        <h2 class="title section__title">
            {{ \App\Services\Helpers\Block::get('teachers')->name() }}
        </h2>

        <div class="teachers">
            <div class="teachers__photo">
                <img src="{{ \App\Services\Helpers\Block::get('teachers')->image() }}"
                     alt=""
                     class="teachers__img"
                >
            </div>

            <div class="teachers__content">
                {!! \App\Services\Helpers\Block::get('teachers')->text() !!}
            </div>
        </div>
    </div>
</section>
