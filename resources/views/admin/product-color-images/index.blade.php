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
                    <h1>Màu sắc + Hình ảnh cho màu sắc sản phẩm</span></h1> <a class="btn btn-success btn-flat" href="{{ route('create-product-color-image', ['id' => $productId]) }}"><i class="ti-plus"></i> Tạo mới</a>
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
                                        <th class="w-20 center">Màu sắc</th>
                                        <th class="w-20 center">Ảnh</th>
                                        <th class="w-15 center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $item)
                                    <tr>
                                        <td scope="row">{{ $key + 1}}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>
                                            <div class="circle-icon" style="background-color: {{ $item->color->code }};"></div>
                                        </td>
                                        <td>
                                            @if ($item->image && is_array($item->image))
                                                @foreach ($item->image as $img)
                                                    <img style="max-height: 50px;" src="{{ asset($img) }}" />
                                                @endforeach
                                            @else
                                                <img style="max-height: 50px;" src="{{ asset('images/no-image-available-list.jpg') }}" />
                                            @endif
                                        </td>
                                        <td class="color-primary">
                                            <a type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" href="{{ route('create-product-color-image', ['id' => $item->product->id, 'color' => $item->color->id]) }}">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-flat m-l-5 my-list-btn" onclick="deleteRow('{{ $item->id }}', '/product-color-image/delete-row')"><i class="ti-trash"></i></button>
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