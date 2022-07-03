@extends('site.layouts.inner')

@section('title', __('site.events.header'))

@section('body')
    <section class="section section--alt">
        <div class="container container--alt-paddings">
            @foreach($eventGroups as $group)
                <h2 class="title section__title section__title--small">
                    {{ str($group->date_start->translatedFormat('F Y'))->ucfirst() }}
                </h2>

                <div class="courses">
                    @foreach($group->events as $event)
                        @php /** @var \App\Models\Event $event */ @endphp
                        {{-- course--no-image course--hot course--regular course--hot-mobile --}}
                        <div @class([
                            'course',
                            'course--hot' => $event->is_hot,
                        ])>
                            <div class="course__date">
                                <div class="course__day">
                                    {{ $event->date_start->format('d') }}
                                </div>

                                <div class="course__month">
                                    {{ str($event->date_start->translatedFormat('F'))->ucfirst() }}
                                </div>

                                <img
                                    class="course__icon" src="{{ asset('images/mobile/lotus.png') }}"
                                    alt="Цветок лотоса"
                                >

                                <div class="course__full-date">
                                    {{ $event->date_start->format('H:i') }}
                                    @lang('site.timezone.moscow')
                                </div>
                            </div>

                            <img class="course__pic" src="{{ $event->preview_image }}" alt="">

                            <div class="course__content">
                                <div class="course__main">
                                    <div class="course__title">
                                        {{ $event->subtitle }}
                                    </div>

                                    <a href="{{ route('events.show', $event->id) }}" class="course__link">
                                        {{ $event->title }}
                                    </a>

                                    <div class="course__lead">
                                        {{ $event->teachers->implode('name', ', ') }}
                                    </div>

                                    <div class="course__get-details--mobile">
                                        <a href="{{ route('events.show', $event->id) }}" class="btn">
                                            @lang('site.detail')
                                        </a>
                                    </div>
                                </div>

                                <div class="course__option">
                                    {{ $event->tags->implode('name', ', ') }}

                                    <div class="course__get-details">
                                        <a href="{{ route('events.show', $event->id) }}" class="btn">
                                            @lang('site.detail')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
@stop
