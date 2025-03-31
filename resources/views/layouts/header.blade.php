@php
    list(,,$count) = getDataCart(0);
@endphp

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
                <img src="{{ asset('images/logo/logo.svg') }}" alt="logo" class="logo">
            </a>
        </div>
        <div class="col-xl-6 d-none d-xl-block">
            <nav class="box-navigation text-center">
                <ul class="box-nav-ul d-flex align-items-center justify-content-center">
                    <li class="menu-item active"><a href="#" class="item-link">Trang chủ</a></li>
                    <li class="menu-item"><a href="{{ route('product-list') }}" class="item-link">Sản phẩm</a></li>
                    <li class="menu-item"><a href="{{ route('news') }}" class="item-link">Blogs</a></li>
                    <li class="menu-item"><a href="{{ route('category-detail-knowledge') }}" class="item-link">Kiến thức</a></li>
                    <li class="menu-item"><a href="#" class="item-link">Về chúng tôi</a></li>
                    <li class="menu-item"><a href="#" class="item-link">Liên hệ</a></li>
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
