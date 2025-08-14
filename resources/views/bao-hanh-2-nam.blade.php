@extends('layouts.app')

@section('meta_title', "Bảo hành 2 năm")
@section('meta_keyword', "Bảo hành 2 năm")
@section('meta_description', "Bảo hành 2 năm")
@section('meta_image', "Bảo hành 2 năm")
@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/bao-hanh.css?v=' . ($ver ?? '')) }}">
    <style>
        .section-five .head > .sub-title {
            font-size: 1.6vw;
            line-height: 1.61vw;
            font-weight: 700;
            margin-top: 0.5vw;
            display: inline;
            margin-left: 5px;
        }
        @media (max-width: 600px) {
            .section-five .head > .sub-title {
                font-size: 17px;
            }
        }
    </style>
@stop

@section('content')
    <section class="tf-slideshow slider-default slider-effect-fade">
        <img src="{{ asset('images/banner-bao-hanh-2-nam.jpg?v=' . ($ver ?? '')) }}" alt="" style="width: 100%">
    </section>
    <section class="section-same section-four home-padding">
        <div class="container-fluid update-box">
            <div>
                <h3 class="title text-center">Babyro đồng hành, bảo vệ<br/>trọn vẹn từng hành trình nhỏ của bé</h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <p style="white-space: pre-line">{!! $configs[3][1]['content'] ?? '' !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex box-button">
                            <a href="" class="tf-btn btn-fill btn-white"><span class="text">Điều khoản<br>bảo hành</span></a>
                            <a href="{{ route('bao-hanh', ['view' => 'bao-hanh-vang-12-nam']) }}" class="tf-btn btn-fill btn-white"><span class="text">Gia hạn<br>bảo hành 12 năm</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <a href="" class="tf-btn btn-fill btn-white"><span class="text">Đăng ký bảo hành</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-same section-three-v1 home-padding first">
        <div class="box-content">
            <h3 class="title text-center">Câu hỏi thường gặp về bảo hành cơ bản 2 năm</h3>
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
    <section class="section-same section-three-v1 home-padding">
        <div class="box-content">
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
@endsection


@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
