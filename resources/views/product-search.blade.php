@extends('layouts.app')

@section('meta_title', "Tìm kiếm")
@section('meta_keyword', "Tìm kiếm")
@section('meta_description', "Tìm kiếm")

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}" />
@endsection

@section('content')
<div class="bz_inner_page_navigation float_left">
    <div class="container custom_container">
        <div class="inner_menu float_left">
            <ul>
                <li><a href="{{ route("home") }}"> <span><i class="fas fa-home"></i></span> </a></li>
                <li class="active"><a href="#"> <span><i class="fas fa-angle-right"></i></span> Tìm kiếm </a></li>
            </ul>
        </div>
    </div>
</div>

<div class="bz_product_grid_content_main_wrapper float_left">
    <div class="container custom_container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="bz_grid_menu_main_wrapper float_left mt-0">
                    <div class="menu_tabs">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="number_pegination">
                                    <p>
                                        @if($products->total() == 0)
                                            Không có sản phẩm nào
                                        @else
                                            Hiển thị {{ $products->firstItem() }} đến {{ $products->lastItem() }} của {{ $products->total() }} sản phẩm
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
                                    @foreach($products as  $product)
                                        <div class="col-lg-3 col-md-6 col-6 w-490-full">
                                            @include('components.item-product', ["product" => $product])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="page_pagination">
                            {!! $products->onEachSide(0)->links("simple-bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

