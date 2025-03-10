@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.layouts.flash-message')
                
                <div class="card">
                    <div class="card-title">
                        Thông tin đơn hàng
                    </div>
                    <div class="card-title">
                        <span class="badge {{ $object->status == '4' ? 'badge-success' : 'badge-warning'}} unset-text-transform">
                            {{ $object->status == '4' ? 'Đã hoàn thành' : 'Đã đặt / chờ xử lý'}}
                        </span>
                    </div>
                    <hr>
                    <div class="unix-invoice">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="invoice" class="effect2">
                                        <div id="invoice-top">
                                            <!--End Info-->
                                            <div class="title">
                                                <h4>Mã đơn hàng #{{ $object->code }}</h4>
                                                <p>Thời gian đặt hàng: {{ $object->created_at }}<br> Cập nhật lúc: {{ $object->updated_at }}
                                                </p>
                                            </div>
                                            <!--End Title-->
                                        </div>
                                        <!--End InvoiceTop-->

                                        <div id="invoice-mid">

                                            <div class="clientlogo"></div>
                                            <div class="invoice-info">
                                                <h2>{{ $object->order_customer->name }}</h2>
                                                <p style="font-size:14px;">{{ $object->order_customer->email }}<br> {{ $object->order_customer->phone }}<br> {{ $object->order_customer->address }}
                                                    
                                            </div>

                                            <div id="project">
                                                <h3>Ghi chú</h3>
                                                <p>{{ $object->note }}</p>
                                            </div>

                                        </div>
                                        <!--End Invoice Mid-->

                                        <div id="invoice-bot">

                                            <div id="invoice-table">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr class="tabletitle">
                                                            <td class="Hours">
                                                                <h2>Ảnh</h2>
                                                            </td>
                                                            <td class="table-item">
                                                                <h2>Sản phẩm</h2>
                                                            </td>
                                                            <td class="Hours">
                                                                <h2>Loại</h2>
                                                            </td>
                                                            <td class="Rate">
                                                                <h2>Số lượng</h2>
                                                            </td>
                                                            <td class="subtotal">
                                                                <h2>Giá (VNĐ)</h2>
                                                            </td>
                                                        </tr>

                                                        @if ($object->order_items->count())
                                                            @foreach ($object->order_items as $row)
                                                            @php 
                                                                $item = $row->product != null ? $row->product : $row->combo;
                                                                $itemDetalUrl = $row->product != null ? route('edit-product', ['id' => $item->id]) : route('edit-combo', ['id' => $item->id]);
                                                            @endphp

                                                            <tr class="service">
                                                                <td class="tableitem">
                                                                    <img style="max-height: 200px;" src="{{ $item->image ? asset($item->image) : asset('images/no-image-available-list.jpg') }}" />
                                                                </td>
                                                                <td class="tableitem">
                                                                    <p class="itemtext"><a target="_blank" href="{{ $itemDetalUrl }}">{{ $item->name }}</a></p>
                                                                </td>
                                                                <td class="tableitem">
                                                                    <p class="itemtext">{{ $row->product != null ? 'Rượu vang' : 'Combo' }}</p>
                                                                </td>
                                                                <td class="tableitem">
                                                                    <p class="itemtext">{{ $row->quantity }}</p>
                                                                </td>
                                                                <td class="tableitem">
                                                                    <p class="itemtext">{{ number_format($row->price) }}</p>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        @endif


                                                        <tr class="tabletitle">
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="Rate">
                                                                <h2>Tổng giá</h2>
                                                            </td>
                                                            <td class="payment">
                                                                <h2>{{ number_format($object->total_price) }} VNĐ</h2>
                                                            </td>
                                                        </tr>
                                                        @if ($object->discount_percent != 0)
                                                        <tr class="tabletitle">
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="Rate">
                                                                <h2>Giá sau chiết khấu {{ $object->discount_percent }}%</h2>
                                                            </td>
                                                            <td class="payment">
                                                                <h2>{{ number_format($object->total_price - $object->discounted_price) }} VNĐ</h2>
                                                            </td>
                                                        </tr>
                                                        @endif

                                                    </table>
                                                </div>
                                            </div>
                                            <!--End Table-->
                                            <a type="button" href="{{ url(URL::previous()) }}" class="btn btn-default btn-outline" style="margin-top:20px;"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
                                        </div>
                                        <!--End InvoiceBot-->
                                    </div>
                                    <!--End Invoice-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# column -->
        </div>
    </section>
</div>
<script src="{{ asset('admin/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
</script>
@endsection
