@extends('layouts.app')

@section('meta_title', "Chi tiết đơn hàng")
@section('meta_keyword', "Chi tiết đơn hàng")
@section('meta_description', "Chi tiết đơn hàng")

@section('css')
    <link rel="stylesheet" href="{{ asset('css/page.css?v=' . ($ver ?? '')) }}" />
@stop

@section('content')
    <div class="bz_inner_page_navigation float_left">
        <div class="container custom_container">
            <div class="inner_menu float_left">
                <ul>
                    <li><a href="{{ route("home") }}"> <span><i class="fas fa-home"></i></span> </a></li>
                    <li class="active"><a> <span><i class="fas fa-angle-right"></i></span> Chi tiết đơn hàng </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bz_product_grid_content_main_wrapper float_left">
        <div class="container custom_container">
        <div class="row">
            @if ($order)
                <div class="col-lg-7 col-md-12 col-12" id="order-cart-left">
                    <div class="your_order h-100">
                        <h3>Chi tiết đơn hàng</h3>
                        <div class="order_details">
                            @php
                                $orderItems = $order->order_items;
                            @endphp
                            @foreach ($orderItems as $key => $item)
                                @php
                                    $product = !empty($item->product) ? $item->product : $item->combo;
                                    $products = !empty($product->products) ? $product->products : [];
                                @endphp
                                <p class="text-black">
                                    <span class="pr-5px">{{ $product->name }} × {{ $item->quantity }}</span>
                                    <span class="bold">{{ numberFormat($item->price*$item->quantity) }}₫</span>
                                </p>
                                @foreach ($products as $subItem)
                                    @php
                                        $price = $subItem->price;
                                        if($subItem->is_discount) {
                                            $price = $subItem->discount_value;
                                        }
                                    @endphp
                                    <p class="text-black">
                                        <span class="pr-5px">{{ $subItem->name }} × {{ $item->quantity*$subItem->pivot->quantity }}</span>
                                        <span class="bold opacity-04">{{ numberFormat($price*$item->quantity*$subItem->pivot->quantity) }}₫</span>
                                    </p>
                                @endforeach
                            @endforeach

                            <p class="sub_total">
                                <span>Tạm tính</span>
                                <span>{{ numberFormat($order->total_price) }}₫</span>
                            </p>
                            @if (!empty($order->discounted_price))
                                <p class="discounted">
                                    <span>Giảm giá</span>
                                    <span>{{ numberFormat($order->discounted_price) }}₫</span>
                                </p>
                            @endif
                        </div>
                        <div class="order_rate">
                            <h3 class="bt-0 pb-0">
                                <span class="pr-5px fs-16">Tổng tiền</span>
                                <span>{{ numberFormat($order->total_price-$order->discounted_price) }}₫</span>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-12">
                    <div class="your_order h-100">
                        <h3 class="thanks">Cảm ơn bạn "{{ $order->order_customer->name }}". Đơn hàng của bạn đã được nhận.</h3>
                        <div class="order_details order-received">
                            <ul>
                                <li>Mã đơn hàng: <span class="bold">{{ $order->code }}</span></li>
                                <li>Ngày: <span class="bold">{{ date("d/m/Y", strtotime($order->created_at)) }}</span></li>
                                <li>Email: <span class="bold email">{{ $order->order_customer->email }}</span></li>
                                <li>Địa chỉ: <span class="bold">{{ $order->order_customer->address }}</span></li>
                                <li>Phương thức thanh toán: <span class="bold">{{ \App\Models\Order::TYPE_PAYMENT[$order->payment_method] ?? "Không xác định" }}</span></li>
                                @if (!empty($order->note))
                                    <li>
                                        Lưu ý: <span class="bold">{{ $order->note }}</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div class="bz_product_grid_content_main_wrapper search-order">
                    <div class="cart_tbl">
                        <div class="bz_cart_main_wrapper">
                            <div class="d-inline-flex mw-290">
                                <div class="cart_coupan">
                                    <div class="d-inline-flex">
                                        <form {{ route("order-received") }}>
                                            <input type="text" name="code" placeholder="Nhập mã đơn hàng" value="{{ request()->code }}"">
                                            <button>Xem</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        </div>
    </div>

@endsection
