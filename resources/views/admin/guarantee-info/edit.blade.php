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
                            <form role="form" method="POST" action="{{ route('update-guarantee-info', ['id' => $object->id]) }}">
                                @csrf
                                @method('put')
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ old('title', $object->title) }}" class="form-control" maxlength="255">
                                    @if ($errors->has('title'))
                                        <span style="color:red;">{{ $errors->first('title') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Vị trí</label>
                                    <input type="text" name="position" value="{{ old('position', $object->position) }}" class="form-control" disabled>
                                    @if ($errors->has('position'))
                                        <span style="color:red;">{{ $errors->first('position') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Vị trí phụ</label>
                                    <input type="text" name="sub_position" value="{{ old('sub_position', $object->sub_position) }}" class="form-control" disabled>
                                    @if ($errors->has('sub_position'))
                                        <span style="color:red;">{{ $errors->first('sub_position') }}</span>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea name="content" class="form-control my-textarea" rows="5">{{ old('content', $object->content) }}</textarea>
                                </div>

                                <a type="button" href="{{ route('list-guarantee-info') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
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
@endsection
