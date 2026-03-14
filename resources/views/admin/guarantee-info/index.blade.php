@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Danh sách thông tin</span></h1>
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
                    <div class="card-title">
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="w-10" style="text-align: center;">Vị trí</th>
                                        <th class="w-10" style="text-align: center;">Vị trí phụ</th>
                                        <th class="w-50" style="text-align: center;">Tiêu đề</th>
                                        <th class="w-10" style="text-align: center;">Hiển thị</th>
                                        <th class="w-10" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $item->position}}</td>
                                            <td style="text-align: center;">{{ $item->sub_position}}</td>
                                            <td>{{ $item->title}}</td>
                                            <td style="text-align: center;">
                                                @if($item->is_show == 1)
                                                    <span class="ti-check" style="color:green;font-weight: 900;"></span>
                                                @else
                                                    <span class="ti-close" style="color:red;font-weight: 900;"></span>
                                                @endif
                                            </td>
                                            <td class="color-primary" style="text-align: center;">
                                                <a type="button" href="{{ route('edit-guarantee-info', ['id' => $item->id]) }}" class="btn btn-primary btn-flat my-list-btn"><i class="ti-pencil icon-white"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# row -->
    </section>
</div>
@endsection
