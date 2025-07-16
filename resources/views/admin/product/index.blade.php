@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Danh sách sản phẩm</span></h1> <a class="btn btn-success btn-flat" href="{{ route('create-product') }}"><i class="ti-plus"></i> Tạo mới</a>
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
                        Tìm kiếm
                    </div>
                    <div class="card-body">
                        <form action="{{ route('list-product') }}" class="my-search-form">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" name="name" value="{{ isset($req['name']) && $req['name'] != '' ? $req['name'] : '' }}" class="form-control input-default">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Danh mục</label>
                                        <select class="form-control" name="category">
                                            <option value="">Tất cả</option>
                                            @foreach ($productCategories as $item)
                                                <option value="{{$item->id}}" {{ isset($req['category']) && $req['category'] == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Thương hiệu</label>
                                        <select class="form-control" name="brand">
                                            <option value="">Tất cả</option>
                                            @foreach ($brands as $item)
                                                <option value="{{$item->id}}" {{ isset($req['brand']) && $req['brand'] == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Sản phẩm nổi bật?</label>
                                        <select class="form-control" name="is_highlight">
                                            <option value="" {{ isset($req['is_highlight']) && $req['is_highlight'] === '' ? 'selected' : '' }}>Tất cả</option>
                                            <option value="1" {{ isset($req['is_highlight']) && $req['is_highlight'] === '1' ? 'selected' : '' }}>Có</option>
                                            <option value="0" {{ isset($req['is_highlight']) && $req['is_highlight'] === '0' ? 'selected' : '' }}>Không</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Kích hoạt?</label>
                                        <select class="form-control" name="is_active">
                                            <option value="" {{ isset($req['is_active']) && $req['is_active'] === '' ? 'selected' : '' }}>Tất cả</option>
                                            <option value="1" {{ isset($req['is_active']) && $req['is_active'] === '1' ? 'selected' : '' }}>Có</option>
                                            <option value="0" {{ isset($req['is_active']) && $req['is_active'] === '0' ? 'selected' : '' }}>Không</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary"><i class="ti-search icon-white"></i>&nbsp;&nbsp;OK</button>
                                        <a type="button" href="{{ route('list-product') }}" class="btn btn-default"></i>&nbsp;&nbsp;RESET</a>
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
                                        <th class="w-15 center">Ảnh</th>
                                        <th class="w-20 center">Tên</th>
                                        <th class="w-10 center">Đơn giá (VNĐ)</th>
                                        <th class="w-10 center">Danh mục</th>
                                        <th class="w-10 center">Thương hiệu</th>
                                        <th class="w-5 center">Nổi bật?</th>
                                        <th class="w-8 center">Kích hoạt?</th>
                                        <th class="w-5 center">Sắp xếp</th>
                                        <th class="w-15 center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $item)
                                        <tr>
                                            <td scope="row">{{ $key + 1}}</td>
                                            <td><img style="max-height: 200px;" src="{{ $item->image ? getImage($item->image) : getImage('images/no-image-available-list.jpg') }}" /></td>
                                            <td >
                                                <strong>
                                                    <a href="{{ route('edit-product', ['id' => $item->id]) }}" style="color:#5873fe;">{{ $item->name }}</a>
                                                </strong>
                                            </td>
                                            <td>{{ $item->price != 0 ? number_format($item->price) : 'Liên hệ' }}</td>
                                            <td>
                                                @if ($item->categories->isNotEmpty())
                                                    @foreach ($item->categories as $category)
                                                        <span class="badge badge-primary">{{ $category->name }}</span>
                                                    @endforeach
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $item->brand->name }}</td>
                                            <td>
                                                @if ($item->is_highlight == 1)
                                                    <span class="ti-check" style="color:green;font-weight: 900;"></span>
                                                @else
                                                    <span class="ti-close" style="color:red;font-weight: 900;"></span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->is_active == 1)
                                                    <span class="ti-check" style="color:green;font-weight: 900;"></span>
                                                @else
                                                    <span class="ti-close" style="color:red;font-weight: 900;"></span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="text" data-id="{{ $item->id}}" data-current-sort="{{ $item->sort}}" name="input-sort" value="{{ $item->sort }}" class="form-control inputSort" maxlength="2" />
                                            </td>
                                            <td class="color-primary">
                                                <a type="button" href="{{ route('edit-product', ['id' => $item->id]) }}" class="btn btn-primary btn-flat my-list-btn"><i class="ti-pencil icon-white"></i></a>
                                                <button type="button" class="btn btn-danger btn-flat m-l-5 my-list-btn" onclick="deleteRow('{{ $item->id }}', '/product/delete-row')"><i class="ti-trash"></i></button>
                                                @if ($item->is_active == '1')
                                                <button type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" onclick="changeStatus('{{ $item->id }}', '0', '/product/change-status')">
                                                    <i class="ti-control-pause"></i>
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" onclick="changeStatus('{{ $item->id }}', '1', '/product/change-status')">
                                                    <i class="ti-control-play"></i>
                                                </button>
                                                @endif
                                                <a type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" href="{{ route('list-product-color-image', ['id' => $item->id]) }}">
                                                    <i class="ti-image"></i>
                                                </a>
                                                <a type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" href="{{ route('list-product-feature', ['id' => $item->id]) }}">
                                                    <i class="ti-check-box"></i>
                                                </a>
                                                <a type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" href="{{ route('list-product-note', ['id' => $item->id]) }}">
                                                    <i class="ti-notepad"></i>
                                                </a>
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
<script type="text/javascript">
    
    let url = window.location.origin;
    let endPoint = '/br-admin/product/sort';

    $('.inputSort').change(function(){
        let id = $(this).attr("data-id");
        let inputSort = $(this).val();
        if (inputSort != $(this).attr("data-current-sort")) {
            ajaxSort(id, inputSort);
        }
    });
    
    $('.inputSort').focusout(function (){
        let id = $(this).attr("data-id");
        let inputSort = $(this).val();
        if (inputSort != $(this).attr("data-current-sort")) {
            ajaxSort(id, inputSort);
        }
    });

    function ajaxSort(id, inputSort) {
        let sort = inputSort == "" ? 0 : inputSort;
        $.ajax({
            url: url + endPoint,
            method: 'GET',
            data: {
                id: id,
                sort: sort
            },
            success: function (res) {
                location.reload(); 
            },
            error: function (error) {}
        });
    }
    
</script>
@endsection
