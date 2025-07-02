@extends('admin.layouts.app')

@section('content')
<style>
    .color-item {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 10px;
    }

    .color-preview {
        width: 24px;
        /* Chiều rộng */
        height: 24px;
        /* Chiều cao */
        border-radius: 50%;
        /* Bo tròn thành hình tròn */
        border: 2px solid #ccc;
        /* Viền để dễ nhìn */
        flex-shrink: 0;
        /* Không cho co lại khi nằm trong flex */
    }

    .color-select {
        width: 250px;
    }
</style>

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
                            <form role="form" method="POST" action="{{ route('store-product-feature') }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')


                                <div class="form-group">
                                    <label>Tên sản phẩm: <span class="my-required">{{ $product->name }}</span></label>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                </div>
                                @if ($isCreate == 1)
                                <div class="form-group{{ $errors->has('feature_id') ? ' has-error' : '' }}">
                                    <label>Chọn tính năng <span class="my-required">*</span></label>
                                    <select class="form-control w-30" name="feature_id" value="{{ old('feature_id') }}" id="selectFeature">
                                        <option></option>
                                        @foreach ($feature as $item)
                                        <option value="{{$item->id}}" {{ old('feature_id') == $item->id ? 'selected' : '' }}>{{$item->title}} - {{$item->label}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('feature_id'))
                                    <span style="color:red;">{{ $errors->first('feature_id') }}</span>
                                    @endif
                                </div>
                                @else
                                <label>Tính năng: {{ $featureTitle }}</label>
                                <input type="hidden" name="feature_id" value="{{ $featureId }}">
                                @endif
                                <div class="form-group">
                                    <label>Tiêu đề phụ</label>
                                    <input type="text" name="sub_title" value="{{ old('sub_title') }}" class="form-control" id="inputSubTitle" readonly>
                                    @if ($errors->has('sub_title'))
                                    <span style="color:red;">{{ $errors->first('sub_title') }}</span>
                                    @endif
                                </div>
                                
                                <div class="row">
                                    <!-- <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
                                            <label>Ảnh sản phẩm <span class="my-required">*</span></label>
                                            <input type="file" name="images[]" class="form-control input-default" id="images" multiple>
                                            @if ($errors->has('images'))
                                                <span style="color:red;">{{ $errors->first('images') }}</span>
                                            @endif
                                        </div>
                                    </div> -->
                                </div>

                                <a type="button" href="{{ route('list-product-feature', ['id' => $product->id]) }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
<script type="text/javascript">
    let url = window.location.origin;

    $('#selectFeature').change(function (){
        let selectedValue = $(this).val();
        $.ajax({
            url: url + '/br-admin/banner/get-feature-by-id',
            method: 'GET',
            data: {
                id: selectedValue
            },
            success: function (res) {
                if (res.status == 'success') {
                    $('#inputSubTitle').val(res.data.sub_title);
                } else {
                    $('#inputSubTitle').val('');
                }
            },
            error: function (error) { 
                alert(error.responseJSON.msg);
            }
        });
    });
</script>
@endsection