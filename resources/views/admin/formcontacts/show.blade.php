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
                            </div>
                            <div class="row g-2">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Lời Nhắn</label>
                                        <textarea  rows=5 class="form-control" disabled readonly>{{ $form->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('list-contacts') }}" class="btn btn-default">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
