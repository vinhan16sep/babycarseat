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

                                <div class="row">
                                    @include('components.seo-form', ['seo' => $seo])
                                </div>
                                <br>

                                <!-- Ảnh -->
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label>Ảnh <span class="my-required">*</span></label>
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

                                <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                                    <label>Chọn loại sản phẩm <span class="my-required">*</span></label>
                                    <select class="form-control w-30" name="type_id" value="{{ old('type_id', $object->type_id) }}" id="selectType">
                                        <option></option>
                                        @foreach ($activedTypes as $item)
                                            <option value="{{$item->id}}" {{ old('type_id', $object->type_id) == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type_id'))
                                        <span style="color:red;">{{ $errors->first('type_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Tên sản phẩm <span class="my-required">*</span></label>
                                    <input type="text" name="name" value="{{ old('name', $object->name) }}" class="form-control" maxlength="255" id="inputName">
                                    @if ($errors->has('name'))
                                        <span style="color:red;">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Slug <span class="my-required">*</span></label>
                                    <input type="text" name="slug" value="{{ old('slug', $object->slug) }}" class="form-control" id="inputSlug" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Ghi chú </label>
                                    <input type="text" name="note" value="{{ old('note', $object->note) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('note'))
                                        <span style="color:red;">{{ $errors->first('note') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label>Chọn danh mục <span class="my-required">*</span></label>
                                    <select class="form-control select2" name="category_id[]" multiple>
                                        @if ($productCategories->isEmpty())
                                            <option value="" disabled>Không có danh mục nào</option>
                                        @else
                                            @foreach ($productCategories as $item)
                                            <option value="{{ $item->id }}" {{ $object->categories->contains('id', $item->id) ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span style="color:red;">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Chọn thương hiệu <span class="my-required">*</span></label>
                                    <select class="form-control" name="brand_id">
                                        @foreach ($brands as $item)
                                        <option value="{{$item->id}}" {{ $object->brand_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('brand_id'))
                                        <span style="color:red;">{{ $errors->first('brand_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Đơn giá <span class="my-required">*</span></label>
                                    <input type="text" name="price" value="{{ old('price', $object->price) }}" class="form-control">
                                    @if ($errors->has('price'))
                                        <span style="color:red;">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('discount_value') ? ' has-error' : '' }}">
                                    <label>Giá khuyến mãi</label>
                                    <input type="text" name="discount_value" value="{{ old('discount_value', $object->discount_value) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('discount_value'))
                                        <span style="color:red;">{{ $errors->first('discount_value') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control my-textarea">{{ old('description', $object->description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="specification" class="form-label">Tính năng</label>
                                    <textarea name="specification" class="form-control my-textarea" id="txtareaSpecification">{{ old('specification', $object->specification) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="detail" class="form-label">Thông số</label>
                                    <textarea name="detail" class="form-control my-textarea" id="txtareaDetail">{{ old('detail', $object->detail) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="guide" class="form-label">Hướng dẫn sử dụng</label>
                                    <textarea name="guide" class="form-control my-textarea" id="txtareaGuide">{{ old('guide', $object->guide) }}</textarea>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="content" class="form-label">Nội dung</label>
                                    <textarea name="content" class="form-control my-textarea" id="txtareaContent">{{ old('content', $object->content) }}</textarea>
                                </div> -->

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
        selector: 'textarea.my-textarea',
        height: 300,
        plugins: [
            'image',
            'table',
            'link'
        ],

        image_title: true,
        automatic_uploads: true,
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
        toolbar: 'undo redo | fontselect | fontsizeselect | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help | codesample',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons | fontselect | fontsizeselect'}
        },
        menubar: 'favs file edit view insert format tools table help | fontselect | fontsizeselect'
    });
    
    $('#preview-image-before-upload').attr('src', "{{ $object->image ? asset($object->image) : asset('images/no-image-available.png') }}"); 

    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#preview-image-before-upload').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });

    let routeTemplate = "{{ route('product-index', ['slug' => ':slug']) }}";
    let finalUrl = routeTemplate.replace(':slug', $('#inputSlug').val());
    $('#canonical_url').val(finalUrl);

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