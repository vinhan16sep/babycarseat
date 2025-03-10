@extends('layouts.app')

@section('meta_title', "Giỏ hàng")
@section('meta_keyword', "Giỏ hàng")
@section('meta_description', "Giỏ hàng")

@section('content')
    <div class="bz_inner_page_navigation float_left">
        <div class="container custom_container">
            <div class="inner_menu float_left">
                <ul>
                    <li><a href="{{ route("home") }}"> <span><i class="fas fa-home"></i></span> </a></li>
                    <li class="active"><a> <span><i class="fas fa-angle-right"></i></span> Giỏ hàng </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bz_product_grid_content_main_wrapper float_left">
        <div class="container custom_container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12" id="order-cart-left">
                @include("components.order-cart-left", ["count" => $count, "cart" => $cart])
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="float_left" id="order-cart-right">
                    @include("components.order-cart-right", [
                        "cart" => $cart,
                        "count" => $count,
                        "total" => $total, 
                        "sub_total" => $sub_total, 
                        "discount_value" => $discount_value
                    ])
                </div>
            </div>
        </div>
        </div>
    </div>
    
@endsection