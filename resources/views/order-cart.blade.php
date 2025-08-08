@extends('layouts.app')

@section('meta_title', "Giỏ hàng")
@section('meta_keyword', "Giỏ hàng")
@section('meta_description', "Giỏ hàng")

@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}" />
@stop

@section('content')
    <div class="page-title" style="background-image: url(images/section/page-title.jpg);">
        <div class="container">
            <h3 class="heading text-center">Giỏ hàng</h3>
            <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                <li><a class="link" href="{{ url('/') }}">Trang chủ</a></li>
                <li><i class="icon-arrRight"></i></li>
                <li>Giỏ hàng</li>
            </ul>
        </div>
    </div>
    <!-- /page-title -->
    <!-- Section cart -->
    <section class="flat-spacing">
        <div class="container">
            <div class="row">
                <div class="col-xl-8" id="order-cart-left">
                    @include("components.order-cart-left", ["count" => $count, "cart" => $cart])
                </div>
                <div class="col-xl-4" id="order-cart-right">
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
    </section>
@endsection
