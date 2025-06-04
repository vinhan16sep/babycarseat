@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Danh sách FormSafe</h1> <a class="btn btn-success btn-flat" href="{{ route('formsafe.create') }}"><i class="ti-plus"></i> Tạo mới</a>
                </div>
            </div>
        </div>
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.layouts.flash-message')
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table my-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Điện thoại</th>
                                        <th>Email</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Ngày</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forms as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->product_code }}</td>
                                            <td>{{ $item->by_date }}</td>
                                            <td>
                                                <a href="{{ route('formsafe.show', $item->id) }}" class="btn btn-info btn-sm">Xem</a>
                                                <a href="{{ route('formsafe.edit', $item->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                                                <form action="{{ route('formsafe.destroy', $item->id) }}" method="POST" style="display:inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $forms->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
