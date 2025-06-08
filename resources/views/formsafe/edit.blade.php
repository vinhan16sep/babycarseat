@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Chỉnh sửa FormSafe</h1>
                </div>
            </div>
        </div>
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.layouts.flash-message')
                <div class="card">
                    <div class="card-body offset-1 col-lg-10">
                        <div class="basic-form">
                            <form role="form" method="POST" action="{{ route('formsafe.update', $form->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" name="name" value="{{ old('name', $form->name) }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Điện thoại</label>
                                    <input type="text" name="phone" value="{{ old('phone', $form->phone) }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email', $form->email) }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" value="{{ old('address', $form->address) }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea name="content" class="form-control">{{ old('content', $form->content) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mã sản phẩm</label>
                                    <input type="text" name="product_code" value="{{ old('product_code', $form->product_code) }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ngày</label>
                                    <input type="date" name="by_date" value="{{ old('by_date', $form->by_date) }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh báo cáo</label>
                                    <input type="text" name="report_images" value="{{ old('report_images', $form->report_images) }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh môi trường</label>
                                    <input type="text" name="env_images" value="{{ old('env_images', $form->env_images) }}" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('formsafe.index') }}" class="btn btn-default">Quay lại</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
