@extends('layouts.app')

@section('meta_title', "Thanh toán đơn hàng")
@section('meta_keyword', "Thanh toán đơn hàng")
@section('meta_description', "Thanh toán đơn hàng")

@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}" />
@stop

@section('content')


    <!-- page-title -->
    <div class="page-title" style="background-image: url(images/section/page-title.jpg);">
        <div class="container">
            <h3 class="heading text-center">Thanh toán</h3>
            <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                <li><a class="link" href="{{ url('/') }}">Trang chủ</a></li>
                <li><i class="icon-arrRight"></i></li>
                <li>Thanh toán</li>
            </ul>
        </div>
    </div>
    <!-- /page-title -->
    <!-- Section checkout -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <form method="post" action="{{ route('checkout-store') }}" id="order-form">
                        <div class="flat-spacing tf-page-checkout">
                            <div class="wrap info-box">
                                <h5 class="title">Thông tin thanh toán</h5>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="grid-2">
                                    <div>
                                        <input type="text" name="name" placeholder="Nhập họ và tên*">
                                    </div>
                                    <div>
                                        <input type="text" name="phone" placeholder="Nhập số điện thoại*">
                                    </div>
                                </div>
                                <div class="grid-2">
                                    <div>
                                        <input type="text" name="address" placeholder="Nhập địa chỉ*">
                                    </div>
                                    <div>
                                        <input type="text" name="email" placeholder="Nhập email*">
                                    </div>
                                </div>
                                <textarea placeholder="Thông tin bổ sung" name="node"></textarea>
                            </div>
                            <div class="wrap form-payment">
                                <h5 class="title">Lựa chọn phương thức thanh toán:</h5>
                                <div class="payment-box" id="payment-box">
                                    <!-- <div class="payment-item payment-choose-card active">
                                        <label for="credit-card-method" class="payment-header" data-bs-toggle="collapse" data-bs-target="#credit-card-payment" aria-controls="credit-card-payment">
                                            <input type="radio" name="payment_method" value="1" class="tf-check-rounded" id="credit-card-method" checked>
                                            <span class="text-title">Credit Card</span>
                                        </label>
                                        <div id="credit-card-payment" class="collapse show" data-bs-parent="#payment-box">
                                            <div class="payment-body">
                                                <p class="text-secondary">Make your payment directly into our bank account. Your order will not be shipped until the funds have cleared in our account.</p>
                                                <div class="input-payment-box">
                                                    <input type="text" placeholder="Name On Card*">
                                                    <div class="ip-card">
                                                        <input type="text" placeholder="Card Numbers*">
                                                        <div class="list-card">
                                                            <img src="images/payment/img-7.png" width="48" height="16" alt="card">
                                                            <img src="images/payment/img-8.png" width="21" height="16" alt="card">
                                                            <img src="images/payment/img-9.png" width="22" height="16" alt="card">
                                                            <img src="images/payment/img-10.png" width="24" height="16" alt="card">
                                                        </div>
                                                    </div>
                                                    <div class="grid-2">
                                                        <input type="date" >
                                                        <input type="text" placeholder="CVV*">
                                                    </div>
                                                </div>
                                                <div class="check-save">
                                                    <input type="checkbox" class="tf-check" id="check-card" checked>
                                                    <label for="check-card">Save Card Details</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="payment-item">
                                        <label for="apple-method" class="payment-header collapsed" data-bs-toggle="collapse" data-bs-target="#apple-payment" aria-controls="apple-payment">
                                            <input type="radio" name="payment_method" value="1" class="tf-check-rounded" id="apple-method"> -->
                                            <!-- <span class="text-title apple-pay-title"><img src="images/payment/applePay.png" alt="apple"> Apple Pay</span> -->
                                            <!-- <span class="text-title">Momo</span>
                                        </label>
                                        <div id="apple-payment" class="collapse" data-bs-parent="#payment-box"></div>
                                    </div> -->
                                    <div class="payment-item">
                                        <label for="delivery-method" class="payment-header collapsed" data-bs-toggle="collapse" data-bs-target="#delivery-payment" aria-controls="delivery-payment">
                                            <input type="radio" name="payment_method" value="2" class="tf-check-rounded" id="delivery-method" checked>
                                            <span class="text-title">Thanh toán khi nhận hàng</span>
                                        </label>
                                        <div id="delivery-payment" class="collapse" data-bs-parent="#payment-box"></div>
                                    </div>
                                </div>
                                <a class="tf-btn btn-reset submit_payment">Đồng ý</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-1">
                    <div class="line-separation"></div>
                </div>
                <div class="col-xl-5">
                    <div class="flat-spacing flat-sidebar-checkout">
                        <div class="sidebar-checkout-content">
                            <h5 class="title">Giỏ hàng</h5>
                            <div class="list-product">
                                @if ($count > 0)
                                    @foreach ($cart as $key => $item)
                                        <div class="item-product">
                                            <a class="img-product">
                                                @if (!empty($item->options["image"]))
                                                    <img  class="img-fluid cart" src="{{ getImage($item->options["image"]) }}" alt="{{ $item->name }}">
                                                @endif
                                            </a>
                                            <div class="content-box">
                                                <div class="info">
                                                    <a class="name-product link text-title">{{ $item->name }}</a>
                                                    <div class="variant text-caption-1 text-secondary"><span class="color">{{ $item->options['colors'][$item->options['product_color_id']] ?? null }}</span></div>
                                                </div>
                                                <div class="total-price text-button"><span class="count">{{ $item->qty }}</span>X<span class="price">{{ numberFormat($item->price) }}₫</span></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="sec-total-price">
                                <div class="bottom">
                                    <h5 class="d-flex justify-content-between">
                                        <span>Tổng tiền</span>
                                        <span class="total-price-checkout">{{ numberFormat($total) }}₫</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Section checkout -->
@endsection

@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
