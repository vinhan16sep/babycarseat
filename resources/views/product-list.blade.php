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
        .product .desc *{
            background: transparent!important;
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
        .signature-contentblock__subtitle {
            color: #434446;
            line-height: 150%;
            margin: 0;
            padding: 0;
            font-size: 1rem;
        }
        .box-hau-mai{
            margin-bottom: 40px;
            padding-top: 40px!important;
        }
        .box-hau-mai h3{
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
        }
        .content-hau-mai{
            padding: 30px;
            background: #fff;
        }
        .content-hau-mai h4{
            text-transform: uppercase;
            color: #3c3c8c;
            font-weight: bold;
            line-height: 35px;
            margin-bottom: 20px;
            min-height: 70px;
            align-items: end;
            display: flex
        }
        .content-hau-mai h4 span{
            font-size: 60px;
            display: contents;
        }
        .content-hau-mai a {
            padding: 15px 30px;
            background: gray;
            margin-top: 20px;
            border-radius: 6px;
            color: #fff;
            font-size: 20px;
            width: 180px;
            text-align: center;
        }
        .heading{
            color: #d20046;
            font-weight: bold;
        }
        .customer-tick {
            width: 19px!important;
            height: auto!important;
            margin-left: 5px;
        }
        .text-secondary{
            text-align: left!important;
        }
        .custom-say .heading-section h3, .heading-section .heading, .list-star-default .icon {
            color: #d20046;
            font-weight: bold;
        }
        .testimonial-item .content-top{
            padding: 0;
            margin: 0;
            border: none;
        }
        .card-product-info{
            text-align: center;
        }
        .card-product-info .product-title{
            font-weight: bold;
            text-transform: uppercase;
        }
        @media (max-width: 900px) {
            .signature-contentblock__image {
                width: 40%;
            }
            .signature-contentblock__html {
                width: 60%;
                padding: 30px;
            }
            .signature-contentblock__title {
                font-size: 1.2rem;
            }
            .signature-contentblock__subtitle {
                font-size: 0.6rem;
            }
        }

        @media (max-width: 600px) {
            .signature-contentblock__image {
                width: 100%;
            }
            .signature-contentblock__html {
                width: 100%;
                padding: 30px;
            }
            .signature-contentblock__title {
                font-size: 20px;
            }
            .signature-contentblock__subtitle {
                font-size: 14px;
            }
            .signature-contentblock{
                display: grid;
            }
            .box-product-common__row > div:not(:first-child) {
                margin-top: 30px;
            }
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
                    @if(isset($products) && $products->isNotEmpty())
                        @foreach($products as $_product)
                            <div class="swiper-slide">
                                <div class="card-product wow fadeInUp" data-wow-delay="0s">
                                    <div class="card-product-wrapper">
                                        @if ($_product->categories->isNotEmpty())
                                            <a href="{{ route('san-pham', ['category_slug' => $_product->categories->first()->slug, 'slug' => $_product->slug]) }}" class="product-img">
                                        @endif
                                            <img class="lazyload img-product"
                                                 data-src="{{ getImage($_product->image) }}"
                                                 src="{{ getImage($_product->image) }}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{ getImage($_product->image) }}"
                                                 src="{{ getImage($_product->image) }}" alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <p class="product-title">{{ $_product->name }}</p>
                                        <p class="product-desc">{{ $category->name ?? '' }}</p>
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

    <section class="flat-spacing bg-css products">
        @foreach($products as $_product)
            <div class="product">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 content">
                            <div>
                                @if ($_product->categories->isNotEmpty())
                                    @if ($category)
                                        <a href="{{ route('san-pham', ['category_slug' => $category->slug, 'slug' => $_product->slug]) }}">
                                            <h4>{{ $_product->name }}</h4>
                                            <div class="desc">
                                                {!! $_product->description !!}
                                            </div>
                                            <div class="price">
                                                @if(!empty($_product->discount_value))
                                                    Giá gốc <span>{{ numberFormat($_product->price) }}</span> VNĐ | {{ numberFormat($_product->discount_value) }} VNĐ
                                                @else
                                                    Giá {{ numberFormat($_product->price) }} VNĐ
                                                @endif
                                            </div>
                                            <p class="product-desc">{{ $category->name }}</p>
                                        </a>
                                    @else
                                        <h4>{{ $_product->name }}</h4>
                                        <div class="desc">
                                            {!! $_product->description !!}
                                        </div>
                                        <div class="price">
                                            @if(!empty($_product->discount_value))
                                                Giá gốc <span>{{ numberFormat($_product->price) }}</span> VNĐ | {{ numberFormat($_product->discount_value) }} VNĐ
                                            @else
                                                Giá {{ numberFormat($_product->price) }} VNĐ
                                            @endif
                                        </div>
                                        <p class="product-desc">Không có danh mục</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5 img">
                            @if ($_product->categories->isNotEmpty())
                                @if ($category)
                                    <a href="{{ route('san-pham', ['category_slug' => $category->slug, 'slug' => $_product->slug]) }}">
                                @endif
                                <img src="{{ asset('images/products/furniture/Hot-Selling1.png') }}" alt="">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    @include('components.last-page', ['is_not_show' => true, 'is_border' => true])

    @include('components.product-hot')

    <div class="overlay-filter" id="overlay-filter"></div>
@endsection


@section('script')
    <script type="text/javascript" src="{{ asset('js/nouislider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/shop.js') }}"></script>
@endsection
