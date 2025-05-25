@extends('layouts.app')

@php
    $meta = "Product List";
@endphp

@section('meta_title', $meta)
@section('meta_keyword', $meta)
@section('meta_description', $meta)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}">
    <style>
        .desc h4, .design h4{
            font-size: 1.2vw;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .design .content img{
            object-fit: cover;
            width: 100%;
        }
        .design .content h5{
            font-size: 1vw;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .card-product{
            margin: 20px 0;
        }
        .card-product-info{
            text-align: center;
        }
        .card-product-info .product-title{
            font-weight: 600;
            text-transform: uppercase;
            font-size: 1.20vw;
        }
        .product h4{
            color: #d20046;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 2vw;
        }
        .product .row{
            padding: 10px 0;
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
            justify-content: left;
        }
        .product .content > div{
            width: 700px;
            max-width: 100%;
        }
        .product .desc{
            margin-top: 25px;
            /*margin-bottom: 20px;*/
            line-height: 20px;
            font-weight: 300;
        }
        .product .desc strong{
            letter-spacing: 1px;
            font-weight: 600;
        }
        .product .img{
            text-align: right;
        }
        .product .img img{
            width: 400px;
            max-width: 100%;
        }
        .product .desc *{
            background: transparent!important;
            font-size: 1vw!important;
        }
        .product .desc span{
            font-weight: 400;
        }
        .product .desc ul{
            padding-left: 20px;
        }
        .product .desc ul li{
            list-style-type: disc;
        }
        .product .price{
            font-weight: 600;
            font-size: 1vw;
            margin-top: 10px;
        }
        .product .price span.sub-price{
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
            font-weight: 600;
            text-transform: uppercase;
        }

        .home-padding.categories{
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .desc .content{
            font-weight: 400;
            padding-right: 30px;
        }

        @media (max-width: 1460px) {
            .desc h4, .design h4{
                font-size: 1.5vw;
                font-weight: 600;
                margin-bottom: 10px;
            }
            .home-padding.categories{
                padding-top: 40px;
                padding-bottom: 20px;
            }
            .desc .content{
                font-size: 1vw;
            }
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
            .desc .content{
                font-size: 14px;
            }
            .desc h4, .design h4{
                font-size: 20px;
            }
            #wrapper > .home-padding.categories {
                padding-right: 15px!important;
                padding-left: 15px!important;
            }
            .desc .content{
                padding-right: 0;
            }
            .card-product-info .product-title{
                font-size: 20px;
            }
            .product h4{
                font-size: 20px;
            }
            .product .desc{
                margin-top: 15px;
            }
            .product .desc *, .product .price{
                font-size: inherit!important;
            }
            .product .content > div{
                padding-bottom: 20px;
            }
            .flat-spacing-8, .flat-spacing, .flat-spacing-10{
                padding: 15px 0!important;
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

        .left-pane {
            width: 100%;
        }
        .row.row-css{
            margin-left: -5px;
            margin-right: -5px;
        }
        .row.row-css > div{
            padding-left: 5px;
            padding-right: 5px;
        }

        @media (min-width: 768px) {
            .left-pane {
                width: 330px;
                flex-shrink: 0;
            }
            .design .content img{
                height: 180px;
            }
        }

        @media (min-width: 1460px) {
            .left-pane {
                width: 500px;
                flex-shrink: 0;
            }
            .design .content img{
                height: 280px;
            }
            .desc .content{
                padding-right: 120px;
                font-size: 0.9vw;
            }
            .desc h4, .design h4{
                margin-bottom: 20px;
            }
            .design .content h5{
                margin-top: 20px;
            }
            .card-product-info .product-title{
                font-size: 1.2vw;
            }
            .product .container {
                max-width: 1200px;
            }
            .product .desc{
                line-height: 30px;
            }
        }
    </style>
@endsection

@section('content')

    <!-- Section product -->
    @if(empty($category) && !empty($categories))
    <section class="flat-spacing home-padding categories" style="background: rgb(241, 242, 243);">
        <div class="">
            <div class="wrapper-control-shop">
                <div class="d-flex flex-column flex-md-row">
                    <div class="left-pane">
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
                    <div class="flex-grow-1">
                        <div class="design">
                            <h4>Thiết kế độc bản Đức</h4>
                            <div class="content">
                                <div class="row row-css">
                                    @foreach($categories as $_cate)
                                        <div class="col-md-3 col-sm-6">
                                            <img src="{{ asset('images/CustomerSay1.png') }}" alt="">
                                            <h5><a href="{{ route("san-pham", ['slug' => $_cate->slug]) }}">Bé từ {{ $_cate->name }}</a></h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="flat-spacing home-padding">
        <div class="container-fluid">
            <div dir="ltr" class="swiper tf-sw-latest" data-preview="6" data-tablet="3" data-mobile="1"
                 data-space-lg="15" data-space-md="30" data-space="15" data-pagination="1" data-center="0" data-pagination-md="1"
                 data-pagination-lg="1">
                <div class="swiper-wrapper">
                    @if(isset($products) && $products->isNotEmpty())
                        @foreach($products as $_product)
                            <div class="swiper-slide" style="margin: 0 15px;">
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
                                        <p class="product-title">{{ str_replace("BABYRO ", "", strtoupper($_product->name)) }}</p>
                                        <p class="product-desc">{{ $category ? $category->name : ($_product->first_category ? $_product->first_category->name : '') }}</p>
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
                                <a href="{{ route('product-index', ['slug' => $_product->slug]) }}">
                                    <h4>{{ $_product->name }}</h4>
                                    <div class="desc">
                                        {!! $_product->description !!}
                                    </div>
                                    <div class="price">
                                        @if(!empty($_product->discount_value))
                                            Giá gốc <span style="text-decoration: line-through;color: #d21e50">{{ numberFormat($_product->price) }} VNĐ</span> | <span style="font-weight: 600;">{{ numberFormat($_product->discount_value) }} VNĐ</span>
                                        @else
                                            Giá <span style="font-weight: 600;color: #d20046">{{ numberFormat($_product->price) }} VNĐ</span>
                                        @endif
                                    </div>
{{--                                    <p class="product-desc">{{ $_product->first_category ? $_product->first_category->name : '' }}</p>--}}
                                </a>
                            </div>
                        </div>
                        <div class="col-md-5 img">
                            <a href="{{ route('product-index', ['slug' => $_product->slug]) }}">
                                <img src="{{ getImage($_product->image) }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
{{--    @include('components.last-page', ['is_not_show' => true, 'is_border' => true])--}}

{{--    @include('components.product-hot')--}}

    <div class="overlay-filter" id="overlay-filter"></div>
@endsection


@section('script')
    <script type="text/javascript" src="{{ asset('js/nouislider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/shop.js') }}"></script>
@endsection
