@extends('layouts.app')

@section('css')
    <style>
        .pd_header_main_wrapper.bz_furniture_header_wrapper.bz_wins_header_wrapper.float_left,
        .bz_bottom_footer_main_wrapper.wins_footer_main_wrapper.float_left {
            display: none !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}">
@endsection

@section('content')
    <!-- 404 -->
    <section class="flat-spacing page-404">
        <div class="container">
            <div class="page-404-inner">
                <div class="image">
                    <img class="lazyload" data-src="{{ asset('images/section/404.png') }}" src="{{ asset('images/section/404.png') }}" alt="image">
                </div>
                <div class="content">
                    <div class="heading">Oops!</div>
                    <div>
                        <h2 class="title mb_4">Something is Missing.</h2>
                        <div class="text body-text-1 text-secondary">The page you are looking for cannot be found. take
                            a break before trying again
                        </div>
                    </div>
                    <a href="{{ url("/") }}" class="tf-btn btn-fill"><span class="text text-button">Back To Homepage</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- /404 -->
@endsection
