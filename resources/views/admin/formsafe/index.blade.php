@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Danh sách đăng ký tham gia chương trình Ghế Ô Tô An Toàn</h1>
                </div>
            </div>
        </div>
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.layouts.flash-message')
                <div class="card">
                    <div class="card-title">
                        Tìm kiếm
                    </div>
                    <div class="card-body">
                        <form action="{{ route('list-formsafe') }}" class="my-search-form">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tên</label>
                                        <input type="text" name="name" value="{{ isset($req['name']) && $req['name'] != '' ? $req['name'] : '' }}" class="form-control input-default">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Điện thoại</label>
                                        <input type="text" name="phone" value="{{ isset($req['phone']) && $req['phone'] != '' ? $req['phone'] : '' }}" class="form-control input-default">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <button type="submit" class="btn btn-primary"><i class="ti-search icon-white"></i>&nbsp;&nbsp;OK</button>
                                        <a type="button" href="{{ route('list-formsafe') }}" class="btn btn-default"></i>&nbsp;&nbsp;RESET</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-title">
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table my-table">
                                <thead>
                                    <tr>
                                        <th class="w-5 center">STT</th>
                                        <th class="w-20 center">Tên</th>
                                        <th class="w-15 center">Điện thoại</th>
                                        <th class="w-20 center">Email</th>
                                        <th class="w-20 center">Tên sản phẩm</th>
                                        <th class="w-10 center">Ngày mua</th>
                                        <th class="w-15 center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forms as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->product_name ?? '' }}</td>
                                            <td>{{ $item->by_date }}</td>
                                            <td class="color-primary">
                                                <a type="button" href="{{ route('show-formsafe', ['id' => $item->id]) }}" class="btn btn-primary btn-flat my-list-btn"><i class="ti-eye icon-white"></i></a>
                                                <button type="button" class="btn btn-danger btn-flat m-l-5 my-list-btn" onclick="deleteRow('{{ $item->id }}', '/formsafe/delete-row')"><i class="ti-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center" style="margin-top: 20px;">
                                {{-- Pagination links --}}
                                {{ $forms->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
