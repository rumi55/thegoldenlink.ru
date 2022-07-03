<section class="section events">
    <div class="container events__container">
        <h2 class="title section__title">
            @lang('site.events.upcoming')
        </h2>

        @foreach($events->chunk(3) as $groupIndex => $group)
            <div class="events-list">
                @foreach($group as $index => $event)
                    @php
                        /** @var \App\Models\Event $event */
                    @endphp
                    <div @class([
                            'event',
                            'event--vertical' => ($index + 1) % 3 == 0,
                            'event--hot' => $event->is_hot
                        ])>
                        <a href="{{ route('events.show', $event->id) }}"
                           class="event__picture"
                           tabindex="-1"
                        >
                            <div class="event__datetime">
                                <div class="event__date">{{ $event->date_start->format('d') }}</div>
                                <div class="event__month">
                                    {{ str($event->date_start->translatedFormat('F'))->ucfirst() }}
                                </div>
                                <div class="event__time">
                                    {{ $event->date_start->format('H:i') }}
                                    @lang('site.timezone.moscow')
                                </div>
                            </div>

                            <img
                                src="{{ $event->preview_image }}"
                                alt=""
                                class="event__image"
                                loading="lazy"
                            >
                        </a>

                        <div class="event__info">
                            <a href="{{ route('events.show', $event->id) }}"
                               class="event__title"
                               tabindex="-1"
                            >
                                {{ $event->title }}
                            </a>

                            <div class="event__type badge">
                                {{ $event->tags->implode('name', ', ') }}
                            </div>

                            <div class="event__teachers">
                                {{ $event->teachers->implode('name', ', ') }}
                            </div>

                            <a href="{{ route('events.show', $event->id) }}" class="btn">
                                @lang('site.detail')
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>
