<div class="nav-social PC hide-for-medium">
    <ul>
        <li>
            <a href="tel:{{ $contactInformations["phone_hn"] ?? "" }}">
                <img src="{{ asset("icon/phone.png") }}" alt="Hà Nội">
                <br>Hà Nội
            </a>
        </li>
        <li>
            <a href="tel:{{ $contactInformations["phone_hcm"] ?? "" }}">
                <img src="{{ asset("icon/phone.png") }}" alt="Hồ Chí Minh">
                <br>Hồ Chí Minh
            </a>
        </li>
        <li>
            <a href="{{ $contactInformations["zalo"] ?? "" }}" target="_blank">
                <img src="{{ asset("icon/zalo.png") }}" alt="Chat Zalo">
                <br>Chat Zalo
            </a>
        </li>
        <li>
            <a href="{{ $contactInformations["messenger"] ?? "" }}" target="_blank">
                <img src="{{ asset("icon/messenger.png") }}" alt="Messenger">
                <br>Messenger
            </a>
        </li>
    </ul>
</div>
<div class="bottom-contact-mobile show-for-medium">
    <ul>
        <li>
            <a href="tel:{{ $contactInformations["phone_hn"] ?? "" }}">
                <img src="{{ asset("icon/phone.png") }}" alt="Hà Nội">
                <br>
                <span>Hà Nội </span>
            </a>
        </li>
        <li>
            <a href="tel:{{ $contactInformations["phone_hcm"] ?? "" }}">
                <img src="{{ asset("icon/phone.png") }}" alt="Hồ Chí Minh">
                <br>
                <span>Hồ Chí Minh </span>
            </a>
        </li>
        <li>
            <a href="{{ $contactInformations["zalo"] ?? "" }}">
                <img src="{{ asset("icon/zalo.png") }}" alt="Chat Zalo">
                <br>
                <span>Chat Zalo</span>
            </a>
        </li>
        <li>
            <a href="{{ $contactInformations["messenger"] ?? "" }}" target="_blank">
                <img src="{{ asset("icon/messenger.png") }}" alt="Messenger">
                <br>
                <span>Messenger</span>
            </a>
        </li>
        <li>
            <a href="{{ isset($site_settings["product_link"]) ? route($site_settings["product_link"]) : "" }}">
                <img src="{{ asset("icon/alcohol.png") }}" alt="Hệ thống cửa hàng">
                <br>
                <span>Sản phẩm</span>
            </a>
        </li>
    </ul>
</div>

<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
<div class="container custom_container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-12">
            <div class="footer_links-list">
                <div class="footer_logo">
                    <img class="img-fluid" src="/images/wins/toggle_wines.png" alt="footer-logo">
                </div>
                <div class="information">
                    <ul>
                        <li>
                            <a href="#"> <span><i class="fa fa-map-marker-alt"></i></span> {{ $contactInformations["address_hn"] ?? "" }}</a>
                        </li>
                        <li>
                            <a href="#"> <span><i class="fa fa-map-marker-alt"></i></span> {{ $contactInformations['address_hcm'] ?? "" }}</a>
                        </li>
                        <li><a href="tel:{{ $contactInformations["hotline"] ?? "" }}"> <span><i class="fas fa-phone"></i></span>Hotline: {{ $contactInformations["hotline"] ?? "" }}</a></li>
                        <li> <a href="/cdn-cgi/l/email-protection#0d6f6c776262666c4d68756c607d6168236e6260" target="_top"><span><i class="fas fa-envelope"></i></span><span class="__cf_email__" data-cfemail="cfadaeb5a0a0a4ae8faab7aea2bfa3aae1aca0a2">[email&#160;protected]</span></a></li>
                    </ul>
                </div>
                <div class="footer_links-list mb-10">
                    <div class="social_icon">
                        <ul>
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <!-- <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-12">
            <div class="footer_links-list">
                <h3>Sản phẩm</h3>
                <ul>
                    <li><a href="{{ url('/ruou-vang') }}">Rượu vang</a></li>
                    <li><a href="{{ url('/phu-kien') }}">Phụ kiện</a></li>
                </ul>
            </div>
            <div class="footer_links-list">
                <h3>Bài viết</h3>
                <ul>
                    <li><a href="{{ route("news") }}">Tin tức</a></li>
                    <li><a href="{{ route("category-list-knowledge") }}">Kiến thức</a></li>
                </ul>
            </div>
            <div class="footer_links-list">
                <h3>Ưu đãi</h3>
                <ul>
                    <li><a href="#">Khuyến mại</a></li>
                    <li><a href="#">Quà tặng</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-12">
            <div class="footer_map">
                <div class="bs_map_main_wrapper float_left">
                    <iframe src="{{ $contactInformations['google_map_hn'] ?? "" }}" width="100%" height="340" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-12">
            <div class="footer_map">
                <div class="bs_map_main_wrapper float_left">
                    <iframe src="{{ $contactInformations['google_map_hcm'] ?? "" }}" width="100%" height="340" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bz_bottom_footer_main_wrapper float_left">
    <div class="copy_right">
        <p> © Copyright 2023 babycarseat. All rights reserved.</p>
    </div>
</div>