@extends('layouts.app')

@section('meta_title', "Liên hệ")
@section('meta_keyword', "Liên hệ")
@section('meta_description', "Liên hệ")
@section('meta_image', "Liên hệ")
@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/babyro-hub.css?v=' . ($ver ?? '')) }}">
@stop

@section('content')
    <section class="tf-slideshow slider-default slider-effect-fade">
        <img src="http://127.0.0.1:8000/storage/images/banner/2/1747670816086244.jpg" alt="" style="width: 100%">
    </section>
    <section class="section-same section-one home-padding">
        <div class="container-fluid">
            <div>
                <h3 class="title text-center">Chương trình Đổi Ghế Ô Tô Trẻ Em Miễn Phí
Sau Tai Nạn Babyro - bảo vệ An Toàn Cho Bé Yêu</h3>
            </div>
            <div class="content">
                <div>
                    <h4 class="sub-title">Tại sao ghế ô tô trẻ em cần phải thay thế sau tai nạn?</h4>
                    <p>Khi xảy ra tai nạn giao thông, dù nhẹ hay nặng, ghế ô tô trẻ em có thể bị ảnh hưởng mà mắt thường
                        không thể thấy được. Điều này khiến ghế không còn đảm bảo</p>
                    <p>khả năng bảo vệ tối đa cho trẻ em trong những vụ va chạm tiếp theo. Hiểu được sự quan trọng của
                        việc an toàn giao thông cho trẻ em, Babyro triển khai chương</p>
                    <p>trình đổi ghế ô tô miễn phí sau tai nạn để đảm bảo các bé luôn được bảo vệ với ghế ô tô an toàn
                        đạt chuẩn.</p>
                </div>

                <div>
                    <h4 class="sub-title">Lý do cần tham gia chương trình Đổi Ghế Ô Tô Miễn Phí Sau Tai Nạn</h4>
                    <p>Mỗi chiếc ghế ô tô trẻ em Babyro đều được thiết kế để giảm thiểu tối đa các chấn thương trong
                        trường hợp xảy ra va chạm. Tuy nhiên, sau một vụ tai nạn, dù không</p>
                    <p>có dấu hiệu hư hỏng bên ngoài, ghế có thể bị tổn hại cấu trúc bên trong mà bạn không thể nhìn
                        thấy. Chính vì vậy, chương trình này là một cơ hội để các bậc phụ</p>
                    <p>huynh đổi ghế ô tô an toàn của mình và đảm bảo rằng con em họ luôn được bảo vệ.</p>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="section-same section-two home-padding">
        <div class="container-fluid">
            <div>
                <h3 class="title text-center">Hướng dẫn tham gia chương trình
Đổi Ghế Ô Tô Miễn Phí Sau Tai Nạn</h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="head">
                                <span>01</span>
                                <h4 class="sub-title">Chuẩn bị<br>tài liệu liên quan</h4>
                            </div>
                            <div class="content">
                                <ul>
                                    <li>Bằng chứng mua hàng chính hãng tại <br>Babyro (hóa đơn hoặc mã bảo hành).</li>
                                    <li>Biên bản của cảnh sát về vụ tai nạn.</li>
                                    <li>Giấy tờ bảo hiểm xe.</li>
                                    <li>Hình ảnh hoặc video ghi lại hiện trường tai nạn và tình trạng của ghế</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 _box-center">
                        <div class="box">
                            <div class="head">
                                <span>02</span>
                                <h4 class="sub-title">Hoàn thiện<br>mẫu đơn</h4>
                            </div>
                            <div class="content">
                                Bạn cần điền đầy đủ thông tin vào mẫu đơn mà Babyro cung cấp.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 _box-right">
                        <div class="box">
                            <div class="head">
                                <span>03</span>
                                <h4 class="sub-title"> Chờ phản hồi<br>từ Babyro</h4>
                            </div>
                            <div class="content">
                                <p>Sau khi nộp đầy đủ tài liệu, bạn chỉ cần chờ phản hồi từ Babyro. </p>
                                <p>Chúng tôi sẽ nhanh chóng xem xét và thông báo kết quả cho bạn. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex box-button">
                            <a href="" class="tf-btn btn-fill btn-white"><span class="text">Điều khoản</span></a>
                            <a href="" class="tf-btn btn-fill btn-white"><span class="text">Đổi ghế ô tô miến phí</span></a>
                        </div>
                    </div>

                    <div class="col-md-12 last-box">
                        <h4 class="last-title">Những lưu ý khi tham gia chương trình</h4>
                        <ul>
                            <li>Chương trình chỉ áp dụng cho các sản phẩm ghế ô tô trẻ em chính hãng Babyro.</li>
                            <li>Yêu cầu đổi ghế cần thực hiện trong vòng 30 ngày sau khi xảy ra tai nạn.</li>
                            <li>Quyết định cuối cùng về việc đổi ghế miễn phí sẽ thuộc về Babyro sau khi xem xét các
                                bằng chứng và tình trạng ghế.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>

    <section class="section-same section-three-v1 home-padding">
        <div class="box-content">
            <h3 class="title text-center">Câu hỏi thường gặp về chương trình
Đổi Ghế Ô Tô Miễn Phí</h3>
            <div>
                <div class="tf-product-info-help">
                    <ul class="accordion-product-wrap" id="accordion-product">
                        @if(!empty($qas['DOI_GHE']))
                            @foreach($qas['DOI_GHE'] as $_key =>  $_qa)
                                <li class="accordion-product-item">
                                    <a href="#accordion-{{ $_key }}" class="accordion-title current collapsed" data-bs-toggle="collapse"
                                       aria-expanded="false" aria-controls="accordion-1">
                                        <h6 class="title">{{ $_qa['question'] }}</h6>
                                        <span class="btn-open-sub-detail">
                                            <i class="bi bi-chevron-down"></i>
                                            <i class="bi bi-dash-lg"></i>
                                        </span>
                                    </a>
                                    <div id="accordion-{{ $_key }}" class="collapse" data-bs-parent="#accordion-product" style="">
                                        <div class="accordion-content tab-description">
                                            <p class="text-secondary">
                                                {{ $_qa['answer'] }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
@include('components.form-safe')
    <hr>
    <section class="section-same section-four home-padding">
        <div class="container-fluid">
            <div>
                <h3 class="title">Bảo hành cơ bản</h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <p><span style="padding-right: 10px;">⟶</span> Tất cả các sản phẩm của Babyro đều được bảo hành hai năm</p>
                        <p><span style="padding-right: 10px;">⟶</span> Chúng tôi sẽ sửa chữa miễn phí toàn bộ linh phụ kiện bao gồm (cơ cấu khoá, chốt, ISOFIX). Không bao gồm vỏ bọc.</p>
                        <p><span style="padding-right: 10px;">⟶</span> Trong 30 ngày kể từ ngày mua, nếu có bất kỳ lỗi gì của nhà sản xuất sẽ được đổi một sản phẩm mới miễn phí (bao gồm cả chi phí vận chuyển)</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong class="dk">Điều khoản bảo hành</strong>
                        <a href="" class="tf-btn btn-fill btn-white"><span class="text">Gia hạn<br>Bảo hành 10 năm</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="section-same section-five home-padding">
        <div class="container-fluid">
            <div>
                <h3 class="title text-center">Quy trình bảo hành</h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box">
                            <div class="head">
                                <span>01</span>
                                <h4 class="sub-title">Hoàn thành mẫu đơn</h4>
                            </div>
                            <div class="content">
                                Bạn sẽ cần: bằng chứng mua hàng, thông tin về sản phẩm và thiệt hại, cũng như thông tin liên lạc
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 _box-center">
                        <div class="box">
                            <div class="head">
                                <span>02</span>
                                <h4 class="sub-title">Nhận sản phẩm</h4>
                            </div>
                            <div class="content">
                                Sau khi đơn đăng ký của bạn được đánh giá tích cực, chúng tôi sẽ cử nhân viên chuyển phát nhanh đến lấy sản phẩm đã đóng gói với chi phí do chúng tôi chi trả.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 _box-center">
                        <div class="box">
                            <div class="head">
                                <span>03</span>
                                <h4 class="sub-title">Sửa chữa</h4>
                            </div>
                            <div class="content">
                                Sau khi chúng tôi nhận sản phẩm, nhân viên dịch vụ được ủy quyền của chúng tôi sẽ giám sát việc sửa chữa.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 _box-right">
                        <div class="box">
                            <div class="head">
                                <span>04</span>
                                <h4 class="sub-title">Giao hàng sản phẩm</h4>
                            </div>
                            <div class="content">
                                Chúng tôi sẽ giao sản phẩm đã sửa chữa hoặc thay thế đến địa chỉ đã chỉ định
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex box-button">
                            <a href="" class="tf-btn btn-fill btn-white"><span class="text">Báo cáo khiếu nại</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="section-same section-three-v1 home-padding">
        <div class="box-content">
            <h3 class="title text-center">Câu hỏi thường gặp về bảo hành cơ bản</h3>
            <div>
                <div class="tf-product-info-help">
                    <ul class="accordion-product-wrap" id="accordion-product-v2">
                        @if(!empty($qas['BAO_HANH']))
                            @foreach($qas['BAO_HANH'] as $_key =>  $_qa)
                                <li class="accordion-product-item">
                                    <a href="#accordion-v2-{{ $_key }}" class="accordion-title current collapsed" data-bs-toggle="collapse"
                                       aria-expanded="false" aria-controls="accordion-1">
                                        <h6 class="title">{{ $_qa['question'] }}</h6>
                                        <span class="btn-open-sub-detail">
                                            <i class="bi bi-chevron-down"></i>
                                            <i class="bi bi-dash-lg"></i>
                                        </span>
                                    </a>
                                    <div id="accordion-v2-{{ $_key }}" class="collapse" data-bs-parent="#accordion-product-v2" style="">
                                        <div class="accordion-content tab-description">
                                            <p class="text-secondary">
                                                {{ $_qa['answer'] }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="section-same section-six home-padding">
        <div class="container-fluid">
            <div>
                <h3 class="title text-center">Bảo hành vàng - An tâm trọn đời
BẢO HÀNH VÀNG 12 NĂM từ Babyro: An tâm trên mọi hành trình</h3>
            </div>
            <div class="content">
                <div>
                    <p>Tất cả ghế ô tô trẻ em Babyro đều được bảo hành chính hãng trong 02 năm. Đặc biệt, bạn có thể dễ dàng gia hạn miễn phí lên đến 12 năm chỉ bằng cách hoàn thành
                        <strong>đơn đăng ký Gia hạn bảo hành 12 năm miễn phí</strong> trong vòng 30 ngày kể từ ngày mua.</p>
                </div>

                <div>
                    <p>
                        Chính sách Bảo hành Vàng kéo dài 12 năm như một lời cam kết của Babyro về chất lượng và sự an toàn - những giá trị chúng tôi luôn đặt lên hàng đầu. Đây không chỉ
                        đơn thuần là chương trình bảo hành, mà còn là sự đồng hành đầy trách nhiệm của chúng tôi dành cho mỗi chuyến đi của bé. Chúng tôi tin rằng mỗi chiếc ghế ô tô
                        Babyro sẽ là người bạn đồng hành đáng tin cậy, bảo vệ bé trên mọi hành trình
                    </p>
                </div>

                <div>
                    <h4 class="sub-title">Chúng tôi sẽ thực hiện Sữa chữa - Thay thế Miễn phí:</h4>
                    <p><span style="padding-right: 10px;">⟶</span> Toàn bộ mọi linh phụ kiện bao gồm (cơ cấu khoá, chốt, ISOFIX). Không bao gồm vỏ bọc.</p>
                    <p><span style="padding-right: 10px;">⟶</span> Việc thay thế, sẽ được thực hiện bởi đội ngũ kỹ thuật viên chuyên nghiệp của Babyro hoặc các trung tâm bảo hành ủy quyền.</p>
                    <p><span style="padding-right: 10px;">⟶</span> Trong 30 ngày kể từ ngày mua, nếu có bất kỳ lỗi gì của nhà sản xuất sẽ được đổi một sản phẩm mới miễn phí (bao gồm cả chi phí vận chuyển)</p>
                </div>
            </div>
        </div>
    </section>
    <hr>

    <section class="section-same section-seven home-padding">
        <div class="container-fluid">
            <div>
                <h3 class="title text-center">Hướng dẫn đăng ký "Bảo hành vàng 12 năm" của Babyro</h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="head">
                                <span>01</span>
                                <h4 class="sub-title">Lưu lại hóa đơn<br>mua hàng</h4>
                            </div>
                            <div class="content">
                                Bạn điền đúng theo mẫu ở bước tiếp theo.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 _box-center">
                        <div class="box">
                            <div class="head">
                                <span>02</span>
                                <h4 class="sub-title">Hoàn thiện<br>mẫu đơn</h4>
                            </div>
                            <div class="content">
                                Điền thông tin vào Mẫu "Đăng ký bảo hành vàng 12 năm cùng Babyro”
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 _box-right">
                        <div class="box">
                            <div class="head">
                                <span>03</span>
                                <h4 class="sub-title"> Chờ phản hồi<br>từ Babyro</h4>
                            </div>
                            <div class="content">
                                Chúng tôi sẽ gửi xác nhận đăng ký chương trình tới địa chỉ email mà bạn đã cung cấp.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class="text-danger note">Lưu ý! Để được hưởng chương trình bảo hành vàng 12 năm, bạn cần đăng ký theo mẫu đơn trong vòng 30 ngày kể từ ngày mua</p>
                    </div>

                    <div class="col-md-12 last-box">
                        <h4 class="last-title">Các trường hợp không được bảo hành</h4>
                        <ul>
                            <li>Hư hỏng do sử dụng không đúng cách theo hướng dẫn của nhà sản xuất.</li>
                            <li>Hư hỏng do lắp ráp, cài đặt hoặc tháo rời sản phẩm và/hoặc phụ kiện không đúng cách.</li>
                            <li>Hư hỏng do bảo dưỡng, chăm sóc và bảo quản kém.</li>
                            <li>Hư hỏng do tự ý sửa chữa, thay đổi cấu trúc sản phẩm hoặc sử dụng phụ kiện không chính hãng.</li>
                            <li>Hư hỏng do sử dụng sai cách, lạm dụng, cố ý dùng sai cách, hỏa hoạn, ngấm nước, các sự cố bất khả kháng hoặc các tác nhân tương tự.</li>
                            <li>Hư hỏng do tác động của môi trường bên ngoài.</li>
                            <li>Sản phẩm có số sê-ri đã bị xóa hoặc bị xóa mờ.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="section-same section-three-v1 home-padding">
        <div class="box-content">
            <h3 class="title text-center">Câu hỏi thường gặp về chương trình
Bảo Hành Vàng 12 năm Babyro</h3>
            <div>
                <div class="tf-product-info-help">
                    <ul class="accordion-product-wrap" id="accordion-product-v3">
                        @if(!empty($qas['BAO_HANH_12_YEAR']))
                            @foreach($qas['BAO_HANH_12_YEAR'] as $_key =>  $_qa)
                                <li class="accordion-product-item">
                                    <a href="#accordion-v3-{{ $_key }}" class="accordion-title current collapsed" data-bs-toggle="collapse"
                                       aria-expanded="false" aria-controls="accordion-1">
                                        <h6 class="title">{{ $_qa['question'] }}</h6>
                                        <span class="btn-open-sub-detail">
                                            <i class="bi bi-chevron-down"></i>
                                            <i class="bi bi-dash-lg"></i>
                                        </span>
                                    </a>
                                    <div id="accordion-v3-{{ $_key }}" class="collapse" data-bs-parent="#accordion-product-v3" style="">
                                        <div class="accordion-content tab-description">
                                            <p class="text-secondary">
                                                {{ $_qa['answer'] }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <h3 class="title text-center">Các trung tâm bảo hành của chúng tôi</h3>
            <div>
                <div class="ttbh-address text-center">
                    <strong>Trung tâm bảo hành Hà Nội</strong>
                    <p>505 Minh Khai, Tòa nhà Hòa Bình, Hà Nội - 0967 8888 68</p>
                </div>
                <div class="ttbh-address text-center">
                    <strong>Trung tâm bảo hành Đà Nẵng</strong>
                    <p>177 Hồ Hoàn Thương, Sơn Trà, Đà Nẵng - 0967 8888 68</p>
                </div>
                <div class="ttbh-address text-center">
                    <strong>Trung tâm bảo hành Hồ Chính Minh</strong>
                    <p>số 83, đường F11, khu Công nghiệp Tân Bình, TP. Hồ Chí Minh - 0967 8888 68</p>
                </div>
            </div>
        </div>
    </section>
    <hr>
@include('components.form-warranty')
    <hr>
@endsection


@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
