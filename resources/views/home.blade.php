@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css?v=' . ($ver ?? '')) }}">
@stop

@section('content')
@include('components.form-warranty')
@include('components.form-safe')

    <!-- Slider -->
    <section class="tf-slideshow slider-default slider-effect-fade">
        <div dir="ltr" class="swiper tf-sw-slideshow" data-effect="fade" data-preview="1" data-tablet="1"
             data-mobile="1" data-centered="false" data-space="0" data-space-mb="0" data-loop="true"
             data-auto-play="true">
            <div class="swiper-wrapper">
                @foreach($banners as $_item)
                    <div class="swiper-slide">
                        <div class="wrap-slider">
                            <img src="{{ getImage($_item->image) }}" alt="fashion-slideshow">
                            <div class="box-content">
                                <div class="content-slider">
                                    <div class="box-title-slider">
                                        <div class="fade-item fade-item-1 heading title-display text-white">
                                            {!! $_item->title !!}
                                        </div>
                                        <div class="fade-item fade-item-1 heading title-display text-white">
                                            {!! $_item->description !!}
                                        </div>
                                    </div>
                                    <div class="fade-item fade-item-3 box-btn-slider">
                                        <a href="{{ $_item->link }}" class="tf-btn btn-fill btn-white"><span
                                                class="text">Shop collection</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="wrap-pagination">
            <div class="container">
                <div class="sw-dots sw-pagination-slider type-circle white-circle-line justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Slider -->

    <marquee scrollamount="5" direction="right">
        <section class="section-text">
            <div class="marquee-text">
                <div>Bảo hành Vàng 10 năm</div>
                <div>Đổi mới sau tai nạn</div>
                <div>30 ngày dùng thử</div>
                <div>Miễn phí Ship</div>
            </div>
        </section>
    </marquee>
    <!-- Collection -->
{{--    <section class="flat-spacing bg-css">--}}
{{--        <div class="container">--}}
{{--            <div class="heading-section text-center wow fadeInUp">--}}
{{--                <h3 class="heading">Shop by Collections</h3>--}}
{{--                <p class="subheading">Browse our Top Trending: the hottest picks loved by all.</p>--}}
{{--            </div>--}}
{{--            <div class="flat-sw-navigation wow fadeInUp" data-wow-delay="0.1s">--}}
{{--                <div dir="ltr" class="swiper tf-sw-collection" data-preview="3" data-tablet="3" data-mobile-sm="2"--}}
{{--                     data-mobile="1" data-space-lg="30" data-space-md="15" data-space="15" data-pagination="1"--}}
{{--                     data-pagination-md="3" data-pagination-lg="4">--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        <!-- item 1 -->--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <div class="collection-position-2 style-7 hover-img">--}}
{{--                                <a href="shop-collection.html" class="img-style">--}}
{{--                                    <img class="lazyload" data-src="images/collections/Collections3.png"--}}
{{--                                         src="images/collections/Collections3.png" alt="banner-cls">--}}
{{--                                </a>--}}
{{--                                <div class="content text-center">--}}
{{--                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Ghế ngồi ô tô cho bé</a></h4>--}}
{{--                                    <span class="text-title text-white">Tiêu chuẩn 1</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- item 2 -->--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <div class="collection-position-2 style-7 hover-img">--}}
{{--                                <a href="shop-collection.html" class="img-style">--}}
{{--                                    <img class="lazyload" data-src="images/collections/Collections2.png"--}}
{{--                                         src="images/collections/Collections2.png" alt="banner-cls">--}}
{{--                                </a>--}}
{{--                                <div class="content text-center">--}}
{{--                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Ghế ngồi ô tô cho bé</a></h4>--}}
{{--                                    <span class="text-title text-white">Tiêu chuẩn 1</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- item 3 -->--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <div class="collection-position-2 style-7 hover-img">--}}
{{--                                <a href="shop-collection.html" class="img-style">--}}
{{--                                    <img class="lazyload" data-src="images/collections/Collections1.png"--}}
{{--                                         src="images/collections/Collections1.png" alt="banner-cls">--}}
{{--                                </a>--}}
{{--                                <div class="content text-center">--}}
{{--                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Phụ kiện</a></h4>--}}
{{--                                    <span class="text-title text-white">25 products</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="d-flex d-lg-none sw-pagination-collection sw-dots type-circle justify-content-center"></div>--}}
{{--                </div>--}}
{{--                <div class="nav-prev-collection d-none d-lg-flex nav-sw style-line nav-sw-left"><i--}}
{{--                        class="icon icon-arrLeft"></i></div>--}}
{{--                <div class="nav-next-collection d-none d-lg-flex nav-sw style-line nav-sw-right"><i--}}
{{--                        class="icon icon-arrRight"></i></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- /Collection -->

    <!-- Top picks -->
    <section class="flat-spacing bg-css topick section-one">
            <div class="container-fluid">
            <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading">Hot Selling</h3>
{{--                <p class="subheading text-secondary">Browse our Top Trending: the hottest picks loved by all. </p>--}}
            </div>
            @if(!empty($hotProducts))
                <div dir="ltr" class="swiper tf-sw-latest" data-preview="5" data-tablet="4" data-mobile="1"
                     data-space-lg="15" data-space-md="15" data-space="15" data-pagination="1" data-pagination-md="1"
                     data-pagination-lg="3" >
                    <div class="swiper-wrapper">
                        @foreach($hotProducts as $_item)
                            <div class="swiper-slide">
                                <div class="card-product wow fadeInUp" data-wow-delay="0s" style="border-radius: 15px;">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-index', ['slug' => $_item->slug]) }}" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="{{ getImage($_item->image) }}"
                                                 src="{{ getImage($_item->image) }}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{ getImage($_item->image) }}"
                                                 src="{{ getImage($_item->image) }}" alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="{{ route('product-index', ['slug' => $_item->slug]) }}">
                                            <p class="product-title">{{ str_replace("BABYRO ", "", strtoupper($_item->name)) }}</p>
                                        </a>
                                        <!-- <p class="product-desc">{{ $_item->first_category ? $_item->first_category->name : '' }}</p> -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
                </div>
            @endif
        </div>
    </section>
    <!-- /Top picks -->

{{--    <section class="blog">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @foreach($upper as $_item)--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="blog-item card h-100 d-flex flex-column">--}}
{{--                            <div class="card-body d-flex flex-column">--}}
{{--                                <img src="{{ getImage($_item->icon) }}" alt="">--}}
{{--                                <p class="title">{{ $_item->name }}</p>--}}
{{--                                <p class="desc">{{ $_item->short_description }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}

        <section class="flat-spacing section-two" style="padding-top: 0px">
            <div class="mb-p-0">
                <div class="flat-sw-navigation box-product-common__row wow fadeInUp" data-wow-delay="0.1s">
                    @foreach($upper as $_item)
                        <div class="container-fluid home-padding">
                        <div class="product-common__row">
                            <div class="signature-contentblock {{ $loop->index%2 == 0 ? 'signature-contentblock--reverse' : '' }}">
                                <div class="signature-contentblock__image">
                                    <img class="product-marketing__img" src="{{ getImage($_item->image) }}" alt="">
                                </div>
                                <div class="signature-contentblock__html">
                                    <div class="signature-contentblock__description">
                                        <div class="box-first-content-flex">
                                            <img src="{{ getImage($_item->icon) }}" alt="">
                                            <div style="text-transform: uppercase">
                                                {!! $_item->link !!}
                                            </div>
                                        </div>
                                        <div class="signature-contentblock__title">{{ $_item->name }}</div>
                                        <div class="signature-contentblock__subtitle">{{ $_item->description }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
{{--    </section>--}}
    <div class="home-padding">
        <hr>
    </div>

    @include('components.last-page')


    <!-- Iconbox -->
    <section class="flat-spacing section-three line-top-container home-padding">
        <div class="container-fluid">
            <div dir="ltr" class="swiper tf-sw-iconbox" data-preview="4" data-tablet="3" data-mobile-sm="2"
                 data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1"
                 data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                <div class="swiper-wrapper">
                    @foreach($lower as $_item)
                        <div class="swiper-slide">
                            <div class="tf-icon-box">
                                <div class="icon-box"><img style="object-fit: contain" src="{{ getImage($_item->icon) }}" alt=""></div>
                                <div class="content text-center">
                                    <h6>{{ $_item->name }}</h6>
                                    <div class="text-secondary">{{ $_item->short_description }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="sw-pagination-iconbox sw-dots type-circle justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Iconbox -->

    <!-- Banner discover -->
    <section class="flat-spacing section-four pt-0 home-padding">
        <div class="container-fluid">
            <div class="banner-cls-discover hover-img">
                <a href="#" class="img-style">
                    <img class="lazyload" data-src="images/banner-footer.png"
                         src="images/banner-footer.png" alt="babyro">
                </a>
                <div class="cls-content">
{{--                    <div class="box-title-top">--}}
{{--                        <p class="subtitle text-btn-uppercase text-white wow fadeInUp">sumMer 2024 collection</p>--}}
{{--                        <h3 class="title"><a href="#" class="link text-white wow fadeInUp" data-wow-delay="0.1s">Super--}}
{{--                                Sale Up To %50</a></h3>--}}
{{--                        <p class="desc text-white wow fadeInUp" data-wow-delay="0.2s">Reserved for special occasions</p>--}}
{{--                    </div>--}}
{{--                    <div class="wow fadeInUp" data-wow-delay="0.3s">--}}
{{--                        <a href="shop-default-grid.html" class="tf-btn btn-md btn-white"><span--}}
{{--                                class="text">discover Now</span><i class="icon icon-arrowUpRight"></i></a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- /Banner discover -->
@endsection
