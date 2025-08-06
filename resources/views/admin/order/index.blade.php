@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Danh sách đơn hàng</span></h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.layouts.flash-message')
                <div class="card">
                    <div class="card-title">
                        Tìm kiếm
                    </div>
                    <div class="card-body">
                        <form action="{{ route('list-order') }}" class="my-search-form">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tên khách hàng</label>
                                        <input type="text" name="customer_name" value="{{ isset($req['customer_name']) && $req['customer_name'] != '' ? $req['customer_name'] : '' }}" class="form-control input-default">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Mã đơn hàng</label>
                                        <input type="text" name="code" value="{{ isset($req['code']) && $req['code'] != '' ? $req['code'] : '' }}" class="form-control input-default">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Tình trạng đơn hàng</label>
                                        <select class="form-control" name="status">
                                            <option value="all" {{ isset($req['status']) && $req['status'] === '' ? 'selected' : '' }}>Tất cả</option>
                                            <option value="4" {{ isset($req['status']) && $req['status'] === '4' ? 'selected' : '' }}>Đã hoàn thành</option>
                                            <option value="0" {{ isset($req['status']) && $req['status'] === '0' ? 'selected' : '' }}>Đã đặt / chờ xử lý</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Thời gian đặt hàng</label>
                                        <div class="row">
                                            <div class="form-group col-md-6" style="padding-left:10px;">
                                                <input type="text" name="date_from" value="{{ isset($req['date_from']) && $req['date_from'] != '' ? $req['date_from'] : '' }}" class="form-control" id="dtFrom">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="date_to" value="{{ isset($req['date_to']) && $req['date_to'] != '' ? $req['date_to'] : '' }}" class="form-control" id="dtTo">
                                            </div>                                       
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary"><i class="ti-search icon-white"></i>&nbsp;&nbsp;OK</button>
                                        <a type="button" href="{{ route('list-order') }}" class="btn btn-default"></i>&nbsp;&nbsp;RESET</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-title">
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="w-5">STT</th>
                                        <th class="w-15">Khách hàng</th>
                                        <th class="w-10">Thời gian đặt hàng</th>
                                        <th class="w-15">Phương thức thanh toán</th>
                                        <th class="w-15">Giá (VNĐ)</th>
                                        <th class="w-10">Mã đơn hàng</th>
                                        <th class="w-10">Trạng thái</th>
                                        <th class="w-10">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $item)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td><a href="javascript:void(0);" onclick="showCustomer('{{ json_encode($item->order_customer) }}')">{{ $item->order_customer->name }}</a></td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $paymentMethods[$item->payment_method] }}</td>
                                            <td>
                                                {{ number_format($item->total_price - $item->discounted_price) }}
                                                @if ($item->discount_percent != '0')
                                                    <span style="color:red;"> (Giảm {{ $item->discount_percent }}%)</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->code }}</td>
                                            <td>
                                                <span class="badge {{ $item->status == '4' ? 'badge-success' : 'badge-warning'}} unset-text-transform">
                                                    {{ $item->status == '4' ? 'Đã hoàn thành' : 'Đã đặt / chờ xử lý'}}
                                                </span>
                                            </td>
                                            <td class="color-primary">
                                                @if ($item->status == '0')
                                                <button type="button" class="btn btn-success btn-flat m-l-5 my-list-btn" onclick="changeStatus('{{ $item->id }}', '4', '/order/change-status')">
                                                    <i class="ti-check"></i>
                                                </button>
                                                @endif
                                                <a type="button" href="{{ route('detail-order', ['id' => $item->id]) }}" class="btn btn-primary btn-flat my-list-btn"><i class="ti-eye icon-white"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                        {{ $list->links() }}
            </div>
        </div>
        <!-- /# row -->
    </section>
</div>

<!-- Modal Show customer info -->
<div class="modal fade" id="show-customer">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong><span>Thông tin khách hàng</span></strong>
                </h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody id="showCustomerInfo">

                        <tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('admin/js/lib/jquery.min.js') }}"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        $('#dtFrom').datepicker();
        $('#dtTo').datepicker();
    });

    function showCustomer(inCustomer) {
        let customer = JSON.parse(inCustomer);
        console.log(customer);

        let html = '';
        html += '<form>';
        html += '<div class="form-group">';
        html += '<label>Tên khách hàng: </label>';
        html += '<input type="text" name="name" value="' + customer.name + '" class="form-control" disabled>';
        html += '</div>';
        html += '<div class="form-group">';
        html += '<label>Số điện thoại: </label>';
        html += '<input type="text" name="name" value="' + customer.phone + '" class="form-control" disabled>';
        html += '</div>';
        html += '<div class="form-group">';
        html += '<label>Email: </label>';
        html += '<input type="text" name="name" value="' + customer.email + '" class="form-control" disabled>';
        html += '</div>';
        html += '<div class="form-group">';
        html += '<label>Địa chỉ: </label>';
        html += '<input type="text" name="name" value="' + customer.address + '" class="form-control" disabled>';
        html += '</div>';
        html += '</form>';
        
        $('#showCustomerInfo').html(html);
        $('#show-customer').modal('show');
    }
</script>