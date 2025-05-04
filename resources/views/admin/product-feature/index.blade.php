@extends('admin.layouts.app')

@section('content')
<style>
    .circle-icon {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        font-weight: bold;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Tính năng sản phẩm</span></h1> <a class="btn btn-success btn-flat" href="{{ route('create-product-feature', ['id' => $productId]) }}"><i class="ti-plus"></i> Tạo mới</a>
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
                            <table class="table my-table">
                                <thead>
                                    <tr>
                                        <th class="w-5 center">STT</th>
                                        <th class="w-15 center">Tên sản phẩm</th>
                                        <th class="w-20 center">Tính năng</th>
                                        <th class="w-15 center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $item)
                                    <tr>
                                        <td scope="row">{{ $key + 1}}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->feature->title }}</td>
                                        <td class="color-primary">
                                            <button type="button" class="btn btn-danger btn-flat m-l-5 my-list-btn" onclick="deleteRow('{{ $item->id }}', '/product-feature/delete-row')"><i class="ti-trash"></i></button>
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
<script type="text/javascript">
    let url = window.location.origin;
</script>
@endsection