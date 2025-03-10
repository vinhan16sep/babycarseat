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
                            <form role="form" method="POST" action="{{ route('update-promotion', ['id' => $object->id, 'callback' => $callback]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label>Ảnh đại diện <span class="my-required">*</span></label>
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
                                
                                <div class="form-group{{ $errors->has('item_type') ? ' has-error' : '' }}">
                                    <label>Chọn loại <span class="my-required">*</span></label>
                                    <select class="form-control w-30" name="item_type" value="{{ old('item_type', $object->item_type) }}" id="selectItemType">
                                        <option></option>
                                        <option value="1" {{ old('item_type', $object->item_type) == '1' ? 'selected' : '' }}>Rượu vang</option>
                                        <option value="2" {{ old('item_type', $object->item_type) == '2' ? 'selected' : '' }}>Combo</option>
                                    </select>
                                    @if ($errors->has('item_type'))
                                        <span style="color:red;">{{ $errors->first('item_type') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('item') ? ' has-error' : '' }}">
                                    <label>Chọn rượu vang / combo <span class="my-required">*</span></label>
                                    <select class="form-control w-30" name="item" value="{{ old('item', $object->item_id) }}" id="selectItem">
                                        <option></option>
                                    </select>
                                    @if ($errors->has('item'))
                                        <span style="color:red;">{{ $errors->first('item') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label>Tiêu đề</label>
                                    <input type="text" name="title" value="{{ old('title', $object->title) }}" class="form-control" id="inputName" maxlength="255">
                                    @if ($errors->has('title'))
                                        <span style="color:red;">{{ $errors->first('title') }}</span>
                                    </span>
                                    @endif
                                </div>
                                
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

                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_active" class="css-control-input" value="1"
                                            @if (old('is_active', $object->is_active) == 1)
                                                checked
                                            @endif
                                        >
                                        <span class="css-control-indicator"></span> Kích hoạt?
                                        @if ($errors->has('is_active'))
                                            <span style="color:red;">{{ $errors->first('is_active') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <a type="button" href="{{ route('list-promotion') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
        // images_upload_url : '/bw-admin/upload/post-tinymce-image',
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

    // Bind options into Item type
    let initItemType = $('#selectItemType').val();
    ajaxGetItemByType(initItemType);

    $('#selectItemType').change(function (){
        let itemType = $(this).val();
        ajaxGetItemByType(itemType);
    });

    function ajaxGetItemByType(itemType) {
        if (itemType != '') {
            $.ajax({
                url: url + '/bw-admin/promotion/get-item-by-type',
                method: 'GET',
                data: {
                    itemType: itemType
                },
                success: function (res) {
                    let data = res.data;
                    let old = "{{ old('item', $object->item_id) }}";
                    $('#selectItem').attr('disabled', false);
                    $('#selectItem').html('<option></option>');
                    $.each(data, function(key, value){
                        if (old == key) {
                            $('#selectItem').append('<option value="' + key + '" selected>' + value + '</option>');
                        } else {
                            $('#selectItem').append('<option value="' + key + '" >' + value + '</option>');
                        }
                    });
                },
                error: function (error) {}
            });
        } else {
            $('#selectItem').attr('disabled', true);
            $('#selectItem').html('<option></option>');
        }
    }
</script>
@endsection
