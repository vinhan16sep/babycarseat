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
                            <form role="form" method="POST" action="{{ route('store-product') }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')

                                <div class="row">
                                    <x-seo-form :seo="$seo" />
                                </div>
                                <br>

                                <!-- Ảnh sản phẩm -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label>Ảnh sản phẩm <span class="my-required">*</span></label>
                                            <input type="file" name="image" class="form-control input-default" id="image">
                                            @if ($errors->has('image'))
                                            <span style="color:red;">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-preview">
                                        <img id="preview-image-before-upload" src="{{ asset('images/no-image-available.png') }}"
                                            alt="preview image" style="max-height: 250px;">
                                    </div>
                                </div>

                                <!-- Tên sản phẩm -->
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Tên sản phẩm <span class="my-required">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputName" maxlength="255">
                                    @if ($errors->has('name'))
                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <!-- Slug -->
                                <div class="form-group">
                                    <label>Slug <span class="my-required">*</span></label>
                                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" id="inputSlug" readonly>
                                    @if ($errors->has('slug'))
                                    <span style="color:red;">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>

                                <!-- Ghi chú -->
                                <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                                    <label>Ghi chú </label>
                                    <input type="text" name="note" value="{{ old('note') }}" class="form-control" maxlength="255">
                                    @if ($errors->has('note'))
                                    <span style="color:red;">{{ $errors->first('note') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <label>Chọn danh mục <span class="my-required">*</span></label>
                                    <select class="form-control select2" name="category_id[]" multiple>
                                        @foreach ($productCategories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ collect(old('category_id'))->contains($item->id) ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span style="color:red;">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                                    <label>Chọn thương hiệu <span class="my-required">*</span></label>
                                    <select class="form-control w-30" name="brand_id" value="{{ old('brand_id') }}" id="selectCountry">
                                        <option></option>
                                        @foreach ($brands as $item)
                                        <option value="{{$item->id}}" {{ old('brand_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('brand_id'))
                                    <span style="color:red;">{{ $errors->first('brand_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label>Đơn giá <span class="my-required">*</span></label>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control" maxlength="255">
                                    @if ($errors->has('price'))
                                    <span style="color:red;">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('discount_value') ? ' has-error' : '' }}">
                                    <label>Giá khuyến mãi</label>
                                    <input type="text" name="discount_value" value="{{ old('discount_value') }}" class="form-control" maxlength="255">
                                    @if ($errors->has('discount_value'))
                                        <span style="color:red;">{{ $errors->first('discount_value') }}</span>
                                    @endif
                                </div>

                                <!-- Mô tả -->
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control my-textarea" rows="5">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="specification" class="form-label">Tính năng</label>
                                    <textarea name="specification" class="form-control my-textarea" rows="5">{{ old('specification') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="detail" class="form-label">Thông số</label>
                                    <textarea name="detail" class="form-control my-textarea" rows="5">{{ old('detail') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="guide" class="form-label">Hướng dẫn sử dụng</label>
                                    <textarea name="guide" class="form-control my-textarea" rows="5">{{ old('guide') }}</textarea>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="content" class="form-label">Nội dung</label>
                                    <textarea name="content" class="form-control my-textarea" id="txtareaContent">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                    <span style="color:red;">{{ $errors->first('content') }}</span>
                                    @endif
                                </div> -->

                                <!-- Sản phẩm nổi bật -->
                                <input type="hidden" name="is_highlight" value="0">
                                <div class="form-group{{ $errors->has('is_highlight') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_highlight" class="css-control-input" value="1"
                                            @if(old('is_highlight')==1)
                                            checked
                                            @endif>
                                        <span class="css-control-indicator"></span> Sản phẩm nổi bật?
                                    </label>
                                </div>

                                <!-- Kích hoạt -->
                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_active" class="css-control-input" value="1" checked
                                            @if(old('is_active')==1)
                                            checked
                                            @endif>
                                        <span class="css-control-indicator"></span> Kích hoạt?
                                    </label>
                                </div>

                                <a type="button" href="{{ route('list-product') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
<script src="{{ asset('admin/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    let url = window.location.origin;

    tinymce.init({
        selector: 'textarea.my-textarea',
        height: 300,
        plugins: [
            'image',
            'table',
            'link'
        ],

        image_title: true,
        automatic_uploads: true,
        // images_upload_url : '/br-admin/upload/post-tinymce-image',
        file_picker_types: 'image',
        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/br-admin/upload/post-tinymce-image');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullpage | ' +
            'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {
                title: 'My Favorites',
                items: 'code visualaid | searchreplace | spellchecker | emoticons'
            }
        },
        menubar: 'favs file edit view insert format tools table help'
    });

    $('#image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#inputName').change(function() {
        let slug = to_slug($('#inputName').val());
        $('#inputSlug').val(slug);

        let routeTemplate = "{{ route('product-index', ['slug' => ':slug']) }}";
        let finalUrl = routeTemplate.replace(':slug', slug);
        $('#canonical_url').val(finalUrl);
    });
    $('#inputName').focusout(function() {
        let slug = to_slug($('#inputName').val());
        $('#inputSlug').val(slug);
        
        let routeTemplate = "{{ route('product-index', ['slug' => ':slug']) }}";
        let finalUrl = routeTemplate.replace(':slug', slug);
        $('#canonical_url').val(finalUrl);
    });

    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Chọn danh mục',
            allowClear: true
        });
    });
</script>
@endsection