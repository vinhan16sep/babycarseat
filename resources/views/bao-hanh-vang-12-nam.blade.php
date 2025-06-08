@extends('layouts.app')

@section('meta_title', "Bảo hành vàng 12 năm")
@section('meta_keyword', "Bảo hành vàng 12 năm")
@section('meta_description', "Bảo hành vàng 12 năm")
@section('meta_image', "Bảo hành vàng 12 năm")
@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/bao-hanh.css?v=' . ($ver ?? '')) }}">
@stop

@section('content')
    <section class="tf-slideshow slider-default slider-effect-fade">
        <img src="http://127.0.0.1:8000/storage/images/banner/2/1747670816086244.jpg" alt="" style="width: 100%">
    </section>
    <section class="section-same section-six home-padding">
        <div class="container-fluid update-box">
            <div>
                <h3 class="title text-center">BẢO HÀNH VÀNG 12 NĂM
An tâm trên mọi hành trình cùng Babyro</h3>
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
    <section class="section-same section-seven home-padding">
        <div class="container-fluid update-box">
            <div>
                <h3 class="title text-center" style="white-space: pre-line">Hướng dẫn đăng ký
Bảo hành vàng 12 năm Babyro</h3>
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
                        <p class="note">Lưu ý! Để được hưởng chương trình bảo hành vàng 12 năm, bạn cần đăng ký theo mẫu đơn trong vòng 30 ngày kể từ ngày mua</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
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
    </section>

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
    @include('components.form-warranty')
@endsection


@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
