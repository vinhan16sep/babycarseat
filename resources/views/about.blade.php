@extends('layouts.app')

@section('meta_title', "Về chúng tôi")
@section('meta_keyword', "Về chúng tôi")
@section('meta_description', "Về chúng tôi")

@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/about.css?v=' . ($ver ?? '')) }}">
@stop

@section('content')
    <!-- page-title -->
    <div class="page-title" style="background-image: url(images/about/banner-headerpng.png);">
        <div>
            <div class="container-full">
                <div class="row">
                    <div class="col-12 box-text">
                        <div class="text-head">
                            Babyro - An toàn<br>
                            khởi nguồn từ tình yêu
                        </div>
                        <div class="text-head">ĐỒNG HÀNH CÙNG TƯƠNG LAI CON TRẺ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- about-us -->
    <section class="flat-spacing about-us-main pb_0">
        <div class="container-fluid">
            <div class="row old">
                <div class="col-md-5 img">
                    <div class="about-us-features wow fadeInLeft">
                        <img class="lazyload" data-src="images/about/Ve-Babyro-1.png" src="images/about/Ve-Babyro-1.png" alt="image-team">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box-content">
                        <div class="about-content">
                            <h3 class="title">Khi con yêu chập chững những bước
đầu tiên trên hành trình khám phá thế giới</h3>
                            <div class="desc">Mong muốn lớn nhất của cha mẹ là con luôn được an toàn và nhận
được những điều tốt đẹp nhất, dù ở bất cứ đâu. Đặc biệt, trên mỗi
chuyến đi bằng ô tô, sự an toàn của bé luôn là ưu tiên hàng đầu,
một giá trị không thể thỏa hiệp. Chính từ sự thấu hiểu sâu sắc và
trăn trở ấy của người sáng lập Babyro – một kỹ sư, đồng thời cũng
là một người cha – Babyro đã ra đời.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row even">
                <div class="col-md-5 img">
                    <div class="about-us-features wow fadeInLeft">
                        <img class="lazyload" data-src="images/about/Ve-Babyro-2.png" src="images/about/Ve-Babyro-2.png" alt="image-team">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box-content">
                        <div class="about-content">
                            <h3 class="title">Babyro không đơn thuần là
một chiếc ghế ngồi ô tô cho trẻ em</h3>
                            <div class="desc">Babyro là kết tinh của sự thấu hiểu sâu sắc về nhu cầu an toàn của
trẻ, được hình thành từ tiêu chuẩn kỹ thuật khắt khe của Đức và
tinh thần đồng hành cùng hàng triệu gia đình Việt. Babyro chính là
người hùng thầm lặng, hiện thân của tình yêu thương thông minh,
sự bảo vệ chủ động và lời hứa đồng hành trên mọi chặng đường
đầu đời của bé, nơi các gia đình hiện đại có thể đặt trọn niềm tin.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row old">
                <div class="col-md-5 img">
                    <div class="about-us-features wow fadeInLeft">
                        <img class="lazyload" data-src="images/about/Ve-Babyro-3.png" src="images/about/Ve-Babyro-3.png" alt="image-team">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box-content">
                        <div class="about-content">
                            <h3 class="title">Mỗi sản phẩm Babyro được thiết kế tỉ mỉ</h3>
                            <div class="desc">Hợp tác độc quyền với các nhà sản xuất hàng đầu thế giới, đảm bảo
chất lượng và sự thoải mái tối đa. Chúng tôi cam kết mang đến giải
pháp tử tế, thông minh và khiêm nhường, phù hợp với mọi gia đình.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row even">
                <div class="col-md-5 img">
                    <div class="about-us-features wow fadeInLeft">
                        <img class="lazyload" data-src="images/about/Ve-Babyro-4.png" src="images/about/Ve-Babyro-4.png" alt="image-team">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box-content">
                        <div class="about-content">
                            <h3 class="title">Với tầm nhìn trở thành thương hiệu
đáng tin cậy hàng đầu tại Việt Nam</h3>
                            <div class="desc">Babyro cam kết cung cấp sản phẩm chuẩn quốc tế, truyền cảm
hứng lựa chọn an toàn và dẫn dắt văn hóa sử dụng ghế trẻ em như
một phần tất yếu của xã hội hiện đại.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title">
                        Hãy cùng Babyro, biến mỗi chuyến đi thành một hành trình bình an, khởi đầu vững chắc cho tương lai của trẻ!
                    </h4>
                </div>
            </div>
        </div>
    </section>
    <!-- /about-us -->
@endsection
