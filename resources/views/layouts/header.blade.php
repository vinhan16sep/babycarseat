@php
    list($cart, $sub_total, $count) = getDataCart(0);
@endphp

<div class="furniture_top_header ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="header_social_icon">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li> -->
                    </ul>
                    <div class="help_no">
                        <a href="#"> <span><i class="fas fa-phone"></i></span>Hotline: {{ $contactInformations["hotline"] ?? "" }} </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="bz_right_side">
                    <ul>
                        <li>
                            <a href="{{ route("contact") }}">
                                <span><i class="fas fa-address-book"></i></span>Liên hệ</a>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pd_navigation_wrapper">
    <div class="container">
        <div class="pd_responsive_logo d-block d-sm-block d-md-block d-lg-none d-xl-none">
            <div class="response_top_header">
                <p>
                    <a href="#"> <span><i class="fas fa-phone"></i></span>Hotline: {{ $contactInformations["hotline"] ?? "" }} </a>
                </p>
                <ul>
                    <li><a href="{{ route("contact") }}"><span>&rlarr;</span> Liên hệ</a></li>
                </ul>
            </div>
            <div class="res_logo">
                <a href="{{ url('/') }}">
                <img class="img-fluid" src="/images/wins/logo.png" alt="logo">
                </a>
            </div>
            <div class="search_filter">
                <select class="select_dropdown">
                    <option value="">All Categories</option>
                    <option value="1">Electronice</option>
                    <option value="0">Fashion</option>
                </select>
                <form method="get" action="{{ route("search") }}">
                    <input type="text" placeholder="Tìm kiếm sản phẩm" value="{{ request()->keyword }}" name="keyword">
                    <button class="search_btn"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="inner_icon">
                <ul>
                    <li class="cart_shop1">
                        <a>
                            <span>
                                <svg height="512pt" viewbox="0 -31 512.00026 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m164.960938 300.003906h.023437c.019531 0 .039063-.003906.058594-.003906h271.957031c6.695312 0 12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531-5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406 6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531 0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0"></path>
                                    <path d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"></path>
                                    <path d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"></path>
                                </svg>
                                <div class="box-count-item-cart">
                                    @if ($count)
                                        <div class="count-item-cart">{{ $count }}</div>
                                    @endif
                                </div>
                            </span>
                        </a>

                        <div class="box-cart-header">
                            @include('components.cart-header', ["cart" => $cart, "sub_total" => $sub_total, "count" => $count])
                        </div>
                    </li>
                </ul>
            </div>
            <div id="toggle" class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewbox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                    <g>
                        <g>
                            <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#111"></path>
                        </g>
                        <g>
                            <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#111"></path>
                        </g>
                        <g>
                            <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#111"></path>
                        </g>
                        <g>
                            <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#111"></path>
                        </g>
                        <g>
                            <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#111"></path>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
        <div class="pd_inner_navigation_wrapper">
            <div class="row">
                <div class="col-md-5 col-12 no_padd">
                    <ul>
                        <li><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li><a href="{{ url('/ruou-vang') }}">Rượu vang</a></li>
                        <li><a href="{{ url('/phu-kien') }}">Phụ kiện</a></li>
                        <li><a href="{{ route("category-list-knowledge") }}">Kiến thức</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-12">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                        <img class="img-fluid" src="/images/wins/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-5 col-12 no_padd">
                    <ul class="right_menu">
                        <li><a href="{{ route("news") }}">Tin tức</a></li>
                        <li><a href="{{ route("promotion-list") }}">Khuyến mãi</a></li>
                        <li><a href="{{ route("gift-list") }}">Quà tặng</a></li>
                        <li>
                            <div class="search_bar hidden-xs">
                                <div class="lv_search_bar" id="search_button">
                                    <a href="#">
                                        <span>
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M225.474,0C101.151,0,0,101.151,0,225.474c0,124.33,101.151,225.474,225.474,225.474
                                                            c124.33,0,225.474-101.144,225.474-225.474C450.948,101.151,349.804,0,225.474,0z M225.474,409.323
                                                            c-101.373,0-183.848-82.475-183.848-183.848S124.101,41.626,225.474,41.626s183.848,82.475,183.848,183.848
                                                            S326.847,409.323,225.474,409.323z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M505.902,476.472L386.574,357.144c-8.131-8.131-21.299-8.131-29.43,0c-8.131,8.124-8.131,21.306,0,29.43l119.328,119.328
                                                            c4.065,4.065,9.387,6.098,14.715,6.098c5.321,0,10.649-2.033,14.715-6.098C514.033,497.778,514.033,484.596,505.902,476.472z"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div id="search_open" class="lv_search_box">
                                    <form method="get" action="{{ route("search") }}">
                                        <input type="text" placeholder="Tìm kiếm sản phẩm" value="{{ request()->keyword }}" name="keyword">
                                        <button><i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="cart_shop">
                                <a>
                                    <span>
                                        <svg height="512pt" viewbox="0 -31 512.00026 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m164.960938 300.003906h.023437c.019531 0 .039063-.003906.058594-.003906h271.957031c6.695312 0 12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531-5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406 6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531 0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0"></path>
                                            <path d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"></path>
                                            <path d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"></path>
                                        </svg>
                                        <div class="box-count-item-cart">
                                            @if ($count)
                                                <div class="count-item-cart">{{ $count }}</div>
                                            @endif
                                        </div>
                                    </span>
                                </a>
                                
                                <div class="box-cart-header">
                                    @include('components.cart-header', ["cart" => $cart, "sub_total" => $sub_total, "count" => $count])
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
