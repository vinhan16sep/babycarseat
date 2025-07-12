@extends('layouts.app')

@section('meta_title', $new->title)
@section('meta_keyword', $new->title)
@section('meta_description', $new->title)
@section('meta_image', $new->title)
@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}">
@stop

@section('content')
    <!-- blog-detail -->
    <section class="flat-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-lg-30">
                    <div class="blog-detail-wrap page-single-2">
                        <div class="inner">
                            <div class="heading">
                                <ul class="list-tags has-bg">
                                    <li>
                                        <a href="{{ route('news') }}" class="link">Tin tức</a>
                                    </li>
                                </ul>
                                <h3 class="fw-5">{{ $new->title }}</h3>
                                <div class="meta">
                                    <div class="meta-item gap-8">
                                        <div class="icon">
                                            <i class="icon-calendar"></i>
                                        </div>
                                        <p class="body-text-1">{{ $new->updated_at->format("d/m/Y") }}</p>
                                    </div>
                                    <div class="meta-item gap-8">
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                        <p class="body-text-1">Tạo bởi <a class="link" href="#">Admin</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="image">
                                <img class="lazyload" data-src="{{ getImage($new->image) }}" src="{{ getImage($new->image) }}" alt="">
                            </div>
                            <div class="fix-font content">
                                {!! $new->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar maxw-360">
                        <div class="sidebar-item sidebar-relatest-post">
                            <h5 class="sidebar-heading">Tin tức liên quan</h5>
                            <div>
                                @foreach($news as $item)
                                    @php
                                        $route = route("detail-new", ["slug" => $item->slug ])
                                    @endphp
                                    <div class="relatest-post-item {{ $loop->index == 0 ? '' : 'style-row' }} hover-image">
                                        <div class="image">
                                            <img class="lazyload" data-src="{{ getImage($item->image) }}" src="{{ getImage($item->image) }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="meta">
                                                <div class="meta-item gap-8">
                                                    <div class="icon">
                                                        <i class="icon-calendar"></i>
                                                    </div>
                                                    <p class="text-caption-1">{{ $item->updated_at->format("d/m/Y") }}</p>
                                                </div>
                                                <div class="meta-item gap-8">
                                                    <div class="icon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <p class="text-caption-1">Tạo bởi <a class="link" href="#">Admin</a></p>
                                                </div>
                                            </div>
                                            <h6 class="title fw-5">
                                                <a class="link" href="{{ $route }}">{{ $item->title }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /blog-detail -->
@endsection
