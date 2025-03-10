@extends('layouts.app')

@section('meta_title', $product->name)
@section('meta_keyword', $product->name)
@section('meta_description', $product->name)
@section('meta_image', asset($product->image))

@section('content')
<div class="bz_single_product_main_wrapper bz_leather_single_wrapper float_left product-detail">
    <div class="container custom_container">
        <div class="inner_menu float_left">
            <ul>
                <li>
                    <a href="{{ route("home")}}">
                        <span>
                        <i class="fas fa-home"></i>
                        </span>
                    </a>
                </li>
                <li>
                <a href="{{ route("country", ["country" => $product->country->slug]) }}">
                    <span>
                        <i class="fas fa-angle-right"></i>
                    </span> {{ $product->country->name }} </a>
                </li>
                <li class="active">
                <a href="#">
                    <span>
                    <i class="fas fa-angle-right"></i>
                    </span> {{ $product->name }} </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container custom_container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-12 order-sm-9_ order-xs-9_ order-12_ order-lg-0 order-md-0 order-xs-9">
            @include('components.sidebar-product', [ "bestProducts" => $bestProducts,  "countries" => $countries,  "types" => $types,  "grapes" => $grapes ])
        </div>
        <div class="col-lg-9 col-md-9 col-12">
            <div class="bz_single_product_main_wrapper bz_leather_single_wrapper float_left">
                <div class="custom_container">
                    <div class="shoping_box float_left">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-12">
                                <div class="sell_slider">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @if ($product->images)
                                                @foreach ($product->images as $img)
                                                    <div class="carousel-item {{ $loop->index == 0 ? "active" : "" }}">
                                                        <img class="img-fluid" src="{{ getImage($img) }}" alt="{{ $product->name }}">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    @if ($product->images)
                                        <div class="container pt-4 pb-5 detail_product_slider">
                                            <div class="row carousel-indicators owl-carousel owl-theme ">
                                                @foreach ($product->images as $img)
                                                    <div class="item">
                                                        <img src="{{ getImage($img) }}" class="img-fluid" alt="{{ $product->name }}" data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-12">
                                <div class="b_product_sell_details_wrapper float_left">
                                    <div class="bz_product_heading float_left">
                                        <h3>{{ $product->name }}</h3>
                                        <p>{{ $product->description }}</p>
                                        <div class="product-attribute product-attribute-hz">
                                            <div class="row">
                                                <div class="product-attribute__item small-4 pa_giong-nho">
                                                    <div class="pa-icon">
                                                        <img class="img-icon" src="/icon/pa_giong-nho.svg" alt="Giống nho">
                                                    </div>
                                                    <div class="pa-info">
                                                        <div class="pa-info__label">Giống nho</div>
                                                        <div class="pa-info__value">
                                                            <p>
                                                                <a class="color-black" href="{{ route("ruou-vang", ["grapes[" . $product->grape->id . "]" => $product->grape->slug ]) }}">
                                                                    {{ $product->grape->name }}
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-attribute__item small-4 pa_loai-vang">
                                                    <div class="pa-icon">
                                                        <img class="img-icon" src="/icon/pa_loai-vang.svg" alt="Loại vang">
                                                    </div>
                                                    <div class="pa-info">
                                                    <div class="pa-info__label">Loại vang</div>
                                                    <div class="pa-info__value">
                                                        <p>
                                                            <a class="color-black" href="{{ route("ruou-vang", ["types[" . $product->type->id . "]" => $product->type->slug ]) }}">
                                                                {{ $product->type->name }}
                                                            </a>
                                                        </p>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="product-attribute__item small-4 pa_quoc-gia">
                                                    <div class="pa-icon">
                                                        <img class="img-icon" src="/icon/pa_quoc-gia.svg" alt="Quốc gia">
                                                    </div>
                                                    <div class="pa-info">
                                                    <div class="pa-info__label">Quốc gia</div>
                                                    <div class="pa-info__value">
                                                        <p>
                                                            <a class="color-black" href="{{ route("country", ["country" => $product->country->slug]) }}">
                                                                {{ $product->country->name }}
                                                            </a>
                                                        </p>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="product-attribute__item small-4 pa_quoc-gia">
                                                    <div class="pa-icon">
                                                        <img class="img-icon" src="/icon/pa_vung-trong-nho.svg" alt="Vùng trồng nho">
                                                    </div>
                                                    <div class="pa-info">
                                                    <div class="pa-info__label">Vùng trồng nho</div>
                                                    <div class="pa-info__value">
                                                        <p>
                                                            <a class="color-black" href="{{ route("ruou-vang", ["regions[" . $product->region->id . "]" => $product->region->slug ]) }}">
                                                                {{ $product->region->name }}
                                                            </a>
                                                        </p>
                                                    </div>
                                                    </div>
                                                </div>
                                                @if ($product->alcohol)
                                                    <div class="product-attribute__item small-4 pa_nong-do">
                                                        <div class="pa-icon">
                                                            <img class="img-icon" src="/icon/pa_nong-do.svg" alt="Nồng độ">
                                                        </div>
                                                        <div class="pa-info">
                                                            <div class="pa-info__label">Nồng độ</div>
                                                            <div class="pa-info__value">
                                                                <p>{{ $product->alcohol }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($product->capacity)
                                                    <div class="product-attribute__item small-4 pa_dung-tich">
                                                        <div class="pa-icon">
                                                            <img class="img-icon icon-dung-tich" src="/icon/pa_dung-tich.svg" alt="Dung tích">
                                                        </div>
                                                        <div class="pa-info">
                                                            <div class="pa-info__label">Dung tích</div>
                                                            <div class="pa-info__value">
                                                                <p>{{ $product->capacity }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
        
                                        <div class="line-divider"></div>
        
                                        <div class="stock-status"> Tình trạng: 
                                            <span class='in-stock'>Còn hàng</span>
                                        </div>
                                        <h3>
                                            @if($product->is_discount)
                                                {{ numberFormat($product->discount_value) }}₫
                                                <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
                                            @else
                                                {{ numberFormat($product->price) }}₫
                                            @endif
                                        </h3>
                                    </div>
                                    {{-- <div class="color_code float_left">
                                    <p>Categories: <span>
                                        <a href="#">wine</a>
                                        </span>
                                    </p>
                                    </div> --}}
                                    <div class="number_pluse float_left">
                                        <input id="qty-product" class="qty-product" type="number" value="1" min="1">
                                        <a href="javascript:void(0)" class="cart_btn add-to-cart" data-id="{{ $product->id }}" data-type="product">
                                            THÊM VÀO GIỎ HÀNG
                                        </a>
                                    </div>
        
                                    <div class="product-contact row">
                                        <div class="col-12">
                                            <a href="tel:{{ $site_settings["new_phone_hn"] }}" class="hotline">
                                                HÀ NỘI<br>
                                                {{ $site_settings["phone_hn"] }}
                                            </a>
                                            <a href="tel:{{ $site_settings["new_phone_hcm"] }}" class="hotline">
                                                HỒ CHÍ MINH<br>
                                                {{ $site_settings["phone_hcm"] }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bz_single_product_accordian_main_wrapper bz_leather_accordian float_left">
                <div class="custom_container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="checkout_form">
                                <div class="accordion" id="accordionExample">
                                    <div class="card checkout_accord">
                                        <div class="card-header accord_header" id="headingOne">
                                            <h2 class="mb-0">
                                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
                                                <span>
                                                <i class="fas fa-angle-down"></i>
                                                </span> Thông tin sản phẩm </button>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="content_single_product">
                                                    <p>{!! $product->content !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @if ($products->isNotEmpty())
                <div class="bz_mobile_new_product_wraaper leather_new_product_wrapper float_left">
                    <div class="custom_container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="mobile_product_slider mobile_product_slider_detail">
                                    <h3>Sản phẩm bán chạy</h3>
                                    <div class="bz_product_grid_content_main_wrapper pt-0">
                                        <div class="bz_grid_menu_main_wrapper mt-0">
                                            <div class="tab-content">
                                                <div class="bz_product_view_grip_wrapper">
                                                    <div class="owl-carousel owl-theme">
                                                        @foreach ($products as $item)
                                                            <div class="item">
                                                                @include('components.item-product', [ "product" => $item ])
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="show-all-product-same">
                            <a class="btn btn-default" href="{{ route("country", ["country" => $product->country->slug, "grapes[" . $product->grape->id . "]" => $product->grape->slug]) }}">Xem tất cả</a>
                        </div>
                    </div>
                </div>
            @endif  
        </div>
    </div>
</div>
@endsection
    
    
@section('script')
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        $('.top_icon span').click(function() {
            if ($(this).hasClass('current')) {
                $(this).removeClass('current');
            } else {
                $('.top_icon span.current').removeClass('current');
                $(this).addClass('current');
            }
        });
    </script>
@endsection