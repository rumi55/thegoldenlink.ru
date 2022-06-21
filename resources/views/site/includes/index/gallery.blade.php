<section class="section">
    <div class="container">
        @php /** @var \App\Models\Gallery $gallery */ @endphp
        <h2 class="title section__title">
            @lang('site.gallery.header')
        </h2>

        <div class="gallery">
            <div class="gallery__main">
                @foreach($gallery->images as $image)
                    @php /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $image */ @endphp
                    <div class="gallery__item">
                        <img src="{{ $image->getUrl(\App\Models\Gallery::RESIZE) }}"
                             loading="lazy"
                             class="gallery__image"
                             alt=""
                        >
                    </div>
                @endforeach
            </div>
            <div class="gallery__nav">
                <div class="gallery__thumbs">
                    @foreach($gallery->images as $image)
                        @php /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $image */ @endphp
                        <div class="gallery__thumb">
                            <img src="{{ $image->getUrl(\App\Models\Gallery::THUMB) }}"
                                 loading="lazy"
                                 class="gallery__thumbnail"
                                 alt=""
                            >
                        </div>
                    @endforeach
                </div>
                <div class="gallery__controls">
                    <button class="btn btn--flat btn--round gallery__prev" data-controls="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             class="gallery__icon bi bi-chevron-left" viewBox="0 0 18 16" aria-hidden="true"
                             aria-label="@lang('site.back')">
                            <path stroke-width="1" stroke="currentColor" fill-rule="evenodd"
                                  d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </button>
                    <button class="btn btn--flat btn--round gallery__next" data-controls="next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             class="gallery__icon bi bi-chevron-right" viewBox="0 0 14 16" aria-hidden="true"
                             aria-label="@lang('site.next')">
                            <path stroke-width="1" stroke="currentColor" fill-rule="evenodd"
                                  d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
