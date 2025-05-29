
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="/">
                        <!-- <img src="images/logo.png" alt="" /> --><span>babycarseat</span></a></div>
                <li class="label">Main</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-dashboard"></i> Dashboard </a></li>

                <li class="label">Thiết lập</li>
                <li><a href="{{ route('list-banner') }}"><i class="ti-image"></i>Banner</a></li>
                <li><a href="{{ route('list-information') }}"><i class="ti-info"></i>Thông tin</a></li>
                <li><a href="{{ route('list-home-block') }}"><i class="ti-view-grid"></i>Home blocks</a></li>
                <li class="label">Sản phẩm</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Sản phẩm <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('list-product-category') }}">Danh mục</a></li>
                        <li><a href="{{ route('list-brand') }}">Thương hiệu</a></li>
                        <li><a href="{{ route('list-color') }}">Màu sắc</a></li>
                        <li><a href="{{ route('list-note') }}">Nhãn</a></li>
                        <li><a href="{{ route('list-feature') }}">Tính năng</a></li>
                        <li><a href="{{ route('list-product') }}">Sản phẩm</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('list-order') }}"><i class="ti-shopping-cart"></i> Đơn hàng </a></li>
                <li class="label">Bài viết</li>
                <li><a href="{{ route('list-news') }}"><i class="ti-announcement"></i>Tin tức</a></li>
                <li><a class="sidebar-sub-toggle"><i class="ti-light-bulb"></i>Kiến thức<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('list-knowledge-category') }}">Danh mục</a></li>
                        <li><a href="{{ route('list-knowledge') }}">Kiến thức</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-layout-list-post"></i> Bài viết <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('list-post-category') }}">Danh mục</a></li>
                        <li><a href="{{ route('list-post') }}">Bài viết</a></li>
                    </ul>
                </li>
                
                <li><a href="{{ route('list-feedback') }}"><i class="ti-comment-alt"></i>Đánh giá khách hàng</a></li>
                <li><a href="{{ route('list-qa') }}"><i class="ti-help-alt"></i>QA</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->