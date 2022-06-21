@extends('site.layouts.app')

@section('content')
    @include('site.includes.index.mobileMenu')

    @include('site.includes.index.header')

    @includeWhen($events->isNotEmpty(), 'site.includes.index.events')

    @include('site.includes.index.teachers')

    @includeWhen($gallery, 'site.includes.index.gallery')

    @include('site.includes.goToTelegram')

    @includeWhen($reviews->isNotEmpty(), 'site.includes.reviews')
@stop
