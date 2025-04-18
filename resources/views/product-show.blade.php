@extends('layouts.app')

@section('meta_title', 'product name')
@section('meta_keyword', 'product name')
@section('meta_description', 'product name')
@section('meta_image', 'product image')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/drift-basic.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/photoswipe.css') }}" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .mySwiper {
            height: 80%;
            width: 100%;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        @media (min-width: 1300px) {
            .tf-product-media-wrap.sticky-top{
                width: calc(100% - 30px);
            }
        }
        .product-ksp {
            position: relative;
            margin-top: 10px;
            padding: 4px 28px;
            background-color: #fbf9f8;
        }
        .product-ksp__box:not(:last-of-type) {
            border-bottom: 1px solid #c4c5c7;
        }
        .product-ksp__img {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 34px;
        }
        .product-ksp__text {
            position: relative;
            margin-left: 12px;
        }
        .product-ksp__box {
            box-sizing: border-box;
            display: flex;
            padding: 16px 0;
            align-items: center;
        }
        .product-options-bottom {
            margin-top: 40px;
        }
        .fieldset:last-child {
            border: 0;
            margin: 0 0 40px;
            padding: 0;
            letter-spacing: -.31em;
            margin-bottom: 20px;
        }
        .fieldset>* {
            letter-spacing: normal;
        }
        .joie-button-secondary{
            font-weight: 400;
            font-size: 1.8rem;
            display: inline-block;
            box-sizing: border-box;
            line-height: 140%;
            padding: 12px 30px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: all .3s linear;
            color: #407ec9;
            background-color: #fff;
            border: 2px solid #407ec9;
        }
    </style>
    @foreach($product->productColors as $i => $_color)
    <style>
        .mySwiperThumb{{$i}} {
            height: 20%;
            box-sizing: border-box;
            padding: 15px;
        }

        .mySwiperThumb{{$i}} .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiperThumb{{$i}} .swiper-slide-thumb-active {
            opacity: 1;
        }

        .mySwiper{{$i}} .swiper-slide{
            margin-right: 0!important;
        }
    </style>
    @endforeach
@stop

@section('content')
    <!-- breadcrumb -->
    <div class="tf-breadcrumb">
        <div class="container">
            <div class="tf-breadcrumb-wrap">
                <div class="tf-breadcrumb-list">
                    <a href="{{ url('/') }}" class="text text-caption-1">Trang chủ</a>
                    <i class="icon icon-arrRight"></i>
                    <a href="{{ route('product-list', ['category_slug' => $product->categoryId->slug]) }}" class="text text-caption-1">{{ $product->categoryId->name }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- tf-add-cart-success -->
    <div class="tf-add-cart-success">
        <div class="tf-add-cart-heading">
            <h5>Shopping Cart</h5>
            <i class="icon icon-close tf-add-cart-close"></i>
        </div>
        <div class="tf-add-cart-product">
            <div class="image">
                <img class=" ls-is-cached lazyloaded" data-src="{{ asset('images/products/womens/women-3.jpg') }}" alt=""
                     src="{{ asset('images/products/womens/women-3.jpg') }}">
            </div>
            <div class="content">
                <div class="text-title">
                    <a class="link" href="{{ route('san-pham', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                </div>
                <div class="text-caption-1 text-secondary-2">Green</div> <!--color-->
                <div class="text-title">
                    @if($product->is_discount)
                        {{ numberFormat($product->discount_value) }}₫
                        <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
                    @else
                        {{ numberFormat($product->price) }}₫
                    @endif
                </div>
            </div>
        </div>
        <a href="shopping-cart.html" class="tf-btn w-100 btn-fill radius-4"><span class="text text-btn-uppercase">View cart</span></a>
    </div>
    <!-- /tf-add-cart-success -->


    <!-- Product_Main -->
    <section class="flat-spacing" style="padding-top: 30px">
        <div class="tf-main-product section-image-zoom">
            <div class="container">
                <div class="row">
                    <!-- Product default -->
                    <div class="col-md-6">
                        <div class="tf-product-media-wrap sticky-top" style="overflow: hidden">
                            @foreach($product->productColors as $i => $_color)
                                <section class="slider slider{{$i}}" {!! $i !== 0 ? 'style="display:none"' : ''  !!} data-color="{{ $_color->color->name }}">
                                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper{{$i}}">
                                        <div class="swiper-wrapper">
                                            @foreach($_color->image as $_image)
                                                <div class="swiper-slide" data-color="{{ $_color->color->name }}">
                                                    <a href="{{ getImage($_image) }}" target="_blank" class="slider__image"
                                                       >
                                                        <img class="tf-image-zoom lazyload"
                                                             data-zoom="{{ getImage($_image) }}"
                                                             data-src="{{ getImage($_image) }}"
                                                             src="{{ getImage($_image) }}" alt="">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <div thumbsSlider="" class="swiper mySwiperThumb{{$i}}">
                                        <div class="swiper-wrapper">
                                            @foreach($_color->image as $_image)
                                                <div class="swiper-slide" data-color="{{ $_color->color->name }}">
                                                    <div class="slider__image">
                                                        <img class="lazyload" data-src="{{ getImage($_image) }}"
                                                             src="{{ getImage($_image) }}" alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            @endforeach
                        </div>
                    </div>
                    <!-- /Product default -->
                    <!-- tf-product-info-list -->
                    <div class="col-md-6">
                        <div class="tf-product-info-wrap position-relative">
                            <div class="tf-zoom-main"></div>
                            <div class="tf-product-info-list other-image-zoom">
                                <div class="tf-product-info-heading">

                                    <div class="tf-product-info-name">
{{--                                        <div class="text text-btn-uppercase">Clothing</div>--}}
                                        <h3 class="name">{{ $product->name }}</h3>
{{--                                        <div class="sub">--}}
{{--                                            <div class="tf-product-info-rate">--}}
{{--                                                <div class="list-star">--}}
{{--                                                    <i class="icon icon-star"></i>--}}
{{--                                                    <i class="icon icon-star"></i>--}}
{{--                                                    <i class="icon icon-star"></i>--}}
{{--                                                    <i class="icon icon-star"></i>--}}
{{--                                                    <i class="icon icon-star"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="text text-caption-1">(134 reviews)</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="tf-product-info-sold">--}}
{{--                                                <i class="icon icon-lightning"></i>--}}
{{--                                                <div class="text text-caption-1">18 sold in last 32 hours</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>

                                    <div class="tf-product-info-desc">
                                        <div class="tf-product-info-price">
                                            <h5 class="price-on-sale font-2">
                                                @if($product->is_discount)
                                                    {{ numberFormat($product->discount_value) }}₫
                                                    <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
                                                @else
                                                    {{ numberFormat($product->price) }}₫
                                                @endif
                                            </h5>
{{--                                            <div class="compare-at-price font-2">$98.99</div>--}}
{{--                                            <div class="badges-on-sale text-btn-uppercase">--}}
{{--                                                -25%--}}
{{--                                            </div>--}}
                                        </div>
                                        <p>
                                            {!! $product->description !!}
                                        </p>
{{--                                        <div class="tf-product-info-liveview">--}}
{{--                                            <i class="icon icon-eye"></i>--}}
{{--                                            <p class="text-caption-1"><span class="liveview-count">28</span> people are--}}
{{--                                                viewing this right now</p>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <div class="tf-product-info-choose-option">
                                    <div class="variant-picker-item">
                                        <div class="variant-picker-label mb_12">
                                            Colors:<span class="text-title variant-picker-label-value value-currentColor" data-id="{{ $product->productColors && !empty($product->productColors[0]) ? $product->productColors[0]->color->id : '' }}">{{ $product->productColors && !empty($product->productColors[0]) ? $product->productColors[0]->color->name : '' }}
                                            </span>
                                        </div>
                                        <div class="variant-picker-values">
                                            @foreach($product->productColors as $_color)
                                                <input type="radio" name="color" value="{{ $_color->color->id }}">
                                                <label class="-swiperslide stagger-item hover-tooltip tooltip-bot radius-60 color-btn {{ $loop->index == 0 ? 'active' : '' }}"
                                                       for="values-beige" data-color="{{ $_color->color->name }}" data-value="{{ $_color->color->name }}" data-id="{{ $_color->color->id }}" style="background-color: {{ $_color->color->code }}!important">
                                                    <span class="btn-checkbox"></span>
                                                    <span class="tooltip">{{ $_color->color->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="product-ksp">
                                        <div class="product-ksp__box">
                                            <img class="product-ksp__img" src="https://dd.joiebaby.com/media/catalog/product/1/-/1-i-spin360_spin.png" alt="Two arrows in an oval shape">
                                            <span class="product-ksp__text joie-regular-text">360º spin  </span>
                                        </div>
                                        <div class="product-ksp__box">
                                            <img class="product-ksp__img" src="https://dd.joiebaby.com/media/catalog/product/2/-/2-i-spin360_i-size.png" alt="i-Size logo">
                                            <span class="product-ksp__text joie-regular-text">R129 &amp; i-Size certified   </span>
                                        </div>
                                        <div class="product-ksp__box">
                                            <img class="product-ksp__img" src="https://dd.joiebaby.com/media/catalog/product/3/-/3-i-spin360_isofix.png" alt="Padlock icon">
                                            <span class="product-ksp__text joie-regular-text">Smart Ride™ lock-off</span>
                                        </div>
                                    </div>

                                    <div class="product-options-bottom">
                                        <div class="fieldset">
                                            <div class="actions">
                                                <a href="https://joiebaby.com/en/store-locator" title="Find your local shop" class="joie-button-secondary" style="width: 100%; text-align: center;">
                                                    Find your local shop            </a>
                                            </div>
                                        </div>
                                    </div>

{{--                                    <div class="variant-picker-item">--}}
{{--                                        <div class="d-flex justify-content-between mb_12">--}}
{{--                                            <div class="variant-picker-label">--}}
{{--                                                Size:<span class="text-title variant-picker-label-value">L</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="variant-picker-values gap12">--}}
{{--                                            <input type="radio" name="size1" id="values-s">--}}
{{--                                            <label class="style-text size-btn" for="values-s" data-value="S"--}}
{{--                                                   data-price="79.99">--}}
{{--                                                <span class="text-title">S</span>--}}
{{--                                            </label>--}}
{{--                                            <input type="radio" name="size1" id="values-m">--}}
{{--                                            <label class="style-text size-btn" for="values-m" data-value="M"--}}
{{--                                                   data-price="79.99">--}}
{{--                                                <span class="text-title">M</span>--}}
{{--                                            </label>--}}
{{--                                            <input type="radio" name="size1" id="values-l" checked>--}}
{{--                                            <label class="style-text size-btn" for="values-l" data-value="L"--}}
{{--                                                   data-price="89.99">--}}
{{--                                                <span class="text-title">L</span>--}}
{{--                                            </label>--}}
{{--                                            <input type="radio" name="size1" id="values-xl">--}}
{{--                                            <label class="style-text size-btn" for="values-xl" data-value="XL"--}}
{{--                                                   data-price="89.99">--}}
{{--                                                <span class="text-title">XL</span>--}}
{{--                                            </label>--}}
{{--                                            <input type="radio" name="size1" id="values-xxl">--}}
{{--                                            <label class="style-text size-btn type-disable" for="values-xxl"--}}
{{--                                                   data-value="XXL" data-price="89.99">--}}
{{--                                                <span class="text-title">XXL</span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="tf-product-info-quantity">
                                        <div class="title mb_12">Quantity:</div>
                                        <div class="wg-quantity">
                                            <span class="btn-quantity btn-decrease">-</span>
                                            <input class="quantity-product" type="text" name="number" value="1">
                                            <span class="btn-quantity btn-increase">+</span>
                                        </div>
                                    </div>
                                    <div class="d-none">
                                        <div class="tf-product-info-by-btn mb_10">
                                            <a data-bs-toggle="modal"
                                               class="btn-style-2 flex-grow-1 text-btn-uppercase fw-6 btn-add-to-cart add-to-card" data-id="{{ $product->id }}"><span>Add to cart -&nbsp;</span><span
                                                    class="tf-qty-price total-price">
                                                    @if($product->is_discount)
                                                        {{ numberFormat($product->discount_value) }}₫
                                                        <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
                                                    @else
                                                        {{ numberFormat($product->price) }}₫
                                                    @endif
                                                </span></a>
{{--                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"--}}
{{--                                               class="box-icon hover-tooltip compare btn-icon-action">--}}
{{--                                                <span class="icon icon-gitDiff"></span>--}}
{{--                                                <span class="tooltip text-caption-2">Compare</span>--}}
{{--                                            </a>--}}
{{--                                            <a href="javascript:void(0);"--}}
{{--                                               class="box-icon hover-tooltip text-caption-2 wishlist btn-icon-action">--}}
{{--                                                <span class="icon icon-heart"></span>--}}
{{--                                                <span class="tooltip text-caption-2">Wishlist</span>--}}
{{--                                            </a>--}}
                                        </div>
                                        <a href="#" class="btn-style-3 text-btn-uppercase">Buy it now</a>
                                    </div>
                                    <div class="tf-product-info-help">
                                        <ul class="accordion-product-wrap" id="accordion-product">
                                            <li class="accordion-product-item">
                                                <a href="#accordion-7" class="accordion-title collapsed current" data-bs-toggle="collapse"
                                                   aria-expanded="true" aria-controls="accordion-1">
                                                    <h6>Thông số</h6>
                                                    <span class="btn-open-sub"></span>
                                                </a>
                                                <div id="accordion-7" class="collapse" data-bs-parent="#accordion-product">
                                                    <div class="accordion-content tab-description fix-font">
                                                        <p class="text-secondary">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="accordion-product-item">
                                                <a href="#accordion-8" class="accordion-title collapsed current" data-bs-toggle="collapse"
                                                   aria-expanded="true" aria-controls="accordion-1">
                                                    <h6>Đặc tính</h6>
                                                    <span class="btn-open-sub"></span>
                                                </a>
                                                <div id="accordion-8" class="collapse" data-bs-parent="#accordion-product">
                                                    <div class="accordion-content tab-description fix-font">
                                                        <p class="text-secondary">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="accordion-product-item">
                                                <a href="#accordion-9" class="accordion-title collapsed current" data-bs-toggle="collapse"
                                                   aria-expanded="true" aria-controls="accordion-1">
                                                    <h6>How to & support</h6>
                                                    <span class="btn-open-sub"></span>
                                                </a>
                                                <div id="accordion-9" class="collapse" data-bs-parent="#accordion-product">
                                                    <div class="accordion-content tab-description fix-font">
                                                        <p class="text-secondary">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /tf-product-info-list -->
                </div>
            </div>
        </div>

{{--        <div class="tf-sticky-btn-atc">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <form class="form-sticky-atc">--}}
{{--                            <div class="tf-sticky-atc-product">--}}
{{--                                <div class="image">--}}
{{--                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-3.jpg') }}" alt=""--}}
{{--                                         src="{{ asset('images/products/womens/women-3.jpg') }}">--}}
{{--                                </div>--}}
{{--                                <div class="content">--}}
{{--                                    <div class="text-title">--}}
{{--                                        Biker-style leggings--}}
{{--                                    </div>--}}
{{--                                    <div class="text-caption-1 text-secondary-2">Green, XS, Cotton</div>--}}
{{--                                    <div class="text-title">$68.00</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tf-sticky-atc-infos">--}}
{{--                                <div class="tf-sticky-atc-size d-flex gap-12 align-items-center">--}}
{{--                                    <div class="tf-sticky-atc-infos-title text-title">Size:</div>--}}
{{--                                    <div class="tf-dropdown-sort style-2" data-bs-toggle="dropdown">--}}
{{--                                        <div class="btn-select">--}}
{{--                                            <span class="text-sort-value font-2">M</span>--}}
{{--                                            <span class="icon icon-arrow-down"></span>--}}
{{--                                        </div>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <div class="select-item">--}}
{{--                                                <span class="text-value-item">S</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="select-item active">--}}
{{--                                                <span class="text-value-item">M</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="select-item">--}}
{{--                                                <span class="text-value-item">L</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="select-item">--}}
{{--                                                <span class="text-value-item">XL</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="tf-sticky-atc-quantity d-flex gap-12 align-items-center">--}}
{{--                                    <div class="tf-sticky-atc-infos-title text-title">Quantity:</div>--}}
{{--                                    <div class="wg-quantity style-1">--}}
{{--                                        <span class="btn-quantity minus-btn">-</span>--}}
{{--                                        <input type="text" name="number" value="1">--}}
{{--                                        <span class="btn-quantity plus-btn">+</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="tf-sticky-atc-btns">--}}
{{--                                    <a href="#shoppingCart" data-bs-toggle="modal"--}}
{{--                                       class="tf-btn w-100 btn-reset radius-4 btn-add-to-cart"><span--}}
{{--                                            class="text text-btn-uppercase">Add To Cart</span></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </section>
    <!-- /Product_Main -->

    <!-- Product_Description_Accordion -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="accordion-content tab-policies fix-font">
                        {!! $product->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Product_Description_Accordion -->

    <!-- Ralated Products -->
    @if(!empty($products->count()))
        <section class="flat-spacing">
            <div class="container flat-animate-tab">
                <ul class="tab-product justify-content-sm-center wow fadeInUp" data-wow-delay="0s" role="tablist">
                    <li class="nav-tab-item" role="presentation">
                        <a href="#ralatedProducts" class="active" data-bs-toggle="tab">Sản phẩm nổi bật</a>
                    </li>
    {{--                <li class="nav-tab-item" role="presentation">--}}
    {{--                    <a href="#recentlyViewed" data-bs-toggle="tab">Recently Viewed</a>--}}
    {{--                </li>--}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="ralatedProducts" role="tabpanel">
                        <div dir="ltr" class="swiper tf-sw-latest" data-preview="4" data-tablet="3" data-mobile="2"
                             data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1"
                             data-pagination-md="1" data-pagination-lg="1">
                            <div class="swiper-wrapper">
                                @foreach($products as $product)
                                    <div class="swiper-slide">
                                        @include('components.item-product', ["product" => $product, 'is_grid' => true])
                                    </div>
                                @endforeach
                            </div>
                            <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif
    <!-- /Ralated Products -->
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/drift.min.js') }}"></script>
    <script type="module" src="{{ asset('js/model-viewer.min.js') }}"></script>
    <script type="module" src="{{ asset('js/zoom.js') }}"></script>
    <script>
        $(document).ready(function() {
            @foreach($product->productColors as $i => $_color)
                {
                    let swiper = new Swiper(".mySwiperThumb{{$i}}", {
                        // loop: true,
                        spaceBetween: 15,
                        slidesPerView: 6,
                        freeMode: true,
                        watchSlidesProgress: true,
                    })
                    let swiper2 = new Swiper(".mySwiper{{$i}}", {
                        spaceBetween: 0,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                        thumbs: {
                            swiper: swiper,
                        },
                    });
                }
            @endforeach

            $('.-swiperslide.stagger-item.color-btn').click(function() {
                let _val = $(this).attr('data-value');
                $('.slider').attr('style', 'display:none;');
                if ($(`.slider[data-color="${_val}"]`).length > 0) {
                    $(`.slider[data-color="${_val}"]`).attr('style', 'display:block;');
                }
            })
        });


    </script>
@endsection
