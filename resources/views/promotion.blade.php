@extends('layouts.app')

@section('meta_title', "Khuyến mại")
@section('meta_keyword', "Khuyến mại")
@section('meta_description', "Khuyến mại")

@section('content')
<div class="inline-block">
    <div class="section-content box-relative">
        <div class="section-img-bg" style="background-image: url({{ getImage("images/Layer-1-scaled.jpg") }});width: 100%;height: 100%;background-repeat: no-repeat;background-size: cover;">
        </div>
        <div class="section-img-title">
            <img src="{{ getImage("images/Group-32.png") }}" />
        </div>
        <div class="container">
            <div class="row">
                @foreach ($highlightPromotions as $item)
                    @php
                        $route = "";
                        if ($item->item_type == 2 && !empty($item->combo)) {
                            $route = route("detail-combo", ["slug" => $item->combo->slug]);
                        } elseif ($item->item_type == 1 && !empty($item->product)) {
                            $route = route("san-pham", ["slug" => $item->product->slug]);
                        }
                    @endphp
                    <div class="col-md-4 box-promotion">
                        <div>
                            <a href="{{ $route }}">
                                <img src="{{ getImage($item->image) }}" alt="{{ $item->title }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@if ($promotions->isNotEmpty())
    <div class="section-list promotion">
        <div class="container">
            <div class="row">
            @foreach ($promotions as $item)
                @include('components.promotion-item', ["item" => $item])
            @endforeach
            <div class="bz_product_grid_content_main_wrapper pd-0 text-center w-100">
                <div class="bz_grid_menu_main_wrapper">
                    <div class="tab-content">
                        <div class="page_pagination pd-0">
                            {!! $promotions->onEachSide(0)->links("simple-bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endif
    
@endsection