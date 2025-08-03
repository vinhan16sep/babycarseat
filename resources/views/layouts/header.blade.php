@php
    list(,,$count) = getDataCart(0);
@endphp
<style>
    header .design .content img{
        height: 200px;
        object-fit: contain;
        width: 100%;
        /*box-shadow: #cacaca 1px 1px 5px 0px;*/
    }
    header .design .content h5{
        font-size: 16px;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    header .desc h4, header .box-design .design h4{
        font-weight: 500;
    }
    header .desc h4:hover a{
        color: #374ea1 !important;
    }
    header .box-design{
        position: relative;
    }
    header .box-design .design{
        position: relative;
        top: 0;
        display: none;
        width: 100%;
    }
    header .box-design .design.active{
        display: inline-block;
    }
</style>
    <!-- Header -->
<header id="header" class="header-default header-fullwidth" style="box-shadow:0 1px 3px rgba(0, 0, 0, 0.1);">
    <div class="row wrapper-header align-items-center">
        <div class="col-md-4 col-3 d-xl-none">
            <a href="#mobileMenu" class="mobile-menu" data-bs-toggle="offcanvas" aria-controls="mobileMenu">
                <i class="icon icon-categories"></i>
            </a>
        </div>
        <div class="col-xl-3 col-md-4 col-6">
            <a href="{{ url('/') }}" class="logo-header">
                <img src="{{ asset('images/logo/logo.png?v=' . ($ver ?? '')) }}" alt="Babyro Logo" class="logo">
            </a>
        </div>
        <div class="col-xl-9 d-none d-xl-block">
            <nav class="box-navigation text-center">
                <ul class="box-nav-ul d-flex align-items-center">
                    <li class="menu-item"><a href="{{ route('about-show') }}" class="item-link">Giới thiệu</a></li>
                    <!-- <li class="menu-item {{ strpos($currentPath, 'san-pham') !== false || strpos($currentPath, 'chi-tiet-san-pham') !== false || strpos($currentPath, 'loai-san-pham') !== false  ? 'active' : '' }}">
                        <a href="{{ route('product-list') }}" class="item-link">Sản phẩm {!! !empty($categoriesMenu) ? '<i class="icon icon-arrow-down"></i>' : '' !!}</a>
                        @if(!empty($categoriesMenu))
                            <div class="sub-menu mega-menu" style="border-radius: 0;">
                                <div class="container">
                                    <div class="wrapper-control-shop">
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <div class="desc">
                                                    @foreach($categoriesMenu as $_item)
                                                        <h4 style="font-size: 20px;" data-category="{{ $_item["id"] }}">
                                                            <a href="{{ route("product-list", ['category_slug' => $_item['slug']]) }}">{{ $_item['name'] }}</a>
                                                        </h4>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-xl-9 box-design">
                                                @foreach($categoriesMenu as $_item)
                                                    <div class="design {{ $loop->index !== 0 ? '' : 'active' }} design-{{$_item['id']}}">
                                                        <h4 style="font-size: 20px;">{{ $_item['name'] }}</h4>
                                                        <div class="content">
                                                            <div class="row">
                                                                @foreach($_item['products'] as $_i)
                                                                    @php $_i = (array)$_i @endphp
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <a href="{{ route('product-index', ['slug' => $_i['slug']]) }}">
                                                                            <img src="{{ asset($_i['image']) }}" alt="{{ $_i['name'] }}">
                                                                        </a>
                                                                        <h5><a href="{{ route('product-index', ['slug' => $_i['slug']]) }}">{{ $_i['name'] }}</a></h5>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </li> -->
                    <li class="menu-item position-relative {{ strpos($currentPath, 'san-pham') !== false || strpos($currentPath, 'chi-tiet-san-pham') !== false || strpos($currentPath, 'loai-san-pham') !== false  ? 'active' : '' }}">
                        <a href="#" class="item-link">Sản phẩm<i class="icon icon-arrow-down"></i></a>
                        <div class="sub-menu submenu-default menu-list">
                            <ul class="menu-list">
                                @if(!empty($productTypes))
                                    <ul class="menu-list">
                                        @foreach($productTypes as $type)
                                            <li>
                                                <a href="{{ route('loai-san-pham', ['slug' => $type->slug]) }}" class="menu-link-text">{{ $type->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item position-relative">
                        <a href="#" class="item-link">Bảo hành<i class="icon icon-arrow-down"></i></a>
                        <div class="sub-menu submenu-default menu-list">
                            <ul class="menu-list">
                                <li><a href="{{ route('bao-hanh', ['view' => 'bao-hanh-2-nam']) }}" class="menu-link-text">Bảo hành cơ bản 2 năm</a></li>
                                <li><a href="{{ route('bao-hanh', ['view' => 'bao-hanh-vang-12-nam']) }}" class="menu-link-text">Bảo hành vàng 12 năm</a></li>
                                <li><a href="{{ route('bao-hanh', ['view' => 'doi-ghe-o-to-mien-phi']) }}" class="menu-link-text">Chương trình đổi ghế ô tô miễn phí</a></li>
                                <!-- <li><a href="#" class="menu-link-text">Chương trình Thu cũ Đổi mới</a></li> -->
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item"><a href="{{ route('news') }}" class="item-link">Tin tức</a></li>
                    <li class="menu-item"><a href="{{ route('contact') }}" class="item-link">Hỗ trợ</a></li>
                    <!-- <li class="menu-item"><a href="#" class="item-link">Buy now</a></li> -->
{{--                    @foreach($mainMenu as $_name => $_menus)--}}
{{--                        <li class="menu-item {{ checkActiveMenu(\Illuminate\Support\Str::Slug($_name)) }}">--}}
{{--                            <a href="#" class="item-link">{{ $_menus['name'] }} <i class="icon icon-arrow-down"></i></a>--}}
{{--                            @if(!empty($_menus))--}}
{{--                                <div class="sub-menu mega-menu" style="border-radius: 0;">--}}
{{--                                    <div class="container">--}}
{{--                                        <div class="wrapper-control-shop">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-xl-3">--}}
{{--                                                    <div class="desc">--}}
{{--                                                        @foreach($_menus['children'] as $_item)--}}
{{--                                                            <h4 style="font-size: 20px;" data-category="{{ $_item["id"] }}">--}}
{{--                                                                <a href="#">{{ $_item['name'] }}</a>--}}
{{--                                                            </h4>--}}
{{--                                                        @endforeach--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-xl-9 box-design">--}}
{{--                                                    @foreach($_menus['children'] as $_item)--}}
{{--                                                        <div class="design {{ $loop->index !== 0 ? '' : 'active' }} design-{{$_item['id']}}">--}}
{{--                                                            <h4 style="font-size: 20px;">{{ $_item['name'] }}</h4>--}}
{{--                                                            <div class="content">--}}
{{--                                                                <div class="row">--}}
{{--                                                                    @foreach($_item['posts'] as $_i)--}}
{{--                                                                        <div class="col-md-3 col-sm-6">--}}
{{--                                                                            <img src="{{ asset($_i['image'] ?? 'images/CustomerSay1.png') }}" alt="">--}}
{{--                                                                            <h5><a href="">{{ $_i['title'] }}</a></h5>--}}
{{--                                                                        </div>--}}
{{--                                                                    @endforeach--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endforeach--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                    <li class="menu-item {{ checkActiveMenu("tin-tuc") }}"><a href="{{ route('news') }}" class="item-link">Blogs</a></li>--}}
{{--                    <li class="menu-item {{ checkActiveMenu("kien-thuc") }}"><a href="{{ route('category-detail-knowledge') }}" class="item-link">Kiến thức</a></li>--}}
{{--                    <li class="menu-item {{ checkActiveMenu("giơi-thieu") }}"><a href="{{ route('about-show') }}" class="item-link">Về chúng tôi</a></li>--}}
{{--                    <li class="menu-item {{ checkActiveMenu("lien-he") }}"><a href="{{ route('contact') }}" class="item-link">Liên hệ</a></li>--}}
                </ul>
            </nav>
        </div>
{{--        <div class="col-xl-3 col-md-4 col-3">--}}
{{--            <ul class="nav-icon d-flex justify-content-end align-items-center">--}}
{{--                <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item">--}}
{{--                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                             xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path--}}
{{--                                d="M16.5078 10.8734V6.36686C16.5078 5.17166 16.033 4.02541 15.1879 3.18028C14.3428 2.33514 13.1965 1.86035 12.0013 1.86035C10.8061 1.86035 9.65985 2.33514 8.81472 3.18028C7.96958 4.02541 7.49479 5.17166 7.49479 6.36686V10.8734M4.11491 8.62012H19.8877L21.0143 22.1396H2.98828L4.11491 8.62012Z"--}}
{{--                                stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        </svg>--}}
{{--                        <span class="count-box">{{ $count }}</span></a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
    </div>
</header>
<!-- /Header -->
