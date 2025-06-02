@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Chi tiết </h1>
                </div>
            </div>
        </div>
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body offset-1 col-lg-10">
                        <div class="basic-form">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Họ và tên *</label>
                                        <input type="text" class="form-control" value="{{ $form->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Số điện thoại *</label>
                                        <input type="text" class="form-control" value="{{ $form->phone }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Email *</label>
                                        <input type="email" class="form-control" value="{{ $form->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Địa chỉ nhận hàng *</label>
                                        <input type="text" class="form-control" value="{{ $form->address }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Mã số hóa đơn hoặc mã bảo hành *</label>
                                        <input type="text" class="form-control" value="{{ $form->product_code }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Ngày mua ghế ô tô Babyro *</label>
                                        <input type="date" class="form-control" value="{{ $form->by_date }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Biên bản tai nạn giao thông (đính kèm bản sao)*</label><br>
                                @php use Illuminate\Support\Facades\Storage; @endphp
                                @if($form->report_images)
                                    <img src="{{ asset($form->report_images) }}" alt="Ảnh báo cáo" style="max-width: 300px; max-height: 200px; display:block; margin-bottom:10px;">
                                    <a href="{{ asset($form->report_images) }}" target="_blank">Xem ảnh gốc</a>
                                @else
                                    <span>Không có ảnh</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Hình ảnh hiện trường tai nạn và tình trạng ghế ô tô (đính kèm)</label><br>
                                @if($form->env_images)
                                    <img src="{{ asset($form->env_images) }}" alt="Ảnh môi trường" style="max-width: 300px; max-height: 200px; display:block; margin-bottom:10px;">
                                    <a href="{{ asset($form->env_images) }}" target="_blank">Xem ảnh gốc</a>
                                @else
                                    <span>Không có ảnh</span>
                                @endif
                            </div>
                            <a href="{{ route('list-formsafe') }}" class="btn btn-default">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
