@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Danh sách phụ kiện</span></h1> <a class="btn btn-success btn-flat" href="{{ route('create-accessory') }}"><i class="ti-plus"></i> Tạo mới</a>
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
                        <form action="{{ route('list-accessory') }}" class="my-search-form">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tên phụ kiện</label>
                                        <input type="text" name="name" value="{{ isset($req['name']) && $req['name'] != '' ? $req['name'] : '' }}" class="form-control input-default">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Danh mục</label>
                                        <select class="form-control" name="category">
                                            <option value="">Tất cả</option>
                                            @foreach ($activedCategories as $item)
                                                <option value="{{$item->id}}" {{ isset($req['category']) && $req['category'] == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Sản phẩm mới?</label>
                                        <select class="form-control" name="is_new">
                                            <option value="" {{ isset($req['is_new']) && $req['is_new'] === '' ? 'selected' : '' }}>Tất cả</option>
                                            <option value="1" {{ isset($req['is_new']) && $req['is_new'] === '1' ? 'selected' : '' }}>Có</option>
                                            <option value="0" {{ isset($req['is_new']) && $req['is_new'] === '0' ? 'selected' : '' }}>Không</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Sản phẩm nổi bật?</label>
                                        <select class="form-control" name="is_highlight">
                                            <option value="" {{ isset($req['is_highlight']) && $req['is_highlight'] === '' ? 'selected' : '' }}>Tất cả</option>
                                            <option value="1" {{ isset($req['is_highlight']) && $req['is_highlight'] === '1' ? 'selected' : '' }}>Có</option>
                                            <option value="0" {{ isset($req['is_highlight']) && $req['is_highlight'] === '0' ? 'selected' : '' }}>Không</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
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
                                        <a type="button" href="{{ route('list-accessory') }}" class="btn btn-default"></i>&nbsp;&nbsp;RESET</a>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="">STT</th>
                                        <th class="w-5">Ảnh</th>
                                        <th class="w-20">Tên</th>
                                        <th class="w-10">Đơn giá (VNĐ)</th>
                                        <th class="w-15">Danh mục</th>
                                        <th class="w-5">Mới?</th>
                                        <th class="w-5">Nổi bật?</th>
                                        <th class="w-10">Kích hoạt?</th>
                                        <th class="w-15">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $item)
                                        <tr>
                                            <td scope="row">{{ $key + 1}}</td>
                                            <td><img style="max-height: 200px;" src="{{ $item->image ? asset($item->image) : asset('images/no-image-available-list.jpg') }}" /></td>
                                            <td >
                                                <strong>
                                                    <a href="{{ route('edit-accessory', ['id' => $item->id]) }}" style="color:#5873fe;">{{ $item->name }}</a>
                                                </strong>
                                            </td>
                                            <td>{{ $item->price != 0 ? number_format($item->price) : 'Liên hệ' }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>
                                                @if ($item->is_new == 1)
                                                    <span class="ti-check" style="color:green;font-weight: 900;"></span>
                                                @else
                                                    <span class="ti-close" style="color:red;font-weight: 900;"></span>
                                                @endif
                                            </td>
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
                                            <td class="color-primary">
                                                <a type="button" href="{{ route('edit-accessory', ['id' => $item->id]) }}" class="btn btn-primary btn-flat my-list-btn"><i class="ti-pencil icon-white"></i></a>
                                                <button type="button" class="btn btn-danger btn-flat m-l-5 my-list-btn" onclick="deleteRow('{{ $item->id }}', '/accessory/delete-row')"><i class="ti-trash"></i></button>
                                                @if ($item->is_active == '1')
                                                <button type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" onclick="changeStatus('{{ $item->id }}', '0', '/accessory/change-status')">
                                                    <i class="ti-control-pause"></i>
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" onclick="changeStatus('{{ $item->id }}', '1', '/accessory/change-status')">
                                                    <i class="ti-control-play"></i>
                                                </button>
                                                @endif
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

    // Bind options into Region
    let initCountryId = $('#selectCountry').val();
    ajaxGetRegionByCountry(initCountryId);

    $('#selectCountry').change(function (){
        let countryId = $(this).val();
        ajaxGetRegionByCountry(countryId);
    });

    function ajaxGetRegionByCountry(countryId) {
        
        let url = window.location.origin;
        if (countryId != '') {
            $.ajax({
                url: url + '/bw-admin/region/get-by-country',
                method: 'GET',
                data: {
                    countryId: countryId
                },
                success: function (res) {
                    let data = res.data;
                    let old = "{{ isset($req['region']) && $req['region'] ? $req['region'] : '' }}";
                    console.log(old);
                    $('#selectRegion').html('<option value="">Tất cả</option>');
                    $.each(data, function(key, value){
                        if (old == key) {
                            $('#selectRegion').append('<option value="' + key + '" selected>' + value + '</option>');
                        } else {
                            $('#selectRegion').append('<option value="' + key + '" >' + value + '</option>');
                        }
                    });
                },
                error: function (error) {}
            });
        } else {
            $('#selectRegion').html('<option value="">Tất cả</option>');
        }
    }
</script>
@endsection
