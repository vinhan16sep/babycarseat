
@extends('layouts.app')

@section('meta_title', "Liên hệ")
@section('meta_keyword', "Liên hệ")
@section('meta_description', "Liên hệ")
@section('meta_image', "Liên hệ")
@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/agency.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('admin/css/lib/themify-icons.css') }}">
@stop

@section('content')

    <!-- page-title -->
    <div class="page-title" style="background-image: url(images/section/contact-banner.jpg);">
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <h3 class="heading text-center">Liên hệ</h3>
                    <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                        <li>
                            <a class="link" href="index.html">Trang chủ</a>
                        </li>
                        <li>
                            <i class="icon-arrRight"></i>
                        </li>
                        <li>
                        Liên hệ
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- Store locations -->
    <section class="flat-spacing home-padding" style="padding-top: 30px;padding-bottom: 30px;">
        <div class="container-fluid home-padding">
            <div class="row">
                <div class="col-12">
                    <div class="contact-us-map">
                        <div class="wrap-map">
                            <iframe src="{{ $contactInformations['google_map_hn'] }}" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="right">
                            <h4>Thông tin liên hệ</h4>
                            <div class="mb_20">
                                <div class="text-title mb_8">Điện thoại:</div>
                                <p class="text-secondary">{{ $contactInformations['hotline'] }}</p>
                            </div>
                            <div class="mb_20">
                                <div class="text-title mb_8">Email:</div>
                                <p class="text-secondary">{{ $contactInformations['email'] }}</p>
                            </div>
                            <div class="mb_20">
                                <div class="text-title mb_8">Địa chỉ:</div>
                                <p class="text-secondary">{{ $contactInformations['address_hn'] }}</p>
                            </div>
                            <div class="mb_20">
                                <div class="text-title mb_8">Chi nhánh:</div>
                                <p class="text-secondary">{{ $contactInformations['address_hcm'] }}</p>
                                <p class="text-secondary">{{ $contactInformations['address_nt'] }}</p>
                            </div>
                            <div>
                                <div class="text-title mb_8">Giờ làm việc:</div>
                                <div class="text-secondary">{!! nl2br(e($contactInformations['working_hours'])) !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Store locations -->

    <!-- Get In Touch -->
    <section class="flat-spacing pt-0">
        <fieldset class="container">
            <div class="heading-section text-center">
                <h3 class="heading">Liên hệ</h3>
                <!-- <p class="subheading">Use the form below to get in touch with the sales team</p> -->
            </div>
            <form id="contactform" action="https://themesflat.co/html/modave/contact/contact-process.php" method="post" class="form-leave-comment">
                <div class="wrap">
                    <div class="row">
                        <fieldset class="col-md-4" style="margin-bottom: 10px;">
                            <input class="" type="text" placeholder="Họ và tên*" name="name" id="name" tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="col-md-4" style="margin-bottom: 10px;">
                            <input class="" type="email" placeholder="Địa chỉ email*" name="email" id="email" tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="col-md-4" style="margin-bottom: 10px;">
                            <input class="" type="text" placeholder="Số điện thoại*" name="phone" id="phone" tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                    </div>
                    <fieldset class="">
                        <textarea name="message" id="message" rows="4" placeholder="Lời nhắn" tabindex="2" aria-required="true"></textarea>
                    </fieldset>
                </div>
                <div class="button-submit send-wrap">
                    <button class="tf-btn btn-fill" type="submit" id="submitFormContact">
                        <span class="text text-button">Gửi</span>
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- /Get In Touch -->

    @if($cities->count() > 0)
        <!-- Store locations -->
        <section class="flat-spacing pt-0" id="section-agency">
            <div class="container">
                <div class="heading-section text-center">
                    <h3 class="heading">Đại lý</h3>
                    <!-- <p class="subheading">Use the form below to get in touch with the sales team</p> -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="flat-animate-tab bg-box-agency">
                            <div class="box-select-agency">
                                <div class="tf-select">
                                    <select id="select-city" class="text-title" name="address[country]" data-default="">
                                        <option value="">Chọn tỉnh thành</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="tf-store-list style-column">
                                    <ul role="tablist">
                                        @php $is_active = true; @endphp
                                        @foreach($cities as $city)
                                            @php $agencies = $city->agencies ?? [] @endphp
                                            @foreach($city->agencies as $agencie)
                                                <li class="check-city check-city-{{ $city->id }} nav-tab-item" role="presentation">
                                                    <a href="#tab-id-{{ $agencie->id }}" class="tf-store-item {{ $is_active ? 'active' : '' }}" data-bs-toggle="tab">
                                                        <h6 class="tf-store-title">
                                                            {{ $agencie->name }}
                                                        </h6>
                                                        <div class="tf-store-info">
                                                            <p><i class="ti-mobile"></i> {{ $agencie->phone }}</p>
                                                            <p><i class="ti-home"></i> {{ $agencie->address }}</p>
                                                            @if($agencie->agencyFile)
                                                                <p><i class="ti-file"></i> <span title="Download File" class="download-file" data-href="{{ route('publish.agency_files.view', $agencie->agencyFile->id) }}">{{ $agencie->agencyFile->file_name }}</span></p>
                                                            @endif
                                                        </div>
                                                    </a>
                                                </li>
                                                @php $is_active = false; @endphp
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content" id="agency-tab" style="width: 100%;">
                                @php $is_active = true; @endphp
                                @foreach($cities as $city)
                                    @php $agencies = $city->agencies ?? [] @endphp
                                    @foreach($city->agencies as $agencie)
                                        <div class="check-city check-city-{{ $city->id }} tab-pane {{ $is_active ? 'active show' : '' }}" id="tab-id-{{ $agencie->id }}" role="tabpanel">
                                            <div class="wg-card-store align-items-center tf-grid-layout gap-0">
                                                <div class="contact-us-map new">
                                                    <div class="wrap-map">
                                                        <iframe src="{{ $agencie->map ?? $contactInformations['google_map_hn'] }}" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php $is_active = false; @endphp
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Store locations -->
    @endif

@endsection


@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
