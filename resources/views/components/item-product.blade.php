@php
    $route = route("san-pham", ["slug" => $product->slug]);
@endphp

@if(!isset($is_grid) || !$is_grid)
    <div class="card-product style-list" data-availability="Out of stock" data-brand="adidas">
        <div class="card-product-wrapper">
            <a href="{{ $route }}" class="product-img">
                <img class="lazyload img-product" data-src="{{ getImage($product->image_for_list['image']) }}" src="{{ getImage($product->image_for_list['image']) }}" alt="image-product">
                <img class="lazyload img-hover" data-src="{{ getImage($product->image_for_list['image_hover']) }}" src="{{ getImage($product->image_for_list['image_hover']) }}" alt="image-product">
            </a>
        </div>
        <div class="card-product-info">
            <a href="{{ $route }}" class="title link">{{ $product->name }}</a>
            <div class="price">
                {{-- <span class="old-price">$98.00</span> --}}
                <span class="current-price">
                    @if($product->is_discount)
                        {{ numberFormat($product->discount_value) }}₫
                        <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
                    @else
                        {{ numberFormat($product->price) }}₫
                    @endif
                </span>
            </div>
            <p class="description text-secondary text-line-clamp-2">{{ $product->description }}</p>
            <div class="variant-wrap-list">
                @if ($product->productColors->isNotEmpty())
                    <ul class="list-color-product">
                        @foreach($product->productColors as $color)
                            <li class="list-color-item color-swatch {{ $loop->index === 0 ? 'active' : '' }} line">
                                <span class="d-none text-capitalize color-filter">{{ $color->name }}</span>
                                <span class="swatch-value bg-light-green"></span>
                                <img class="lazyload" data-src="{{ getImage($color->image) }}" src="{{ getImage($color->image) }}" alt="{{ $product->name }}">
                            </li>
                        @endforeach
                    </ul>
                @endif
                {{--                                                <div class="size-box list-product-btn">--}}
                {{--                                                    <span class="size-item box-icon">S</span>--}}
                {{--                                                    <span class="size-item box-icon">M</span>--}}
                {{--                                                    <span class="size-item box-icon active">L</span>--}}
                {{--                                                    <span class="size-item box-icon">XL</span>--}}
                {{--                                                    <span class="size-item box-icon disable">XXL</span>--}}
                {{--                                                </div>--}}

                <div class="list-product-btn">
                    <a href="#shoppingCart" data-bs-toggle="modal" class="d-none btn-main-product">Add To cart</a>
{{--                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">--}}
{{--                        <span class="icon icon-heart"></span>--}}
{{--                        <span class="tooltip">Wishlist</span>--}}
{{--                    </a>--}}
{{--                    <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">--}}
{{--                        <span class="icon icon-gitDiff"></span>--}}
{{--                        <span class="tooltip">Compare</span>--}}
{{--                    </a>--}}
{{--                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">--}}
{{--                        <span class="icon icon-eye"></span>--}}
{{--                        <span class="tooltip">Quick View</span>--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>
@else
    <div class="card-product grid card-product-size" data-availability="In stock" data-brand="zalando">
        <div class="card-product-wrapper">
            <a href="{{ $route }}" class="product-img">
                <img class="lazyload img-product" data-src="{{ getImage($product->image_for_list['image']) }}" src="{{ getImage($product->image_for_list['image']) }}" alt="image-product">
                <img class="lazyload img-hover" data-src="{{ getImage($product->image_for_list['image_hover']) }}" src="{{ getImage($product->image_for_list['image_hover']) }}" alt="image-product">
            </a>
{{--            <div class="variant-wrap size-list">--}}
{{--                <ul class="variant-box">--}}
{{--                    <li class="size-item">S</li>--}}
{{--                    <li class="size-item">M</li>--}}
{{--                    <li class="size-item">L</li>--}}
{{--                    <li class="size-item">XL</li>--}}
{{--                    <li class="size-item">2XL</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="list-product-btn">--}}
{{--                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">--}}
{{--                    <span class="icon icon-heart"></span>--}}
{{--                    <span class="tooltip">Wishlist</span>--}}
{{--                </a>--}}
{{--                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">--}}
{{--                    <span class="icon icon-gitDiff"></span>--}}
{{--                    <span class="tooltip">Compare</span>--}}
{{--                </a>--}}
{{--                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">--}}
{{--                    <span class="icon icon-eye"></span>--}}
{{--                    <span class="tooltip">Quick View</span>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="list-btn-main">
                <a data-bs-toggle="modal" class="btn-main-product quick-add" data-id="{{ $product->id }}">Quick Add</a>
            </div>
        </div>
        <div class="card-product-info">
            <a href="{{ $route }}" class="title link">{{ $product->name }}</a>
            <span class="price current-price">
                @if($product->is_discount)
                    {{ numberFormat($product->discount_value) }}₫
                    <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
                @else
                    {{ numberFormat($product->price) }}₫
                @endif
            </span>
            @if ($product->productColors->isNotEmpty())
                <ul class="list-color-product">
                    @foreach($product->productColors as $color)
                        <li class="list-color-item color-swatch {{ $loop->index === 0 ? 'active' : '' }} line">
                            <span class="d-none text-capitalize color-filter">{{ $color->color->name }}</span>
                            <span class="swatch-value bg-light-green" style="background-color: {{ $color->color->code }}!important"></span>
                            <img class="lazyload" data-src="{{ getImage($color->image) }}" src="{{ getImage($color->image) }}" alt="{{ $product->name }}">
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

@endif
