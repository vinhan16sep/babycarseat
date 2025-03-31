@extends('layouts.app')

@section('meta_title', "Tin tức")
@section('meta_keyword', "Tin tức")
@section('meta_description', "Tin tức")
@section('meta_image', "Tin tức")

@section('content')

    <!-- page-title -->
    <div class="page-title" style="background-image: url('{{ asset('images/section/page-title.jpg') }}');">
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <h3 class="heading text-center">Tin tức</h3>
                    <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                        <li>
                            <a class="link" href="{{ url('/') }}">Trang chủ</a>
                        </li>
                        <li>
                            <i class="icon-arrRight"></i>
                        </li>
                        <li>
                            <a class="link">Tin tức</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- blog-grid -->
    <div class="main-content-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tf-grid-layout md-col-3">
                        @foreach ($news as $item)
                            @php
                                $route = route("detail-new", ["slug" => $item->slug ])
                            @endphp
                            @include('components.new-item', ["item" => $item, "route" => $route])
                        @endforeach

                        <!-- pagination -->
                        {!! $news->onEachSide(0)->links("simple-bootstrap-4") !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /blog-grid -->

@endsection
