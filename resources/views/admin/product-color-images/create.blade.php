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
                            <form role="form" method="POST" action="{{ route('store-product-color-image') }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')


                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Tên sản phẩm: <span class="my-required">{{ $product->name }}</span></label>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($isCreate == 1)
                                <div class="form-group{{ $errors->has('color_id') ? ' has-error' : '' }}">
                                    <label>Chọn màu <span class="my-required">*</span></label>
                                    <select class="form-control w-30" name="color_id" value="{{ old('color_id') }}" id="selectColor">
                                        <option></option>
                                        @foreach ($colors as $item)
                                        <option value="{{$item->id}}" {{ old('color_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('color_id'))
                                    <span style="color:red;">{{ $errors->first('color_id') }}</span>
                                    @endif
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Màu sắc: {{ $colorName }}</label>
                                            <input type="hidden" name="color_id" value="{{ $colorId }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
                                            <label>Ảnh hiện tại:</label>
                                            <div>
                                            @if ($colorImage)
                                                @foreach ($colorImage as $key => $item)
                                                    @if ($item->image && is_array($item->image))
                                                        @foreach ($item->image as $img)
                                                            <img style="max-height: 80px;" src="{{ asset($img) }}" />
                                                        @endforeach
                                                    @else
                                                        <img style="max-height: 80px;" src="{{ asset('images/no-image-available-list.jpg') }}" />
                                                    @endif
                                                @endforeach
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
                                            <label>Chọn ảnh mới: <span class="my-required">*</span></label>
                                            <input type="file" name="images[]" class="form-control input-default" id="images" multiple>
                                            @if ($errors->has('images'))
                                                <span style="color:red;">{{ $errors->first('images') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <a type="button" href="{{ route('list-product-color-image', ['id' => $product->id]) }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
</script>
@endsection