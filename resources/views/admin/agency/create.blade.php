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
                            <form role="form" method="POST" action="{{ route('store-agency') }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                
                                <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                                    <label>Chọn tỉnh/thành phố <span class="my-required">*</span></label>
                                    <select class="form-control w-30" name="city_id" value="{{ old('city_id') }}">
                                        <option></option>
                                        @foreach ($cities as $item)
                                            <option value="{{$item->id}}" {{ old('city_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city_id'))
                                        <span style="color:red;">{{ $errors->first('city_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Tên <span class="my-required">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputName" maxlength="255">
                                    @if ($errors->has('name'))
                                        <span style="color:red;">{{ $errors->first('name') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label>Địa chỉ </label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" maxlength="255">
                                    @if ($errors->has('address'))
                                        <span style="color:red;">{{ $errors->first('address') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label>Số điện thoại </label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" maxlength="255">
                                    @if ($errors->has('phone'))
                                        <span style="color:red;">{{ $errors->first('phone') }}</span>
                                    </span>
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
                                
                                <a type="button" href="{{ route('list-agency') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
