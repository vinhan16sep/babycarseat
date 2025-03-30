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
        height: 24px;
        border-radius: 50%;
        border: 2px solid #ccc;
        flex-shrink: 0;
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
                    <h1>Chỉnh sửa sản phẩm</h1>
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
                            <form role="form" method="POST" action="{{ route('update-product', $object->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Tên sản phẩm <span class="my-required">*</span></label>
                                    <input type="text" name="name" value="{{ old('name', $object->name) }}" class="form-control" maxlength="255">
                                </div>

                                <div class="form-group">
                                    <label>Slug <span class="my-required">*</span></label>
                                    <input type="text" name="slug" value="{{ old('slug', $object->slug) }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Chọn màu sắc và tải ảnh đại diện <span class="my-required">*</span></label>
                                    <div id="color-container">
                                        @foreach ($object->productColors as $index => $productColor)
                                        <div class="color-item">
                                            <div class="color-preview" id="color-preview-{{ $index }}" style="background-color: {{ $productColor->color->code }};"></div>
                                            <select class="form-control color-select" name="colors[{{ $index }}]" onchange="updateColorPreview(this, {{ $index }})">
                                                @foreach ($colors as $color)
                                                <option value="{{ $color->id }}" data-color="{{ $color->code }}" {{ $color->id == $productColor->color_id ? 'selected' : '' }}>
                                                    {{ $color->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <input type="file" class="form-control" name="images[{{ $index }}]" accept="image/*">
                                            <button type="button" class="btn btn-danger" onclick="removeColor(this)">Xóa</button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-primary mt-2" onclick="addColor()">Thêm màu</button>
                                </div>

                                <div class="form-group">
                                    <label>Chọn danh mục <span class="my-required">*</span></label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($productCategories as $item)
                                        <option value="{{$item->id}}" {{ $object->category_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Chọn thương hiệu <span class="my-required">*</span></label>
                                    <select class="form-control" name="brand_id">
                                        @foreach ($brands as $item)
                                        <option value="{{$item->id}}" {{ $object->brand_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Đơn giá <span class="my-required">*</span></label>
                                    <input type="text" name="price" value="{{ old('price', $object->price) }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control">{{ old('description', $object->description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content" class="form-label">Nội dung</label>
                                    <textarea name="content" class="form-control" id="txtareaContent">{{ old('content', $object->content) }}</textarea>
                                </div>

                                <input type="hidden" name="is_highlight" value="0">
                                <div class="form-group">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" name="is_highlight" class="css-control-input" value="1" {{ $object->is_highlight ? 'checked' : '' }}>
                                        <span class="css-control-indicator"></span> Sản phẩm nổi bật?
                                    </label>
                                </div>

                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" name="is_active" class="css-control-input" value="1" {{ $object->is_active ? 'checked' : '' }}>
                                        <span class="css-control-indicator"></span> Kích hoạt?
                                    </label>
                                </div>

                                <a href="{{ route('list-product') }}" class="btn btn-default">Quay lại</a>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('admin/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    let url = window.location.origin;

    tinymce.init({
        selector: 'textarea#txtareaContent',
        height: 500,
        plugins: [
            'image',
            'table'
        ],

        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/bw-admin/upload/post-tinymce-image');
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

    $('#inputName').change(function() {
        let slug = to_slug($('#inputName').val());
        $('#inputSlug').val(slug);
    });
    $('#inputName').focusout(function() {
        let slug = to_slug($('#inputName').val());
        $('#inputSlug').val(slug);
    });

    function updateColorPreview(select, index) {
        const colorCode = select.options[select.selectedIndex].getAttribute('data-color');
        document.getElementById(`color-preview-${index}`).style.backgroundColor = colorCode;
    }

    function removeColor(button) {
        button.closest('.color-item').remove();
    }
</script>
@endsection