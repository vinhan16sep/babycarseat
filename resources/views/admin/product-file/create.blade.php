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
                            <form role="form" method="POST" action="{{ route('store-product-file') }}" enctype="multipart/form-data">
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

                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label>Chọn loại file <span class="my-required">*</span></label>
                                    <select class="form-control w-30" name="type" value="{{ old('type') }}" id="selectType">
                                        <option></option>
                                        @php
                                            $types = config('constants.PRODUCT_FILE_TYPE');
                                        @endphp
                                        @foreach ($types as $key => $item)
                                            <option value="{{$key}}" {{ old('type') == $key ? 'selected' : '' }}>{{$item}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type'))
                                        <span style="color:red;">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
                                    <label>Chọn sản phẩm <span class="my-required">*</span></label>
                                    <select class="form-control" name="product_id">
                                        <option value="">Chọn sản phẩm</option>
                                        @foreach ($products as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('product_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('product_id'))
                                        <span style="color:red;">{{ $errors->first('product_id') }}</span>
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
<script src="{{ asset('admin/tinymce/tinymce.min.js') }}"></script>
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

<script type="text/javascript">

    let url = window.location.origin;

    tinymce.init({
        selector: 'textarea#txtareaContent, textarea#txtareaSortContent',
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

    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Chọn danh mục',
            allowClear: true
        });
    });
</script>
@endsection
