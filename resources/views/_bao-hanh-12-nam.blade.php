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
                    @if(isset($configs[1][1]))
                        <h4 class="sub-title">{{ $configs[1][1]['title'] }}</h4>
                        <p>{{ $configs[1][1]['content'] }}</p>
                    @endif
                </div>

                <div>
                    @if(isset($configs[1][2]))
                        <h4 class="sub-title">{{ $configs[1][2]['title'] }}</h4>
                        <p>{{ $configs[1][2]['content'] }}</p>
                    @endif
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
                                <h4 class="sub-title">{!! $configs[2][1]['title'] ?? '' !!}</h4>
                            </div>
                            <div class="content">
                                <ul>
                                    @php
                                        $text_with_br = nl2br($configs[2][1]['content'] ?? '');
                                        $lines = explode("<br />", $text_with_br);
                                    @endphp
                                    @foreach($lines as $_item)
                                        <li>{!! $_item !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 _box-center">
                        <div class="box">
                            <div class="head">
                                <span>02</span>
                                <h4 class="sub-title">{!! $configs[2][2]['title'] ?? '' !!}</h4>
                            </div>
                            <div class="content">
                                {!! $configs[2][2]['content'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 _box-right">
                        <div class="box">
                            <div class="head">
                                <span>03</span>
                                <h4 class="sub-title"> {!! $configs[2][3]['title'] ?? '' !!}</h4>
                            </div>
                            <div class="content">
                                <p style="white-space: pre-line">{!! $configs[2][3]['content'] ?? '' !!}</p>
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
                        <h4 class="last-title">{!! $configs[2][4]['title'] ?? '' !!}</h4>
                        <ul>
                            @php
                                $text_with_br = nl2br($configs[2][4]['content'] ?? '');
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
                        <p style="white-space: pre-line">{!! $configs[3][1]['content'] ?? '' !!}</p>
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
                                <h4 class="sub-title">{!! $configs[4][1]['title'] ?? '' !!}</h4>
                            </div>
                            <div class="content">
                                {!! $configs[4][1]['content'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 _box-center">
                        <div class="box">
                            <div class="head">
                                <span>02</span>
                                <h4 class="sub-title">{!! $configs[4][2]['title'] ?? '' !!}</h4>
                            </div>
                            <div class="content">
                                {!! $configs[4][2]['content'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 _box-center">
                        <div class="box">
                            <div class="head">
                                <span>03</span>
                                <h4 class="sub-title">{!! $configs[4][3]['title'] ?? '' !!}</h4>
                            </div>
                            <div class="content">
                                {!! $configs[4][3]['content'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 _box-right">
                        <div class="box">
                            <div class="head">
                                <span>04</span>
                                <h4 class="sub-title">{!! $configs[4][4]['title'] ?? '' !!}</h4>
                            </div>
                            <div class="content">
                                {!! $configs[4][4]['content'] ?? '' !!}
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
                    <p>{!! $configs[5][1]['content'] ?? '' !!}</p>
                </div>

                <div>
                    <p>{!! $configs[5][2]['content'] ?? '' !!}</p>
                </div>

                <div>
                    <h4 class="sub-title">{!! $configs[5][3]['title'] ?? '' !!}</h4>
                    <p style="white-space: pre-line">{!! $configs[5][3]['content'] ?? '' !!}</p>
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
                                <h4 class="sub-title">{!! $configs[6][1]['title'] ?? '' !!}</h4>
                            </div>
                            <div class="content">
                                {!! $configs[6][1]['content'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 _box-center">
                        <div class="box">
                            <div class="head">
                                <span>02</span>
                                <h4 class="sub-title">{!! $configs[6][2]['title'] ?? '' !!}</h4>
                            </div>
                            <div class="content">
                                {!! $configs[6][2]['content'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 _box-right">
                        <div class="box">
                            <div class="head">
                                <span>03</span>
                                <h4 class="sub-title">{!! $configs[6][3]['title'] ?? '' !!}</h4>
                            </div>
                            <div class="content">
                                {!! $configs[6][3]['content'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class="text-danger note">Lưu ý! Để được hưởng chương trình bảo hành vàng 12 năm, bạn cần đăng ký theo mẫu đơn trong vòng 30 ngày kể từ ngày mua</p>
                    </div>

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
    <hr>
@include('components.form-warranty')
    <hr>
@endsection


@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
