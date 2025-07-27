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
                            <form role="form" method="POST" action="{{ route('store-post') }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')

                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <label>Danh mục</label>
                                    <select name="category_id" class="form-control">
                                    <option value="0">-- Không có danh mục --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->display_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span style="color:red;">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label>Tiêu đề</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="inputTitle" maxlength="255">
                                    @if ($errors->has('title'))
                                        <span style="color:red;">{{ $errors->first('title') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" id="inputSlug" readonly>
                                    @if ($errors->has('slug'))
                                        <span style="color:red;">{{ $errors->first('slug') }}</span>
                                    </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                    <label>Vị trí</label>
                                    <input type="text" name="position" value="{{ old('position') }}" class="form-control" maxlength="255">
                                    @if ($errors->has('position'))
                                        <span style="color:red;">{{ $errors->first('position') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control my-textarea" rows="5">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content" class="form-label">Nội dung</label>
                                    <textarea name="content" class="form-control" id="txtareaContent">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                        <span style="color:red;">{{ $errors->first('content') }}</span>
                                    @endif
                                </div>

                                <div class="form-group d-flex align-items-center">
                                    <label style="margin-right: 10px;" class="css-control css-control-primary css-checkbox me-4 mb-0">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" name="is_active" class="css-control-input" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                                        <span class="css-control-indicator"></span> Kích hoạt?
                                    </label>

                                    <label class="css-control css-control-primary css-checkbox mb-0">
                                        <input type="hidden" name="menu_active" value="0">
                                        <input type="checkbox" name="menu_active" class="css-control-input" value="1" {{ old('menu_active', 0) ? 'checked' : '' }}>
                                        <span class="css-control-indicator"></span> Bài viết hiển thị trên menu?
                                    </label>
                                </div>

                                
                                <a type="button" href="{{ route('list-post') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

<script type="text/javascript">

    let url = window.location.origin;

    tinymce.init({
        selector: 'textarea#txtareaContent',
        height: 500,
        plugins: [
            'image',
            'table'
        ],

        image_title : true,
        automatic_uploads: true,
        // images_upload_url : '/br-admin/upload/post-tinymce-image',
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
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
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help'
    });

    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#preview-image-before-upload').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });

    $('#inputTitle').change(function (){
        let slug = to_slug($('#inputTitle').val());
        $('#inputSlug').val(slug);
    });
    $('#inputTitle').focusout(function (){
        let slug = to_slug($('#inputTitle').val());
        $('#inputSlug').val(slug);
    });
</script>
@endsection
