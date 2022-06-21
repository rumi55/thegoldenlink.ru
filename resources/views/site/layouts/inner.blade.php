@extends('site.layouts.app')

@section('content')
    @include('site.includes.index.mobileMenu')
    @include('site.includes.inner.header')

    @yield('body')
@stop
