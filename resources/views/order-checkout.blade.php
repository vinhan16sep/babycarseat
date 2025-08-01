@extends('layouts.app')

@section('meta_title', "Thanh toán đơn hàng")
@section('meta_keyword', "Thanh toán đơn hàng")
@section('meta_description', "Thanh toán đơn hàng")

@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}" />
@stop

@section('content')
    <div class="bz_inner_page_navigation float_left">
        <div class="container custom_container">
        <div class="inner_menu float_left">
            <ul>
            <li>
                <a href="#">
                <span>
                    <i class="fas fa-home"></i>
                </span>
                </a>
            </li>
            <li class="active">
                <a>
                <span>
                    <i class="fas fa-angle-right"></i>
                </span> Thanh toán </a>
            </li>
            </ul>
        </div>
        </div>
    </div>

  <div class="bz_product_grid_content_main_wrapper float_left">
    <div class="container custom_container">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-12">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <div id="payment-left">
                @if ($count > 0)
                    <form id="order-form" method="POST" action="{{ route("checkout-store") }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="bz_checkout_main_wrapper float_left">
                            <div class="accordion" id="accordionExample">
                                <div class="card checkout_accord">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">Thông tin thanh toán <span>
                                            <i class="fa fa-plus"></i>
                                            </span>
                                        </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="billing_info float_left">
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-12">
                                                    <label>Họ và tên*</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên" value="{{ old("name") }}">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                    <label>Địa chỉ*</label>
                                                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{ old("address") }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-12">
                                                    <label>Số điện thoại*</label>
                                                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" value="{{ old("phone") }}">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                    <label>Địa chỉ email*</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ email" value="{{ old("email") }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                    <label class="d-block">Thông tin bổ sung</label>
                                                    <textarea name="note" id="note" cols="30" rows="4" class="w-full"></textarea>
                                                    </div>
                                                </div>
                                                <a class="submit_btn next" href="javascript:void(0)">Tiếp tục</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card checkout_accord">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"> Phương thức thanh toán <span>
                                            <i class="fa fa-plus"></i>
                                            </span>
                                        </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                        <div class="card-body">
                                        <div class="payment_method float_left">
                                            @foreach (\App\Models\Order::TYPE_PAYMENT as $key => $title)
                                                <p>
                                                    <input type="radio" id="radio{{ $key }}" name="payment_method" value="{{ $key }}"  {{ $loop->first ? "checked" : ''}}>
                                                    <label class="direct_bank" for="radio{{ $key }}">{{ $title }}
                                                        <span class="small-text">{{ \App\Models\Order::TYPE_PAYMENT_DESCRIPTION[$key] ?? $title }}</span>
                                                    </label>
                                                </p>
                                            @endforeach
                                            <div class="payment_card">
                                            <a class="submit_btn submit_payment">Đặt hàng</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <p class="zoom-area">Không có sản phẩm nào để thanh toán</p>
                    <a class="back-to-home" href="{{ route("home") }}">Quay lại trang chủ</a>
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12">
            <div id="order-cart-right">
                @include("components.order-cart-right", [
                    "cart" => $cart,
                    "count" => $count,
                    "total" => $total,
                    "sub_total" => $sub_total,
                    "discount_value" => $discount_value,
                    "type" => "checkout"
                ])
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
