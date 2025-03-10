@extends('layouts.app')

@section('meta_title', "Quà tặng")
@section('meta_keyword', "Quà tặng")
@section('meta_description', "Quà tặng")

@section('content')
<div class="inline-block gift">
    <div class="section-content box-relative">
        <div class="section-img-bg" style="background-image: url({{ getImage("images/electronic_popup-bg.png") }});width: 100%;height: 100%;background-repeat: no-repeat;background-size: cover;">
        </div>
        <div class="container box-pd">
            <div class="row">
                @foreach ($gifts as $item)
                    <div class="col-md-3 box-promotion">
                        <div class="gift">
                            <img src="{{ getImage($item->image) }}" alt="{{ $item->title }}">
                            <div class="box-gift-content">
                                <h3>{{ $item->name }}</h3>
                                <p>{{ $item->description }}</p>
                                <h4>Giá: {{ $item->price }}</h4>
                                <div>
                                    <a style="cursor: pointer;" class="contact" data-title="{{ $item->name }}" data-id="{{ $item->id }}" >Liên hệ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="bz_product_grid_content_main_wrapper pd-0 text-center w-100" style="position: relative">
                    <div class="bz_grid_menu_main_wrapper">
                        <div class="tab-content">
                            <div class="page_pagination pd-0">
                                {!! $gifts->onEachSide(0)->links("simple-bootstrap-4") !!}
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal_electronic">
        <div class="modal-content">
            <div class="lingerie_header electronic_header_close">
                <button type="button" class="close" data-dismiss="modal">
                    <svg version="1.1" id="Capa_e" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 496.096 496.096" style="enable-background:new 0 0 496.096 496.096;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M259.41,247.998L493.754,13.654c3.123-3.124,3.123-8.188,0-11.312c-3.124-3.123-8.188-3.123-11.312,0L248.098,236.686
                                    L13.754,2.342C10.576-0.727,5.512-0.639,2.442,2.539c-2.994,3.1-2.994,8.015,0,11.115l234.344,234.344L2.442,482.342
                                    c-3.178,3.07-3.266,8.134-0.196,11.312s8.134,3.266,11.312,0.196c0.067-0.064,0.132-0.13,0.196-0.196L248.098,259.31
                                    l234.344,234.344c3.178,3.07,8.242,2.982,11.312-0.196c2.995-3.1,2.995-8.016,0-11.116L259.41,247.998z"></path>
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="title">Sản phẩm</h4>
                <form id="mc-form" class="electronic_popupe_btn" method="POST" action="{{ route("gift-store") }}">
                    <input type="hidden" name="gift_id">
                    <div class="relative box-input">
                        <input class="input-block-level" type="text" name="name" placeholder="Họ và tên">
                    </div>
                    <div class="relative box-input">
                        <input class="input-block-level" type="text" name="quantity" placeholder="Số lượng">
                    </div>
                    <div class="relative box-input">
                        <input class="input-block-level" type="text" name="phone" placeholder="Số điện thoại">
                    </div>
                    <div class="relative box-input">
                        <input class="input-block-level" type="text" name="address" placeholder="Địa chỉ">
                    </div>
                    <button type="button" class="btn">Liên hệ</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection