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
                            <form role="form" method="POST" action="{{ route('store-color') }}">
                                @csrf
                                @method('post')

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Tên</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputName" maxlength="255">
                                    @if ($errors->has('name'))
                                        <span style="color:red;">{{ $errors->first('name') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" name="code" value="{{ old('code') }}" class="form-control" id="inputSlug" readonly>
                                    @if ($errors->has('code'))
                                        <span style="color:red;">{{ $errors->first('code') }}</span>
                                    </span>
                                    @endif
                                </div>
                                
                                <a type="button" href="{{ route('list-color') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
        let code = to_slug($('#inputName').val());
        $('#inputSlug').val(code);
    });
    $('#inputName').focusout(function (){
        let code = to_slug($('#inputName').val());
        $('#inputSlug').val(code);
    });
</script>
@endsection
