@extends('layouts.app')

@section('meta_title', $product->name)
@section('meta_keyword', $product->name)
@section('meta_description', $product->name)
@section('meta_image', asset($product->image))

@section('content')
    <div class="bz_single_product_main_wrapper bz_leather_single_wrapper float_left">
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
            <a href="{{ route("combo") }}">
                <span>
                    <i class="fas fa-angle-right"></i>
                </span> Combo </a>
            </li>
            <li class="active">
            <a href="#">
                <span>
                <i class="fas fa-angle-right"></i>
                </span> {{ $product->name }} </a>
            </li>
        </ul>
        </div>
        <div class="shoping_box float_left">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="sell_slider">
                    <img class="img-fluid" src="{{ getImage($product->image) }}" alt="{{ $product->name }}">
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-12">
                <div class="b_product_sell_details_wrapper float_left">
                    <div class="bz_product_heading float_left">
                        <h3>{{ $product->name }}</h3>
                        <div class="product-attribute-hz">
                            <div class="row">
                               <div class="col-md-8">
                                    <div class="wooco-products">
                                        @foreach ($product->products as $item)
                                            <div class="wooco-product is-small">
                                                <div class="wooco-thumb">
                                                    <div class="wooco-thumb-ori">
                                                        <img src="{{ getImage($item->image) }}" alt="{{ $item->name }}">
                                                    </div>
                                                    </div>
                                                    <div class="wooco-title">
                                                    <div class="wooco-title-inner">
                                                        {{ $item->pivot->quantity }} × 
                                                        <a href="{{ route("san-pham", ["slug" => $item->slug])}}">
                                                            {{ $item->name }}
                                                        </a>
                                                    </div>
                                                    </div>
                                                    <div class="wooco-price">
                                                    <div class="wooco-price-ori">
                                                        <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            @if($item->is_discount)
                                                                {{ numberFormat($item->discount_value) }}
                                                            @else
                                                                {{ numberFormat($item->price) }}
                                                            @endif
                                                            ₫
                                                        </bdi>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                               </div>
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
                        <a href="javascript:void(0)" class="cart_btn add-to-cart" data-id="{{ $product->id }}" data-type="combo">
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
    <div class="container custom_container">
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
                        <p>{{ $product->description }}</p>
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
            <div class="container custom_container">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mobile_product_slider">
                        <h3>Sản phẩm bán chạy</h3>
                        <div class="bz_product_grid_content_main_wrapper pt-0">
                            <div class="bz_grid_menu_main_wrapper mt-0">
                                <div class="tab-content">
                                    <div class="bz_product_view_grip_wrapper">
                                        <div class="owl-carousel owl-theme">
                                            @foreach ($products as $item)
                                                <div class="item">
                                                    @include('components.item-product', [ "product" => $item, "is_combo" => true ])
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
            </div>
        </div>
    @endif  
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