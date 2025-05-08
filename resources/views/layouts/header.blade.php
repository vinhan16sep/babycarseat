@php
    list(,,$count) = getDataCart(0);
@endphp
<style>
    .design .content img{
        height: 200px;
        object-fit: cover;
        width: 100%;
    }
    .design .content h5{
        font-size: 16px;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    .desc h4{
        font-weight: normal;
    }
    .desc h4:hover{
        font-weight: bold;
    }
    .box-design{
        position: relative;
    }
    .box-design .design{
        position: relative;
        top: 0;
        display: none;
    }
    .box-design .design.active{
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
                <img src="{{ asset('images/logo/logo.png') }}" alt="logo" class="logo">
            </a>
        </div>
        <div class="col-xl-6 d-none d-xl-block">
            <nav class="box-navigation text-center">
                <ul class="box-nav-ul d-flex align-items-center justify-content-center">
                    <li class="menu-item {{ checkActiveMenu("") }}"><a href="{{ url('/') }}" class="item-link">Trang chủ</a></li>
                    <li class="menu-item {{ checkActiveMenu("san-pham") }}">
                        <a href="{{ route('product-list') }}" class="item-link">Baby Car Seat {!! !empty($categoriesMenu) ? '<i class="icon icon-arrow-down"></i>' : '' !!}</a>
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
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <img src="{{ asset($_i['image']) }}" alt="">
                                                                        <h5>{{ $_i['name'] }}</h5>
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
                    </li>
                    <li class="menu-item {{ checkActiveMenu("tin-tuc") }}"><a href="{{ route('news') }}" class="item-link">Blogs</a></li>
                    <li class="menu-item {{ checkActiveMenu("kien-thuc") }}"><a href="{{ route('category-detail-knowledge') }}" class="item-link">Kiến thức</a></li>
                    <li class="menu-item {{ checkActiveMenu("ve-chung-toi") }}"><a href="{{ route('about-show') }}" class="item-link">Về chúng tôi</a></li>
                    <li class="menu-item {{ checkActiveMenu("lien-he") }}"><a href="{{ route('contact') }}" class="item-link">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-xl-3 col-md-4 col-3">
            <ul class="nav-icon d-flex justify-content-end align-items-center">
                <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.5078 10.8734V6.36686C16.5078 5.17166 16.033 4.02541 15.1879 3.18028C14.3428 2.33514 13.1965 1.86035 12.0013 1.86035C10.8061 1.86035 9.65985 2.33514 8.81472 3.18028C7.96958 4.02541 7.49479 5.17166 7.49479 6.36686V10.8734M4.11491 8.62012H19.8877L21.0143 22.1396H2.98828L4.11491 8.62012Z"
                                stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="count-box">{{ $count }}</span></a>
                </li>
            </ul>
        </div>
    </div>
</header>
<!-- /Header -->
