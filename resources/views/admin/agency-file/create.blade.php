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
                            <form role="form" method="POST" action="{{ route('store-agency-file') }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                            <label>File</label>
                                            <input type="file" name="file" class="form-control input-default" id="file" accept=".pdf">
                                            @if ($errors->has('file'))
                                                <span style="color:red;">{{ $errors->first('file') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('agency_id') ? ' has-error' : '' }}">
                                    <label>Chọn đại lý <span class="my-required">*</span></label>
                                    <select class="form-control" name="agency_id">
                                        <option value="">Chọn sản phẩm</option>
                                        @foreach ($agencies as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('agency_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('agency_id'))
                                        <span style="color:red;">{{ $errors->first('agency_id') }}</span>
                                    @endif
                                </div>

                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_active" class="css-control-input" value="1" checked
                                            @if(old('is_active') == 1)
                                                checked
                                            @endif
                                        >
                                        <span class="css-control-indicator"></span> Kích hoạt?
                                    </label>
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
