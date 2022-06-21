<section class="section">
    <div class="container">
        <h2 class="title section__title">
            @lang('site.review.header')
        </h2>

        @if (false)
            <div class="carousel">
                <div class="carousel__list">
                    @foreach($reviews as $review)
                        @php /** @var \App\Models\Review $review */ @endphp
                        <div class="carousel__item">
                            <a href="{{ $review->link_to_youtube }}" class="carousel__link" tabindex="-1">
                                <img src="{{ $review->photo }}" alt="" class="carousel__image">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="carousel__controls">
                    <button class="btn btn--flat btn--round carousel__prev" data-controls="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             class="carousel__icon bi bi-chevron-left" viewBox="0 0 18 16" aria-hidden="true"
                             aria-label="@lang('site.back')">
                            <path stroke-width="1" stroke="currentColor" fill-rule="evenodd"
                                  d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </button>
                    <button class="btn btn--flat btn--round carousel__next" data-controls="next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             class="carousel__icon bi bi-chevron-right" viewBox="0 0 14 16" aria-hidden="true"
                             aria-label="@lang('site.next')">
                            <path stroke-width="1" stroke="currentColor" fill-rule="evenodd"
                                  d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <div class="carousel"
             data-carousel='{"items": 1, "gutter": 0, "responsive": {"768": {"items": 1, "nav": false}}}'>
            <div class="carousel__list reviews" style="margin-top: 0">
                @foreach($reviews as $review)
                    @php /** @var \App\Models\Review $review */ @endphp
                    <div class="carousel__item">
                        <div class="review">
                            <div class="review__picture">
                                <img src="{{ $review->thumb }}" alt=""
                                     class="review__image">
                            </div>
                            <div class="review__text">
                                {!! $review->text !!}
                            </div>

                            <div class="review__about">
                                @lang('site.review.aboutClasses')
                            </div>

                            <div class="review__from">
                                @lang('site.review.from') {{ $review->name }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="carousel__controls">
                <button class="btn btn--flat btn--round carousel__prev" data-controls="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         class="carousel__icon bi bi-chevron-left" viewBox="0 0 18 16" aria-hidden="true"
                         aria-label="@lang('site.back')">
                        <path stroke-width="1" stroke="currentColor" fill-rule="evenodd"
                              d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </button>
                <button class="btn btn--flat btn--round carousel__next" data-controls="next">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         class="carousel__icon bi bi-chevron-right" viewBox="0 0 14 16" aria-hidden="true"
                         aria-label="@lang('site.next')">
                        <path stroke-width="1" stroke="currentColor" fill-rule="evenodd"
                              d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
