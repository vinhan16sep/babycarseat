@extends('layouts.app')

@section('meta_title', "Kiến thức")
@section('meta_keyword', "Kiến thức")
@section('meta_description', "Kiến thức")
@section('meta_image', "Kiến thức")

@section('content')

    <!-- page-title -->
    <div class="page-title" style="background-image: url('{{ asset('images/section/page-title.jpg') }}');">
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <h3 class="heading text-center">Kiến thức</h3>
                    <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                        <li>
                            <a class="link" href="{{ url('/') }}">Trang chủ</a>
                        </li>
                        <li>
                            <i class="icon-arrRight"></i>
                        </li>
                        @if ($category)
                            <li>
                                <a class="link" href="{{ route("category-detail-knowledge") }}">Kiến thức</a>
                            </li>
                            <li>
                                <i class="icon-arrRight"></i>
                            </li>
                            <li>
                                <a class="link">{{ $category->name }}</a>
                            </li>
                        @else
                            <li>
                                <a class="link">Kiến thức</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- blog-default -->
    <div class="main-content-page">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-lg-30">
                    @foreach($knowledges as $item)
                        @php
                            $route = route("detail-knowledge", ["category" => $item->category->slug, "slug" => $item->slug ])
                        @endphp
                        <div class="wg-blog style-row hover-image mb_40">
                            <div class="image">
                                <img class="lazyload" data-src="{{ getImage($item->image) }}" src="{{ getImage($item->image) }}" alt="">
                            </div>
                            <div class="content">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-10">
                                    <div class="meta">
                                        <div class="meta-item gap-8">
                                            <div class="icon">
                                                <i class="icon-calendar"></i>
                                            </div>
                                            <p class="text-caption-1">{{ $item->updated_at->format("d/m/Y")}}</p>
                                        </div>
                                        <div class="meta-item gap-8">
                                            <div class="icon">
                                                <i class="icon-user"></i>
                                            </div>
                                            <p class="text-caption-1">Tạo bởi <a class="link">Admin</a></p>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="title">
                                    <a class="link" href="{{ $route }}">{{ $item->title }}</a>
                                </h5>
                                <p>{{ $item->description }}</p>
                                <a href="{{ $route }}" class="link text-button bot-button">Xem thêm</a>
                            </div>
                        </div>
                    @endforeach

                    <!-- pagination -->
                    {!! $knowledges->onEachSide(0)->links("simple-bootstrap-4") !!}
                </div>

                <div class="col-lg-4">
                    <div class="sidebar maxw-360">
                        <div class="sidebar-item sidebar-relatest-post">
                            <h5 class="sidebar-heading">Kiến thức mới nhất</h5>
                            <div>
                                @foreach($latestKnowledges as $item)
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
                                                    <p class="text-caption-1">Tạo bởi <a class="link">Admin</a></p>
                                                </div>
                                            </div>
                                            <h6 class="title fw-5">
                                                <a class="link" href="blog-detail.html">The Ultimate Guide: Dressing Stylishly with Minimal Effort</a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="sidebar-item sidebar-categories">
                            <h5 class="sidebar-heading">Categories</h5>
                            <ul>
                                @foreach($categories as $_category)
                                    <li>
                                        <a class="text-button link" href="{{ route("category-detail-knowledge", ['category' => $_category->slug]) }}">{{ $_category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /blog-default -->
@endsection
