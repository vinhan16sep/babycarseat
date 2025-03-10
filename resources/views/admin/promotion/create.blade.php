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
                            <form role="form" method="POST" action="{{ route('store-promotion') }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label>Ảnh đại diện</label>
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
                                    <select class="form-control w-30" name="item_type" value="{{ old('item_type') }}" id="selectItemType">
                                        <option></option>
                                        <option value="1" {{ old('item_type') == '1' ? 'selected' : '' }}>Rượu vang</option>
                                        <option value="2" {{ old('item_type') == '2' ? 'selected' : '' }}>Combo</option>
                                    </select>
                                    @if ($errors->has('item_type'))
                                        <span style="color:red;">{{ $errors->first('item_type') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('item') ? ' has-error' : '' }}">
                                    <label>Chọn rượu vang / combo <span class="my-required">*</span></label>
                                    <select class="form-control w-30" name="item" value="{{ old('item') }}" id="selectItem">
                                        <option></option>
                                    </select>
                                    @if ($errors->has('item'))
                                        <span style="color:red;">{{ $errors->first('item') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label>Tiêu đề <span class="my-required">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="inputTitle" maxlength="255">
                                    @if ($errors->has('title'))
                                        <span style="color:red;">{{ $errors->first('title') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <input type="hidden" name="is_highlight" value="0">
                                <div class="form-group{{ $errors->has('is_highlight') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_highlight" class="css-control-input" value="1"
                                            @if(old('is_highlight') == 1)
                                                checked
                                            @endif
                                        >
                                        <span class="css-control-indicator"></span> Nổi bật?
                                    </label>
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
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

<script type="text/javascript">

    let url = window.location.origin;
    
    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#preview-image-before-upload').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });

    $('#selectItem').attr('disabled', true);

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
                    let old = "{{ old('item') }}";
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
