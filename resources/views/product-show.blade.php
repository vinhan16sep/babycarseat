@extends('layouts.app')

@section('meta_title', $product->meta_title ?? $product->title)

@section('meta_keywords', $product->meta_keywords ?? '')
@section('meta_description', $product->meta_description ?? '')
@section('meta_description', ($product->meta_description ?? Str::limit(cleanHtmlContent($product->description), 150)))
@section('meta_robots', $product->meta_robots ?? 'index, follow')
@section('canonical_url', $product->canonical_url ?? route('detail-new', ['slug' => $product->slug]))
@section('og_title', $product->og_title ?? $product->title)
@section('og_description', $product->og_description ?? $product->meta_description ?? '')

@section('meta_image', $product->image)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/drift-basic.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/photoswipe.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/detail.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/detail_product.css?v=' . ($ver ?? '')) }}">

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
    <!-- <div class="tf-breadcrumb">
        <div class="container">
            <div class="tf-breadcrumb-wrap">
                <div class="tf-breadcrumb-list">
                    <a href="{{ url('/') }}" class="text text-caption-1">Trang chủ</a>
                    <i class="icon icon-arrRight"></i>
                    <a href="#" class="text text-caption-1">Sản phẩm</a>
                </div>
            </div>
        </div>
    </div> -->
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
                    <a class="link" href="{{ route('product-index', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                </div>
                <div class="text-caption-1 text-secondary-2">Green</div> <!--color-->
                <div class="text-title">
                    @if(!empty($product->discount_value))
                        {{ numberFormat($product->discount_value) }} VNĐ
                        <span> <del>{{ numberFormat($product->price) }} VNĐ</del> </span>
                    @else
                        {{ numberFormat($product->price) }} VNĐ
                    @endif
                </div>
            </div>
        </div>
        <a href="shopping-cart.html" class="tf-btn w-100 btn-fill radius-4"><span class="text text-btn-uppercase">View cart</span></a>
    </div>
    <!-- /tf-add-cart-success -->


    <!-- Product_Main -->
    <section class="flat-spacing" style="padding-top: 2px">
        <div class="tf-main-product section-image-zoom">
            <div class="container-fluid">
                <div class="row" style="margin: 0;">
                    <!-- Product default -->
                    <div class="col-md-6 w-md-53">
                        <div class="tf-product-media-wrap sticky-top" style="overflow: hidden;margin-left: 4vw;">
                            @foreach($product->productColors as $i => $_color)
                                <section class="slider slider{{$i}}" {!! $i !== 0 ? 'style="display:none"' : ''  !!} data-color="{{ $_color->color->name }}">
                                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper{{$i}}">
                                        <div class="swiper-wrapper">
                                            @foreach($_color->image as $_image)
                                                <div class="swiper-slide" data-color="{{ $_color->color->name }}">
                                                    <a target="_blank" class="slider__image"
                                                       >
                                                        <img class="tf-image-zoom lazyload"
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
                                                    <div class="slider__image" style="">
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
                    <div class="col-md-6 w-md-47">
                        <div class="tf-product-info-wrap position-relative">
                            <div class="tf-zoom-main"></div>
                            <div class="tf-product-info-list other-image-zoom">
                                <div class="tf-product-info-heading" style="border-bottom: 0">

                                    <div class="tf-product-info-name">
{{--                                        <div class="text text-btn-uppercase">Clothing</div>--}}
                                        <h3 class="name">{{ $product->name }}</h3>
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-values" id="color-picker">
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
                                    </div>

                                    <div class="tf-product-info-desc">
                                        <div class="tf-product-info-price" >
                                            <h5 class="price-on-sale">
                                                @if(!empty($product->discount_value))
                                                    <span>Giá gốc <del style="color: #374ea1;">{{ numberFormat($product->price) }} VNĐ</del> </span> | {{ numberFormat($product->discount_value) }} VNĐ
                                                @else
                                                    <span>Giá {{ numberFormat($product->price) }} VNĐ </span>
                                                @endif
                                            </h5>
                                        </div>
                                        <div class="box-description">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-product-info-choose-option">
                                    <!-- @if($product->notes->count() > 0)
                                        <div class="product-ksp">
                                            @foreach($product->notes as $_note)
                                                <div class="product-ksp__box">
                                                    <img class="product-ksp__img" src="{{ !empty($_note->image) ? getImage($_note->image) : asset('images/note-default.png') }}" alt="i-Size logo">
                                                    <span class="product-ksp__text joie-regular-text">{{ $_note->name }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif -->

                                    <!-- <div class="product-options-bottom">
                                        <div class="fieldset">
                                            <div class="actions">
                                                <a href="https://joiebaby.com/en/store-locator" title="Find your local shop" class="joie-button-secondary" style="width: 100%; text-align: center;">
                                                    Find your local shop            </a>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="tf-product-info-quantity">
                                        <div class="title mb_12">Quantity:</div>
                                        <div class="wg-quantity">
                                            <span class="btn-quantity btn-decrease">-</span>
                                            <input class="quantity-product" type="text" name="number" value="1">
                                            <span class="btn-quantity btn-increase">+</span>
                                        </div>
                                    </div>
                                    <div >
                                        <div class="tf-product-info-by-btn mb_10">
                                            <a data-bs-toggle="modal"
                                               class="d-none btn-style-2 flex-grow-1 text-btn-uppercase fw-6 btn-add-to-cart add-to-card" data-id="{{ $product->id }}"><span>Add to cart -&nbsp;</span><span
                                                    class="tf-qty-price total-price">
                                                    @if(!empty($product->discount_value))
                                                        {{ numberFormat($product->discount_value) }} VNĐ
                                                        <span> <del>{{ numberFormat($product->price) }} VNĐ</del> </span>
                                                    @else
                                                        {{ numberFormat($product->price) }} VNĐ
                                                    @endif
                                                </span></a>
                                        </div>
                                        <a class="btn-style-3 text-btn-uppercase add-to-card" data-id="{{ $product->id }}">Mua ngay</a>
                                    </div>
                                    <div class="tf-product-info-help">
                                        <ul class="accordion-product-wrap" id="accordion-product">
                                            <li class="accordion-product-item">
                                                    <a href="#accordion-8" class="accordion-title collapsed current" data-bs-toggle="collapse"
                                                    aria-expanded="true" aria-controls="accordion-1">
                                                        <h6>Tính năng</h6>
                                                         <span class="btn-open-sub-detail">
                                                            <i class="bi bi-chevron-down"></i>
                                                            <i class="bi bi-dash-lg"></i>
                                                        </span>
                                                    </a>
                                                    <div id="accordion-8" class="collapse" data-bs-parent="#accordion-product">
                                                        <div class="accordion-content tab-description fix-font">
                                                            <p class="text-secondary">
                                                                {!! $product->specification !!}
                                                            </p>
                                                        </div>
                                                    </div>
                                            </li>
                                            <li class="accordion-product-item">
                                                <a href="#accordion-9" class="accordion-title collapsed current" data-bs-toggle="collapse"
                                                   aria-expanded="true" aria-controls="accordion-1">
                                                    <h6>Thông số</h6>
                                                    <span class="btn-open-sub-detail">
                                                            <i class="bi bi-chevron-down"></i>
                                                            <i class="bi bi-dash-lg"></i>
                                                        </span>
                                                </a>
                                                <div id="accordion-9" class="collapse" data-bs-parent="#accordion-product">
                                                    <div class="accordion-content tab-description fix-font">
                                                        <p class="text-secondary">
                                                            {!! $product->detail !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="accordion-product-item">
                                                <a href="#accordion-10" class="accordion-title collapsed current" data-bs-toggle="collapse"
                                                   aria-expanded="true" aria-controls="accordion-1">
                                                    <h6>Hướng dẫn sử dụng</h6>
                                                    <span class="btn-open-sub-detail">
                                                        <i class="bi bi-chevron-down"></i>
                                                        <i class="bi bi-dash-lg"></i>
                                                    </span>
                                                </a>
                                                <div id="accordion-10" class="collapse" data-bs-parent="#accordion-product">
                                                    <div class="accordion-content tab-description fix-font">
                                                        <!-- {!! $product->guide !!} -->
                                                        @if($productFiles->where('type', 1)->isNotEmpty())
                                                            <p class="text-secondary">File hướng dẫn sử dụng:</p>
                                                            @foreach($productFiles->where('type', 1) as $item)
                                                                <a href="{{ route('publish.product_files.view', ['id' => $item->id, 'filename' => $item->file_name]) }}" target="_blank" style="text-decoration: underline;">
                                                                    {{ $item->file_name }}
                                                                </a>
                                                                </br>
                                                            @endforeach
                                                        @endif
                                                        @if($productFiles->where('type', 2)->isNotEmpty())
                                                            <p class="text-secondary">File chứng nhận sản phẩm:</p>
                                                            @foreach($productFiles->where('type', 2) as $item)
                                                                <a href="{{ route('publish.product_files.view', ['id' => $item->id, 'filename' => $item->file_name]) }}" target="_blank" style="text-decoration: underline;">
                                                                    {{ $item->file_name }}
                                                                </a>
                                                                </br>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- <li class="accordion-product-item">
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
                                            </li> -->
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

    </section>
    <!-- /Product_Main -->

    <!-- Product_Description_Accordion -->
    <!-- <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="accordion-content tab-policies fix-font">
                        {!! $product->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- /Product_Description_Accordion -->

    <!-- <section class="flat-spacing home-padding">
        <div class="container-fluid">
            <div dir="ltr" class="swiper tf-sw-latest" data-preview="6" data-tablet="3" data-mobile="1"
                 data-space-lg="15" data-space-md="30" data-space="15" data-pagination="1" data-center="0" data-pagination-md="1"
                 data-pagination-lg="1">
                <div class="swiper-wrapper">
                    @if(isset($featuresUPPER) && $featuresUPPER->isNotEmpty())
                        @foreach($featuresUPPER as $_featuresUPPER)
                            <div class="swiper-slide" style="margin: 0 15px;">
                                <div class="card-product wow fadeInUp" data-wow-delay="0s">
                                    <div class="card-product-wrapper">
                                            <img class="lazyload img-product"
                                                 data-src="{{ getImage($_featuresUPPER->image) }}"
                                                 src="{{ getImage($_featuresUPPER->image) }}" alt="{{ $_featuresUPPER->name }}">
                                            <img class="lazyload img-hover" data-src="{{ getImage($_featuresUPPER->image) }}"
                                                 src="{{ getImage($_featuresUPPER->image) }}" alt="{{ $_featuresUPPER->name }}">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <p class="product-title">{{ $_featuresUPPER->title }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No products available.</p>
                    @endif
                </div>
                <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
            </div>
        </div>
    </section> -->



    <!-- Collection -->
     <!-- <section class="flat-spacing bg-css"> -->
    <section class="flat-spacing">
        <div class="container-fluid" style="max-width: 1650px;">
            <!-- <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading" style="font-weight: 400">i-Harbour's features</h3>
            </div> -->
            <div class="flat-sw-navigation wow fadeInUp" data-wow-delay="0.1s">
                @if(!empty($attributes[\App\Http\Controllers\ProductController::TYPE_UPPER]))
                    <div dir="ltr" class="swiper tf-sw-collection" data-preview="4" data-tablet="3" data-mobile-sm="2"
                         data-mobile="1" data-space-lg="30" data-loop="{{ $attributes[\App\Http\Controllers\ProductController::TYPE_UPPER]->count() < 3 ? 1 : 0 }}" data-space-md="15" data-space="15" data-pagination="1"
                         data-pagination-md="5" data-pagination-lg="4">
                        <div class="swiper-wrapper">
                            <!-- item 1 -->
                            @foreach($attributes[\App\Http\Controllers\ProductController::TYPE_UPPER] as $_item)
                                <div class="swiper-slide">
                                    <div class="collection-position-2 style-7 hover-img">
                                        <a href="shop-collection.html" class="img-style">
                                            <img class="lazyload" data-src="{{ getImage($_item->image) }}"
                                                 src="{{ getImage($_item->image) }}" alt="banner-cls">
                                        </a>
                                        <div class="signature-sprint__card-html">
                                            <div class="signature-sprint__card-title">{{ $_item->title }}</div>
                                            <div class="signature-sprint__card-subtitle">{!! $_item->sub_title !!}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div style="display: none !important;" class="d-flex d-lg-none sw-pagination-collection sw-dots type-circle justify-content-center"></div>
                    </div>
                    <div style="display: none !important;" class="nav-prev-collection d-none d-lg-flex nav-sw style-line nav-sw-left"><i
                            class="icon icon-arrLeft"></i></div>
                    <div style="display: none !important;" class="nav-next-collection d-none d-lg-flex nav-sw style-line nav-sw-right"><i
                            class="icon icon-arrRight"></i></div>
                @endif
            </div>
        </div>
    </section>
    <!-- /Collection -->

    <section class="flat-spacing" style="padding-top: 0px">
        <div class="container-fluid" style="max-width: 1650px;">
            <div class="flat-sw-navigation box-product-common__row wow fadeInUp" data-wow-delay="0.1s">

                @if(!empty($attributes[\App\Http\Controllers\ProductController::TYPE_LOWER]))
                    @foreach($attributes[\App\Http\Controllers\ProductController::TYPE_LOWER] as $_item)
                        <div class="product-common__row ">
                            <div class="signature-contentblock {{ $loop->index%2 == 0 ? 'signature-contentblock--reverse' : 'unreverse' }}">
                                <div class="signature-contentblock__image">
                                    <img class="product-marketing__img" src="{{ getImage($_item->image) }}" alt="">
                                </div>
                                <div class="signature-contentblock__html">
                                    <div class="signature-contentblock__description">
                                        <div class="signature-contentblock__subtitle">{{ $_item->sub_title }}</div>
                                        <div class="signature-contentblock__title">{{ $_item->title }}</div>
                                        <div class="signature-contentblock__content">{!! $_item->content !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    @include('components.last-page', ['is_not_show' => true, 'is_border' => false])

    <section class="flat-spacing home-padding" style="background:#f2f2f2">
        <div class="container-fluid" style="padding: 0;">
            <div dir="ltr" class="swiper tf-sw-latest" data-preview="6" data-tablet="3" data-mobile="1"
                 data-space-lg="15" data-space-md="30" data-space="15" data-pagination="1" data-center="0" data-pagination-md="1"
                 data-pagination-lg="1">
                <div class="swiper-wrapper" style="background:unset;">
                    @if(isset($products) && $products->isNotEmpty())
                        @foreach($products as $_product)
                            <div class="swiper-slide" style="background: unset">
                                <div class="card-product wow fadeInUp" data-wow-delay="0s" style="background:unset;">
                                    <div class="card-product-wrapper">
                                        @if ($_product->categories->isNotEmpty())
                                            <a href="{{ route('product-index', ['category_slug' => $_product->categories->first()->slug, 'slug' => $_product->slug]) }}" class="product-img">
                                        @endif
                                            <img class="lazyload img-product"
                                                 data-src="{{ getImage($_product->image) }}"
                                                 src="{{ getImage($_product->image) }}" alt="{{ $_product->name }}">
                                            <img class="lazyload img-hover" data-src="{{ getImage($_product->image) }}"
                                                 src="{{ getImage($_product->image) }}" alt="{{ $_product->name }}">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="{{ route('product-index', ['category_slug' => $_product->categories->first() ? $_product->categories->first()->slug : '', 'slug' => $_product->slug]) }}">
                                            <p class="product-title">{{ str_replace("BABYRO ", "", strtoupper($_product->name)) }}</p>
                                            <p class="product-desc">{{ $_product->note }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No products available.</p>
                    @endif
                </div>
                <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
            </div>
        </div>
    </section>

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
