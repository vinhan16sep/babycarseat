@extends('layouts.app')

@section('content')
<div class="bz_wins_slider_main_wrapper float_left">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach ($banners as $key => $banner)
                        <div class="carousel-item {{ $key == 0 ? "active" : "" }}">
                            <img class="img-fluid w-100" src="{{ getImage($banner->image) }}" alt="{{ $banner->title }}">
                            <div class="carousel-caption container">
                                <!-- <h5>{{ $banner->title }}</h5>
                                <p>{{ $banner->description }}</p> -->
                                <a class="custom_btn" href="{{ $banner->link }}">Xem Ngay</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="bz_wins_welcome_wrapper float_left">
    <div class="container custom_container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="wins_welcome_box">
                    <h5>Chào mừng đến với</h5>
                    <h2>Babyro ...</h2>
                    <p>Babyro</p>
                    <img class="img-fluid" src="images/wins/signature.png" alt="signature">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="welocme_img">
                    <img class="img-fluid" src="images/wins/welcome_img.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="icon-block-box">
    <div class="container">
        <div class="row">
            <div class="col-6  col-md-3">
                <div class="icon-box wp-block-media-text alignwide is-stacked-on-mobile icon-block p-3 p-md-4 shadow h-100 rounded" style="grid-template-columns: 20% auto;">
                    <figure class="wp-block-media-text__media">
                        <img
                            width="64"
                            height="64"
                            src="{{ getImage("images/shield.png") }}"
                            alt="Shield"
                            class="wp-image-454 size-full perfmatters-lazy entered pmloaded"
                        />
                    </figure>
                    <div class="wp-block-media-text__content">
                        <p class="has-small-font-size">Cam kết nhập khẩu chính hãng</p>
                    </div>
                </div>
            </div>
    
            <div class="col-6 col-md-3">
                <div class="icon-box wp-block-media-text alignwide is-stacked-on-mobile icon-block p-3 p-md-4 shadow h-100 rounded" style="grid-template-columns: 20% auto;">
                    <figure class="wp-block-media-text__media">
                        <img
                            width="128"
                            height="128"
                            src="{{ getImage("images/delivery-truck-1.png") }}"
                            alt="Delivery Truck (1)"
                            class="wp-image-428 size-full perfmatters-lazy entered pmloaded"
                        />
                    </figure>
                    <div class="wp-block-media-text__content">
                        <p class="has-small-font-size">Miễn phí giao hàng toàn quốc</p>
                    </div>
                </div>
            </div>
    
            <div class="col-6 col-md-3">
                <div class="icon-box wp-block-media-text alignwide is-stacked-on-mobile icon-block p-3 p-md-4 shadow h-100 rounded" style="grid-template-columns: 20% auto;">
                    <figure class="wp-block-media-text__media">
                        <img
                            width="128"
                            height="128"
                            src="{{ getImage("images/file-swap.png") }}"
                            alt="File Swap"
                            class="wp-image-429 size-full perfmatters-lazy entered pmloaded"
                        />
                    </figure>
                    <div class="wp-block-media-text__content">
                        <p class="has-small-font-size">Đổi trả trong vòng 30 ngày</p>
                    </div>
                </div>
            </div>
    
            <div class="col-6 col-md-3">
                <div class="icon-box wp-block-media-text alignwide is-stacked-on-mobile icon-block p-3 p-md-4 shadow h-100 rounded" style="grid-template-columns: 20% auto;">
                    <figure class="wp-block-media-text__media">
                        <img
                            width="64"
                            height="64"
                            src="{{ getImage("images/certificate.png") }}"
                            alt="Certificate"
                            class="wp-image-427 size-full perfmatters-lazy entered pmloaded"
                        />
                    </figure>
                    <div class="wp-block-media-text__content">
                        <p class="has-small-font-size">4.000 sản phẩm đa dạng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="category-block-box">
    <div class="container">
        <div class="wp-block-group__inner-container">
            <div class="product-cat-grid">
                <div class="row g-3 g-md-4">
                    @foreach ($homeBlocks as $key => $item)
                    <div class="col-6 col-md-3 product-cat-grid__col d-flex">
                        <div class="position-relative rounded shadow overflow-hidden bg-white product-cat-card">
                            <a class="product-cat-card__overlay-link" href="{{ $item->link }}" title="Hộp quà tết">
                                <img
                                    src="{{ getImage($item->image) }}"
                                    class="image__img"
                                    alt="{{ $item->name }}"
                                />
                                <div class="text-center p-4 bg-white product-cat-card__content">
                                    <h3 class="h6 m-0 fw-bold text-uppercase product-cat-card__title">{{ $item->name }}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bz_wins_new_product_wraaper float_left" style="background: linear-gradient(0deg, rgba(108,10,10,1) 0%, rgba(148,8,34,1) 50%, rgba(112,7,7,1) 100%);">
    <div class="container custom_container">
        <div class="wins-heading">
            <p style="color:#f4f6f9;">Sản phẩm của chúng tôi</p>
            <h2 style="color:#f4f6f9;">Nổi bật nhất</h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="bz_wins_top_product_wraaper">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a style="color:#f4f6f9;" class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tất cả</a>
                            @foreach ($types as $id => $type)
                                <a style="color:#f4f6f9;" class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#type-{{ $type->id }}" role="tab" aria-controls="nav-profile" aria-selected="false">{{ $type->name }}</a>
                            @endforeach
                        </div>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="mobile_product_slider home">
                                    <div class="bz_product_grid_content_main_wrapper pt-0">
                                        <div class="bz_grid_menu_main_wrapper mt-0">
                                            <div class="tab-content">
                                                <div class="bz_product_view_grip_wrapper mt-0">
                                                    <div class="owl-carousel owl-theme">
                                                        @foreach ($groupTypeProduct as $type)
                                                            @foreach ($type["products"] as $item)
                                                                <div class="item">
                                                                    @include('components.item-product', [ "product" => $item ])
                                                                </div>
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($types as $type)
                                <div class="tab-pane fade" id="type-{{ $type->id }}" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    @if (!empty($groupTypeProduct[$type->id]["products"]))
                                        <div class="mobile_product_slider home">
                                            <div class="bz_product_grid_content_main_wrapper pt-0">
                                                <div class="bz_grid_menu_main_wrapper mt-0">
                                                    <div class="tab-content">
                                                        <div class="bz_product_view_grip_wrapper mt-0">
                                                            <div class="owl-carousel owl-theme">
                                                                @foreach ($groupTypeProduct[$type->id]["products"] as $item)
                                                                    <div class="item">
                                                                        @include('components.item-product', [ "product" => $item ])
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@if (isset($is_show))
    <div class="bz_wins_offer_main_wrapper float_left">
        <div class="wins-heading">
            <p>Our Offer</p>
            <h2>What We Make For You</h2>
        </div>
        <div class="wins_offer_box_wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="offer_img1">
                        <img class="img-fluid" src="images/wins/offer1.jpg" alt="offer">
                        <div class="overlay_wines">
                            <h5>Organic Grapes</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12 no_padd">
                    <div class="row">
                        <div class="col-md-4 col-12 no_padd">
                            <div class="offer_img">
                                <img class="img-fluid" src="images/wins/offer2.jpg" alt="offer">
                                <div class="overlay_wines">
                                    <h5>Organic Grapes</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 no_padd">
                            <div class="offer_img">
                                <img class="img-fluid" src="images/wins/offer3.jpg" alt="offer">
                                <div class="overlay_wines">
                                    <h5>Organic Grapes</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 no_padd">
                            <div class="offer_img">
                                <img class="img-fluid" src="images/wins/offer4.jpg" alt="offer">
                                <div class="overlay_wines">
                                    <h5>Organic Grapes</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12 no_padd">
                            <div class="offer_img">
                                <img class="img-fluid" src="images/wins/offer5.jpg" alt="offer">
                                <div class="overlay_wines">
                                    <h5>Organic Grapes</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-12 no_padd">
                            <div class="offer_img">
                                <img class="img-fluid" src="images/wins/offer6.jpg" alt="offer">
                                <div class="overlay_wines">
                                    <h5>Organic Grapes</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="bz_wins_update_wrapper float_left">
    <div class="container custom_container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-12">
                <div class="wins_update_slider">
                    <div class="owl-carousel owl-theme">
                        @foreach ($news as $item)
                            @php
                                $route = route("detail-new", ["slug" => $item->slug ]);
                            @endphp
                            <div class="item">
                                <div class="blog_box">
                                    <div class="blog_img">
                                        <img class="img-fluid" src="{{ getImage($item->image) }}" alt="blog">
                                        <div class="date">
                                            <a href="{{ $route }}">{{ $item->created_at->format("d") }} <span class="bold">{{ $item->created_at->format("m") }}</span></a>
                                        </div>
                                    </div>
                                    <div class="blog_content">
                                        <a href="{{ $route }}" class="tag_blog">
                                            <h3>{{ $item->title }}</h3>
                                        </a>
                                        <p>{{ $item->description }}</p>
                                        <a href="{{ $route }}">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="wins-heading">
                    <p>Tin tức</p>
                </div>
                <div class="update_text">
                    <p>It is a long established fact that a reader will be the distracted by the readable content of a page when looking at its layout. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bz_wins_instragram_main_wrapper float_left">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="wins-heading">
                    <p>Kiến thức</p>
                </div>
                <div class="update_text">
                    <p>
                        Rượu Vang là loại thức uống có cồn truyền thống, được lên men từ nước ép Nho hay một số loại hoa quả có hương vị đặc biệt. Người ta đã sản xuất rượu Vang từ rất nhiều thế kỷ qua và trong nó hàm chứa những giá trị tinh hoa của lịch sử, địa l‎í, văn hóa và lối sống… Không chỉ là đồ uống đẳng cấp, rượu Vang còn mang lại sức khỏe cho con người mà đặc biệt là đối với phái đẹp. Trong một vài năm trở lại đây, tại Việt Nam, rượu Vang đã trở thành thức uống phổ biến, được ưa chuộng và sử dụng trong các cuộc giao lưu, hội họp, liên hoan, đoàn tụ gia đình và được bày bán nhiều nơi, từ cửa hàng, siêu thị cho đến các nhà hàng, khách sạn và cả quán bar. Điều này có nghĩa là rượu Vang ngày càng có một vị trí và vai trò hết sức quan trọng trong đời sống xã hội hiện đại. Tuy nhiên không hẳn ai cũng hiểu biết, lựa chọn và thưởng thức đúng cách bởi sự đa dạng về nguồn gốc và chủng loại của loại đồ uống này.
                    </p>
                    <br>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="instra">
                    <ul>
                        @foreach ($knowledges as $key => $item)
                            @if (($loop->index)%2 == 0 && $loop->index != 0)
                                    </ul>
                                </div>
                                <div class="instra{{ $loop->index == 2 ? "_1" : "" }}">
                                    <ul>
                            @endif
                            <li>
                                <img class="img-fluid" src="{{ getImage($item->image) }}" alt="">
                                <div class="overlay_instra">
                                    <a href="{{ route("detail-knowledge", ["slug" => $item->slug, "category" => $item->category->slug ]) }}">
                                        <span>{{ $item->title }}</span>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@if (isset($is_show))
    
<div class="bz_section_partner_main_wrapper wins_parner_main_wrapper float_left">
    <div class="container custom_container">
        <div class="wins-heading">
            <p>Welcome</p>
            <h2>Wine & Winery Collections</h2>
        </div>
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="partner_slider">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="partner_img">
                                <img src="images/team_1.png" alt="team">
                            </div>
                        </div>
                        <div class="item">
                            <div class="partner_img">
                                <img src="images/team_2.png" alt="team">
                            </div>
                        </div>
                        <div class="item">
                            <div class="partner_img">
                                <img src="images/team_3.png" alt="team">
                            </div>
                        </div>
                        <div class="item">
                            <div class="partner_img">
                                <img src="images/team_4.png" alt="team">
                            </div>
                        </div>
                        <div class="item">
                            <div class="partner_img">
                                <img src="images/team_5.png" alt="team">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
