@extends('layouts.app')

@php
    $meta = "Product List";
@endphp

@section('meta_title', $meta)
@section('meta_keyword', $meta)
@section('meta_description', $meta)

@section('css')

@endsection

@section('content')

        <!-- page-title -->
        <div class="page-title" style="background-image: url({{ asset('images/section/page-title.jpg') }});">
            <div class="container-full">
                <div class="row">
                    <div class="col-12">
                        <h3 class="heading text-center">{{ $category->name ?? 'Danh sách sản phẩm' }}</h3>
                        <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                            <li>
                                <a class="link" href="{{ url('/') }}">Trang chủ</a>
                            </li>
                            <li>
                                <i class="icon-arrRight"></i>
                            </li>
                            <li>
                                {{ $category->name ?? 'Danh sách sản phẩm' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- Section product -->
        <section class="flat-spacing">
            <div class="container">
                <div class="tf-shop-control">
                    <div class="tf-control-filter">
                        <button id="filterShop" class="filterShop tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Tìm kiếm</span></button>
{{--                        <div class="d-none d-lg-flex shop-sale-text">--}}
{{--                            <i class="icon icon-checkCircle"></i>--}}
{{--                            <p class="text-caption-1">Shop sale items only</p>--}}
{{--                        </div>--}}
                    </div>
                    <ul class="tf-control-layout">
                        <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                            <div class="item">
                                <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="6" r="2.5" stroke="#181818"/>
                                    <rect x="7.5" y="3.5" width="12" height="5" rx="2.5" stroke="#181818"/>
                                    <circle cx="3" cy="14" r="2.5" stroke="#181818"/>
                                    <rect x="7.5" y="11.5" width="12" height="5" rx="2.5" stroke="#181818"/>
                                </svg>
                            </div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                            <div class="item">
                                <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="6" cy="6" r="2.5" stroke="#181818"/>
                                    <circle cx="14" cy="6" r="2.5" stroke="#181818"/>
                                    <circle cx="6" cy="14" r="2.5" stroke="#181818"/>
                                    <circle cx="14" cy="14" r="2.5" stroke="#181818"/>
                                </svg>
                            </div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-3 active" data-value-layout="tf-col-3">
                            <div class="item">
                                <svg class="icon" width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="6" r="2.5" stroke="#181818"/>
                                    <circle cx="11" cy="6" r="2.5" stroke="#181818"/>
                                    <circle cx="19" cy="6" r="2.5" stroke="#181818"/>
                                    <circle cx="3" cy="14" r="2.5" stroke="#181818"/>
                                    <circle cx="11" cy="14" r="2.5" stroke="#181818"/>
                                    <circle cx="19" cy="14" r="2.5" stroke="#181818"/>
                                </svg>
                            </div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-4" data-value-layout="tf-col-4">
                            <div class="item">
                                <svg class="icon" width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="6" r="2.5" stroke="#181818"/>
                                    <circle cx="11" cy="6" r="2.5" stroke="#181818"/>
                                    <circle cx="19" cy="6" r="2.5" stroke="#181818"/>
                                    <circle cx="27" cy="6" r="2.5" stroke="#181818"/>
                                    <circle cx="3" cy="14" r="2.5" stroke="#181818"/>
                                    <circle cx="11" cy="14" r="2.5" stroke="#181818"/>
                                    <circle cx="19" cy="14" r="2.5" stroke="#181818"/>
                                    <circle cx="27" cy="14" r="2.5" stroke="#181818"/>
                                </svg>
                            </div>
                        </li>
                    </ul>
                    <div class="tf-control-sorting">
                        <p class="d-none d-lg-block text-caption-1">Sắp xếp theo:</p>
                        <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                            <div class="btn-select">
                                <span class="text-sort-value">{{ !isset($sorts[request()->orderBy]) ? $sorts['date']['title'] : $sorts[request()->orderBy]['title'] }}</span>
                                <span class="icon icon-arrow-down"></span>
                            </div>
                            <div class="dropdown-menu">
                                @foreach($sorts as $key => $val)
                                    <div class="select-item {{ request('orderBy', 'date') == $key ? 'active' : '' }}" data-sort-value="{{ $key }}">
                                        <span class="text-value-item">{{ $val["title"] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper-control-shop">
                    <div class="meta-filter-shop">
                        <div id="product-count-grid" class="count-text"></div>
                        <div id="product-count-list" class="count-text"></div>
                        <div id="applied-filters"></div>
                        <button id="remove-all" class="remove-all-filters text-btn-uppercase" style="display: none;">REMOVE ALL <i class="icon icon-close"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            @include('components.sidebar-product', ['category' => $category, 'categories' => $categories, 'product_price_max' => $product_price_max])
                        </div>
                        <div class="col-xl-9">
                            <div class="tf-list-layout wrapper-shop" id="listLayout">
                                <!-- card product list 1 -->
                                @foreach($products as $product)
                                    @include('components.item-product', ["product" => $product])
                                @endforeach

                                <!-- pagination -->
                                {!! $products->onEachSide(0)->links("simple-bootstrap-4") !!}
                            </div>

                            <div class="tf-grid-layout wrapper-shop tf-col-3" id="gridLayout">

                                @foreach($products as $product)
                                    @include('components.item-product', ["product" => $product, 'is_grid' => true])
                                @endforeach

                                <!-- pagination -->
                                {!! $products->onEachSide(0)->links("simple-bootstrap-4") !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /Section product -->

        <div class="overlay-filter" id="overlay-filter"></div>
@endsection


@section('script')
    <script type="text/javascript" src="{{ asset('js/nouislider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/shop.js') }}"></script>
@endsection
