@extends('layouts.app')

@section('meta_title', "Đổi ghế ô tô miễn phí")
@section('meta_keyword', "Đổi ghế ô tô miễn phí")
@section('meta_description', "Đổi ghế ô tô miễn phí")
@section('meta_image', "Đổi ghế ô tô miễn phí")
@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/bao-hanh.css?v=' . ($ver ?? '')) }}">
@stop

@section('content')
    <section class="tf-slideshow slider-default slider-effect-fade">
        <img src="{{ getImage('/storage/images/banner/2/1747670816086244.jpg') }}" alt="" style="width: 100%">
    </section>
    <section class="section-same section-one home-padding">
        <div class="container-fluid update-box">
            <div>
                <h3 class="title text-center">Đổi ghế ô tô trẻ em Miễn Phí Sau Tai Nạn
bảo vệ bé yêu cùng Babyro</h3>
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
    <section class="section-same section-two home-padding">
        <div class="container-fluid update-box">
            <div>
                <h3 class="title text-center">Hướng dẫn tham gia chương trình
đổi ghế ô tô Miễn Phí Sau Tai Nạn</h3>
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

    <section class="section-same section-three-v1 home-padding">
        <div class="box-content">
            <h3 class="title text-center">Câu hỏi thường gặp về chương trình
đổi ghế ô tô Miễn Phí Sau Tai Nạn</h3>
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
@endsection


@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
