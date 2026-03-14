@extends('layouts.app')

@section('meta_title', "Bảo hành vàng 12 năm")
@section('meta_keyword', "Bảo hành vàng 12 năm")
@section('meta_description', "Bảo hành vàng 12 năm")
@section('meta_image', "Bảo hành vàng 12 năm")
@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/bao-hanh.css?v=' . ($ver ?? '')) }}">
    <style>
        .indented-list {
            padding-left: 20px; /* Indent trên desktop */
            margin: 12px 0;
        }
        .indented-list li {
            margin-bottom: 8px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            line-height: 1.6;
        }
        .new-content .last-box {
            margin-bottom: 24px;
        }
        .new-content .sub-title {
            font-size: 1.1rem;
            margin-bottom: 12px;
            margin-top: 12px;
        }
        .new-content p {
            line-height: 1.7;
            font-size: 0.95rem;
            margin-bottom: 10px;
        }
        @media (max-width: 768px) {
            .indented-list {
                padding-left: 15px;
            }
            .indented-list li {
                margin-bottom: 6px;
                font-size: 0.9rem;
            }
            .new-content .sub-title {
                font-size: 1rem;
                margin-bottom: 10px;
                margin-top: 10px;
            }
            .new-content p {
                font-size: 0.9rem;
                margin-bottom: 8px;
            }
            .new-content .last-box {
                margin-bottom: 16px;
            }
        }
        @media (max-width: 480px) {
            .indented-list {
                padding-left: 12px;
            }
            .indented-list li {
                font-size: 0.85rem;
                margin-bottom: 5px;
            }
            .new-content .sub-title {
                font-size: 0.95rem;
            }
            .new-content p {
                font-size: 0.85rem;
                line-height: 1.6;
            }
        }
    </style>
@stop

@section('content')
    <section class="tf-slideshow slider-default slider-effect-fade">
        <img src="{{ asset('images/banner-bao-hanh-vang-12-nam.jpg?v=' . ($ver ?? '')) }}" alt="" style="width: 100%">
    </section>
    <!-- START Update new content 20260315-->
    <section class="section-same section-six home-padding">
        <div class="container-fluid update-box">
            <div>
                <h3 class="title text-center">BABYRO BẢO VỆ DÀI LÂU<br/>NHƯ TÌNH YÊU BỐ MẸ DÀNH CHO CON</h3>
            </div>
            <div class="content new-content">
                <div>
                    <p>Chính sách Bảo hành lên đến 12 năm của Babyro được xây dựng theo đúng quy định của pháp luật, là cam kết dài hạn của chúng tôi về chất lượng – an toàn – trách nhiệm trong suốt quá trình sử dụng sản phẩm của khách hàng. Đây là chương trình bảo hành dựa trên quyền tự nguyện của Babyro và không làm giảm quyền lợi bảo hành tối thiểu mà người tiêu dùng được pháp luật bảo vệ.</p>
                </div>

                <div class="last-box">
                    <h4 class="sub-title">Điều 1: Phạm vi và thời hạn bảo hành</h4>
                    <p>Phạm vi bảo hành lên đến 12 năm sẽ áp dụng dựa theo các dòng sản phẩm, cụ thể như sau:</p>
                    <ul class="indented-list">
                        <li style="list-style-type:disc;">Bảo hành 12 năm đối với các dòng sản phẩm: Babyro I-Spinsafe Pro, Babyro I-Spinsafe, Babyro Spinsafe</li>
                        <li style="list-style-type:disc;">Bảo hành 9 năm đối với các dòng sản phẩm: Babyro I-Wing, Babyro Wing, Babyro I-Trek</li>
                        <li style="list-style-type:disc;">Bảo hành 6 năm đối với các dòng sản phẩm: Babyro Booster, Babyro Booster Plus</li>
                        <li style="list-style-type:disc;">Trong vòng 30 ngày đầu tiên kể từ ngày mua, nếu sản phẩm phát sinh lỗi từ nhà nhà sản xuất, khách hàng được đổi sản phẩm mới 100% miễn phí (Bao gồm cả chi phí vận chuyển)</li>
                        <li style="list-style-type:disc;">Với những sản phẩm quá 30 ngày đầu tiên kể từ ngày mua, chi phí gửi sản phẩm bảo hành sẽ do khách hàng chịu trách nhiệm</li>
                    </ul>
                </div>

                <div class="last-box">
                    <h4 class="sub-title">Điều 2: Nội dung bảo hành</h4>
                    <p>Babyro sẽ Sửa chữa hoặc Thay thế Miễn phí đối với:</p>
                    <ul class="indented-list">
                        <li style="list-style-type:disc;">Các linh kiện chính liên quan đến an toàn như: cơ cấu khóa, chốt, ISOFIX, khung ghế, bộ phận hấp thụ lực</li>
                        <li style="list-style-type:disc;">Phụ kiện gắn liền với chức năng an toàn của ghế Không bao gồm vỏ bọc, đệm, vải bọc và các chi tiết mang tính thẩm mỹ</li>
                        <li style="list-style-type:disc;">Trong 30 ngày đầu kể từ ngày mua, nếu phát sinh lỗi do nhà sản xuất, Babyro sẽ: Đổi sang một sản phẩm mới 100%, Miễn phí hoàn toàn chi phí vận chuyển 2 chiều</li>
                    </ul>
                </div>

                <div class="last-box">
                    <h4 class="sub-title">Điều 3: Điều kiện được bảo hành</h4>
                    <p>Để yêu cầu bảo hành, sản phẩm khách hàng mua cần phải đáp ứng các điều kiện sau:</p>
                    <ul class="indented-list">
                        <li style="list-style-type:disc;">Nguồn gốc: Phải là sản phẩm chính hãng, được mua từ Babyro Việt Nam hoặc các đại lý, hệ thống cửa hàng phân phối chính thức</li>
                        <li style="list-style-type:disc;">Sở hữu: Bảo hành áp dụng cho người mua đầu tiên theo thông tin mua hàng. Các sản phẩm mua lại (Ghế cũ, thanh lý) có thể không được tiếp nhận bảo hành chính hang</li>
                        <li style="list-style-type:disc;">Chứng từ: Cần có thông tin mua hàng (Hóa đơn mua hàng, phiếu bảo hành hoặc thông tin kích hoạt bảo hành điện tử)</li>
                        <li style="list-style-type:disc;">Tình trạng sản phẩm: Sản phẩm chưa qua sửa chữa của bên thứ 3</li>
                    </ul>
                </div>

                <div class="last-box">
                    <h4 class="sub-title">Điều 4: Các trường hợp không được bảo hành</h4>
                    <p>Babyro từ chối bảo hành đối với:</p>
                    <ul class="indented-list">
                        <li style="list-style-type:disc;">Hư hỏng do sử dụng sai cách, không tuân thủ hướng dẫn sử dụng</li>
                        <li style="list-style-type:disc;">Hư hỏng do lắp đặt – tháo lắp sai quy cách, lực tác động không phù hợp</li>
                        <li style="list-style-type:disc;">Hư hỏng phát sinh do bảo dưỡng kém, bảo quản sai môi trường</li>
                        <li style="list-style-type:disc;">Sửa chữa bởi cá nhân/đơn vị không được ủy quyền. Sử dụng phụ kiện không chính hãng</li>
                        <li style="list-style-type:disc;">Hư hỏng do tai nạn, thiên tai, hỏa hoạn, ngập nước, hoặc các sự kiện bất khả kháng</li>
                        <li style="list-style-type:disc;">Tác động ngoại lực mạnh, rơi vỡ, biến dạng không thuộc lỗi kỹ thuật</li>
                        <li style="list-style-type:disc;">Sản phẩm có seri bị tẩy xoá, hư hỏng, không xác minh được nguồn gốc</li>
                        <li style="list-style-type:disc;">Lưu ý: Các trường hợp không được bảo hành vẫn có thể được Babyro hỗ trợ sửa chữa có phí, tùy mức độ hư hỏng</li>
                    </ul>
                </div>

                <div class="last-box">
                    <h4 class="sub-title">Điều 5: Hướng dẫn kích hoạt bảo hành điện tử</h4>
                    <p style="white-space: pre-line">Bước 01: Tìm vị trí tem bảo hành được dán trực tiếp trên phần khung nhựa của ghế

Bước 02: Quét mã QR trên tem bảo hành
• Sử dụng điện thoại thông minh có kết nối internet, mở ứng dụng "Máy ảnh" (Camera)
• Hướng camera vào mã QR trên tem bảo hành, nhấn vào đường link trang web hiện ra để truy cập

Bước 03: Nhập thông tin mua hàng
• Họ tên người mua: 
• Số điện thoại người mua:
• Địa chỉ (Để hỗ trợ gửi link kiện hoặc thu hồi bảo hành)

Sau đó bấm xác nhận để gửi thông tin bảo hành lên hệ thống bảo hành điện tử

Lưu ý: Khách hàng cần đăng ký trong vòng 30 ngày kể từ ngày mua để kích hoạt bảo hành điện tử.</p>
                </div>

                <div class="last-box">
                    <h4 class="sub-title">Điều 7: Thông tin các trung tâm bảo hành</h4>
                    <ul class="indented-list">
                        <li style="list-style-type:disc;"><strong>Hà Nội:</strong> Tòa nhà Hoà Bình Green City, 505 Minh Khai, Vĩnh Tuy – 0933 805 179</li>
                        <li style="list-style-type:disc;"><strong>Đà Nẵng:</strong> 177 Hồ Hán Thương, Sơn Trà – 0933 805 179</li>
                        <li style="list-style-type:disc;"><strong>TP. Hồ Chí Minh:</strong> 39 đường 11b KDC Dương Hồng, Bình Hưng, Bình Chánh – 0964209015</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Update new content 20260315-->

    <!-- START old content 20260315 -> Comment out -->
     
    <!-- <section class="section-same section-six home-padding">
        <div class="container-fluid update-box">
            <div>
                <h3 class="title text-center">BABYRO BẢO VỆ DÀI LÂU<br/>NHƯ TÌNH YÊU BỐ MẸ DÀNH CHO CON</h3>
            </div>
            <div class="content">
                <div>
                    <p>{!! $configs[5][1]['content'] ?? '' !!}</p>
                </div>

                <div>
                    <p>{!! $configs[5][2]['content'] ?? '' !!}</p>
                </div>

                <div class="last-box">
                    <h4 class="sub-title">{!! $configs[5][4]['title'] ?? '' !!}</h4>
                    <ul class="indented-list">
                        @php
                            $text_with_br = nl2br($configs[5][4]['content'] ?? '');
                            $lines = explode("<br />", $text_with_br);
                        @endphp
                        @foreach($lines as $_item)
                            <li style="list-style-type:disc;">{!! $_item !!}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="sub-title">{!! $configs[5][3]['title'] ?? '' !!}</h4>
                    <p style="white-space: pre-line">{!! $configs[5][3]['content'] ?? '' !!}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-same section-seven home-padding">
        <div class="container-fluid update-box">
            <div class="content">
                <div class="row">
                    <div class="col-md-12 last-box">
                        <h4 class="last-title">{!! $configs[6][4]['title'] ?? '' !!}</h4>
                        <ul>
                            @php
                                $text_with_br = nl2br($configs[6][4]['content'] ?? '');
                                $lines = explode("<br />", $text_with_br);
                            @endphp
                            @foreach($lines as $_item)
                                <li>{!! $_item !!}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section> -->

    <!-- END old content 20260315 -> Comment out -->

    <section class="section-same section-three-v1 home-padding first">
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
            <h3 class="title text-center update">Các trung tâm bảo hành của chúng tôi</h3>
            <div>
                <div class="ttbh-address text-center">
                    <strong>{!! $configs[7][1]['title'] ?? '' !!}</strong>
                    <p>{!! $configs[7][1]['content'] ?? '' !!}</p>
                </div>
                <div class="ttbh-address text-center">
                    <strong>{!! $configs[7][2]['title'] ?? '' !!}</strong>
                    <p>{!! $configs[7][2]['content'] ?? '' !!}</p>
                </div>
                <div class="ttbh-address text-center">
                    <strong>{!! $configs[7][3]['title'] ?? '' !!}</strong>
                    <p>{!! $configs[7][3]['content'] ?? '' !!}</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <!-- @include('components.form-warranty') -->
    <hr>
@endsection


@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
