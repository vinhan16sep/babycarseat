@extends('layouts.app')

@section('meta_title', $accessory->name)
@section('meta_keyword', $accessory->name)
@section('meta_description', $accessory->name)
@section('meta_image', asset($accessory->image))

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
            <a href="{{ route("category-detail-accessory", ["category" => $accessory->category->slug]) }}">
                <span>
                    <i class="fas fa-angle-right"></i>
                </span> {{ $accessory->category->name }} </a>
            </li>
            <li class="active">
            <a href="#">
                <span>
                <i class="fas fa-angle-right"></i>
                </span> {{ $accessory->name }} </a>
            </li>
        </ul>
        </div>
        <div class="shoping_box float_left">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="sell_slider">
                    <img class="img-fluid" src="{{ getImage($accessory->image) }}" alt="{{ $accessory->name }}">
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-12">
                <div class="b_product_sell_details_wrapper float_left">
                    <div class="bz_product_heading float_left">
                        <h3>{{ $accessory->name }}</h3>
                        <p>{{ $accessory->description }}</p>
                        <br>
                        <div class="line-divider"></div>
                        <h3>
                          {{ numberFormat($accessory->price) }}₫
                        </h3>
                        <br>
                    </div>
                    {{-- <div class="color_code float_left">
                    <p>Categories: <span>
                        <a href="#">wine</a>
                        </span>
                    </p>
                    </div> --}}
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
                        </span> Thông tin phụ kiện </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                    <div class="content_single_product">
                        <p>{!! $accessory->content !!}</p>
                        <br>
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
    @if ($accessories->isNotEmpty())
        <div class="bz_mobile_new_product_wraaper leather_new_product_wrapper float_left">
            <div class="container custom_container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="mobile_product_slider">
                            <h3>Phụ kiện mới</h3>
                            <div class="bz_product_grid_content_main_wrapper pt-0">
                                <div class="bz_grid_menu_main_wrapper mt-0">
                                    <div class="tab-content">
                                        <div class="bz_product_view_grip_wrapper">
                                            <div class="owl-carousel owl-theme">
                                                @foreach ($accessories as $item)
                                                    <div class="item">
                                                        @include('components.item-product', [ "product" => $item, "is_accessory" => true ])
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