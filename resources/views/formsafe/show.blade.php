@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Chi tiết FormSafe</h1>
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
                            <div class="form-group">
                                <label><strong>Tên:</strong></label>
                                <div>{{ $form->name }}</div>
                            </div>
                            <div class="form-group">
                                <label><strong>Điện thoại:</strong></label>
                                <div>{{ $form->phone }}</div>
                            </div>
                            <div class="form-group">
                                <label><strong>Email:</strong></label>
                                <div>{{ $form->email }}</div>
                            </div>
                            <div class="form-group">
                                <label><strong>Địa chỉ:</strong></label>
                                <div>{{ $form->address }}</div>
                            </div>
                            <div class="form-group">
                                <label><strong>Nội dung:</strong></label>
                                <div>{{ $form->content }}</div>
                            </div>
                            <div class="form-group">
                                <label><strong>Mã sản phẩm:</strong></label>
                                <div>{{ $form->product_code }}</div>
                            </div>
                            <div class="form-group">
                                <label><strong>Ngày:</strong></label>
                                <div>{{ $form->by_date }}</div>
                            </div>
                            <div class="form-group">
                                <label><strong>Ảnh báo cáo:</strong></label>
                                <div>{{ $form->report_images }}</div>
                            </div>
                            <div class="form-group">
                                <label><strong>Ảnh môi trường:</strong></label>
                                <div>{{ $form->env_images }}</div>
                            </div>
                            <a href="{{ route('formsafe.index') }}" class="btn btn-default">Quay lại</a>
                            <a href="{{ route('formsafe.edit', $form->id) }}" class="btn btn-primary">Sửa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
