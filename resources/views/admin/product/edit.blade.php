@extends('admin.layouts.app')

@section('content')
<style>
    .my-preview {
        position: relative;
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 10px;
        height: 280px !important;
    }
    .my-preview img {
        max-height: 250px; 
        max-width: -webkit-fill-available;
    }
    .close:before {
        content: '✕';
    }
    .close {
        position: absolute;
        top: 3px;
        right: 5px;
        cursor: pointer;
    }
</style>
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
                            <form role="form" method="POST" action="{{ route('update-product', ['id' => $object->id, 'callback' => $callback]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <!-- Ảnh sản phẩm -->
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label>Ảnh sản phẩm <span class="my-required">*</span></label>
                                            <input type="file" name="image[]" class="form-control input-default" id="image" multiple>
                                            @if ($errors->has('image'))
                                                <span style="color:red;">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @if (!empty($object->images))
                                        @foreach ($object->images as $image)
                                            <div class="col-md-2 my-preview" data-path="{{ $image }}">
                                                <img id="preview-image-before-upload" src="{{ asset($image) }}" alt="preview image">
                                                <!-- <span class="close"></span> -->
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-md-2 my-preview">
                                            <img id="preview-image-before-upload" src="{{ asset('images/no-image-available.png') }}"
                                                alt="preview image" style="max-height: 250px;">
                                        </div>
                                    @endif
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
                                
                                <!-- Loại rượu vang -->
                                <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                                    <label>Chọn loại rượu vang <span class="my-required">*</span></label>
                                    <select class="form-control" name="type_id" value="{{ old('type_id', $object->type_id) }}" id="selectType">
                                        <option></option>
                                        @foreach ($activedTypes as $item)
                                            <option value="{{$item->id}}" {{ old('type_id', $object->type_id) == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type_id'))
                                        <span style="color:red;">{{ $errors->first('type_id') }}</span>
                                    @endif
                                </div>
                                
                                <!-- Quốc gia -->
                                <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                                    <label>Chọn quốc gia <span class="my-required">*</span></label>
                                    <select class="form-control" name="country_id" value="{{ old('country_id', $object->country_id) }}" id="selectCountry">
                                        <option></option>
                                        @foreach ($activedCountries as $item)
                                            <option value="{{$item->id}}" {{ old('country_id', $object->country_id) == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <span style="color:red;">{{ $errors->first('country_id') }}</span>
                                    </span>
                                    @endif
                                </div>
                                
                                <!-- Vùng trồng nho -->
                                <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
                                    <label>Chọn vùng trồng nho <span class="my-required">*</span></label>
                                    <select class="form-control" name="region_id" value="{{ old('region_id', $object->region_id) }}" id="selectRegion">
                                        <option></option>
                                    </select>
                                    @if ($errors->has('region_id'))
                                        <span style="color:red;">{{ $errors->first('region_id') }}</span>
                                    @endif
                                </div>
                                
                                <!-- Giống nho -->
                                <div class="form-group{{ $errors->has('grape_id') ? ' has-error' : '' }}">
                                    <label>Chọn giống nho <span class="my-required">*</span></label>
                                    <select class="form-control" name="grape_id" value="{{ old('grape_id', $object->grape_id) }}" id="selectGrape">
                                        <option></option>
                                        @foreach ($activedGrapes as $item)
                                            <option value="{{$item->id}}" {{ old('grape_id', $object->grape_id) == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('grape_id'))
                                        <span style="color:red;">{{ $errors->first('grape_id') }}</span>
                                    @endif
                                </div>

                                <!-- Số lượng -->
                                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                    <label>Số lượng <span class="my-required">*</span></label>
                                    <input type="text" name="quantity" value="{{ old('quantity', $object->quantity) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('quantity'))
                                        <span style="color:red;">{{ $errors->first('quantity') }}</span>
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

                                <!-- Giảm giá -->
                                <input type="hidden" name="is_discount" value="0">
                                <div class="form-group{{ $errors->has('is_discount') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_discount" class="css-control-input" value="1"
                                            @if(old('is_discount', $object->is_discount) == 1)
                                                checked
                                            @endif
                                        >
                                        <span class="css-control-indicator"></span> Giảm giá?
                                    </label>
                                </div>

                                <!-- Giá khuyến mãi -->
                                <div class="form-group{{ $errors->has('discount_value') ? ' has-error' : '' }}">
                                    <label>Giá khuyến mãi</label>
                                    <input type="text" name="discount_value" value="{{ old('discount_value', $object->discount_value) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('discount_value'))
                                        <span style="color:red;">{{ $errors->first('discount_value') }}</span>
                                    @endif
                                </div>

                                <!-- Độ cồn -->
                                <div class="form-group{{ $errors->has('alcohol') ? ' has-error' : '' }}">
                                    <label>Độ cồn</label>
                                    <input type="text" name="alcohol" value="{{ old('alcohol', $object->alcohol) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('alcohol'))
                                        <span style="color:red;">{{ $errors->first('alcohol') }}</span>
                                    @endif
                                </div>

                                <!-- Dung tích -->
                                <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                                    <label>Dung tích</label>
                                    <input type="text" name="capacity" value="{{ old('capacity', $object->capacity) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('capacity'))
                                        <span style="color:red;">{{ $errors->first('capacity') }}</span>
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

                                <!-- Sản phẩm bán chạy -->
                                <input type="hidden" name="is_hot" value="0">
                                <div class="form-group{{ $errors->has('is_hot') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_hot" class="css-control-input" value="1"
                                            @if(old('is_hot', $object->is_hot) == 1)
                                                checked
                                            @endif
                                        >
                                        <span class="css-control-indicator"></span> Sản phẩm bán chạy?
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

                                <input type="hidden" id="deleted_image" name="deleted_image" value="">
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
    
    // $('#preview-image-before-upload').attr('src', "{{ $object->image ? asset($object->image) : asset('images/no-image-available.png') }}"); 

    // $('#image').change(function(){
    //     let reader = new FileReader();
    //     reader.onload = (e) => { 
    //         $('#preview-image-before-upload').attr('src', e.target.result); 
    //     }
    //     reader.readAsDataURL(this.files[0]); 
    // });

    // $('.close').on('click', function() {
    //     $(this).parent('div').remove();
    // });

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
