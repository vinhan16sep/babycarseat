@extends('layouts.app')

@php
    $meta = "Product List";
@endphp

@section('meta_title', $meta)
@section('meta_keyword', $meta)
@section('meta_description', $meta)

@section('css')
    <style>
        .flat-spacing{
            padding: 30px 0;
            background: rgba(134, 121, 121, 0.1);
        }
        .flat-spacing.topick{
            padding: 40px 0;
            background: #fff;
        }
        .desc h4, .design h4{
            font-size: 20px;
        }
        .design .content img{
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .design .content h5{
            font-size: 16px;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .card-product-info{
            text-align: center;
        }
        .card-product-info .product-title{
            font-weight: bold;
            text-transform: uppercase;
        }
        .product h4{
            color: #d20046;
            text-transform: uppercase;
        }
        .product .row{
            padding: 40px 0;
        }
        .product sub{
            font-weight: bold;
            margin-bottom: 15px;
            margin-top: 10px;
            display: block;
        }
        .product .content{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .product .desc{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .product .desc ul{
            padding-left: 20px;
            margin-top: 20px;
            margin-bottom: 15px;
        }
        .product .desc ul li{
            list-style-type: disc;
        }
        .product .price{
            font-weight: bold;
        }
        .product .price span{
            text-decoration: line-through;
        }
        .product .container {
            margin:  0 auto;
            max-width: 900px;
        }
        .flat-spacing.products{
            padding: 0;
        }
        .flat-spacing.products .product:nth-child(even){
            background: #fff;
        }
        @media (max-width: 768px) {
            .product .row{
                flex-direction: column-reverse;
            }
            .product .row img{
                width: 100%;
                margin-bottom: 15px;
            }
            .wrapper-control-shop .design{
                display: none;
            }
        }
    </style>
@endsection

@section('content')

    <!-- Section product -->
    <section class="flat-spacing">
        <div class="container">
            <div class="wrapper-control-shop">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="desc">
                            <h4>Ghế ô tô cho bé</h4>
                            <div class="content">
                                Dù bạn đang chuẩn bị đón bé yêu từ
                                viện về hay con bạn đang lớn lên từng
                                ngày, chúng tôi đều có sản phẩm ghế
                                ngồi ô tô phù hợp với từng giai đoạn
                                phát triển của bé.
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="design">
                            <h4>Thiết kế độc bản Đức</h4>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <img src="{{ asset('images/CustomerSay1.png') }}" alt="">
                                        <h5>Ghế cho bé Sơ sinh</h5>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <img src="{{ asset('images/CustomerSay1.png') }}" alt="">
                                        <h5>Ghế cho bé Sơ sinh - 12 tuổi</h5>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <img src="{{ asset('images/CustomerSay1.png') }}" alt="">
                                        <h5>Ghế cho bé 2 - 12 tuổi</h5>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <img src="{{ asset('images/CustomerSay1.png') }}" alt="">
                                        <h5>Ghế cho bé 6 - 12 tuổi</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-spacing bg-css topick">
        <div class="container">
            <div dir="ltr" class="swiper tf-sw-latest" data-preview="6" data-tablet="3" data-mobile="1"
                 data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-center="0" data-pagination-md="1"
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
            </div>
        </div>
    </section>

    <section class="flat-spacing bg-css products">
        <div class="product">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 content">
                        <div>
                            <h4>BABYRO GUARDIAN I-SPIN 360</h4>
                            <sub>0-15 tháng | 40 - 150 cm | 0-40 kg | ECE-R129 (i-Size) | ADAC</sub>
                            <div class="desc">
                                Đột phá an toàn cho bé yêu: Babyro i-Spin xoay đa chiều 360°,
                                tương thích ISOFIX 3 điểm VÀNG kèm chân đỡ chống lật, đồng
                                hành cùng con từ 0-12 tuổi - MUA 1 LẦN DÙNG TRỌN ĐỜI!
                                <ul>
                                    <li>Xoay 360 độ linh hoạt</li>
                                    <li>Thiết kế đa năng linh hoạt từ 0 - 12 tuổi</li>
                                    <li>Bảo vệ kép: ISOFIX - chân chống chịu lực</li>
                                </ul>
                            </div>
                            <div class="price">
                                Giá gốc <span>4.000.000</span> VNĐ | 3.500.000 VNĐ
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 img">
                        <img src="{{ asset("images/products/furniture/Hot-Selling1.png") }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="product">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 content">
                        <div>
                            <h4>BABYRO GUARDIAN I-SPIN 360</h4>
                            <sub>0-15 tháng | 40 - 150 cm | 0-40 kg | ECE-R129 (i-Size) | ADAC</sub>
                            <div class="desc">
                                Đột phá an toàn cho bé yêu: Babyro i-Spin xoay đa chiều 360°,
                                tương thích ISOFIX 3 điểm VÀNG kèm chân đỡ chống lật, đồng
                                hành cùng con từ 0-12 tuổi - MUA 1 LẦN DÙNG TRỌN ĐỜI!
                                <ul>
                                    <li>Xoay 360 độ linh hoạt</li>
                                    <li>Thiết kế đa năng linh hoạt từ 0 - 12 tuổi</li>
                                    <li>Bảo vệ kép: ISOFIX - chân chống chịu lực</li>
                                </ul>
                            </div>
                            <div class="price">
                                Giá gốc <span>4.000.000</span> VNĐ | 3.500.000 VNĐ
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 img">
                        <img src="{{ asset("images/products/furniture/Hot-Selling1.png") }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="product">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 content">
                        <div>
                            <h4>BABYRO GUARDIAN I-SPIN 360</h4>
                            <sub>0-15 tháng | 40 - 150 cm | 0-40 kg | ECE-R129 (i-Size) | ADAC</sub>
                            <div class="desc">
                                Đột phá an toàn cho bé yêu: Babyro i-Spin xoay đa chiều 360°,
                                tương thích ISOFIX 3 điểm VÀNG kèm chân đỡ chống lật, đồng
                                hành cùng con từ 0-12 tuổi - MUA 1 LẦN DÙNG TRỌN ĐỜI!
                                <ul>
                                    <li>Xoay 360 độ linh hoạt</li>
                                    <li>Thiết kế đa năng linh hoạt từ 0 - 12 tuổi</li>
                                    <li>Bảo vệ kép: ISOFIX - chân chống chịu lực</li>
                                </ul>
                            </div>
                            <div class="price">
                                Giá gốc <span>4.000.000</span> VNĐ | 3.500.000 VNĐ
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 img">
                        <img src="{{ asset("images/products/furniture/Hot-Selling1.png") }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="product">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 content">
                        <div>
                            <h4>BABYRO GUARDIAN I-SPIN 360</h4>
                            <sub>0-15 tháng | 40 - 150 cm | 0-40 kg | ECE-R129 (i-Size) | ADAC</sub>
                            <div class="desc">
                                Đột phá an toàn cho bé yêu: Babyro i-Spin xoay đa chiều 360°,
                                tương thích ISOFIX 3 điểm VÀNG kèm chân đỡ chống lật, đồng
                                hành cùng con từ 0-12 tuổi - MUA 1 LẦN DÙNG TRỌN ĐỜI!
                                <ul>
                                    <li>Xoay 360 độ linh hoạt</li>
                                    <li>Thiết kế đa năng linh hoạt từ 0 - 12 tuổi</li>
                                    <li>Bảo vệ kép: ISOFIX - chân chống chịu lực</li>
                                </ul>
                            </div>
                            <div class="price">
                                Giá gốc <span>4.000.000</span> VNĐ | 3.500.000 VNĐ
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 img">
                        <img src="{{ asset("images/products/furniture/Hot-Selling1.png") }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="product">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 content">
                        <div>
                            <h4>BABYRO GUARDIAN I-SPIN 360</h4>
                            <sub>0-15 tháng | 40 - 150 cm | 0-40 kg | ECE-R129 (i-Size) | ADAC</sub>
                            <div class="desc">
                                Đột phá an toàn cho bé yêu: Babyro i-Spin xoay đa chiều 360°,
                                tương thích ISOFIX 3 điểm VÀNG kèm chân đỡ chống lật, đồng
                                hành cùng con từ 0-12 tuổi - MUA 1 LẦN DÙNG TRỌN ĐỜI!
                                <ul>
                                    <li>Xoay 360 độ linh hoạt</li>
                                    <li>Thiết kế đa năng linh hoạt từ 0 - 12 tuổi</li>
                                    <li>Bảo vệ kép: ISOFIX - chân chống chịu lực</li>
                                </ul>
                            </div>
                            <div class="price">
                                Giá gốc <span>4.000.000</span> VNĐ | 3.500.000 VNĐ
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 img">
                        <img src="{{ asset("images/products/furniture/Hot-Selling1.png") }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="product">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 content">
                        <div>
                            <h4>BABYRO GUARDIAN I-SPIN 360</h4>
                            <sub>0-15 tháng | 40 - 150 cm | 0-40 kg | ECE-R129 (i-Size) | ADAC</sub>
                            <div class="desc">
                                Đột phá an toàn cho bé yêu: Babyro i-Spin xoay đa chiều 360°,
                                tương thích ISOFIX 3 điểm VÀNG kèm chân đỡ chống lật, đồng
                                hành cùng con từ 0-12 tuổi - MUA 1 LẦN DÙNG TRỌN ĐỜI!
                                <ul>
                                    <li>Xoay 360 độ linh hoạt</li>
                                    <li>Thiết kế đa năng linh hoạt từ 0 - 12 tuổi</li>
                                    <li>Bảo vệ kép: ISOFIX - chân chống chịu lực</li>
                                </ul>
                            </div>
                            <div class="price">
                                Giá gốc <span>4.000.000</span> VNĐ | 3.500.000 VNĐ
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 img">
                        <img src="{{ asset("images/products/furniture/Hot-Selling1.png") }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="overlay-filter" id="overlay-filter"></div>
@endsection


@section('script')
    <script type="text/javascript" src="{{ asset('js/nouislider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/shop.js') }}"></script>
@endsection
