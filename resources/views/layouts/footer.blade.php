<!-- Footer -->
<footer id="footer" class="footer">
    <div class="footer-wrap home-padding">
        <div class="footer-body">
            <div class="container-fluid">
                <div class="row magin-sm-0">
                    <div class="col-lg-12">
                        <div class="footer-logo" style="margin-bottom: 12px;">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('images/logo/footer-logo.png?v=' . ($ver ?? '')) }}" alt="Babyro Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-infor">
                            <div class="footer-heading text-button">
                                Engineered with love
                            </div>
                            <ul class="footer-info">
                                <li>
                                    <p>{{ $contactInformations['address_hn'] }}</p>
                                </li>
                                <li>
{{--                                    <i class="icon-mail"></i>--}}
                                    <p>{{ $contactInformations['email'] }}</p>
                                </li>
                                <li>
{{--                                    <i class="icon-phone"></i>--}}
                                    <p>{{ $contactInformations['hotline'] }}</p>
                                </li>
                            </ul>
                            <ul class="tf-social-icon" style="margin-top: 15px;">
                                <li><a href="#" class="social-facebook"><i class="icon icon-fb"></i></a></li>
                                <li><a href="#" class="social-instagram"><i class="icon icon-instagram"></i></a></li>
                                <li><a href="#" class="social-tiktok"><i class="icon icon-tiktok"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 position-desk">
                        <div class="footer-menu" style="margin-bottom: 0;float: right;">
                            <div class="footer-col-block">
                                <div class="footer-heading text-button footer-heading-mobile">
                                    {{ $footerMenuPosition[1] ?? 'Babyro' }}
                                </div>
                                <div class="tf-collapse-content">
                                    <ul class="footer-menu-list">
                                        @foreach($footerMenu as $value)
                                            @if ($value['position'] == 1)
                                                <li class="text-caption-1">
                                                    <a href="{{ $value['link'] }}" class="footer-menu_item">{{ $value['title'] }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 position-desk">
                        <div class="footer-menu" style="margin-bottom: 0;float: right;margin-right:30px;">
                        <div class="footer-col-block">
                            <div class="footer-heading text-button footer-heading-mobile">
                                {{ $footerMenuPosition[2] ?? 'Chính sách' }}
                            </div>
                            <div class="tf-collapse-content">
                                <ul class="footer-menu-list">
                                    @foreach($footerMenu as $value)
                                        @if ($value['position'] == 2)
                                            <li class="text-caption-1">
                                                <a href="{{ $value['link'] }}" class="footer-menu_item">{{ $value['title'] }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 position-desk">
                        <div class="footer-menu" style="margin-bottom: 0;float: right;">
                        <div class="footer-col-block">
                            <div class="footer-heading text-button footer-heading-mobile">
                                {{ $footerMenuPosition[3] ?? 'Hỗ trợ' }}
                            </div>
                            <div class="tf-collapse-content">
                                <ul class="footer-menu-list">
                                    @foreach($footerMenu as $value)
                                        @if ($value['position'] == 3)
                                            <li class="text-caption-1">
                                                <a href="{{ $value['link'] }}" class="footer-menu_item">{{ $value['title'] }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom-wrap">
                        <div class="text-center"><!--left-->
                            <p class="text-caption-1">©2020 Babyro. All Rights Reserved.</p>
                        </div>
                        <!-- <div class="tf-payment">
                                <p class="text-caption-1">Payment:</p>
                                <ul>
                                    <li>
                                        <img src="{{ asset('images/payment/img-1.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/payment/img-2.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/payment/img-3.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/payment/img-4.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/payment/img-5.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/payment/img-6.png') }}" alt="">
                                    </li>
                                </ul>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer -->

<!-- toolbar-bottom -->
<div class="tf-toolbar-bottom">
    <div class="toolbar-item">
        <a href="shop-default-grid.html">
            <div class="toolbar-icon">
                <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.125 3.125H4.375C4.04348 3.125 3.72554 3.2567 3.49112 3.49112C3.2567 3.72554 3.125 4.04348 3.125 4.375V8.125C3.125 8.45652 3.2567 8.77446 3.49112 9.00888C3.72554 9.2433 4.04348 9.375 4.375 9.375H8.125C8.45652 9.375 8.77446 9.2433 9.00888 9.00888C9.2433 8.77446 9.375 8.45652 9.375 8.125V4.375C9.375 4.04348 9.2433 3.72554 9.00888 3.49112C8.77446 3.2567 8.45652 3.125 8.125 3.125ZM8.125 8.125H4.375V4.375H8.125V8.125ZM15.625 3.125H11.875C11.5435 3.125 11.2255 3.2567 10.9911 3.49112C10.7567 3.72554 10.625 4.04348 10.625 4.375V8.125C10.625 8.45652 10.7567 8.77446 10.9911 9.00888C11.2255 9.2433 11.5435 9.375 11.875 9.375H15.625C15.9565 9.375 16.2745 9.2433 16.5089 9.00888C16.7433 8.77446 16.875 8.45652 16.875 8.125V4.375C16.875 4.04348 16.7433 3.72554 16.5089 3.49112C16.2745 3.2567 15.9565 3.125 15.625 3.125ZM15.625 8.125H11.875V4.375H15.625V8.125ZM8.125 10.625H4.375C4.04348 10.625 3.72554 10.7567 3.49112 10.9911C3.2567 11.2255 3.125 11.5435 3.125 11.875V15.625C3.125 15.9565 3.2567 16.2745 3.49112 16.5089C3.72554 16.7433 4.04348 16.875 4.375 16.875H8.125C8.45652 16.875 8.77446 16.7433 9.00888 16.5089C9.2433 16.2745 9.375 15.9565 9.375 15.625V11.875C9.375 11.5435 9.2433 11.2255 9.00888 10.9911C8.77446 10.7567 8.45652 10.625 8.125 10.625ZM8.125 15.625H4.375V11.875H8.125V15.625ZM15.625 10.625H11.875C11.5435 10.625 11.2255 10.7567 10.9911 10.9911C10.7567 11.2255 10.625 11.5435 10.625 11.875V15.625C10.625 15.9565 10.7567 16.2745 10.9911 16.5089C11.2255 16.7433 11.5435 16.875 11.875 16.875H15.625C15.9565 16.875 16.2745 16.7433 16.5089 16.5089C16.7433 16.2745 16.875 15.9565 16.875 15.625V11.875C16.875 11.5435 16.7433 11.2255 16.5089 10.9911C16.2745 10.7567 15.9565 10.625 15.625 10.625ZM15.625 15.625H11.875V11.875H15.625V15.625Z"
                        fill="#4D4E4F"/>
                </svg>
            </div>
            <div class="toolbar-label">Shop</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="#shopCategories" data-bs-toggle="offcanvas" aria-controls="shopCategories">
            <div class="toolbar-icon">
                <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10ZM3.125 5.625H16.875C17.0408 5.625 17.1997 5.55915 17.3169 5.44194C17.4342 5.32473 17.5 5.16576 17.5 5C17.5 4.83424 17.4342 4.67527 17.3169 4.55806C17.1997 4.44085 17.0408 4.375 16.875 4.375H3.125C2.95924 4.375 2.80027 4.44085 2.68306 4.55806C2.56585 4.67527 2.5 4.83424 2.5 5C2.5 5.16576 2.56585 5.32473 2.68306 5.44194C2.80027 5.55915 2.95924 5.625 3.125 5.625ZM16.875 14.375H3.125C2.95924 14.375 2.80027 14.4408 2.68306 14.5581C2.56585 14.6753 2.5 14.8342 2.5 15C2.5 15.1658 2.56585 15.3247 2.68306 15.4419C2.80027 15.5592 2.95924 15.625 3.125 15.625H16.875C17.0408 15.625 17.1997 15.5592 17.3169 15.4419C17.4342 15.3247 17.5 15.1658 17.5 15C17.5 14.8342 17.4342 14.6753 17.3169 14.5581C17.1997 14.4408 17.0408 14.375 16.875 14.375Z"
                        fill="#4D4E4F"/>
                </svg>
            </div>
            <div class="toolbar-label">Categories</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="#search" data-bs-toggle="modal">
            <div class="toolbar-icon">
                <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.9419 17.058L14.0302 13.1471C15.1639 11.7859 15.7293 10.04 15.6086 8.27263C15.488 6.50524 14.6906 4.85241 13.3823 3.65797C12.074 2.46353 10.3557 1.81944 8.58462 1.85969C6.81357 1.89994 5.12622 2.62143 3.87358 3.87407C2.62094 5.12671 1.89945 6.81406 1.8592 8.5851C1.81895 10.3561 2.46304 12.0745 3.65748 13.3828C4.85192 14.691 6.50475 15.4884 8.27214 15.6091C10.0395 15.7298 11.7854 15.1644 13.1466 14.0306L17.0575 17.9424C17.1156 18.0004 17.1845 18.0465 17.2604 18.0779C17.3363 18.1094 17.4176 18.1255 17.4997 18.1255C17.5818 18.1255 17.6631 18.1094 17.739 18.0779C17.8149 18.0465 17.8838 18.0004 17.9419 17.9424C17.9999 17.8843 18.046 17.8154 18.0774 17.7395C18.1089 17.6636 18.125 17.5823 18.125 17.5002C18.125 17.4181 18.1089 17.3367 18.0774 17.2609C18.046 17.185 17.9999 17.1161 17.9419 17.058ZM3.12469 8.75018C3.12469 7.63766 3.45459 6.55012 4.07267 5.6251C4.69076 4.70007 5.56926 3.9791 6.5971 3.55336C7.62493 3.12761 8.75593 3.01622 9.84707 3.23326C10.9382 3.4503 11.9405 3.98603 12.7272 4.7727C13.5138 5.55937 14.0496 6.56165 14.2666 7.6528C14.4837 8.74394 14.3723 9.87494 13.9465 10.9028C13.5208 11.9306 12.7998 12.8091 11.8748 13.4272C10.9497 14.0453 9.86221 14.3752 8.74969 14.3752C7.25836 14.3735 5.82858 13.7804 4.77404 12.7258C3.71951 11.6713 3.12634 10.2415 3.12469 8.75018Z"
                        fill="#4D4E4F"/>
                </svg>
            </div>
            <div class="toolbar-label">Search</div>
        </a>
    </div>
    <div class="toolbar-item d-none">
        <a href="#shoppingCart" data-bs-toggle="modal">
            <div class="toolbar-icon">
                <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.75 8.23389V4.48389C13.75 3.48932 13.3549 2.5355 12.6517 1.83224C11.9484 1.12897 10.9946 0.733887 10 0.733887C9.00544 0.733887 8.05161 1.12897 7.34835 1.83224C6.64509 2.5355 6.25 3.48932 6.25 4.48389V8.23389M3.4375 6.35889H16.5625L17.5 17.6089H2.5L3.4375 6.35889Z"
                        stroke="#4D4E4F" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="toolbar-label">Cart</div>
        </a>
    </div>
</div>
<!-- /toolbar-bottom -->

<!-- search -->
<div class="modal fade modal-search" id="search">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Search</h5>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <form class="form-search">
                <fieldset class="text">
                    <input type="text" placeholder="Searching..." class="" name="text" tabindex="0" value=""
                           aria-required="true" required="">
                </fieldset>
                <button class="" type="submit">
                    <svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                            stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </button>
            </form>
            <div>
                <h5 class="mb_16">Feature keywords Today</h5>
                <ul class="list-tags">
                    <li><a href="#" class="radius-60 link">Dresses</a></li>
                    <li><a href="#" class="radius-60 link">Dresses women</a></li>
                    <li><a href="#" class="radius-60 link">Dresses midi</a></li>
                    <li><a href="#" class="radius-60 link">Dress summer</a></li>
                </ul>
            </div>
            <div>
                <h6 class="mb_16">Recently viewed products</h6>
                <div class="tf-grid-layout tf-col-2 lg-col-3 xl-col-4 loadmore-item" data-display="4" data-count="4">
                    <div class="fl-item card-product card-product-size">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/womens/women-8.jpg') }}"
                                     src="{{ asset('images/products/womens/women-8.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{ asset('images/products/womens/women-9.jpg') }}"
                                     src="{{ asset('images/products/womens/women-9.jpg') }}" alt="image-product">
                            </a>
                            <div class="variant-wrap size-list">
                                <ul class="variant-box">
                                    <li class="size-item">S</li>
                                    <li class="size-item">M</li>
                                    <li class="size-item">L</li>
                                    <li class="size-item">XL</li>
                                </ul>
                            </div>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Ribbed cotton-blend top</a>
                            <span class="price current-price">$39.99</span>
                        </div>
                    </div>
                    <div class="fl-item card-product">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/womens/women-171.jpg') }}"
                                     src="{{ asset('images/products/womens/women-171.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{ asset('images/products/womens/women-172.jpg') }}"
                                     src="{{ asset('images/products/womens/women-172.jpg') }}" alt="image-product">
                            </a>

                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Faux-leather trousers</a>
                            <span class="price current-price">$79.99</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="d-none text-capitalize color-filter">Orange</span>
                                    <span class="swatch-value bg-orange"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-171.jpg') }}"
                                         src="{{ asset('images/products/womens/women-171.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="d-none text-capitalize color-filter">Pink</span>
                                    <span class="swatch-value bg-dark-pink"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-172.jpg') }}"
                                         src="{{ asset('images/products/womens/women-172.jpg') }}" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="fl-item card-product card-product-size">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/womens/women-83.jpg') }}"
                                     src="{{ asset('images/products/womens/women-83.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{ asset('images/products/womens/women-84.jpg') }}"
                                     src="{{ asset('images/products/womens/women-84.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                            <div class="variant-wrap size-list">
                                <ul class="variant-box">
                                    <li class="size-item">S</li>
                                    <li class="size-item">M</li>
                                    <li class="size-item">L</li>
                                    <li class="size-item">XL</li>
                                </ul>
                            </div>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Belt wrap dress</a>
                            <div class="price"><span class="old-price">$98.00</span><span
                                    class="current-price">$129.99</span></div>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="d-none text-capitalize color-filter">Green</span>
                                    <span class="swatch-value bg-light-green"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-83.jpg') }}"
                                         src="{{ asset('images/products/womens/women-83.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="d-none text-capitalize color-filter">Grey</span>
                                    <span class="swatch-value bg-grey"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-94.jpg') }}"
                                         src="{{ asset('images/products/womens/women-94.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch line">
                                    <span class="d-none text-capitalize color-filter">White</span>
                                    <span class="swatch-value bg-white"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-87.jpg') }}"
                                         src="{{ asset('images/products/womens/women-87.jpg') }}" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="fl-item card-product card-product-size">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/womens/women-102.jpg') }}"
                                     src="{{ asset('images/products/womens/women-102.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{ asset('images/products/womens/women-103.jpg') }}"
                                     src="{{ asset('images/products/womens/women-103.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                            <div class="variant-wrap size-list">
                                <ul class="variant-box">
                                    <li class="size-item">S</li>
                                    <li class="size-item">M</li>
                                    <li class="size-item">L</li>
                                    <li class="size-item">XL</li>
                                </ul>
                            </div>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Double-button trench coat</a>
                            <div class="price"><span class="old-price">$98.00</span><span
                                    class="current-price">$219.99</span></div>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="d-none text-capitalize color-filter">Grey</span>
                                    <span class="swatch-value bg-grey-2"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-102.jpg') }}"
                                         src="{{ asset('images/products/womens/women-102.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="d-none text-capitalize color-filter">Orange</span>
                                    <span class="swatch-value bg-light-orange"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-111.jpg') }}"
                                         src="{{ asset('images/products/womens/women-111.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch line">
                                    <span class="d-none text-capitalize color-filter">White</span>
                                    <span class="swatch-value bg-white"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-104.jpg') }}"
                                         src="{{ asset('images/products/womens/women-104.jpg') }}" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="fl-item card-product">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/mens/men-11.jpg') }}"
                                     src="{{ asset('images/products/mens/men-11.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{ asset('images/products/mens/men-12.jpg') }}"
                                     src="{{ asset('images/products/mens/men-12.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">V-neck cotton T-shirt</a>
                            <span class="price current-price">$59.99</span>
                        </div>
                    </div>
                    <div class="fl-item card-product">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/mens/men-13.jpg') }}"
                                     src="{{ asset('images/products/mens/men-13.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{ asset('images/products/mens/men-14.jpg') }}"
                                     src="{{ asset('images/products/mens/men-14.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                            <div class="marquee-product bg-main">
                                <div class="marquee-wrapper">
                                    <div class="initial-child-container">
                                        <div class="marquee-child-item">
                                            <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                        </div>
                                        <div class="marquee-child-item">
                                            <span class="icon icon-lightning text-critical"></span>
                                        </div>
                                        <div class="marquee-child-item">
                                            <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                        </div>
                                        <div class="marquee-child-item">
                                            <span class="icon icon-lightning text-critical"></span>
                                        </div>
                                        <div class="marquee-child-item">
                                            <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                        </div>
                                        <div class="marquee-child-item">
                                            <span class="icon icon-lightning text-critical"></span>
                                        </div>
                                        <div class="marquee-child-item">
                                            <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                        </div>
                                        <div class="marquee-child-item">
                                            <span class="icon icon-lightning text-critical"></span>
                                        </div>
                                        <div class="marquee-child-item">
                                            <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                        </div>
                                        <div class="marquee-child-item">
                                            <span class="icon icon-lightning text-critical"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="marquee-wrapper">
                                    <div class="initial-child-container">
                                        <div class="marquee-child-item">
                                            <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                        </div>
                                        <div class="marquee-child-item">
                                            <span class="icon icon-lightning text-critical"></span>
                                        </div>
                                        <div class="marquee-child-item">
                                            <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                        </div>
                                        <div class="marquee-child-item">
                                            <span class="icon icon-lightning text-critical"></span>
                                        </div>
                                        <div class="marquee-child-item">
                                            <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                        </div>
                                        <div class="marquee-child-item">
                                            <span class="icon icon-lightning text-critical"></span>
                                        </div>
                                        <div class="marquee-child-item">
                                            <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                        </div>
                                        <div class="marquee-child-item">
                                            <span class="icon icon-lightning text-critical"></span>
                                        </div>
                                        <div class="marquee-child-item">
                                            <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale 25% OFF</p>
                                        </div>
                                        <div class="marquee-child-item">
                                            <span class="icon icon-lightning text-critical"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Polarized sunglasses</a>
                            <div class="price"><span class="old-price">$98.00</span> <span
                                    class="current-price">$79.99</span></div>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="d-none text-capitalize color-filter">Beige</span>
                                    <span class="swatch-value bg-beige"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/mens/men-13.jpg') }}"
                                         src="{{ asset('images/products/mens/men-13.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="d-none text-capitalize color-filter">Light Blue</span>
                                    <span class="swatch-value bg-light-blue-2"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/mens/men-12.jpg') }}"
                                         src="{{ asset('images/products/mens/men-12.jpg') }}" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="fl-item card-product card-product-size">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/mens/men-7.jpg') }}"
                                     src="{{ asset('images/products/mens/men-7.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('images/products/mens/men-8.jpg') }}"
                                     src="{{ asset('images/products/mens/men-8.jpg') }}" alt="image-product">
                            </a>
                            <div class="on-sale-wrap"><span class="on-sale-item">-25%</span></div>
                            <div class="variant-wrap size-list">
                                <ul class="variant-box">
                                    <li class="size-item">S</li>
                                    <li class="size-item">M</li>
                                    <li class="size-item">L</li>
                                    <li class="size-item">XL</li>
                                </ul>
                            </div>
                            <div class="variant-wrap countdown-wrap">
                                <div class="variant-box">
                                    <div class="js-countdown" data-timer="1007500" data-labels="D :,H :,M :,S"></div>
                                </div>
                            </div>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Ramie shirt with pockets </a>
                            <div class="price"><span class="old-price">$98.00</span> <span
                                    class="current-price">$89.99</span></div>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active line">
                                    <span class="d-none text-capitalize color-filter">Green</span>
                                    <span class="swatch-value bg-light-green"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/mens/men-7.jpg') }}"
                                         src="{{ asset('images/products/mens/men-7.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="d-none text-capitalize color-filter">Grey</span>
                                    <span class="swatch-value bg-light-grey"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/mens/men-11.jpg') }}"
                                         src="{{ asset('images/products/mens/men-11.jpg') }}" alt="image-product">
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="fl-item card-product">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/mens/men-1.jpg') }}"
                                     src="{{ asset('images/products/mens/men-1.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover" data-src="{{ asset('images/products/mens/men-3.jpg') }}"
                                     src="{{ asset('images/products/mens/men-3.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Ribbed cotton-blend top</a>
                            <span class="price current-price">$69.99</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active line">
                                    <span class="d-none text-capitalize color-filter">Light Blue</span>
                                    <span class="swatch-value bg-light-blue"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/mens/men-1.jpg') }}"
                                         src="{{ asset('images/products/mens/men-1.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="d-none text-capitalize color-filter">Pink</span>
                                    <span class="swatch-value bg-light-pink"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/mens/men-13.jpg') }}"
                                         src="{{ asset('images/products/mens/men-13.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="d-none text-capitalize color-filter">Grey</span>
                                    <span class="swatch-value bg-dark-grey-2"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/mens/men-9.jpg') }}"
                                         src="{{ asset('images/products/mens/men-9.jpg') }}" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="fl-item card-product card-product-size">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/womens/women-37.jpg') }}"
                                     src="{{ asset('images/products/womens/women-37.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{ asset('images/products/womens/women-38.jpg') }}"
                                     src="{{ asset('images/products/womens/women-38.jpg') }}" alt="image-product">
                            </a>
                            <div class="variant-wrap size-list">
                                <ul class="variant-box">
                                    <li class="size-item">XS</li>
                                    <li class="size-item">L</li>
                                    <li class="size-item">XL</li>
                                    <li class="size-item">2XL</li>
                                    <li class="size-item">3XL</li>
                                </ul>
                            </div>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Buttoned cotton shirt</a>
                            <span class="price current-price">$89.99</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="d-none text-capitalize color-filter">Light Blue</span>
                                    <span class="swatch-value bg-light-blue"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-37.jpg') }}"
                                         src="{{ asset('images/products/womens/women-37.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch line">
                                    <span class="d-none text-capitalize color-filter">White</span>
                                    <span class="swatch-value bg-white"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-41.jpg') }}"
                                         src="{{ asset('images/products/womens/women-41.jpg') }}" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="fl-item card-product card-product-size">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/mens/men-15.jpg') }}"
                                     src="{{ asset('images/products/mens/men-15.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{ asset('images/products/mens/men-16.jpg') }}"
                                     src="{{ asset('images/products/mens/men-16.jpg') }}" alt="image-product">
                            </a>
                            <div class="variant-wrap size-list">
                                <ul class="variant-box">
                                    <li class="size-item">XS</li>
                                    <li class="size-item">M</li>
                                    <li class="size-item">L</li>
                                    <li class="size-item">XL</li>
                                    <li class="size-item">2XL</li>
                                    <li class="size-item">3XL</li>
                                </ul>
                            </div>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Chest pocket cotton over shirt</a>
                            <span class="price current-price">$99.25</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active">
                                    <span class="d-none text-capitalize color-filter">Beige</span>
                                    <span class="swatch-value bg-beige"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/mens/men-15.jpg') }}"
                                         src="{{ asset('images/products/mens/men-15.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="d-none text-capitalize color-filter">Black</span>
                                    <span class="swatch-value bg-main"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/mens/men-18.jpg') }}"
                                         src="{{ asset('images/products/mens/men-18.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="d-none text-capitalize color-filter">Dark Blue</span>
                                    <span class="swatch-value bg-dark-blue"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/mens/men-17.jpg') }}"
                                         src="{{ asset('images/products/mens/men-17.jpg') }}" alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="fl-item card-product">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/womens/women-167.jpg') }}"
                                     src="{{ asset('images/products/womens/women-167.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{ asset('images/products/womens/women-168.jpg') }}"
                                     src="{{ asset('images/products/womens/women-168.jpg') }}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Cotton shopper bag</a>
                            <span class="price current-price">$199.25</span>
                            <ul class="list-color-product">
                                <li class="list-color-item color-swatch active line">
                                    <span class="d-none text-capitalize color-filter">White</span>
                                    <span class="swatch-value bg-white"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-167.jpg') }}"
                                         src="{{ asset('images/products/womens/women-167.jpg') }}" alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="d-none text-capitalize color-filter">Beige</span>
                                    <span class="swatch-value bg-beige"></span>
                                    <img class="lazyload" data-src="{{ asset('images/products/womens/women-162.jpg') }}"
                                         src="{{ asset('images/products/womens/women-162.jpg') }}" alt="image-product">
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="fl-item card-product card-product-size">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{ asset('images/products/mens/men-19.jpg') }}"
                                     src="{{ asset('images/products/mens/men-19.jpg') }}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{ asset('images/products/mens/men-20.jpg') }}"
                                     src="{{ asset('images/products/mens/men-20.jpg') }}" alt="image-product">
                            </a>
                            <div class="variant-wrap size-list">
                                <ul class="variant-box">
                                    <li class="size-item">XS</li>
                                    <li class="size-item">M</li>
                                    <li class="size-item">L</li>
                                    <li class="size-item">XL</li>
                                    <li class="size-item">2XL</li>
                                    <li class="size-item">3XL</li>
                                </ul>
                            </div>
                            <div class="list-product-btn">
                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Wishlist</span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon compare btn-icon-action">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip">Compare</span>
                                </a>
                                <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                    <span class="icon icon-eye"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                            <div class="list-btn-main">
                                <a href="#quickAdd" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="product-detail.html" class="title link">Chest pocket cotton over shirt</a>
                            <span class="price current-price">$250.00</span>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Load Item -->
            <div class="wd-load view-more-button text-center">
                <button class="tf-loading btn-loadmore tf-btn btn-reset"><span class="text text-btn text-btn-uppercase">Load more</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /search -->

<!-- modalDemo -->
<div class="modal fade modalDemo" id="modalDemo">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="mega-menu">
                <div class="row-demo">
                    <div class="demo-item">
                        <a href="index.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-fashion-womenswear.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-womenswear.jpg') }}"
                                     alt="home-fashion-womenswear">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                    <span>Trend</span>
                                </div>
                            </div>
                            <span class="demo-name">Fashion Womenswear</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-eleganceNest.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload"
                                     data-src="{{ asset('images/demo/home-fashion-eleganceNest.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-eleganceNest.jpg') }}"
                                     alt="home-fashion-eleganceNest">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                    <span class="demo-hot">Hot</span>
                                </div>
                            </div>
                            <span class="demo-name">Fashion EleganceNest</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-main.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-fashion-main.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-main.jpg') }}" alt="home-fashion-main">
                                <div class="demo-label">
                                    <span class="demo-hot">Hot</span>
                                </div>
                            </div>
                            <span class="demo-name">Fashion Main</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-trendset.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-fashion-trendset.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-trendset.jpg') }}"
                                     alt="home-fashion-trendset">
                            </div>
                            <span class="demo-name">Fashion TrendsetHome</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-vogueLing.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-fashion-vogueLiving.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-vogueLiving.jpg') }}"
                                     alt="home-fashion-vogueLiving">
                            </div>
                            <span class="demo-name">Fashion VogueLiving</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-elegantAbode.html">
                            <div class="demo-image">
                                <img class="lazyload"
                                     data-src="{{ asset('images/demo/home-fashion-elegantAbode.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-elegantAbode.jpg') }}"
                                     alt="home-fashion-elegantAbode">
                            </div>
                            <span class="demo-name">Fashion ElegantAbode</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-glamDwell.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-fashion-glamDwell.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-glamDwell.jpg') }}"
                                     alt="home-fashion-glamDwell">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Fashion GlamDwell</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-classyCove.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-fashion-classycove.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-classycove.jpg') }}"
                                     alt="home-fashion-classyCove">
                            </div>
                            <span class="demo-name">Fashion ClassyCove</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-chicHaven.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-fashion-chicHaven.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-chicHaven.jpg') }}"
                                     alt="home-fashion-chicHaven1">
                            </div>
                            <span class="demo-name">Fashion ChicHaven 1</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-chicHaven-02.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-fashion-chicHaven2.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-chicHaven2.jpg') }}"
                                     alt="home-fashion-chicHaven2">
                            </div>
                            <span class="demo-name">Fashion ChicHaven 2</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-tiktok.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-fashion-tiktok.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-tiktok.jpg') }}" alt="home-fashion-tiktok">
                            </div>
                            <span class="demo-name">Fashion TikTok</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-luxeLiving.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-fashion-luxeLiving.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-luxeLiving.jpg') }}"
                                     alt="home-fashion-luxeLiving">
                            </div>
                            <span class="demo-name">Fashion LuxeLiving</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-fashion-modernRetreat.html">
                            <div class="demo-image">
                                <img class="lazyload"
                                     data-src="{{ asset('images/demo/home-fashion-modernRetreat.jpg') }}"
                                     src="{{ asset('images/demo/home-fashion-modernRetreat.jpg') }}"
                                     alt="home-fashion-modernRetreat">
                            </div>
                            <span class="demo-name">Fashion ModernRetreat</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-beauty.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-beauty.jpg') }}"
                                     src="{{ asset('images/demo/home-beauty.jpg') }}" alt="home-beauty">
                            </div>
                            <span class="demo-name">Beauty</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-skincare.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-skinCare.jpg') }}"
                                     src="{{ asset('images/demo/home-skinCare.jpg') }}" alt="home-skincare">
                            </div>
                            <span class="demo-name">Skin Care</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-cosmetic.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-cosmetic.jpg') }}"
                                     src="{{ asset('images/demo/home-cosmetic.jpg') }}" alt="home-cosmetic">
                            </div>
                            <span class="demo-name">Cosmetic</span>
                        </a>
                    </div>
                    <div class="demo-item active">
                        <a href="home-decor.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-decor.jpg') }}"
                                     src="{{ asset('images/demo/home-decor.jpg') }}" alt="home-decor">
                            </div>
                            <span class="demo-name">Decor</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-furniture.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-furniture.jpg') }}"
                                     src="{{ asset('images/demo/home-furniture.jpg') }}" alt="home-furniture">
                            </div>
                            <span class="demo-name">Furniture</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-jewelry-01.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-jewelry.jpg') }}"
                                     src="{{ asset('images/demo/home-jewelry.jpg') }}" alt="home-jewelry-elegantGems">
                            </div>
                            <span class="demo-name">Jewelry ElegantGems</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-jewelry-02.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-jewelry2.jpg') }}"
                                     src="{{ asset('images/demo/home-jewelry2.jpg') }}" alt="home-jewelry-glitterGlam">
                            </div>
                            <span class="demo-name">Jewelry GlitterGlam</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-activewear.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-activewear.jpg') }}"
                                     src="{{ asset('images/demo/home-activewear.jpg') }}" alt="home-activewear">
                            </div>
                            <span class="demo-name">Activewear</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-organic.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-organic.jpg') }}"
                                     src="{{ asset('images/demo/home-organic.jpg') }}" alt="home-organic">
                            </div>
                            <span class="demo-name">Organic</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-sock.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-sock.jpg') }}"
                                     src="{{ asset('images/demo/home-sock.jpg') }}" alt="home-sock">
                            </div>
                            <span class="demo-name">Socks</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-camping.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-camping.jpg') }}"
                                     src="{{ asset('images/demo/home-camping.jpg') }}" alt="home-camping">
                            </div>
                            <span class="demo-name">Camping</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-electronic.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-electronic.jpg') }}"
                                     src="{{ asset('images/demo/home-electronic.jpg') }}" alt="home-electronic">
                            </div>
                            <span class="demo-name">Electronic Market</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-pet-store.html">
                            <div class="demo-image">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-pet-store.jpg') }}"
                                     src="{{ asset('images/demo/home-pet-store.jpg') }}" alt="home-pet-store">
                            </div>
                            <span class="demo-name">Pet Store</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-pickleball.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-pickleball.jpg') }}"
                                     src="{{ asset('images/demo/home-pickleball.jpg') }}" alt="home-pickleball">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">PickleBall</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-sock-2.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-sock2.jpg') }}"
                                     src="{{ asset('images/demo/home-sock2.jpg') }}" alt="home-sock2">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Socks 2</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-bookstore.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-bookstore.jpg') }}"
                                     src="{{ asset('images/demo/home-bookstore.jpg') }}" alt="home-bookstore">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Bookstore</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-baby.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-baby.jpg') }}"
                                     src="{{ asset('images/demo/home-baby.jpg') }}" alt="home-baby">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Baby</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-electronics-store.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-electronic-store.jpg') }}"
                                     src="{{ asset('images/demo/home-electronic-store.jpg') }}"
                                     alt="home-electronic-store">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Electronics Store</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-sneaker.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-sneaker.jpg') }}"
                                     src="{{ asset('images/demo/home-sneaker.jpg') }}" alt="home-sneaker">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Sneaker</span>
                        </a>
                    </div>
                    <div class="demo-item">
                        <a href="home-gaming.html">
                            <div class="demo-image position-relative">
                                <img class="lazyload" data-src="{{ asset('images/demo/home-gaming-accessory.jpg') }}"
                                     src="{{ asset('images/demo/home-gaming-accessory.jpg') }}"
                                     alt="home-gaming-accessory">
                                <div class="demo-label">
                                    <span class="demo-new">New</span>
                                </div>
                            </div>
                            <span class="demo-name">Gaming Accessory</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /modalDemo -->

<!-- mobile menu -->
<div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
    <div class="mb-canvas-content">
        <div class="mb-body">
            <div class="mb-content-top">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item">
                        <a href="{{ route('about-show') }}" class="mb-menu-link">Giới thiệu</a>
                    </li>
                    <li class="nav-mb-item">
                        @if(!empty($categoriesMenu))
                            <div href="#dropdown-menu-one" class="mb-menu-link sub-nav-link collapsed"
                                 aria-expanded="true"
                                 aria-controls="dropdown-menu-one">
                                <a href="{{ route('loai-san-pham', ['slug' => 'ghe-o-to-tre-em']) }}">Ghế ô tô cho bé</a><span class="btn-open-sub"></span>
                            </div>
                            <div id="dropdown-menu-one" class="collapse">
                                <ul class="sub-nav-menu">
                                    @foreach($categoriesMenu as $_item)
                                        <li>
                                            <div href="#dropdown-menu-one-1-{{$_item['id']}}" class="mb-menu-link sub-nav-link collapsed"
                                                 aria-expanded="true"
                                                 aria-controls="dropdown-menu-one-1-{{$_item['id']}}">
                                                <a class="mb-menu-link sub-nav-link" href="{{ route("product-list", ['category_slug' => $_item['slug']]) }}">{{ $_item['disp_name'] }}</a><span class="btn-open-sub"></span>
                                            </div>
                                            <div id="dropdown-menu-one-1-{{$_item['id']}}" class="collapse">
                                                <ul class="sub-nav-menu">
                                                    @foreach($_item['products'] as $_i)
                                                        @php $_i = (array)$_i @endphp
                                                        <li><a class="mb-menu-link sub-nav-link" href="{{ route('product-index', ['slug' => $_i['slug']]) }}">{{ $_i['name'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('product-list') }}" class="mb-menu-link">Sản phẩm</a>
                        @endif
                    </li>
                    <li class="nav-mb-item">
                        <a href="{{ route('loai-san-pham', ['slug' => 'xe-day']) }}" class="mb-menu-link">Xe đẩy</i></a>
                    </li>
{{--                    @foreach($mainMenu as $_name => $_menus)--}}
{{--                        <li class="nav-mb-item">--}}
{{--                            <div href="#dropdown-menu-two-{{ $_menus['id'] }}" class="mb-menu-link sub-nav-link collapsed"--}}
{{--                                 aria-expanded="true"--}}
{{--                                 aria-controls="dropdown-menu-two-{{ $_menus['id'] }}">--}}
{{--                                <a href="">{{ $_menus['name'] }}</a><span class="btn-open-sub"></span>--}}
{{--                            </div>--}}
{{--                            <div id="dropdown-menu-two-{{ $_menus['id'] }}" class="collapse">--}}
{{--                                <ul class="sub-nav-menu">--}}
{{--                                    @foreach($_menus['children'] as $_item)--}}
{{--                                        <li>--}}
{{--                                            <div href="#dropdown-menu-two-1-{{ $_item['id'] }}" class="mb-menu-link sub-nav-link collapsed"--}}
{{--                                                 aria-expanded="true"--}}
{{--                                                 aria-controls="dropdown-menu-two-1-{{ $_item['id'] }}">--}}
{{--                                                <a class="mb-menu-link sub-nav-link" href="">{{ $_item['name'] }}</a><span class="btn-open-sub"></span>--}}
{{--                                            </div>--}}
{{--                                            <div id="dropdown-menu-two-1-{{ $_item['id'] }}" class="collapse">--}}
{{--                                                <ul class="sub-nav-menu">--}}
{{--                                                    @foreach($_item['posts'] as $_i)--}}
{{--                                                        <li><a class="mb-menu-link sub-nav-link" href="">{{ $_i['title'] }}</a></li>--}}
{{--                                                    @endforeach--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                    <li class="nav-mb-item">--}}
{{--                        <a href="{{ route('news') }}" class="mb-menu-link">Blogs</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-mb-item">--}}
{{--                        <a href="{{ route('category-detail-knowledge') }}" class="mb-menu-link">Kiến thức</a>--}}
{{--                    </li>--}}
                    <li class="nav-mb-item">
                        <div href="#dropdown-menu-three" class="mb-menu-link sub-nav-link collapsed"
                             aria-expanded="true"
                             aria-controls="dropdown-menu-three">
                            <a href="#">Bảo hành</a><span class="btn-open-sub"></span>
                        </div>
                        <div id="dropdown-menu-three" class="collapse">
                            <ul class="sub-nav-menu">
                                <li>
                                    <a class="mb-menu-link" href="{{ route('bao-hanh', ['view' => 'bao-hanh-2-nam']) }}">Bảo hành cơ bản 2 năm</a>
                                </li>
                                <li>
                                    <a class="mb-menu-link" href="{{ route('bao-hanh', ['view' => 'bao-hanh-vang-12-nam']) }}">Bảo hành vàng 12 năm</a>
                                </li>
                                <li>
                                    <a class="mb-menu-link" href="{{ route('bao-hanh', ['view' => 'doi-ghe-o-to-mien-phi']) }}">Chương trình đổi ghế ô tô miễn phí</a>
                                </li>
                                <!-- <li>
                                    <a class="mb-menu-link" href="#">Chương trình Thu cũ Đổi mới</a>
                                </li> -->
                            </ul>
                        </div>
                    </li>
                    <li class="nav-mb-item">
                        <a href="{{ route('news') }}" class="mb-menu-link">Tin tức</a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="{{ route('contact') }}" class="mb-menu-link">Hỗ trợ</a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#" class="mb-menu-link">Buy Now</a>
                    </li>
                </ul>
            </div>
            <div class="mb-other-content">
                <div class="mb-contact">
                    <p class="text-caption-1">{{ $contactInformations['address_hn'] }}</p>
                    <a href="contact.html" class="tf-btn-default text-btn-uppercase">GET DIRECTION<i
                            class="icon-arrowUpRight"></i></a>
                </div>
                <ul class="mb-info">
                    <li>
                        <i class="icon icon-mail"></i>
                        <p>{{ $contactInformations['email'] }}</p>
                    </li>
                    <li>
                        <i class="icon icon-phone"></i>
                        <p>{{ $contactInformations['hotline'] }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /mobile menu -->

<!-- Categories -->
<div class="offcanvas offcanvas-start canvas-filter canvas-categories" id="shopCategories">
    <div class="canvas-wrapper">
        <div class="canvas-header">
            <span class="icon-left icon-filter"></span>
            <h5>Categories</h5>
            <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        </div>
        <div class="canvas-body">
            <div class="wd-facet-categories">
                <div role="dialog" class="facet-title collapsed" data-bs-target="#forWomen" data-bs-toggle="collapse"
                     aria-expanded="true" aria-controls="forWomen">
                    <img class="avt" src="{{ asset('images/avatar/women.jpg') }}" alt="avt">
                    <span class="title">For Women</span>
                    <span class="icon icon-arrow-down"></span>
                </div>
                <div id="forWomen" class="collapse">
                    <ul class="facet-body">
                        <li>
                            <a href="#" class="item link"><img class="avt" src="{{ asset('images/avatar/new-in.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">New in</span></a>
                        </li>
                        <li>
                            <a href="#" class="item link"><img class="avt"
                                                               src="{{ asset('images/avatar/promotion.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Promotion</span></a>
                        </li>
                        <li>
                            <a href="#" class="item link"><img class="avt"
                                                               src="{{ asset('images/avatar/clothing.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Clothing</span></a>
                        </li>
                        <li>
                            <a href="#" class="item link"><img class="avt" src="{{ asset('images/avatar/shoes.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Shoes</span></a>
                        </li>
                        <li>
                            <a href="#" class="item link"><img class="avt" src="{{ asset('images/avatar/bags.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Bags</span></a>
                        </li>
                        <li>
                            <a href="#" class="item link"><img class="avt"
                                                               src="{{ asset('images/avatar/accessories.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Accessories</span></a>
                        </li>
                        <li>
                            <a href="#" class="item link"><img class="avt"
                                                               src="{{ asset('images/avatar/jewelry.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Jewelry</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wd-facet-categories">
                <div role="dialog" class="facet-title collapsed" data-bs-target="#forMen" data-bs-toggle="collapse"
                     aria-expanded="true" aria-controls="forMen">
                    <img class="avt" src="{{ asset('images/avatar/men.jpg') }}" alt="avt">
                    <span class="title">For Men</span>
                    <span class="icon icon-arrow-down"></span>
                </div>
                <div id="forMen" class="collapse">
                    <ul class="facet-body">
                        <li>
                            <a href="#" class="item link"><img class="avt" src="{{ asset('images/avatar/men.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Men</span></a>
                        </li>
                        <li>
                            <a href="#" class="item link"><img class="avt" src="{{ asset('images/avatar/men.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Men</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wd-facet-categories">
                <div role="dialog" class="facet-title collapsed" data-bs-target="#forKid" data-bs-toggle="collapse"
                     aria-expanded="true" aria-controls="forKid">
                    <img class="avt" src="{{ asset('images/avatar/kid.jpg') }}" alt="avt">
                    <span class="title">For Kid</span>
                    <span class="icon icon-arrow-down"></span>
                </div>
                <div id="forKid" class="collapse">
                    <ul class="facet-body">
                        <li>
                            <a href="#" class="item link"><img class="avt" src="{{ asset('images/avatar/kid.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Kid</span></a>
                        </li>
                        <li>
                            <a href="#" class="item link"><img class="avt" src="{{ asset('images/avatar/kid.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Kid</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wd-facet-categories">
                <div role="dialog" class="facet-title collapsed" data-bs-target="#accessories" data-bs-toggle="collapse"
                     aria-expanded="true" aria-controls="accessories">
                    <img class="avt" src="{{ asset('images/avatar/accessories.jpg') }}" alt="avt">
                    <span class="title">Accessories</span>
                    <span class="icon icon-arrow-down"></span>
                </div>
                <div id="accessories" class="collapse">
                    <ul class="facet-body">
                        <li>
                            <a href="#" class="item link"><img class="avt"
                                                               src="{{ asset('images/avatar/accessories.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Accessories</span></a>
                        </li>
                        <li>
                            <a href="#" class="item link"><img class="avt"
                                                               src="{{ asset('images/avatar/accessories.jpg') }}"
                                                               alt="avt"><span
                                    class="title-sub text-caption-1 text-secondary">Accessories</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Categories -->

<!-- quickView -->
<div class="modal fullRight fade modal-quick-view" id="quickView">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="tf-quick-view-image">
                <div class="wrap-quick-view wrapper-scroll-quickview">
                    <div class="quickView-item item-scroll-quickview" data-scroll-quickview="beige">
                        <img class="lazyload" data-src="{{ asset('images/products/womens/women-1.jpg') }}"
                             src="{{ asset('images/products/womens/women-1.jpg') }}" alt="">
                    </div>
                    <div class="quickView-item item-scroll-quickview" data-scroll-quickview="beige">
                        <img class="lazyload" data-src="{{ asset('images/products/womens/women-2.jpg') }}"
                             src="{{ asset('images/products/womens/women-2.jpg') }}" alt="">
                    </div>
                    <div class="quickView-item item-scroll-quickview" data-scroll-quickview="gray">
                        <img class="lazyload" data-src="{{ asset('images/products/womens/women-3.jpg') }}"
                             src="{{ asset('images/products/womens/women-3.jpg') }}" alt="">
                    </div>
                    <div class="quickView-item item-scroll-quickview" data-scroll-quickview="gray">
                        <img class="lazyload" data-src="{{ asset('images/products/womens/women-4.jpg') }}"
                             src="{{ asset('images/products/womens/women-4.jpg') }}" alt="">
                    </div>
                    <div class="quickView-item item-scroll-quickview" data-scroll-quickview="grey">
                        <img class="lazyload" data-src="{{ asset('images/products/womens/women-19.jpg') }}"
                             src="{{ asset('images/products/womens/women-19.jpg') }}" alt="">
                    </div>
                    <div class="quickView-item item-scroll-quickview" data-scroll-quickview="grey">
                        <img class="lazyload" data-src="{{ asset('images/products/womens/women-20.jpg') }}"
                             src="{{ asset('images/products/womens/women-20.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="wrap">
                <div class="header">
                    <h5 class="title">Quick View</h5>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="tf-product-info-list">
                    <div class="tf-product-info-heading">
                        <div class="tf-product-info-name">
                            <div class="text text-btn-uppercase">Clothing</div>
                            <h3 class="name">Stretch Strap Top</h3>
                            <div class="sub">
                                <div class="tf-product-info-rate">
                                    <div class="list-star">
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                    </div>
                                    <div class="text text-caption-1">(134 reviews)</div>
                                </div>
                                <div class="tf-product-info-sold">
                                    <i class="icon icon-lightning"></i>
                                    <div class="text text-caption-1">18 sold in last 32 hours</div>
                                </div>
                            </div>
                        </div>
                        <div class="tf-product-info-desc">
                            <div class="tf-product-info-price">
                                <h5 class="price-on-sale font-2">$79.99</h5>
                                <div class="compare-at-price font-2">$98.99</div>
                                <div class="badges-on-sale text-btn-uppercase">
                                    -25%
                                </div>
                            </div>
                            <p>The garments labelled as Committed are products that have been produced using sustainable
                                fibres or processes, reducing their environmental impact.</p>
                            <div class="tf-product-info-liveview">
                                <i class="icon icon-eye"></i>
                                <p class="text-caption-1"><span class="liveview-count">28</span> people are viewing this
                                    right now</p>
                            </div>
                        </div>
                    </div>
                    <div class="tf-product-info-choose-option">
                        <div class="variant-picker-item">
                            <div class="variant-picker-label mb_12">
                                Colors:<span class="text-title variant-picker-label-value">Beige</span>
                            </div>
                            <div class="variant-picker-values">
                                <input id="values-beige1" type="radio" name="color2" checked>
                                <label class="hover-tooltip tooltip-bot radius-60 color-btn btn-scroll-quickview active"
                                       data-slide="0" data-price="79.99" for="values-beige1" data-value="Beige"
                                       data-scroll-quickview="beige">
                                    <span class="btn-checkbox bg-color-beige1"></span>
                                    <span class="tooltip">Beige</span>
                                </label>
                                <input id="values-gray1" type="radio" name="color2">
                                <label class="hover-tooltip tooltip-bot radius-60 color-btn btn-scroll-quickview"
                                       data-slide="1" data-price="79.99" for="values-gray1" data-value="Gray"
                                       data-scroll-quickview="gray">
                                    <span class="btn-checkbox bg-color-gray"></span>
                                    <span class="tooltip">Gray</span>
                                </label>
                                <input id="values-grey1" type="radio" name="color2">
                                <label class="hover-tooltip tooltip-bot radius-60 color-btn btn-scroll-quickview"
                                       data-slide="2" data-price="89.99" for="values-grey1" data-value="Grey"
                                       data-scroll-quickview="grey">
                                    <span class="btn-checkbox bg-color-grey"></span>
                                    <span class="tooltip">Grey</span>
                                </label>
                            </div>
                        </div>
                        <div class="variant-picker-item">
                            <div class="d-flex justify-content-between mb_12">
                                <div class="variant-picker-label">
                                    Size:<span class="text-title variant-picker-label-value">L</span>
                                </div>
                                <a class="size-guide text-title link show-size-guide">Size Guide</a>
                            </div>
                            <div class="variant-picker-values gap12">
                                <input type="radio" name="size2" id="values-s1">
                                <label class="style-text size-btn" for="values-s1" data-value="S">
                                    <span class="text-title">S</span>
                                </label>
                                <input type="radio" name="size2" id="values-m1">
                                <label class="style-text size-btn" for="values-m1" data-value="M">
                                    <span class="text-title">M</span>
                                </label>
                                <input type="radio" name="size2" id="values-l1" checked>
                                <label class="style-text size-btn" for="values-l1" data-value="L" data-price="89.99">
                                    <span class="text-title">L</span>
                                </label>
                                <input type="radio" name="size2" id="values-xl1">
                                <label class="style-text size-btn" for="values-xl1" data-value="XL" data-price="89.99">
                                    <span class="text-title">XL</span>
                                </label>
                            </div>
                        </div>
                        <div class="tf-product-info-quantity">
                            <div class="title mb_12">Quantity:</div>
                            <div class="wg-quantity">
                                <span class="btn-quantity btn-decrease">-</span>
                                <input class="quantity-product" type="text" name="number" value="1">
                                <span class="btn-quantity btn-increase">+</span>
                            </div>
                        </div>
                        <div>
                            <div class="tf-product-info-by-btn mb_10">
                                <a class="btn-style-2 flex-grow-1 text-btn-uppercase fw-6 show-shopping-cart"><span>Add to cart -&nbsp;</span><span
                                        class="tf-qty-price total-price">$79.99</span></a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare"
                                   class="box-icon hover-tooltip compare btn-icon-action show-compare">
                                    <span class="icon icon-gitDiff"></span>
                                    <span class="tooltip text-caption-2">Compare</span>
                                </a>
                                <a href="javascript:void(0);"
                                   class="box-icon hover-tooltip text-caption-2 wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip text-caption-2">Wishlist</span>
                                </a>
                            </div>
                            <a href="#" class="btn-style-3 text-btn-uppercase">Buy it now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /quickView -->

@php
    list($cart, $sub_total, $count) = getDataCart(0);
@endphp
<!-- shoppingCart -->
<style>
    .tf-mini-cart-sroll.is_not_show > p{
        display: none;
    }
</style>
<div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="d-flex flex-column flex-grow-1 h-100">
                <div class="header">
                    <h5 class="title">Shopping Cart</h5>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap">
                    <div class="tf-mini-cart-wrap">
                        <div class="tf-mini-cart-main">
                            <div class="tf-mini-cart-sroll {{ $count > 0 ? 'is_not_show' : '' }}">
                                <p style="text-align: center">Chưa có sản phẩm nào</p>
                                <div class="tf-mini-cart-items">
                                    @include('components.cart-footer', ["cart" => $cart, "sub_total" => $sub_total, "count" => $count])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /shoppingCart -->

{{--<!-- wishlist -->--}}
{{--<div class="modal fullRight fade modal-wishlist" id="wishlist">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="header">--}}
{{--                <h5 class="title">Wish List</h5>--}}
{{--                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>--}}
{{--            </div>--}}
{{--            <div class="wrap">--}}
{{--                <div class="tf-mini-cart-wrap">--}}
{{--                    <div class="tf-mini-cart-main">--}}
{{--                        <div class="tf-mini-cart-sroll">--}}
{{--                            <div class="tf-mini-cart-items">--}}
{{--                                <div class="tf-mini-cart-item file-delete">--}}
{{--                                    <div class="tf-mini-cart-image">--}}
{{--                                        <img class="lazyload"--}}
{{--                                             data-src="{{ asset('images/products/womens/women-19.jpg') }}"--}}
{{--                                             src="{{ asset('images/products/womens/women-19.jpg') }}" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="tf-mini-cart-info flex-grow-1">--}}
{{--                                        <div--}}
{{--                                            class="mb_12 d-flex align-items-center justify-content-between flex-wrap gap-12">--}}
{{--                                            <div class="text-title"><a href="product-detail.html"--}}
{{--                                                                       class="link text-line-clamp-1">Contrasting--}}
{{--                                                    sheepskin</a></div>--}}
{{--                                            <div class="text-button tf-btn-remove remove">Remove</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-12">--}}
{{--                                            <div class="text-secondary-2">XL/Blue</div>--}}
{{--                                            <div class="text-button">1 X $60.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="tf-mini-cart-item file-delete">--}}
{{--                                    <div class="tf-mini-cart-image">--}}
{{--                                        <img class="lazyload"--}}
{{--                                             data-src="{{ asset('images/products/womens/women-1.jpg') }}"--}}
{{--                                             src="{{ asset('images/products/womens/women-1.jpg') }}" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="tf-mini-cart-info flex-grow-1">--}}
{{--                                        <div--}}
{{--                                            class="mb_12 d-flex align-items-center justify-content-between flex-wrap gap-12">--}}
{{--                                            <div class="text-title"><a href="product-detail.html"--}}
{{--                                                                       class="link text-line-clamp-1">Suede leggings</a>--}}
{{--                                            </div>--}}
{{--                                            <div class="text-button tf-btn-remove remove">Remove</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-12">--}}
{{--                                            <div class="text-secondary-2">XL/Blue</div>--}}
{{--                                            <div class="text-button">1 X $60.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="tf-mini-cart-item file-delete">--}}
{{--                                    <div class="tf-mini-cart-image">--}}
{{--                                        <img class="lazyload"--}}
{{--                                             data-src="{{ asset('images/products/womens/women-2.jpg') }}"--}}
{{--                                             src="{{ asset('images/products/womens/women-2.jpg') }}" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="tf-mini-cart-info flex-grow-1">--}}
{{--                                        <div--}}
{{--                                            class="mb_12 d-flex align-items-center justify-content-between flex-wrap gap-12">--}}
{{--                                            <div class="text-title"><a href="product-detail.html"--}}
{{--                                                                       class="link text-line-clamp-1">Faux-leather--}}
{{--                                                    trousers</a></div>--}}
{{--                                            <div class="text-button tf-btn-remove remove">Remove</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-12">--}}
{{--                                            <div class="text-secondary-2">XL/Blue</div>--}}
{{--                                            <div class="text-button">1 X $60.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="tf-mini-cart-item file-delete">--}}
{{--                                    <div class="tf-mini-cart-image">--}}
{{--                                        <img class="lazyload"--}}
{{--                                             data-src="{{ asset('images/products/womens/women-3.jpg') }}"--}}
{{--                                             src="{{ asset('images/products/womens/women-3.jpg') }}" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="tf-mini-cart-info flex-grow-1">--}}
{{--                                        <div--}}
{{--                                            class="mb_12 d-flex align-items-center justify-content-between flex-wrap gap-12">--}}
{{--                                            <div class="text-title"><a href="product-detail.html"--}}
{{--                                                                       class="link text-line-clamp-1">Biker-style--}}
{{--                                                    leggings</a></div>--}}
{{--                                            <div class="text-button tf-btn-remove remove">Remove</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-12">--}}
{{--                                            <div class="text-secondary-2">XL/Blue</div>--}}
{{--                                            <div class="text-button">1 X $60.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="tf-mini-cart-item file-delete">--}}
{{--                                    <div class="tf-mini-cart-image">--}}
{{--                                        <img class="lazyload"--}}
{{--                                             data-src="{{ asset('images/products/womens/women-4.jpg') }}"--}}
{{--                                             src="{{ asset('images/products/womens/women-4.jpg') }}" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="tf-mini-cart-info flex-grow-1">--}}
{{--                                        <div--}}
{{--                                            class="mb_12 d-flex align-items-center justify-content-between flex-wrap gap-12">--}}
{{--                                            <div class="text-title"><a href="product-detail.html"--}}
{{--                                                                       class="link text-line-clamp-1">Jacquard fluid--}}
{{--                                                    trousers</a></div>--}}
{{--                                            <div class="text-button tf-btn-remove remove">Remove</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-12">--}}
{{--                                            <div class="text-secondary-2">XL/Blue</div>--}}
{{--                                            <div class="text-button">1 X $60.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="tf-mini-cart-bottom">--}}
{{--                        <a href="wish-list.html" class="btn-style-2 w-100 radius-4 view-all-wishlist"><span--}}
{{--                                class="text-btn-uppercase">View All Wish List</span></a>--}}
{{--                        <a href="shop-default-grid.html" class="text-btn-uppercase">Or continue shopping</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- /wishlist -->--}}

<!-- size-guide -->
<div class="modal fade modal-size-guide" id="size-guide">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content widget-tabs style-2">
            <div class="header">
                <ul class="widget-menu-tab">
                    <li class="item-title active">
                        <span class="inner text-button">Size </span>
                    </li>
                    <li class="item-title">
                        <span class="inner text-button">Size Guide</span>
                    </li>
                </ul>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                <div class="widget-content-tab">
                    <div class="widget-content-inner active">
                        <div class="tab-size">
                            <div>
                                <div class="widget-size mb_16">
                                    <div class="box-title-size">
                                        <div class="title-size">Height</div>
                                        <div class="number-size">
                                            <span class="max-size">100</span>
                                            <span class="text-caption-1 text-secondary">Cm</span>
                                        </div>
                                    </div>
                                    <div class="range-input">
                                        <div class="tow-bar-block">
                                            <div class="progress-size" style="width: 50%;"></div>
                                        </div>
                                        <input type="range" min="0" max="200" value="100" class="range-max"/>
                                    </div>
                                </div>
                                <div class="widget-size">
                                    <div class="box-title-size">
                                        <div class="title-size">Weight</div>
                                        <div class="number-size">
                                            <span class="max-size">50</span>
                                            <span class="text-caption-1 text-secondary">Kg</span>
                                        </div>
                                    </div>
                                    <div class="range-input">
                                        <div class="tow-bar-block">
                                            <div class="progress-size" style="width: 50%;"></div>
                                        </div>
                                        <input type="range" min="0" max="100" value="50" class="range-max"/>
                                    </div>
                                </div>
                            </div>
                            <div class="size-button-wrap choose-option-list">
                                <div class="size-button-item choose-option-item">
                                    <h5>thin</h5>
                                </div>
                                <div class="size-button-item choose-option-item select-option">
                                    <h5>Normal</h5>
                                </div>
                                <div class="size-button-item choose-option-item">
                                    <h5>plump</h5>
                                </div>
                            </div>
                            <div>
                                <h6 class="suggests-title">Modave suggests for you:</h6>
                                <div class="suggests-list">
                                    <a href="#" class="suggests-item link text-button">L - shirt</a>
                                    <a href="#" class="suggests-item link text-button">XL - Pant</a>
                                    <a href="#" class="suggests-item link text-button">31 - Jeans</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-inner">
                        <table class="tab-sizeguide-table">
                            <thead>
                            <tr>
                                <th>Size</th>
                                <th>US</th>
                                <th>Bust</th>
                                <th>Waist</th>
                                <th>Low Hip</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>XS</td>
                                <td>2</td>
                                <td>32</td>
                                <td>24 - 25</td>
                                <td>33 - 34</td>
                            </tr>
                            <tr>
                                <td>S</td>
                                <td>4</td>
                                <td>26 - 27</td>
                                <td>34 - 35</td>
                                <td>35 - 26</td>
                            </tr>
                            <tr>
                                <td>M</td>
                                <td>6</td>
                                <td>28 - 29</td>
                                <td>36 - 37</td>
                                <td>38 - 40</td>
                            </tr>
                            <tr>
                                <td>L</td>
                                <td>8</td>
                                <td>30 - 31</td>
                                <td>38 - 29</td>
                                <td>42 - 44</td>
                            </tr>
                            <tr>
                                <td>XL</td>
                                <td>10</td>
                                <td>32 - 33</td>
                                <td>40 - 41</td>
                                <td>45 - 47</td>
                            </tr>
                            <tr>
                                <td>XXL</td>
                                <td>12</td>
                                <td>34 - 35</td>
                                <td>42 - 43</td>
                                <td>48 - 50</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- /size-guide -->

<!-- compare -->
<div class="offcanvas offcanvas-bottom offcanvas-compare" id="compare">
    <div class="offcanvas-content">
        <div class="header">
            <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        </div>
        <div class="wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tf-compare-list list-file-delete">
                            <div class="tf-compare-head">
                                <h5 class="title">Compare <br> Products</h5>
                            </div>
                            <div class="tf-compare-wrap">
                                <div class="tf-compare-item file-delete">
                                        <span class="btns-repeat">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_5628_27028)">
                                                <path d="M11.334 1.33301L14.0007 3.99967L11.334 6.66634"
                                                      stroke="#181818" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path
                                                    d="M2 7.99951V6.66618C2 5.95893 2.28095 5.28066 2.78105 4.78056C3.28115 4.28046 3.95942 3.99951 4.66667 3.99951H14"
                                                    stroke="#181818" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                <path d="M4.66667 15.9996L2 13.3329L4.66667 10.6663" stroke="#181818"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path
                                                    d="M14 9.33301V10.6663C14 11.3736 13.719 12.0519 13.219 12.552C12.7189 13.0521 12.0406 13.333 11.3333 13.333H2"
                                                    stroke="#181818" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_5628_27028">
                                                <rect width="16" height="16" fill="white"
                                                      transform="translate(0 0.66626)"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    <span class="icon-close remove"></span>
                                    <a href="product-detail.html" class="image">
                                        <img class="lazyload"
                                             data-src="{{ asset('images/products/womens/women-19.jpg') }}"
                                             src="{{ asset('images/products/womens/women-19.jpg') }}" alt="">
                                    </a>
                                    <div class="content">
                                        <div class="text-title">
                                            <a class="link text-line-clamp-2" href="product-detail.html">V-neck cotton
                                                T-shirt</a>
                                        </div>
                                        <div class="text-button">$59.99</div>
                                    </div>
                                </div>
                                <div class="tf-compare-item file-delete">
                                        <span class="btns-repeat">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_5628_27028)">
                                                <path d="M11.334 1.33301L14.0007 3.99967L11.334 6.66634"
                                                      stroke="#181818" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path
                                                    d="M2 7.99951V6.66618C2 5.95893 2.28095 5.28066 2.78105 4.78056C3.28115 4.28046 3.95942 3.99951 4.66667 3.99951H14"
                                                    stroke="#181818" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                <path d="M4.66667 15.9996L2 13.3329L4.66667 10.6663" stroke="#181818"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path
                                                    d="M14 9.33301V10.6663C14 11.3736 13.719 12.0519 13.219 12.552C12.7189 13.0521 12.0406 13.333 11.3333 13.333H2"
                                                    stroke="#181818" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_5628_27028">
                                                <rect width="16" height="16" fill="white"
                                                      transform="translate(0 0.66626)"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    <span class="icon-close remove"></span>
                                    <a href="product-detail.html" class="image">
                                        <img class="lazyload"
                                             data-src="{{ asset('images/products/womens/women-29.jpg') }}"
                                             src="{{ asset('images/products/womens/women-29.jpg') }}" alt="">
                                    </a>
                                    <div class="content">
                                        <div class="text-title">
                                            <a class="link text-line-clamp-2" href="product-detail.html">Ramie shirt
                                                with pockets </a>
                                        </div>
                                        <div class="text-button">$72.00</div>
                                    </div>
                                </div>
                                <div class="tf-compare-item file-delete">
                                        <span class="btns-repeat">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_5628_27028)">
                                                <path d="M11.334 1.33301L14.0007 3.99967L11.334 6.66634"
                                                      stroke="#181818" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path
                                                    d="M2 7.99951V6.66618C2 5.95893 2.28095 5.28066 2.78105 4.78056C3.28115 4.28046 3.95942 3.99951 4.66667 3.99951H14"
                                                    stroke="#181818" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                <path d="M4.66667 15.9996L2 13.3329L4.66667 10.6663" stroke="#181818"
                                                      stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path
                                                    d="M14 9.33301V10.6663C14 11.3736 13.719 12.0519 13.219 12.552C12.7189 13.0521 12.0406 13.333 11.3333 13.333H2"
                                                    stroke="#181818" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_5628_27028">
                                                <rect width="16" height="16" fill="white"
                                                      transform="translate(0 0.66626)"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    <span class="icon-close remove"></span>
                                    <a href="product-detail.html" class="image">
                                        <img class="lazyload"
                                             data-src="{{ asset('images/products/womens/women-1.jpg') }}"
                                             src="{{ asset('images/products/womens/women-1.jpg') }}" alt="">
                                    </a>
                                    <div class="content">
                                        <div class="text-title">
                                            <a class="link text-line-clamp-2" href="product-detail.html">Ribbed
                                                cotton-blend top</a>
                                        </div>
                                        <div class="text-button">$65.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-compare-buttons">
                                <div class="tf-compare-buttons-wrap">
                                    <a href="compare-products.html" class="tf-btn w-100 btn-fill radius-4"><span
                                            class="text text-btn-uppercase">Compare Products</span></a>
                                    <div
                                        class="tf-compapre-button-clear-all clear-file-delete tf-btn w-100 btn-white radius-4 has-border">
                                        <span class="text text-btn-uppercase">Clear All Products</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /compare -->

<!-- quickAdd: Viet js bind data to html -->
<div class="modal fade modal-quick-add" id="quickAdd">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="quick-add-body">
                <div class="tf-product-info-list"></div>
            </div>
        </div>
    </div>
</div>
<!-- /quickAdd -->
