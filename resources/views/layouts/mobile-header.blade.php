
<div class="container">
    <div id="sidebar" class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
        <div class="pd_toggle_logo">
            <a href="{{ url('/') }}">
            <img src="/images/wins/toggle_wines.png" alt="img">
            </a>
        </div>
        <div id="toggle_close">&times;</div>
        <div id='cssmenu'>
            <ul>
                <li>
                    <form method="get" action="{{ route("search") }}">
                        <input type="text" placeholder="Tìm kiếm sản phẩm" value="{{ request()->keyword }}" name="keyword">
                        <button class="btn search_btn bg-main color-white"><i class="fas fa-search"></i></button>
                    </form>
                </li>
                <li>
                    <a href="{{ url('/') }}">Trang chủ</a>
                </li>
                <li><a href="{{ url('/ruou-vang') }}">Rượu vang</a></li>
                <li><a href="{{ url('/phu-kien') }}">Phụ kiện</a></li>
                <li><a href="{{ route("category-list-knowledge") }}">Kiến thức</a></li>
                <li><a href="{{ route("news") }}">Tin tức</a></li>
                <li><a href="{{ route("promotion-list") }}">Khuyến mãi</a></li>
                <li><a href="{{ route("gift-list") }}">Quà tặng</a></li>
            </ul>
            <div class="share_link">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <!-- <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a> -->
            </div>
        </div>
    </div>
</div>
