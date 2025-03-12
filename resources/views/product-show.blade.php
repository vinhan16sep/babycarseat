@extends('layouts.app')

@section('meta_title', 'product name')
@section('meta_keyword', 'product name')
@section('meta_description', 'product name')
@section('meta_image', 'product image')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/drift-basic.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/photoswipe.css') }}" />
@stop

@section('content')
    <!-- breadcrumb -->
    <div class="tf-breadcrumb">
        <div class="container">
            <div class="tf-breadcrumb-wrap">
                <div class="tf-breadcrumb-list">
                    <a href="index.html" class="text text-caption-1">Homepage</a>
                    <i class="icon icon-arrRight"></i>
                    <a href="#" class="text text-caption-1">Women</a>
                    <i class="icon icon-arrRight"></i>
                    <span class="text text-caption-1">Leather boots with tall leg</span>
                </div>
                <div class="tf-breadcrumb-prev-next">
                    <a href="product-bottom-thumbnails.html" class="tf-breadcrumb-prev">
                        <i class="icon icon-arrLeft"></i>
                    </a>
                    <a href="product-bottom-thumbnails.html" class="tf-breadcrumb-back">
                        <i class="icon icon-squares-four"></i>
                    </a>
                    <a href="product-bottom-thumbnails.html" class="tf-breadcrumb-next">
                        <i class="icon icon-arrRight"></i>
                    </a>
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
                    <a class="link" href="product-detail.html">Biker-style leggings</a>
                </div>
                <div class="text-caption-1 text-secondary-2">Green, XS, Cotton</div>
                <div class="text-title">$68.00</div>
            </div>
        </div>
        <a href="shopping-cart.html" class="tf-btn w-100 btn-fill radius-4"><span class="text text-btn-uppercase">View cart</span></a>
    </div>
    <!-- /tf-add-cart-success -->

    <!-- Product_Main -->
    <section class="flat-spacing">
        <div class="tf-main-product section-image-zoom">
            <div class="container">
                <div class="row">
                    <!-- Product default -->
                    <div class="col-md-6">
                        <div class="tf-product-media-wrap sticky-top">
                            <div class="thumbs-slider">
                                <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom"
                                     data-direction="vertical">
                                    <div class="swiper-wrapper stagger-wrap">
                                        <div class="swiper-slide stagger-item" data-color="gray">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-3.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-3.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide stagger-item" data-color="gray">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-1.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-1.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide stagger-item" data-color="gray">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-2.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-2.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide stagger-item" data-color="gray">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-5.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-5.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide stagger-item" data-color="beige">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-6.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-6.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide stagger-item" data-color="beige">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-7.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-7.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide stagger-item" data-color="beige">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-7.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-7.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide stagger-item" data-color="grey">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-23.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-23.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide stagger-item" data-color="grey">
                                            <div class="item">
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-24.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-24.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide" data-color="gray">
                                            <a href="images/products/womens/women-3.jpg" target="_blank" class="item"
                                               data-pswp-width="600px" data-pswp-height="800px">
                                                <img class="tf-image-zoom lazyload"
                                                     data-zoom="images/products/womens/women-3.jpg"
                                                     data-src="{{ asset('images/products/womens/women-3.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-3.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide" data-color="gray">
                                            <a href="images/products/womens/women-1.jpg" target="_blank" class="item"
                                               data-pswp-width="600px" data-pswp-height="800px">
                                                <img class="tf-image-zoom lazyload"
                                                     data-zoom="images/products/womens/women-1.jpg"
                                                     data-src="{{ asset('images/products/womens/women-1.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-1.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide" data-color="gray">
                                            <a href="images/products/womens/women-2.jpg" target="_blank" class="item"
                                               data-pswp-width="600px" data-pswp-height="800px">
                                                <img class="tf-image-zoom lazyload"
                                                     data-zoom="images/products/womens/women-2.jpg"
                                                     data-src="{{ asset('images/products/womens/women-2.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-2.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide" data-color="gray">
                                            <a href="images/products/womens/women-5.jpg" target="_blank" class="item"
                                               data-pswp-width="600px" data-pswp-height="800px">
                                                <img class="tf-image-zoom lazyload"
                                                     data-zoom="images/products/womens/women-5.jpg"
                                                     data-src="{{ asset('images/products/womens/women-5.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-5.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide" data-color="beige">
                                            <a href="images/products/womens/women-6.jpg" target="_blank" class="item"
                                               data-pswp-width="600px" data-pswp-height="800px">
                                                <img class="tf-image-zoom lazyload"
                                                     data-zoom="images/products/womens/women-6.jpg"
                                                     data-src="{{ asset('images/products/womens/women-6.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-6.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide" data-color="beige">
                                            <a href="images/products/womens/women-7.jpg" target="_blank" class="item"
                                               data-pswp-width="600px" data-pswp-height="800px">
                                                <img class="tf-image-zoom lazyload"
                                                     data-zoom="images/products/womens/women-7.jpg"
                                                     data-src="{{ asset('images/products/womens/women-7.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-7.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide" data-color="beige">
                                            <a href="images/products/womens/women-7.jpg" target="_blank" class="item"
                                               data-pswp-width="600px" data-pswp-height="800px">
                                                <img class="tf-image-zoom lazyload"
                                                     data-zoom="images/products/womens/women-7.jpg"
                                                     data-src="{{ asset('images/products/womens/women-7.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-7.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide" data-color="grey">
                                            <a href="images/products/womens/women-23.jpg" target="_blank" class="item"
                                               data-pswp-width="600px" data-pswp-height="800px">
                                                <img class="tf-image-zoom lazyload"
                                                     data-zoom="images/products/womens/women-23.jpg"
                                                     data-src="{{ asset('images/products/womens/women-23.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-23.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide" data-color="grey">
                                            <a href="images/products/womens/women-24.jpg" target="_blank" class="item"
                                               data-pswp-width="600px" data-pswp-height="800px">
                                                <img class="tf-image-zoom lazyload"
                                                     data-zoom="images/products/womens/women-24.jpg"
                                                     data-src="{{ asset('images/products/womens/women-24.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-24.jpg') }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <div class="text text-btn-uppercase">Clothing</div>
                                        <h3 class="name">Stretch Strap Top</h3>
                                        <div class="sub">
                                            <div class="tf-product-info-rate">
                                                <div class="list-star">
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                </div>
                                                <div class="text text-caption-1">(134 reviews)</div>
                                            </div>
                                            <div class="tf-product-info-sold">
                                                <i class="icon icon-lightning"></i>
                                                <div class="text text-caption-1">18 sold in last 32 hours</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-desc">
                                        <div class="tf-product-info-price">
                                            <h5 class="price-on-sale font-2">$79.99</h5>
                                            <div class="compare-at-price font-2">$98.99</div>
                                            <div class="badges-on-sale text-btn-uppercase">
                                                -25%
                                            </div>
                                        </div>
                                        <p>The garments labelled as Committed are products that have been produced using
                                            sustainable fibres or processes, reducing their environmental impact.</p>
                                        <div class="tf-product-info-liveview">
                                            <i class="icon icon-eye"></i>
                                            <p class="text-caption-1"><span class="liveview-count">28</span> people are
                                                viewing this right now</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-product-info-choose-option">
                                    <div class="variant-picker-item">
                                        <div class="variant-picker-label mb_12">
                                            Colors:<span
                                                class="text-title variant-picker-label-value value-currentColor">Gray</span>
                                        </div>
                                        <div class="variant-picker-values">
                                            <input id="values-beige" type="radio" name="color1">
                                            <label class="hover-tooltip tooltip-bot radius-60 color-btn"
                                                   for="values-beige" data-value="Beige" data-color="beige">
                                                <span class="btn-checkbox bg-color-beige1"></span>
                                                <span class="tooltip">Beige</span>
                                            </label>
                                            <input id="values-gray" type="radio" name="color1" checked>
                                            <label class="hover-tooltip tooltip-bot radius-60 color-btn"
                                                   data-price="79.99" for="values-gray" data-value="Gray"
                                                   data-color="gray">
                                                <span class="btn-checkbox bg-color-gray"></span>
                                                <span class="tooltip">Gray</span>
                                            </label>
                                            <input id="values-grey" type="radio" name="color1">
                                            <label class="hover-tooltip tooltip-bot radius-60 color-btn"
                                                   data-price="89.99" for="values-grey" data-value="Grey"
                                                   data-color="grey">
                                                <span class="btn-checkbox bg-color-grey"></span>
                                                <span class="tooltip">Grey</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="variant-picker-item">
                                        <div class="d-flex justify-content-between mb_12">
                                            <div class="variant-picker-label">
                                                Size:<span class="text-title variant-picker-label-value">L</span>
                                            </div>
                                        </div>
                                        <div class="variant-picker-values gap12">
                                            <input type="radio" name="size1" id="values-s">
                                            <label class="style-text size-btn" for="values-s" data-value="S"
                                                   data-price="79.99">
                                                <span class="text-title">S</span>
                                            </label>
                                            <input type="radio" name="size1" id="values-m">
                                            <label class="style-text size-btn" for="values-m" data-value="M"
                                                   data-price="79.99">
                                                <span class="text-title">M</span>
                                            </label>
                                            <input type="radio" name="size1" id="values-l" checked>
                                            <label class="style-text size-btn" for="values-l" data-value="L"
                                                   data-price="89.99">
                                                <span class="text-title">L</span>
                                            </label>
                                            <input type="radio" name="size1" id="values-xl">
                                            <label class="style-text size-btn" for="values-xl" data-value="XL"
                                                   data-price="89.99">
                                                <span class="text-title">XL</span>
                                            </label>
                                            <input type="radio" name="size1" id="values-xxl">
                                            <label class="style-text size-btn type-disable" for="values-xxl"
                                                   data-value="XXL" data-price="89.99">
                                                <span class="text-title">XXL</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="tf-product-info-quantity">
                                        <div class="title mb_12">Quantity:</div>
                                        <div class="wg-quantity">
                                            <span class="btn-quantity btn-decrease">-</span>
                                            <input class="quantity-product" type="text" name="number" value="1">
                                            <span class="btn-quantity btn-increase">+</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="tf-product-info-by-btn mb_10">
                                            <a href="#shoppingCart" data-bs-toggle="modal"
                                               class="btn-style-2 flex-grow-1 text-btn-uppercase fw-6 btn-add-to-cart"><span>Add to cart -&nbsp;</span><span
                                                    class="tf-qty-price total-price">$79.99</span></a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                               class="box-icon hover-tooltip compare btn-icon-action">
                                                <span class="icon icon-gitDiff"></span>
                                                <span class="tooltip text-caption-2">Compare</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                               class="box-icon hover-tooltip text-caption-2 wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip text-caption-2">Wishlist</span>
                                            </a>
                                        </div>
                                        <a href="#" class="btn-style-3 text-btn-uppercase">Buy it now</a>
                                    </div>
                                    <div class="tf-product-info-help">
                                        <ul class="accordion-product-wrap" id="accordion-product">
                                            <li class="accordion-product-item">
                                                <a href="#accordion-7" class="accordion-title collapsed current" data-bs-toggle="collapse"
                                                   aria-expanded="true" aria-controls="accordion-1">
                                                    <h6>Product Detail</h6>
                                                    <span class="btn-open-sub"></span>
                                                </a>
                                                <div id="accordion-7" class="collapse" data-bs-parent="#accordion-product">
                                                    <div class="accordion-content tab-description">
                                                        <p class="text-secondary">Thick knitted fabric. Short design. Straight design.
                                                            Rounded neck. Sleeveless. Straps. Unclosed. Cable knit finish. Co-ord.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="accordion-product-item">
                                                <a href="#accordion-8" class="accordion-title collapsed current" data-bs-toggle="collapse"
                                                   aria-expanded="true" aria-controls="accordion-1">
                                                    <h6>Specifications</h6>
                                                    <span class="btn-open-sub"></span>
                                                </a>
                                                <div id="accordion-8" class="collapse" data-bs-parent="#accordion-product">
                                                    <div class="accordion-content tab-description">
                                                        <p class="text-secondary">Thick knitted fabric. Short design. Straight design.
                                                            Rounded neck. Sleeveless. Straps. Unclosed. Cable knit finish. Co-ord.</p>
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
                                                    <div class="accordion-content tab-description">
                                                        <p class="text-secondary">Thick knitted fabric. Short design. Straight design.
                                                            Rounded neck. Sleeveless. Straps. Unclosed. Cable knit finish. Co-ord.</p>
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
        <div class="tf-sticky-btn-atc">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form class="form-sticky-atc">
                            <div class="tf-sticky-atc-product">
                                <div class="image">
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-3.jpg') }}" alt=""
                                         src="{{ asset('images/products/womens/women-3.jpg') }}">
                                </div>
                                <div class="content">
                                    <div class="text-title">
                                        Biker-style leggings
                                    </div>
                                    <div class="text-caption-1 text-secondary-2">Green, XS, Cotton</div>
                                    <div class="text-title">$68.00</div>
                                </div>
                            </div>
                            <div class="tf-sticky-atc-infos">
                                <div class="tf-sticky-atc-size d-flex gap-12 align-items-center">
                                    <div class="tf-sticky-atc-infos-title text-title">Size:</div>
                                    <div class="tf-dropdown-sort style-2" data-bs-toggle="dropdown">
                                        <div class="btn-select">
                                            <span class="text-sort-value font-2">M</span>
                                            <span class="icon icon-arrow-down"></span>
                                        </div>
                                        <div class="dropdown-menu">
                                            <div class="select-item">
                                                <span class="text-value-item">S</span>
                                            </div>
                                            <div class="select-item active">
                                                <span class="text-value-item">M</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">L</span>
                                            </div>
                                            <div class="select-item">
                                                <span class="text-value-item">XL</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sticky-atc-quantity d-flex gap-12 align-items-center">
                                    <div class="tf-sticky-atc-infos-title text-title">Quantity:</div>
                                    <div class="wg-quantity style-1">
                                        <span class="btn-quantity minus-btn">-</span>
                                        <input type="text" name="number" value="1">
                                        <span class="btn-quantity plus-btn">+</span>
                                    </div>
                                </div>
                                <div class="tf-sticky-atc-btns">
                                    <a href="#shoppingCart" data-bs-toggle="modal"
                                       class="tf-btn w-100 btn-reset radius-4 btn-add-to-cart"><span
                                            class="text text-btn-uppercase">Add To Cart</span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Product_Main -->

    <!-- Product_Description_Accordion -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="accordion-content tab-policies">
                        <div class="text-btn-uppercase mb_12">Return Policies</div>
                        <p class="mb_12 text-secondary">At Modave, we stand behind the quality of our
                            products. If you're not completely satisfied with your purchase, we offer
                            hassle-free returns within 30 days of delivery.</p>
                        <div class="text-btn-uppercase mb_12">Easy Exchanges or Refunds</div>
                        <ul class="list-text type-disc mb_12 gap-6">
                            <li class="text-secondary">Exchange your item for a different size, color, or
                                style, or receive a full refund.
                            </li>
                            <li class="text-secondary">All returned items must be unworn, in their original
                                packaging, and with tags attached.
                            </li>
                        </ul>
                        <div class="text-btn-uppercase mb_12">Simple Process</div>
                        <ul class="list-text type-number mb_12 gap-6">
                            <li class="text-secondary">Initiate your return online or contact our customer
                                service team for assistance.
                            </li>
                            <li class="text-secondary">Pack your item securely and include the original
                                packing slip.
                            </li>
                            <li class="text-secondary">Ship your return back to us using our prepaid
                                shipping label.
                            </li>
                            <li class="text-secondary">Once received, your refund will be processed
                                promptly.
                            </li>
                        </ul>
                        <p class="text-secondary">For any questions or concerns regarding returns, don't
                            hesitate to reach out to our dedicated customer service team. Your satisfaction
                            is our priority.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Product_Description_Accordion -->

    <!-- Ralated Products -->
    <section class="flat-spacing">
        <div class="container flat-animate-tab">
            <ul class="tab-product justify-content-sm-center wow fadeInUp" data-wow-delay="0s" role="tablist">
                <li class="nav-tab-item" role="presentation">
                    <a href="#ralatedProducts" class="active" data-bs-toggle="tab">Ralated Products</a>
                </li>
                <li class="nav-tab-item" role="presentation">
                    <a href="#recentlyViewed" data-bs-toggle="tab">Recently Viewed</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active show" id="ralatedProducts" role="tabpanel">
                    <div dir="ltr" class="swiper tf-sw-latest" data-preview="4" data-tablet="3" data-mobile="2"
                         data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1"
                         data-pagination-md="1" data-pagination-lg="1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="{{ asset('images/products/womens/women-19.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-19.jpg') }}" alt="image-product">
                                            <img class="lazyload img-hover"
                                                 data-src="{{ asset('images/products/womens/women-20.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-20.jpg') }}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Wishlist</span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                               class="box-icon compare btn-icon-action">
                                                <span class="icon icon-gitDiff"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                            <a href="#quickView" data-bs-toggle="modal"
                                               class="box-icon quickview tf-btn-loading">
                                                <span class="icon icon-eye"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add
                                                To cart</a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">V-neck cotton T-shirt</a>
                                        <span class="price">$59.99</span>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="{{ asset('images/products/womens/women-176.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-176.jpg') }}" alt="image-product">
                                            <img class="lazyload img-hover"
                                                 data-src="{{ asset('images/products/womens/women-179.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-179.jpg') }}" alt="image-product">
                                        </a>
                                        <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                                        <div class="marquee-product bg-main">
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Wishlist</span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                               class="box-icon compare btn-icon-action">
                                                <span class="icon icon-gitDiff"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                            <a href="#quickView" data-bs-toggle="modal"
                                               class="box-icon quickview tf-btn-loading">
                                                <span class="icon icon-eye"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add
                                                To cart</a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Polarized sunglasses</a>
                                        <span class="price"><span class="old-price">$98.00</span> $79.99</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active line">
                                                <span class="swatch-value bg-light-blue"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-176.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-176.jpg') }}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="swatch-value bg-light-blue-2"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-177.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-177.jpg') }}" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-product card-product-size">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="{{ asset('images/products/womens/women-29.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-29.jpg') }}" alt="image-product">
                                            <img class="lazyload img-hover"
                                                 data-src="{{ asset('images/products/womens/women-30.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-30.jpg') }}" alt="image-product">
                                        </a>
                                        <div class="variant-wrap size-list">
                                            <ul class="variant-box">
                                                <li class="size-item">S</li>
                                                <li class="size-item">M</li>
                                                <li class="size-item">L</li>
                                                <li class="size-item">XL</li>
                                            </ul>
                                        </div>
                                        <div class="variant-wrap countdown-wrap">
                                            <div class="variant-box">
                                                <div class="js-countdown" data-timer="1007500"
                                                     data-labels="D :,H :,M :,S"></div>
                                            </div>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Wishlist</span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                               class="box-icon compare btn-icon-action">
                                                <span class="icon icon-gitDiff"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                            <a href="#quickView" data-bs-toggle="modal"
                                               class="box-icon quickview tf-btn-loading">
                                                <span class="icon icon-eye"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick
                                                Add</a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ramie shirt with pockets </a>
                                        <span class="price"><span class="old-price">$98.00</span> $89.99</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active line">
                                                <span class="swatch-value bg-light-orange"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-29.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-29.jpg') }}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="swatch-value bg-light-grey"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-33.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-33.jpg') }}" alt="image-product">
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="{{ asset('images/products/womens/women-1.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-1.jpg') }}" alt="image-product">
                                            <img class="lazyload img-hover"
                                                 data-src="{{ asset('images/products/womens/women-2.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-2.jpg') }}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Wishlist</span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                               class="box-icon compare btn-icon-action">
                                                <span class="icon icon-gitDiff"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                            <a href="#quickView" data-bs-toggle="modal"
                                               class="box-icon quickview tf-btn-loading">
                                                <span class="icon icon-eye"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add
                                                To cart</a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed cotton-blend top</a>
                                        <span class="price">$69.99</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active line">
                                                <span class="swatch-value bg-dark-grey"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-1.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-1.jpg') }}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="swatch-value bg-light-pink"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-2.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-2.jpg') }}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="swatch-value bg-dark-grey-2"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-3.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-3.jpg') }}" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
                    </div>
                </div>
                <div class="tab-pane" id="recentlyViewed" role="tabpanel">
                    <div dir="ltr" class="swiper tf-sw-recent" data-preview="4" data-tablet="3" data-mobile="2"
                         data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1"
                         data-pagination-md="1" data-pagination-lg="1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="{{ asset('images/products/womens/women-19.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-19.jpg') }}" alt="image-product">
                                            <img class="lazyload img-hover"
                                                 data-src="{{ asset('images/products/womens/women-20.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-20.jpg') }}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Wishlist</span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                               class="box-icon compare btn-icon-action">
                                                <span class="icon icon-gitDiff"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                            <a href="#quickView" data-bs-toggle="modal"
                                               class="box-icon quickview tf-btn-loading">
                                                <span class="icon icon-eye"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add
                                                To cart</a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">V-neck cotton T-shirt</a>
                                        <span class="price">$59.99</span>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="{{ asset('images/products/womens/women-176.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-176.jpg') }}" alt="image-product">
                                            <img class="lazyload img-hover"
                                                 data-src="{{ asset('images/products/womens/women-179.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-179.jpg') }}" alt="image-product">
                                        </a>
                                        <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                                        <div class="marquee-product bg-main">
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="marquee-wrapper">
                                                <div class="initial-child-container">
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale
                                                            25% OFF</p>
                                                    </div>
                                                    <div class="marquee-child-item">
                                                        <span class="icon icon-lightning text-critical"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Wishlist</span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                               class="box-icon compare btn-icon-action">
                                                <span class="icon icon-gitDiff"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                            <a href="#quickView" data-bs-toggle="modal"
                                               class="box-icon quickview tf-btn-loading">
                                                <span class="icon icon-eye"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add
                                                To cart</a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Polarized sunglasses</a>
                                        <span class="price"><span class="old-price">$98.00</span> $79.99</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active line">
                                                <span class="swatch-value bg-light-blue"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-176.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-176.jpg') }}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="swatch-value bg-light-blue-2"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-177.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-177.jpg') }}" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-product card-product-size">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="{{ asset('images/products/womens/women-29.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-29.jpg') }}" alt="image-product">
                                            <img class="lazyload img-hover"
                                                 data-src="{{ asset('images/products/womens/women-30.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-30.jpg') }}" alt="image-product">
                                        </a>
                                        <div class="variant-wrap size-list">
                                            <ul class="variant-box">
                                                <li class="size-item">S</li>
                                                <li class="size-item">M</li>
                                                <li class="size-item">L</li>
                                                <li class="size-item">XL</li>
                                            </ul>
                                        </div>
                                        <div class="variant-wrap countdown-wrap">
                                            <div class="variant-box">
                                                <div class="js-countdown" data-timer="1007500"
                                                     data-labels="D :,H :,M :,S"></div>
                                            </div>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Wishlist</span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                               class="box-icon compare btn-icon-action">
                                                <span class="icon icon-gitDiff"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                            <a href="#quickView" data-bs-toggle="modal"
                                               class="box-icon quickview tf-btn-loading">
                                                <span class="icon icon-eye"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick
                                                Add</a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ramie shirt with pockets </a>
                                        <span class="price"><span class="old-price">$98.00</span> $89.99</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active line">
                                                <span class="swatch-value bg-light-orange"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-29.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-29.jpg') }}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="swatch-value bg-light-grey"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-33.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-33.jpg') }}" alt="image-product">
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="{{ asset('images/products/womens/women-1.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-1.jpg') }}" alt="image-product">
                                            <img class="lazyload img-hover"
                                                 data-src="{{ asset('images/products/womens/women-2.jpg') }}"
                                                 src="{{ asset('images/products/womens/women-2.jpg') }}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Wishlist</span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                               class="box-icon compare btn-icon-action">
                                                <span class="icon icon-gitDiff"></span>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                            <a href="#quickView" data-bs-toggle="modal"
                                               class="box-icon quickview tf-btn-loading">
                                                <span class="icon icon-eye"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add
                                                To cart</a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed cotton-blend top</a>
                                        <span class="price">$69.99</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active line">
                                                <span class="swatch-value bg-dark-grey"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-1.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-1.jpg') }}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="swatch-value bg-light-pink"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-2.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-2.jpg') }}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="swatch-value bg-dark-grey-2"></span>
                                                <img class="lazyload" data-src="{{ asset('images/products/womens/women-3.jpg') }}"
                                                     src="{{ asset('images/products/womens/women-3.jpg') }}" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sw-pagination-recent sw-dots type-circle justify-content-center"></div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /Ralated Products -->
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/drift.min.js') }}"></script>
    <script type="module" src="{{ asset('js/model-viewer.min.js') }}"></script>
    <script type="module" src="{{ asset('js/zoom.js') }}"></script>
@endsection
