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
                            <form role="form" method="POST" action="{{ route('store-menu') }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')

                                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                    <label>Vị trí</label>
                                    <select name="position" class="form-control">
                                    <option value="">-- Chọn vị trí --</option>
                                        @foreach ($footerMenuPosition as $key => $positionName)
                                            <option value="{{ $key }}" {{ old('position') == $key ? 'selected' : '' }}>
                                                {{ $positionName }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('parent_id'))
                                        <span style="color:red;">{{ $errors->first('parent_id') }}</span>
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
                                
                                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                    <label>Link</label>
                                    <input type="text" name="link" value="{{ old('link') }}" class="form-control" maxlength="255">
                                    @if ($errors->has('link'))
                                        <span style="color:red;">{{ $errors->first('link') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group d-flex align-items-center">
                                    <label style="margin-right: 10px;" class="css-control css-control-primary css-checkbox me-4 mb-0">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" name="is_active" class="css-control-input" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                                        <span class="css-control-indicator"></span> Kích hoạt?
                                    </label>
                                </div>

                                
                                <a type="button" href="{{ route('list-menu') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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

    let url = window.location.origin;

</script>
@endsection
