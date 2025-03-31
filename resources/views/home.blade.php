@extends('layouts.app')

@section('content')
    <!-- Slider -->
    <section class="tf-slideshow slider-default slider-effect-fade">
        <div dir="ltr" class="swiper tf-sw-slideshow" data-effect="fade" data-preview="1" data-tablet="1"
             data-mobile="1" data-centered="false" data-space="0" data-space-mb="0" data-loop="true"
             data-auto-play="true">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="wrap-slider">
                        <img src="images/slider/slider-decor1.jpg" alt="fashion-slideshow">
                        <div class="box-content">
                            <div class="content-slider">
                                <div class="box-title-slider">
                                    <div class="fade-item fade-item-1 heading title-display text-white">Wood and Stone
                                    </div>
                                    <p class="fade-item fade-item-2 body-text-1 text-white">Quick! Grab limited-time
                                        deals before they’re gone.</p>
                                </div>
                                <div class="fade-item fade-item-3 box-btn-slider">
                                    <a href="shop-default-grid.html" class="tf-btn btn-fill btn-white"><span
                                            class="text">Explore Collection</span><i class="icon icon-arrowUpRight"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="wrap-slider">
                        <img src="images/slider/slider-decor2.jpg" alt="fashion-slideshow">
                        <div class="box-content">
                            <div class="content-slider">
                                <div class="box-title-slider">
                                    <div class="fade-item fade-item-1 heading title-display text-white">Flash Sale
                                        Madness
                                    </div>
                                    <p class="fade-item fade-item-2 body-text-1 text-white">Quick! Grab limited-time
                                        deals before they’re gone.</p>
                                </div>
                                <div class="fade-item fade-item-3 box-btn-slider">
                                    <a href="shop-default-grid.html" class="tf-btn btn-fill btn-white"><span
                                            class="text">Explore Collection</span><i class="icon icon-arrowUpRight"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="wrap-slider">
                        <img src="images/slider/slider-decor3.jpg" alt="fashion-slideshow">
                        <div class="box-content">
                            <div class="content-slider">
                                <div class="box-title-slider">
                                    <div class="fade-item fade-item-1 heading title-display text-white">Best Furniture
                                    </div>
                                    <p class="fade-item fade-item-2 body-text-1 text-white">Quick! Grab limited-time
                                        deals before they’re gone.</p>
                                </div>
                                <div class="fade-item fade-item-3 box-btn-slider">
                                    <a href="shop-default-grid.html" class="tf-btn btn-fill btn-white"><span
                                            class="text">Explore Collection</span><i class="icon icon-arrowUpRight"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-pagination">
            <div class="container">
                <div class="sw-dots sw-pagination-slider type-circle white-circle-line justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Slider -->

    <!-- Collection -->
    <section class="flat-spacing">
        <div class="container-full2">
            <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading">Shop by Collections</h3>
                <p class="subheading">Browse our Top Trending: the hottest picks loved by all.</p>
            </div>
            <div class="flat-sw-navigation wow fadeInUp" data-wow-delay="0.1s">
                <div dir="ltr" class="swiper tf-sw-collection" data-preview="4" data-tablet="3" data-mobile-sm="2"
                     data-mobile="1" data-space-lg="30" data-space-md="15" data-space="15" data-pagination="1"
                     data-pagination-md="3" data-pagination-lg="4">
                    <div class="swiper-wrapper">
                        <!-- item 1 -->
                        <div class="swiper-slide">
                            <div class="collection-position-2 style-7 hover-img">
                                <a href="shop-collection.html" class="img-style">
                                    <img class="lazyload" data-src="images/collections/cls-decor1.jpg"
                                         src="images/collections/cls-decor1.jpg" alt="banner-cls">
                                </a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Shop
                                            Bathroom</a></h4>
                                    <span class="text-title text-white">25 products</span>
                                </div>
                            </div>
                        </div>
                        <!-- item 2 -->
                        <div class="swiper-slide">
                            <div class="collection-position-2 style-7 hover-img">
                                <a href="shop-collection.html" class="img-style">
                                    <img class="lazyload" data-src="images/collections/cls-decor2.jpg"
                                         src="images/collections/cls-decor2.jpg" alt="banner-cls">
                                </a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Shop
                                            Bathroom</a></h4>
                                    <span class="text-title text-white">25 products</span>
                                </div>
                            </div>
                        </div>
                        <!-- item 3 -->
                        <div class="swiper-slide">
                            <div class="collection-position-2 style-7 hover-img">
                                <a href="shop-collection.html" class="img-style">
                                    <img class="lazyload" data-src="images/collections/cls-decor3.jpg"
                                         src="images/collections/cls-decor3.jpg" alt="banner-cls">
                                </a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Shop
                                            Bedroom</a></h4>
                                    <span class="text-title text-white">25 products</span>
                                </div>
                            </div>
                        </div>
                        <!-- item 4 -->
                        <div class="swiper-slide">
                            <div class="collection-position-2 style-7 hover-img">
                                <a href="shop-collection.html" class="img-style">
                                    <img class="lazyload" data-src="images/collections/cls-decor4.jpg"
                                         src="images/collections/cls-decor4.jpg" alt="banner-cls">
                                </a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Shop
                                            Kitchen Room</a></h4>
                                    <span class="text-title text-white">25 products</span>
                                </div>
                            </div>
                        </div>
                        <!-- item 5 -->
                        <div class="swiper-slide">
                            <div class="collection-position-2 style-7 hover-img">
                                <a href="shop-collection.html" class="img-style">
                                    <img class="lazyload" data-src="images/collections/cls-decor1.jpg"
                                         src="images/collections/cls-decor1.jpg" alt="banner-cls">
                                </a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Shop Living
                                            Room</a></h4>
                                    <span class="text-title text-white">25 products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="d-flex d-lg-none sw-pagination-collection sw-dots type-circle justify-content-center"></div>
                </div>
                <div class="nav-prev-collection d-none d-lg-flex nav-sw style-line nav-sw-left"><i
                        class="icon icon-arrLeft"></i></div>
                <div class="nav-next-collection d-none d-lg-flex nav-sw style-line nav-sw-right"><i
                        class="icon icon-arrRight"></i></div>
            </div>
        </div>
    </section>
    <!-- /Collection -->

    <!-- List collection -->
    <section class="flat-spacing pt-0 line-bottom-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <ul class="list-collection style-lg">
                        <li class="cls-item hover-cursor-img">
                            <div class="img-cls">
                                <img src="images/collections/list-cls/cls-item-decor1.jpg" alt="img-cls">
                            </div>
                            <a href="#" class="title-cls link">
                                <h4 class="text title-display">Heritage</h4>
                            </a>
                        </li>
                        <li class="cls-item">
                            <div class="img-cls">
                                <img src="images/collections/list-cls/cls-item-decor2.jpg" alt="img-cls">
                            </div>
                            <a href="#" class="title-cls link">
                                <h4 class="text title-display">Creativity</h4>
                            </a>
                        </li>
                        <li class="cls-item">
                            <div class="img-cls">
                                <img src="images/collections/list-cls/cls-item-decor3.jpg" alt="img-cls">
                            </div>
                            <a href="#" class="title-cls link">
                                <h4 class="text title-display">and Passion</h4>
                            </a>
                        </li>
                        <li class="cls-item">
                            <a href="#" class="title-cls link d-none d-sm-block">
                                <h4 class="text title-display">of Three</h4>
                            </a>
                            <div class="img-cls">
                                <img src="images/collections/list-cls/cls-item-decor4.jpg" alt="img-cls">
                            </div>
                            <a href="#" class="title-cls link">
                                <h4 class="text title-display">Generations</h4>
                            </a>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="#" class="btn-line text-button">READ MORE ABOUT OUR COMMITMENT</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /List collection -->

    <!-- Top picks -->
    <section class="flat-spacing">
        <div class="container">
            <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading">Top Trending</h3>
                <p class="subheading text-secondary">Browse our Top Trending: the hottest picks loved by all. </p>
            </div>
            <div dir="ltr" class="swiper tf-sw-latest" data-preview="4" data-tablet="3" data-mobile="2"
                 data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1"
                 data-pagination-lg="1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/furniture1.jpg"
                                         src="images/products/furniture/furniture1.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/furniture3.jpg"
                                         src="images/products/furniture/furniture3.jpg" alt="image-product">
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
                                    <a class="btn-main-product add-to-card" data-id="9" data-product-color-id="2">Add To cart</a>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <a href="product-detail.html" class="title link">Salamanca dusty rose Leeds fabric</a>
                                <span class="price"><span class="old-price">$98.00</span> $79.99</span>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active line">
                                        <span class="swatch-value bg-light-blue"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture1.jpg"
                                             src="images/products/furniture/furniture1.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="swatch-value bg-light-blue-2"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture2.jpg"
                                             src="images/products/furniture/furniture2.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/furniture6.jpg"
                                         src="images/products/furniture/furniture6.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/furniture7.jpg"
                                         src="images/products/furniture/furniture7.jpg" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                                <div class="marquee-product bg-main">
                                    <div class="marquee-wrapper">
                                        <div class="initial-child-container">
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25%
                                                    OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25%
                                                    OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25%
                                                    OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25%
                                                    OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25%
                                                    OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="marquee-wrapper">
                                        <div class="initial-child-container">
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25%
                                                    OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25%
                                                    OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25%
                                                    OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25%
                                                    OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <span class="icon icon-lightning text-critical"></span>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25%
                                                    OFF</p>
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
                                    <a class="btn-main-product add-to-card" data-id="10" data-product-color-id="3">Add To cart</a>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <a href="product-detail.html" class="title link">Stockholm Oakwood Fabric Back</a>
                                <span class="price"><span class="old-price">$98.00</span> $79.99</span>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active line">
                                        <span class="swatch-value bg-light-blue"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture6.jpg"
                                             src="images/products/furniture/furniture6.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="swatch-value bg-light-blue-2"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture8.jpg"
                                             src="images/products/furniture/furniture8.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.2s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/furniture32.jpg"
                                         src="images/products/furniture/furniture32.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/furniture33.jpg"
                                         src="images/products/furniture/furniture33.jpg" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
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
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <a href="product-detail.html" class="title link">Enchanted Garden Handcrafted </a>
                                <span class="price"><span class="old-price">$98.00</span> $89.99</span>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active line">
                                        <span class="swatch-value bg-beige"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture32.jpg"
                                             src="images/products/furniture/furniture32.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="swatch-value bg-light-grey"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture33.jpg"
                                             src="images/products/furniture/furniture33.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.3s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/furniture17.jpg"
                                         src="images/products/furniture/furniture17.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/furniture18.jpg"
                                         src="images/products/furniture/furniture18.jpg" alt="image-product">
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
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <a href="product-detail.html" class="title link">Stockholm Mustard Yellow Fabric
                                    Solo</a>
                                <span class="price">$69.99</span>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active line">
                                        <span class="swatch-value bg-dark-grey"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture17.jpg"
                                             src="images/products/furniture/furniture17.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="swatch-value bg-light-pink"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture19.jpg"
                                             src="images/products/furniture/furniture19.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="swatch-value bg-dark-grey-2"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture20.jpg"
                                             src="images/products/furniture/furniture20.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Top picks -->

    <!-- Lookbook -->
    <section>
        <div class="flat-sw-pagination swiper tf-sw-lookbook sw-lookbook-wrap" dir="ltr" data-preview="1"
             data-tablet="1" data-mobile="1" data-space-lg="0" data-space-md="0" data-space="0" data-pagination="1"
             data-pagination-md="1" data-pagination-lg="1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="banner-lookbook">
                        <img class="lazyload" data-src="images/banner/banner-lb-furniture1.jpg"
                             src="images/banner/banner-lb-furniture1.jpg" alt="banner">
                        <div class="lookbook-item position3">
                            <div class="dropdown dropup-center dropdown-custom">
                                <div role="dialog" class="tf-pin-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="loobook-product style-row">
                                        <div class="img-style">
                                            <img src="images/gallery/lookbook-sm2.jpg" alt="img">
                                        </div>
                                        <div class="content">
                                            <div class="info">
                                                <a href="product-detail.html" class="text-title text-line-clamp-1 link">Ribbed
                                                    cotton-blend top</a>
                                                <div class="price text-button">$69.99</div>
                                            </div>
                                            <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lookbook-item position4">
                            <div class="dropdown dropup-center dropdown-custom">
                                <div role="dialog" class="tf-pin-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="loobook-product style-row">
                                        <div class="img-style">
                                            <img src="images/gallery/lookbook-sm3.jpg" alt="img">
                                        </div>
                                        <div class="content">
                                            <div class="info">
                                                <a href="product-detail.html" class="text-title text-line-clamp-1 link">Copenhagen
                                                    Beechwood Artisan</a>
                                                <div class="price text-button">$69.99</div>
                                            </div>
                                            <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="banner-lookbook">
                        <img class="lazyload" data-src="images/banner/banner-lb-furniture2.jpg"
                             src="images/banner/banner-lb-furniture2.jpg" alt="banner">
                        <div class="lookbook-item position3">
                            <div class="dropdown dropup-center dropdown-custom">
                                <div role="dialog" class="tf-pin-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="loobook-product style-row">
                                        <div class="img-style">
                                            <img src="images/gallery/lookbook-sm2.jpg" alt="img">
                                        </div>
                                        <div class="content">
                                            <div class="info">
                                                <a href="product-detail.html" class="text-title text-line-clamp-1 link">Ribbed
                                                    cotton-blend top</a>
                                                <div class="price text-button">$69.99</div>
                                            </div>
                                            <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lookbook-item position4">
                            <div class="dropdown dropup-center dropdown-custom">
                                <div role="dialog" class="tf-pin-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="loobook-product style-row">
                                        <div class="img-style">
                                            <img src="images/gallery/lookbook-sm3.jpg" alt="img">
                                        </div>
                                        <div class="content">
                                            <div class="info">
                                                <a href="product-detail.html" class="text-title text-line-clamp-1 link">Copenhagen
                                                    Beechwood Artisan</a>
                                                <div class="price text-button">$69.99</div>
                                            </div>
                                            <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-pagination-lookbook sw-dots type-circle white-circle-line justify-content-center"></div>
        </div>
    </section>
    <!-- /Lookbook -->

    <!-- Seller -->
    <section class="flat-spacing">
        <div class="container">
            <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading">Top Trending</h3>
                <p class="subheading text-secondary">Browse our Top Trending: the hottest picks loved by all. </p>
            </div>
            <div dir="ltr" class="swiper tf-sw-recent" data-preview="4" data-tablet="3" data-mobile="2"
                 data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1"
                 data-pagination-lg="1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/furniture21.jpg"
                                         src="images/products/furniture/furniture21.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/furniture23.jpg"
                                         src="images/products/furniture/furniture23.jpg" alt="image-product">
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
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <a href="product-detail.html" class="title link">Oslo Beechwood High Stool</a>
                                <span class="price">$39.99</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/furniture13.jpg"
                                         src="images/products/furniture/furniture13.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/furniture14.jpg"
                                         src="images/products/furniture/furniture14.jpg" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
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
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <a href="product-detail.html" class="title link">Florence Ashwood Strata</a>
                                <span class="price">$79.99</span>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active line">
                                        <span class="swatch-value bg-light-pink"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture13.jpg"
                                             src="images/products/furniture/furniture13.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="swatch-value bg-dark-grey"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture16.jpg"
                                             src="images/products/furniture/furniture16.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.2s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/furniture29.jpg"
                                         src="images/products/furniture/furniture29.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/furniture31.jpg"
                                         src="images/products/furniture/furniture31.jpg" alt="image-product">
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
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <a href="product-detail.html" class="title link">Glistening Wave Glass Pendant</a>
                                <span class="price"><span class="old-price">$98.00</span> $129.99</span>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active line">
                                        <span class="swatch-value bg-light-green"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture29.jpg"
                                             src="images/products/furniture/furniture29.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="swatch-value bg-light-grey"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture30.jpg"
                                             src="images/products/furniture/furniture30.jpg" alt="image-product">
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0.3s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/furniture40.jpg"
                                         src="images/products/furniture/furniture40.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/furniture41.jpg"
                                         src="images/products/furniture/furniture41.jpg" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
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
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <a href="product-detail.html" class="title link">Rustic Elegance Vintage Glass
                                    Flower</a>
                                <span class="price"><span class="old-price">$98.00</span> $219.99</span>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active line">
                                        <span class="swatch-value bg-grey"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture40.jpg"
                                             src="images/products/furniture/furniture40.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="swatch-value bg-main"></span>
                                        <img class="lazyload" data-src="images/products/furniture/furniture42.jpg"
                                             src="images/products/furniture/furniture42.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-recent sw-dots type-circle justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Seller -->

    <!-- Testimonial -->
    <section class="flat-spacing pt-0">
        <div class="container">
            <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading">Customer Say!</h3>
                <p class="subheading">Our customers adore our products, and we constantly aim to delight them.</p>
            </div>
            <div dir="ltr" class="swiper tf-sw-testimonial" data-preview="3" data-tablet="2" data-mobile="1"
                 data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1"
                 data-pagination-lg="1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item style-row hover-img wow fadeInUp" data-wow-delay="0s">
                            <div class="img-style">
                                <img data-src="images/testimonial/tes-7.jpg" src="images/testimonial/tes-7.jpg"
                                     alt="img-testimonial">
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon hover-tooltip center">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="content">
                                <div class="content-top">
                                    <div class="list-star-default">
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                    </div>
                                    <p class="text-secondary">"Stylish and high-quality glass vase. Its elegant design
                                        and premium finish make it a perfect choice for any flower display. Highly
                                        recommended!"</p>
                                    <div class="box-author">
                                        <div class="text-title author">Sybil Sharp</div>
                                        <svg class="icon" width="20" height="21" viewBox="0 0 20 21" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_15758_14563)">
                                                <path d="M6.875 11.6255L8.75 13.5005L13.125 9.12549" stroke="#3DAB25"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path
                                                    d="M10 18.5005C14.1421 18.5005 17.5 15.1426 17.5 11.0005C17.5 6.85835 14.1421 3.50049 10 3.50049C5.85786 3.50049 2.5 6.85835 2.5 11.0005C2.5 15.1426 5.85786 18.5005 10 18.5005Z"
                                                    stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_15758_14563">
                                                    <rect width="20" height="20" fill="white"
                                                          transform="translate(0 0.684082)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>
                                <div class="box-avt">
                                    <div class="avatar avt-60 round">
                                        <img src="images/products/furniture/furniture32.jpg" alt="avt">
                                    </div>
                                    <div class="box-price">
                                        <p class="text-title text-line-clamp-1">Enchanted Garden Handcrafted</p>
                                        <div class="text-button price">$60.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item style-row hover-img wow fadeInUp" data-wow-delay="0.1s">
                            <div class="img-style">
                                <img data-src="images/testimonial/tes-8.jpg" src="images/testimonial/tes-8.jpg"
                                     alt="img-testimonial">
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon hover-tooltip center">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="content">
                                <div class="content-top">
                                    <div class="list-star-default">
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                    </div>
                                    <p class="text-secondary">"Stylish and high-quality glass vase. Its elegant design
                                        and premium finish make it a perfect choice for any flower display. Highly
                                        recommended!"</p>
                                    <div class="box-author">
                                        <div class="text-title author">Mark G.</div>
                                        <svg class="icon" width="20" height="21" viewBox="0 0 20 21" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_15758_14563)">
                                                <path d="M6.875 11.6255L8.75 13.5005L13.125 9.12549" stroke="#3DAB25"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path
                                                    d="M10 18.5005C14.1421 18.5005 17.5 15.1426 17.5 11.0005C17.5 6.85835 14.1421 3.50049 10 3.50049C5.85786 3.50049 2.5 6.85835 2.5 11.0005C2.5 15.1426 5.85786 18.5005 10 18.5005Z"
                                                    stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_15758_14563">
                                                    <rect width="20" height="20" fill="white"
                                                          transform="translate(0 0.684082)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>
                                <div class="box-avt">
                                    <div class="avatar avt-60 round">
                                        <img src="images/products/furniture/furniture9.jpg" alt="avt">
                                    </div>
                                    <div class="box-price">
                                        <p class="text-title text-line-clamp-1">Copenhagen Beechwood Artisan</p>
                                        <div class="text-button price">$60.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item style-row hover-img wow fadeInUp" data-wow-delay="0.2s">
                            <div class="img-style">
                                <img data-src="images/testimonial/tes-9.jpg" src="images/testimonial/tes-9.jpg"
                                     alt="img-testimonial">
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon hover-tooltip center">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="content">
                                <div class="content-top">
                                    <div class="list-star-default">
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                    </div>
                                    <p class="text-secondary">"Stylish and high-quality glass vase. Its elegant design
                                        and premium finish make it a perfect choice for any flower display. Highly
                                        recommended!"</p>
                                    <div class="box-author">
                                        <div class="text-title author">Sybil Sharp</div>
                                        <svg class="icon" width="20" height="21" viewBox="0 0 20 21" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_15758_14563)">
                                                <path d="M6.875 11.6255L8.75 13.5005L13.125 9.12549" stroke="#3DAB25"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path
                                                    d="M10 18.5005C14.1421 18.5005 17.5 15.1426 17.5 11.0005C17.5 6.85835 14.1421 3.50049 10 3.50049C5.85786 3.50049 2.5 6.85835 2.5 11.0005C2.5 15.1426 5.85786 18.5005 10 18.5005Z"
                                                    stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_15758_14563">
                                                    <rect width="20" height="20" fill="white"
                                                          transform="translate(0 0.684082)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>
                                <div class="box-avt">
                                    <div class="avatar avt-60 round">
                                        <img src="images/products/furniture/furniture1.jpg" alt="avt">
                                    </div>
                                    <div class="box-price">
                                        <p class="text-title text-line-clamp-1">Salamanca dusty rose Leeds</p>
                                        <div class="text-button price">$60.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-testimonial sw-dots type-circle d-flex justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Testimonial -->

    <!-- Iconbox -->
    <section class="flat-spacing line-top-container">
        <div class="container">
            <div dir="ltr" class="swiper tf-sw-iconbox" data-preview="4" data-tablet="3" data-mobile-sm="2"
                 data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1"
                 data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="tf-icon-box">
                            <div class="icon-box"><span class="icon icon-return"></span></div>
                            <div class="content text-center">
                                <h6>14-Day Returns</h6>
                                <p class="text-secondary">Risk-free shopping with easy returns.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box">
                            <div class="icon-box"><span class="icon icon-shipping"></span></div>
                            <div class="content text-center">
                                <h6>Free Shipping</h6>
                                <p class="text-secondary">No extra costs, just the price you see.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box">
                            <div class="icon-box"><span class="icon icon-headset"></span></div>
                            <div class="content text-center">
                                <h6>24/7 Support</h6>
                                <p class="text-secondary">24/7 support, always here just for you</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box">
                            <div class="icon-box"><span class="icon icon-sealCheck"></span></div>
                            <div class="content text-center">
                                <h6>Member Discounts</h6>
                                <p class="text-secondary">Special prices for our loyal customers.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-iconbox sw-dots type-circle justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Iconbox -->

    <!-- Banner discover -->
    <section class="flat-spacing pt-0">
        <div class="container">
            <div class="banner-cls-discover hover-img">
                <a href="#" class="img-style">
                    <img class="lazyload" data-src="images/banner/discover-decor.jpg"
                         src="images/banner/discover-decor.jpg" alt="cls-tiktok">
                </a>
                <div class="cls-content">
                    <div class="box-title-top">
                        <p class="subtitle text-btn-uppercase text-white wow fadeInUp">sumMer 2024 collection</p>
                        <h3 class="title"><a href="#" class="link text-white wow fadeInUp" data-wow-delay="0.1s">Super
                                Sale Up To %50</a></h3>
                        <p class="desc text-white wow fadeInUp" data-wow-delay="0.2s">Reserved for special occasions</p>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <a href="shop-default-grid.html" class="tf-btn btn-md btn-white"><span
                                class="text">discover Now</span><i class="icon icon-arrowUpRight"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Banner discover -->
@endsection
