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
                            <form role="form" method="POST" action="{{ route('store-post-category') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                    <label>Danh mục cha</label>
                                    <select name="parent_id" class="form-control">
                                    <option value="0">-- Không có danh mục cha --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->display_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('parent_id'))
                                        <span style="color:red;">{{ $errors->first('parent_id') }}</span>
                                    @endif
                                </div>



                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Tên</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputName" maxlength="255">
                                    @if ($errors->has('name'))
                                        <span style="color:red;">{{ $errors->first('name') }}</span>
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
                                
                                <div class="form-group d-flex align-items-center">
                                    <label style="margin-right: 10px;" class="css-control css-control-primary css-checkbox me-4 mb-0">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" name="is_active" class="css-control-input" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                                        <span class="css-control-indicator"></span> Kích hoạt?
                                    </label>

                                    <label class="css-control css-control-primary css-checkbox mb-0">
                                        <input type="hidden" name="menu_active" value="0">
                                        <input type="checkbox" name="menu_active" class="css-control-input" value="1" {{ old('menu_active', 1) ? 'checked' : '' }}>
                                        <span class="css-control-indicator"></span> Bài viết hiển thị trên menu?
                                    </label>
                                </div>

                                <a type="button" href="{{ route('list-post-category') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
