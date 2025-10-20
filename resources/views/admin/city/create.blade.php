@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Tạo mới</h1>
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
                    <div class="card-body offset-1 col-lg-10">
                        <div class="basic-form">
                            <form role="form" method="POST" action="{{ route('store-city') }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Tên Tỉnh/Thành phố</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" maxlength="255">
                                    @if ($errors->has('name'))
                                        <span style="color:red;">{{ $errors->first('name') }}</span>
                                    </span>
                                    @endif
                                </div>
                                
                                <a type="button" href="{{ route('list-news') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
                                <button type="submit" class="btn btn-primary"><i class="ti-save icon-white"></i>&nbsp;&nbsp;Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# column -->
        </div>
    </section>
</div>
@endsection
