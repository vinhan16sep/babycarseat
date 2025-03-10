@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Cập nhật</h1>
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
                            <form role="form" method="POST" action="{{ route('update-accessory', ['id' => $object->id, 'callback' => $callback]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

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
                                    <input type="text" name="name" value="{{ old('name', $object->name) }}" class="form-control" id="inputName" maxlength="255">
                                    @if ($errors->has('name'))
                                        <span style="color:red;">{{ $errors->first('name') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <!-- Slug -->
                                <div class="form-group">
                                    <label>Slug <span class="my-required">*</span></label>
                                    <input type="text" name="slug" value="{{ old('slug', $object->slug) }}" class="form-control" id="inputSlug" readonly="">
                                    @if ($errors->has('slug'))
                                        <span style="color:red;">{{ $errors->first('slug') }}</span>
                                    </span>
                                    @endif
                                </div>
                                
                                <!-- Danh mục -->
                                <div class="form-group{{ $errors->has('accessory_category_id') ? ' has-error' : '' }}">
                                    <label>Chọn loại rượu vang <span class="my-required">*</span></label>
                                    <select class="form-control" name="accessory_category_id" value="{{ old('accessory_category_id', $object->accessory_category_id) }}" id="selectType">
                                        <option></option>
                                        @foreach ($activedCategories as $item)
                                            <option value="{{$item->id}}" {{ old('accessory_category_id', $object->accessory_category_id) == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('accessory_category_id'))
                                        <span style="color:red;">{{ $errors->first('accessory_category_id') }}</span>
                                    @endif
                                </div>

                                <!-- Đơn giá -->
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label>Đơn giá <span class="my-required">*</span></label>
                                    <input type="text" name="price" value="{{ old('price', $object->price) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('price'))
                                        <span style="color:red;">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>

                                <!-- Mô tả -->
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control my-textarea" rows="5">{{ old('description', $object->description) }}</textarea>
                                </div>

                                <!-- Nội dung -->
                                <div class="form-group">
                                    <label for="content" class="form-label">Nội dung</label>
                                    <textarea name="content" class="form-control" id="txtareaContent">{{ old('content', $object->content) }}</textarea>
                                </div>

                                <!-- Sản phẩm mới -->
                                <input type="hidden" name="is_new" value="0">
                                <div class="form-group{{ $errors->has('is_new') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_new" class="css-control-input" value="1"
                                            @if(old('is_new', $object->is_new) == 1)
                                                checked
                                            @endif
                                        >
                                        <span class="css-control-indicator"></span> Sản phẩm mới?
                                    </label>
                                </div>

                                <!-- Sản phẩm nổi bật -->
                                <input type="hidden" name="is_highlight" value="0">
                                <div class="form-group{{ $errors->has('is_highlight') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_highlight" class="css-control-input" value="1"
                                            @if(old('is_highlight', $object->is_highlight) == 1)
                                                checked
                                            @endif
                                        >
                                        <span class="css-control-indicator"></span> Sản phẩm nổi bật?
                                    </label>
                                </div>

                                <!-- Kích hoạt -->
                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_active" class="css-control-input" value="1"
                                            @if(old('is_active', $object->is_active) == 1)
                                                checked
                                            @endif
                                        >
                                        <span class="css-control-indicator"></span> Kích hoạt?
                                    </label>
                                </div>

                                <a type="button" href="{{ url(URL::previous()) }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
        selector: 'textarea#txtareaContent',
        height: 500,
        plugins: [
            'image',
            'table'
        ],

        image_title : true,
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
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
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help'
    });
    
    $('#preview-image-before-upload').attr('src', "{{ $object->image ? asset($object->image) : asset('images/no-image-available.png') }}"); 

    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#preview-image-before-upload').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });


    $('#selectRegion').attr('disabled', true);

    $('#inputName').change(function (){
        let slug = to_slug($('#inputName').val());
        $('#inputSlug').val(slug);
    });
    $('#inputName').focusout(function (){
        let slug = to_slug($('#inputName').val());
        $('#inputSlug').val(slug);
    });

    // Bind options into Region
    let initCountryId = $('#selectCountry').val();
    ajaxGetRegionByCountry(initCountryId);

    $('#selectCountry').change(function (){
        let countryId = $(this).val();
        ajaxGetRegionByCountry(countryId);
    });
    

    function ajaxGetRegionByCountry(countryId) {
        if (countryId != '') {
            $.ajax({
                url: url + '/bw-admin/region/get-by-country',
                method: 'GET',
                data: {
                    countryId: countryId
                },
                success: function (res) {
                    let data = res.data;
                    let old = "{{ old('region_id', $object->region_id) }}";
                    $('#selectRegion').attr('disabled', false);
                    $('#selectRegion').html('<option></option>');
                    $.each(data, function(key, value){
                        if (old == key) {
                            $('#selectRegion').append('<option value="' + key + '" selected>' + value + '</option>');
                        } else {
                            $('#selectRegion').append('<option value="' + key + '" >' + value + '</option>');
                        }
                    });
                },
                error: function (error) {}
            });
        } else {
            $('#selectRegion').attr('disabled', true);
            $('#selectRegion').html('<option></option>');
        }
    }
</script>
@endsection
