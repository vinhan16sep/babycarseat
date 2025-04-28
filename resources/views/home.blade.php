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

    <section class="section-text">
        <div>
            <div>Bảo hành Vàng 10 năm</div>
            <div>Đổi mới sau tai nạn</div>
            <div>30 ngày dùng thử</div>
            <div>Miễn phí Ship</div>
        </div>
    </section>

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
{{--                                <a href="product-detail.html" class="title link">View i-Spin 360</a>--}}
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
{{--                                <a href="product-detail.html" class="title link">View i-Spin 360</a>--}}
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
{{--                                <a href="product-detail.html" class="title link">View i-Spin 360</a>--}}
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
{{--                                <a href="product-detail.html" class="title link">View i-Spin 360</a>--}}
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
                                {{--                                <a href="product-detail.html" class="title link">View i-Spin 360</a>--}}
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
                                {{--                                <a href="product-detail.html" class="title link">View i-Spin 360</a>--}}
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
                                {{--                                <a href="product-detail.html" class="title link">View i-Spin 360</a>--}}
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
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blog-item card h-100 d-flex flex-column">
                        <div class="card-body d-flex flex-column">
                            <img src="images/standard3.png" alt="">
                            <p class="title">Tiêu chuẩn an toàn Châu Âu</p>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blog-item card h-100 d-flex flex-column">
                        <div class="card-body d-flex flex-column">
                            <img src="images/standard2.png" alt="">
                            <p class="title">Bảo vệ tối đa</p>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blog-item card h-100 d-flex flex-column">
                        <div class="card-body d-flex flex-column">
                            <img src="images/standard4.png" alt="">
                            <p class="title">Thân thiện với trẻ em</p>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="flat-spacing" style="padding-top: 30px">
            <div class="container">
                <div class="flat-sw-navigation box-product-common__row wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-common__row ">
                        <div class="signature-contentblock ">
                            <div class="signature-contentblock__image">
                                <img class="product-marketing__img" src="{{ asset('images/home-babyro1.png') }}" alt="">
                            </div>
                            <div class="signature-contentblock__html">
                                <div class="signature-contentblock__description">
                                    <div class="box-first-content-flex">
                                        <img src="images/standard1.png" alt="">
                                        <div>
                                            ENGINEERED<br>
                                            IN GERMANY
                                        </div>
                                    </div>
                                    <div class="signature-contentblock__title">Công nghệ Đức</div>
                                    <div class="signature-contentblock__subtitle">
                                        Ghế ô tô Babyro được thiết kế và sản xuất theo công nghệ Đức. Điều này đồng nghĩa với việc các sản phẩm của Babyro được chú trọng đến từng chi tiết, đảm bảo độ bền cao và sự chắc chắn, giúp mang đến cho bé một chiếc ghế ô tô an toàn, thoải mái trong mỗi chuyến đi.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-common__row">
                        <div class="signature-contentblock signature-contentblock--reverse">
                            <div class="signature-contentblock__image">
                                <img class="product-marketing__img" src="{{ asset('images/home-babyro2.png') }}" alt="">
                            </div>
                            <div class="signature-contentblock__html">
                                <div class="signature-contentblock__description">
                                    <div class="box-first-content-flex">
                                        <img src="images/standard3.png" alt="">
                                        <div>
                                            CÔNG NGHỆ<br>
                                            NÂNG ĐỠ TOÀN DIỆN
                                        </div>
                                    </div>
                                    <div class="signature-contentblock__title">Tiêu chuẩn An toàn Châu Âu</div>
                                    <div class="signature-contentblock__subtitle">
                                        Ghế ô tô trẻ em Babyro đáp ứng các tiêu chuẩn an toàn của châu Âu, bao gồm ECE R44 và ECE R129 (i-Size). Tiêu chuẩn ECE R44 quy định các yêu cầu cơ bản về an toàn, trong khi ECE R129 (i-Size) là tiêu chuẩn mới nhất, tập trung vào việc bảo vệ trẻ tốt hơn trong các va chạm bên hông và yêu cầu sử dụng hệ thống lắp đặt ISOFIX. Với chứng nhận an toàn châu Âu, bạn hoàn toàn có thể yên tâm về sự bảo vệ toàn diện mà ghế ô tô Babyro mang lại cho bé.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-common__row ">
                        <div class="signature-contentblock ">
                            <div class="signature-contentblock__image">
                                <img class="product-marketing__img" src="{{ asset('images/home-babyro3.png') }}" alt="">
                            </div>
                            <div class="signature-contentblock__html">
                                <div class="signature-contentblock__description">
                                    <div class="box-first-content-flex">
                                        <img src="images/standard2.png" alt="">
                                        <div>
                                            KIỂM ĐỊNH<br>
                                            KHẮT KHE
                                        </div>
                                    </div>
                                    <div class="signature-contentblock__title">Bảo vệ tối đa</div>
                                    <div class="signature-contentblock__subtitle">
                                        Tất cả sản phẩm đều được kiểm tra kỹ lưỡng, thử nghiệm kỹ thuật chuyên sâu và đánh giá va chạm khắt khe trước khi xuất xưởng. Kết quả đạt chuẩn toàn diện 5 yếu tố: an toàn tuyệt đối tiện nghi vượt trội dễ sử dụng vệ sinh đơn giản và cam kết không chất độc hại.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-common__row mr-top">
                        <div class="signature-contentblock signature-contentblock--reverse">
                            <div class="signature-contentblock__image">
                                <img class="product-marketing__img" src="{{ asset('images/home-babyro4.png') }}" alt="">
                            </div>
                            <div class="signature-contentblock__html">
                                <div class="signature-contentblock__description">
                                    <div class="box-first-content-flex">
                                        <img src="images/standard4.png" alt="">
                                        <div>
                                            THIẾT KẾ<br>
                                            ĐẠT CHUẨN Y KHOA
                                        </div>
                                    </div>
                                    <div class="signature-contentblock__title">Thân thiện với trẻ em</div>
                                    <div class="signature-contentblock__subtitle">
                                        <ul>
                                            <li>
                                                Hỗ trợ cột sống: Cấu trúc ergonomic ôm trọn đường cong sinh lý tự nhiên
                                            </li>
                                            <li>
                                                Bảo vệ xương cùng: Đệm nâng đỡ phân bổ áp lực thông minh
                                            </li>
                                            <li>
                                                An toàn da liễu: Vải kháng khuẩn đạt chứng nhận Oeko-Tex® Class 1
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>

    @include('components.last-page')


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
