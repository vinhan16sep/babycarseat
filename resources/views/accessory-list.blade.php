@extends('layouts.app')

@section('meta_title', $category->name)
@section('meta_keyword', $category->name)
@section('meta_description', $category->name)

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}" />
@endsection

@section('content')
<div class="bz_inner_page_navigation float_left">
    <div class="container custom_container">
        <div class="inner_menu float_left">
            <ul>
                <li><a href="{{ route("home") }}"> <span><i class="fas fa-home"></i></span> </a></li>
                <li class="active"><a href="#"> <span><i class="fas fa-angle-right"></i></span> {{ $category->name }} </a></li>
            </ul>
        </div>
    </div>
</div>

<div class="bz_product_grid_content_main_wrapper float_left">
    <div class="container custom_container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12 order-sm-9_ order-xs-9_ order-12_ order-lg-0 order-md-0">
                <div class="checkout_form float_left">
                    <div class="accordion" id="accordionExample">
                        <div class="mobile-sidebar">
                            <div id="toggle_filter">Tìm kiếm <i class="fa fa-filter" aria-hidden="true"></i></div>
                            <div class="container">
                                <div id="sidebar-filter" class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
                                    <div class="pd_toggle_logo sidebar">
                                        <a href="index_wines.html">
                                            <img class="img-fluid" src="/images/wins/logo.png" alt="Tìm kiếm">
                                        </a>
                                    </div>
                                    <div id="toggle_close_filter">&times;</div>
                                    <div id='cssmenu-filter'>
                                        @include('components.sidebar', ["sidebar_type" => "mobile", "is_accessory" => true, "category" => $category])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pc-sidebar">
                            @include('components.sidebar', ["sidebar_type" => "pc", "is_accessory" => true, "category" => $category])
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-12">
                <div class="bz_grid_menu_main_wrapper float_left mt-0">
                    <div class="menu_tabs">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="number_pegination">
                                    <p>
                                        @if($accessories->total() == 0)
                                            Không có sản phẩm nào
                                        @else
                                            Hiển thị {{ $accessories->firstItem() }} đến {{ $accessories->lastItem() }} của {{ $accessories->total() }} sản phẩm
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="grid" class="tab-pane fade in active show">
                            <div class="bz_product_view_grip_wrapper float_left">
                                <div class="row">
                                    @foreach($accessories as  $product)
                                        <div class="col-lg-4 col-md-6 col-6 w-490-full">
                                            @include('components.item-product', ["product" => $product, "is_accessory" => true])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="page_pagination">
                            {!! $accessories->onEachSide(0)->links("simple-bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('script')
    {{-- <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script>
        $(document).ready(function() {
            const numberFormat = new Intl.NumberFormat();
            $("#slider-range-pc").slider({
                range: true,
                min: 0,
                max: {{ $product_price_max  }},
                values: [ {{ request("min_price", 0) }}, {{ request("max_price", $product_price_max) }} ],
                step: 500000,
                slide: function( event, ui ) {
                    $("form .min_price_pc").val(ui.values[0]);
                    $("form .max_price_pc").val(ui.values[1]);
                    $( "form .amount_pc" ).html( numberFormat.format(ui.values[ 0 ]) + "₫ - " + numberFormat.format(ui.values[ 1 ]) + "₫" );
                }
            });
            $("#slider-range-mobile").slider({
                range: true,
                min: 0,
                max: {{ $product_price_max }},
                values: [ {{ request("min_price", 0) }}, {{ request("max_price", $product_price_max) }} ],
                step: 500000,
                slide: function( event, ui ) {
                    $("form .min_price_mobile").val(ui.values[0]);
                    $("form .max_price_mobile").val(ui.values[1]);
                    $( "form .amount_mobile" ).html( numberFormat.format(ui.values[ 0 ]) + "₫ - " + numberFormat.format(ui.values[ 1 ]) + "₫" );
                }
            });
        });
    </script> --}}
@endsection
