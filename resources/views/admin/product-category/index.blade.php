@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Danh sách danh mục</span></h1>
                    <a class="btn btn-success btn-flat" href="{{ route('create-product-category') }}"><i class="ti-plus"></i> Tạo mới</a>
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
                                        <th class="w-20">STT</th>
                                        <th class="w-30">Tên</th>
                                        <th class="w-30">Ghi chú</th>
                                        <th class="w-20">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $item)
                                        <tr>
                                            <th scope="row">{{ $key + 1}}</th>
                                            <td>{{ $item->name}}</td>
                                            <td>{{ $item->description}}</td>
                                            <td class="color-primary">
                                                <a type="button" href="{{ route('edit-product-category', ['id' => $item->id]) }}" class="btn btn-primary btn-flat my-list-btn"><i class="ti-pencil icon-white"></i></a>
                                                <button type="button" class="btn btn-danger btn-flat m-l-5 my-list-btn" onclick="deleteRow('{{ $item->id }}', '/product-category/delete-row')"><i class="ti-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $list->links() }}
            </div>
        </div>
        <!-- /# row -->
    </section>
</div>
@endsection
