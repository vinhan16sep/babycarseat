@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Danh sách menu</span></h1>
                    <a class="btn btn-success btn-flat" href="{{ route('create-menu') }}"><i class="ti-plus"></i> Tạo mới</a>
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
                                        <th class="w-5">STT</th>
                                        <th class="w-10">Vị trí</th>
                                        <th class="w-20">Tiêu đề</th>
                                        <th class="w-40">Link</th>
                                        <th class="w-5">Sắp xếp</th>
                                        <th class="w-10">Trạng thái</th>
                                        <th class="w-15">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $key => $item)
                                        <tr>
                                            <th scope="row">{{ $key + 1}}</th>
                                            <td>{{ $footerMenuPosition[$item->position] }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->link }}</td>
                                            <td>
                                                <input type="text" data-id="{{ $item->id}}" data-current-sort="{{ $item->sort}}" name="input-sort" value="{{ $item->sort }}" class="form-control inputSort" maxlength="2" />
                                            </td>
                                            <td>
                                                <span class="badge {{ $item->is_active == '1' ? 'badge-success' : 'badge-danger'}} unset-text-transform">
                                                    {{ $item->is_active == '1' ? 'Đang sử dụng' : 'Đã tắt'}}
                                                </span>
                                            </td>
                                            <td class="color-primary">
                                                <a type="button" href="{{ route('edit-menu', ['id' => $item->id]) }}" class="btn btn-primary btn-flat my-list-btn"><i class="ti-pencil icon-white"></i></a>
                                                <button type="button" class="btn btn-danger btn-flat m-l-5 my-list-btn" onclick="deleteRow('{{ $item->id }}', '/menu/delete-row')"><i class="ti-trash"></i></button>
                                                @if ($item->is_active == '1')
                                                <button type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" onclick="changeStatus('{{ $item->id }}', '0', '/menu/change-status')">
                                                    <i class="ti-control-pause"></i>
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" onclick="changeStatus('{{ $item->id }}', '1', '/menu/change-status')">
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
                {{ $menus->links() }}
            </div>
        </div>
        <!-- /# row -->
    </section>
</div>
<script type="text/javascript">
    
    let url = window.location.origin;
    let endPoint = '/br-admin/menu/sort';

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
