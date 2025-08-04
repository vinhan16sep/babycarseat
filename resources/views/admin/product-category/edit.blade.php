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
                            <form role="form" method="POST" action="{{ route('update-product-category', ['id' => $object->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row">
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

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Tên</label>
                                    <input type="text" name="name" value="{{ old('name', $object->name) }}" class="form-control" id="inputName" maxlength="255">
                                    @if ($errors->has('name'))
                                        <span style="color:red;">{{ $errors->first('name') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" value="{{ old('slug', $object->slug) }}" class="form-control" id="inputSlug" readonly="">
                                    @if ($errors->has('slug'))
                                        <span style="color:red;">{{ $errors->first('slug') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('disp_name') ? ' has-error' : '' }}">
                                    <label>Tên hiển thị</label>
                                    <input type="text" name="disp_name" value="{{ old('disp_name', $object->disp_name) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('disp_name'))
                                        <span style="color:red;">{{ $errors->first('disp_name') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label>Ghi chú</label>
                                    <input type="text" name="description" value="{{ old('description', $object->description) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('description'))
                                        <span style="color:red;">{{ $errors->first('description') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <a type="button" href="{{ route('list-product-category') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
<script type="text/javascript">
    
    $('#preview-image-before-upload').attr('src', "{{ $object->image ? asset($object->image) : asset('images/no-image-available.png') }}"); 

    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#preview-image-before-upload').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });

    $('#inputName').change(function (){
        let slug = to_slug($('#inputName').val());
        $('#inputSlug').val(slug);
    });

    $('#inputName').focusout(function (){
        let slug = to_slug($('#inputName').val());
        $('#inputSlug').val(slug);
    });
</script>
@endsection
