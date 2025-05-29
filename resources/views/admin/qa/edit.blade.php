@extends('admin.layouts.app')

@section('content')
<style>
    .color-item {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 10px;
    }

    .color-preview {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 2px solid #ccc;
        flex-shrink: 0;
    }

    .color-select {
        width: 250px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Chỉnh sửa câu hỏi</h1>
                </div>
            </div>
        </div>
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.layouts.flash-message')
                <div class="card">
                    <div class="card-body offset-1 col-lg-10">
                        <div class="basic-form">
                            <form role="form" method="POST" action="{{ route('update-qa', $object->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group{{ $errors->has('qa_type') ? ' has-error' : '' }}">
                                    <label>Chọn danh mục <span class="my-required">*</span></label>
                                    <select class="form-control" name="qa_type">
                                        @foreach ($qaTypes as $key => $item)
                                            <option value="{{ $key }}" {{ (old('qa_type', $object->qa_type) == $key) ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                                    <label>Câu hỏi <span class="my-required">*</span></label>
                                    <input required type="text" name="question" value="{{ old('question', $object->question) }}" class="form-control" id="inputQuestion" maxlength="255">
                                    @if ($errors->has('question'))
                                    <span style="color:red;">{{ $errors->first('question') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Câu trả lời <span class="my-required">*</span></label>
                                    <textarea required name="answer" class="form-control my-textarea" rows="5">{{ old('answer', $object->answer) }}</textarea>
                                </div>

                                <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }}">
                                    <label>Thứ tự</label>
                                    <input type="number" name="sort" value="{{ old('sort', $object->sort) }}" class="form-control" id="inputSort" maxlength="255">
                                    @if ($errors->has('sort'))
                                    <span style="color:red;">{{ $errors->first('sort') }}</span>
                                    @endif
                                </div>

                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                                    <label class="css-control css-control-primary css-checkbox" for="">
                                        <input type="checkbox" name="is_active" class="css-control-input" value="1" {{ old('is_active', $object->is_active) ? 'checked' : '' }}>
                                        <span class="css-control-indicator"></span> Kích hoạt?
                                    </label>
                                </div>

                                <a type="button" href="{{ route('list-qa') }}" class="btn btn-default btn-outline"><i class="ti-back-left icon-black"></i>&nbsp;&nbsp;Quay lại</a>
                                <button type="submit" class="btn btn-primary"><i class="ti-save icon-white"></i>&nbsp;&nbsp;Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection