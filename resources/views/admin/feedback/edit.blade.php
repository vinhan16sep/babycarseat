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
                            <form role="form" method="POST" action="{{ route('update-feedback', ['id' => $object->id, 'callback' => $callback]) }}" enctype="multipart/form-data">
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
                                
                                <div class="form-group">
                                    <label for="description" class="form-label">Mô Tả</label>
                                    <textarea name="description" class="form-control" id="txtareaDescription">{{ old('description', $object->description) }}</textarea>
                                </div>

                                <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                                    <label>Số sao</label>
                                    <input type="number" name="rate" value="{{ old('title', $object->rate) }}" class="form-control" id="inputRate" min="1" max="5">
                                    @if ($errors->has('rate'))
                                        <span style="color:red;">{{ $errors->first('rate') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('rate_by') ? ' has-error' : '' }}">
                                    <label>Người đánh giá</label>
                                    <input type="text" name="rate_by" value="{{ old('title', $object->rate_by) }}" class="form-control" id="inputRateBy" maxlength="255">
                                    @if ($errors->has('rate_by'))
                                        <span style="color:red;">{{ $errors->first('rate_by') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                    <label>Link</label>
                                    <input type="text" name="link" value="{{ old('link', $object->link) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('link'))
                                        <span style="color:red;">{{ $errors->first('link') }}</span>
                                    </span>
                                    @endif
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

                                <a type="button" href="{{ route('list-feedback') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
        selector: 'textarea#txtareaDescription',
        height: 500,
        plugins: [
            'image',
            'table',
            'link'
        ],

        image_title : true,
        automatic_uploads: true,
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

</script>
@endsection
