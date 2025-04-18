@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css?v=' . ($ver ?? '')) }}">
@stop

@section('content')
    <!-- Slider -->
    <section class="tf-slideshow slider-default slider-effect-fade">
        <div dir="ltr" class="swiper tf-sw-slideshow" data-effect="fade" data-preview="1" data-tablet="1"
             data-mobile="1" data-centered="false" data-space="0" data-space-mb="0" data-loop="true"
             data-auto-play="true">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="wrap-slider">
                        <img src="images/slider/slider-decor1.png" alt="fashion-slideshow">
                        <div class="box-content">
                            <div class="content-slider">
                                <div class="box-title-slider">
                                    <div class="fade-item fade-item-1 heading title-display text-white"><span class="small-text">Thiết kế</span> Đức</div>
                                    <div class="fade-item fade-item-1 heading title-display text-white"><span class="small-text">Tiêu chuẩn</span> Quốc tế</div>
                                </div>
                                <div class="fade-item fade-item-3 box-btn-slider">
                                    <a href="shop-default-grid.html" class="tf-btn btn-fill btn-white"><span
                                            class="text">Shop Collection</span></a>
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
    <section class="flat-spacing bg-css">
        <div class="container">
            <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading">Shop by Collections</h3>
                <p class="subheading">Browse our Top Trending: the hottest picks loved by all.</p>
            </div>
            <div class="flat-sw-navigation wow fadeInUp" data-wow-delay="0.1s">
                <div dir="ltr" class="swiper tf-sw-collection" data-preview="3" data-tablet="3" data-mobile-sm="2"
                     data-mobile="1" data-space-lg="30" data-space-md="15" data-space="15" data-pagination="1"
                     data-pagination-md="3" data-pagination-lg="4">
                    <div class="swiper-wrapper">
                        <!-- item 1 -->
                        <div class="swiper-slide">
                            <div class="collection-position-2 style-7 hover-img">
                                <a href="shop-collection.html" class="img-style">
                                    <img class="lazyload" data-src="images/collections/Collections3.png"
                                         src="images/collections/Collections3.png" alt="banner-cls">
                                </a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Ghế ngồi ô tô cho bé</a></h4>
                                    <span class="text-title text-white">Tiêu chuẩn 1</span>
                                </div>
                            </div>
                        </div>
                        <!-- item 2 -->
                        <div class="swiper-slide">
                            <div class="collection-position-2 style-7 hover-img">
                                <a href="shop-collection.html" class="img-style">
                                    <img class="lazyload" data-src="images/collections/Collections2.png"
                                         src="images/collections/Collections2.png" alt="banner-cls">
                                </a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Ghế ngồi ô tô cho bé</a></h4>
                                    <span class="text-title text-white">Tiêu chuẩn 1</span>
                                </div>
                            </div>
                        </div>
                        <!-- item 3 -->
                        <div class="swiper-slide">
                            <div class="collection-position-2 style-7 hover-img">
                                <a href="shop-collection.html" class="img-style">
                                    <img class="lazyload" data-src="images/collections/Collections1.png"
                                         src="images/collections/Collections1.png" alt="banner-cls">
                                </a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="shop-collection.html" class="link text-white">Phụ kiện</a></h4>
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

    <!-- Top picks -->
    <section class="flat-spacing bg-css topick">
        <div class="container">
            <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading">Hot Selling Babyro</h3>
                <p class="subheading text-secondary">Browse our Top Trending: the hottest picks loved by all. </p>
            </div>
            <div dir="ltr" class="swiper tf-sw-latest" data-preview="4" data-tablet="3" data-mobile="1"
                 data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1"
                 data-pagination-lg="1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/Hot-Selling1.png"
                                         src="images/products/furniture/Hot-Selling1.png" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/Hot-Selling1.png"
                                         src="images/products/furniture/Hot-Selling1.png" alt="image-product">
                                </a>
                            </div>
                            <div class="card-product-info">
                                <p class="product-title">Babyro i-Spin 360</p>
                                <p class="product-desc">Ghế cho bé từ 0 - 12 tuổi</p>
                                <a href="product-detail.html" class="title link">View i-Spin 360</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/Hot-Selling2.png"
                                         src="images/products/furniture/Hot-Selling2.png" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/Hot-Selling2.png"
                                         src="images/products/furniture/Hot-Selling2.png" alt="image-product">
                                </a>
                            </div>
                            <div class="card-product-info">
                                <p class="product-title">Babyro i-Spin 360</p>
                                <p class="product-desc">Ghế cho bé từ 0 - 12 tuổi</p>
                                <a href="product-detail.html" class="title link">View i-Spin 360</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/Hot-Selling3.png"
                                         src="images/products/furniture/Hot-Selling3.png" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/Hot-Selling3.png"
                                         src="images/products/furniture/Hot-Selling3.png" alt="image-product">
                                </a>
                            </div>
                            <div class="card-product-info">
                                <p class="product-title">Babyro i-Spin 360</p>
                                <p class="product-desc">Ghế cho bé từ 0 - 12 tuổi</p>
                                <a href="product-detail.html" class="title link">View i-Spin 360</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-product wow fadeInUp" data-wow-delay="0s">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="product-img">
                                    <img class="lazyload img-product"
                                         data-src="images/products/furniture/Hot-Selling4.png"
                                         src="images/products/furniture/Hot-Selling4.png" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/products/furniture/Hot-Selling4.png"
                                         src="images/products/furniture/Hot-Selling4.png" alt="image-product">
                                </a>
                            </div>
                            <div class="card-product-info">
                                <p class="product-title">Babyro i-Spin 360</p>
                                <p class="product-desc">Ghế cho bé từ 0 - 12 tuổi</p>
                                <a href="product-detail.html" class="title link">View i-Spin 360</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Top picks -->

    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="blog-item card h-100 d-flex flex-column">
                        <div class="card-body d-flex flex-column">
                            <img src="images/standard1.png" alt="">
                            <p class="title">Thiết kế Đức</p>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                            <a class="link mt-auto">View All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blog-item card h-100 d-flex flex-column">
                        <div class="card-body d-flex flex-column">
                            <img src="images/standard2.png" alt="">
                            <p class="title">Bảo vệ tối đa</p>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                            <a class="link mt-auto">View All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blog-item card h-100 d-flex flex-column">
                        <div class="card-body d-flex flex-column">
                            <img src="images/standard3.png" alt="">
                            <p class="title">Tiêu chuẩn an toàn Châu Âu</p>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                            <a class="link mt-auto">View All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blog-item card h-100 d-flex flex-column">
                        <div class="card-body d-flex flex-column">
                            <img src="images/standard4.png" alt="">
                            <p class="title">I Size - R129</p>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                            <a class="link mt-auto">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="flat-spacing pt-0 custom-say">
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
                                <img data-src="images/CustomerSay1.png" src="images/CustomerSay1.png"
                                     alt="img-testimonial">
{{--                                <a href="#quickView" data-bs-toggle="modal" class="box-icon hover-tooltip center">--}}
{{--                                    <span class="icon icon-eye"></span>--}}
{{--                                    <span class="tooltip">Quick View</span>--}}
{{--                                </a>--}}
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
                                        <img class="customer-tick" src="images/CustomerSay-tick.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item style-row hover-img wow fadeInUp" data-wow-delay="0.1s">
                            <div class="img-style">
                                <img data-src="images/CustomerSay2.png" src="images/CustomerSay2.png"
                                     alt="img-testimonial">
{{--                                <a href="#quickView" data-bs-toggle="modal" class="box-icon hover-tooltip center">--}}
{{--                                    <span class="icon icon-eye"></span>--}}
{{--                                    <span class="tooltip">Quick View</span>--}}
{{--                                </a>--}}
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
                                        <img class="customer-tick" src="images/CustomerSay-tick.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item style-row hover-img wow fadeInUp" data-wow-delay="0.2s">
                            <div class="img-style">
                                <img data-src="images/CustomerSay3.png" src="images/CustomerSay3.png"
                                     alt="img-testimonial">
{{--                                <a href="#quickView" data-bs-toggle="modal" class="box-icon hover-tooltip center">--}}
{{--                                    <span class="icon icon-eye"></span>--}}
{{--                                    <span class="tooltip">Quick View</span>--}}
{{--                                </a>--}}
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
                                        <img class="customer-tick" src="images/CustomerSay-tick.png" alt="">
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
                    <img class="lazyload" data-src="images/banner footer.png"
                         src="images/banner footer.png" alt="cls-tiktok">
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
