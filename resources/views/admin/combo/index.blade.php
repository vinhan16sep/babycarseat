@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Danh sách combo</span></h1> <a class="btn btn-success btn-flat" href="{{ route('create-combo') }}"><i class="ti-plus"></i> Tạo mới</a>
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
                        <form action="{{ route('list-combo') }}" class="my-search-form">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tên combo</label>
                                        <input type="text" name="name" value="{{ isset($req['name']) && $req['name'] != '' ? $req['name'] : '' }}" class="form-control input-default">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Giảm giá?</label>
                                        <select class="form-control" name="is_discount">
                                            <option value="" {{ isset($req['is_discount']) && $req['is_discount'] === '' ? 'selected' : '' }}>Tất cả</option>
                                            <option value="1" {{ isset($req['is_discount']) && $req['is_discount'] === '1' ? 'selected' : '' }}>Có</option>
                                            <option value="0" {{ isset($req['is_discount']) && $req['is_discount'] === '0' ? 'selected' : '' }}>Không</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Sản phẩm mới?</label>
                                        <select class="form-control" name="is_new">
                                            <option value="" {{ isset($req['is_new']) && $req['is_new'] === '' ? 'selected' : '' }}>Tất cả</option>
                                            <option value="1" {{ isset($req['is_new']) && $req['is_new'] === '1' ? 'selected' : '' }}>Có</option>
                                            <option value="0" {{ isset($req['is_new']) && $req['is_new'] === '0' ? 'selected' : '' }}>Không</option>
                                        </select>
                                    </div>
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
                                        <a type="button" href="{{ route('list-combo') }}" class="btn btn-default"></i>&nbsp;&nbsp;RESET</a>
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
                                        <th class="w-5">STT</th>
                                        <th class="w-10">Ảnh</th>
                                        <th class="w-20">Tên</th>
                                        <th class="w-5">Sản phẩm</th>
                                        <th class="w-15">Đơn giá (VNĐ)</th>
                                        <th class="w-10">Giảm giá?</th>
                                        <th class="w-5">Mới?</th>
                                        <th class="w-5">Nổi bật?</th>
                                        <th class="w-10">Kích hoạt?</th>
                                        <th class="w-25">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $item)
                                        <tr>
                                            <td scope="row">{{ $key + 1}}</td>
                                            <td><img style="max-height: 200px;" src="{{ $item->image ? asset($item->image) : asset('images/no-image-available-list.jpg') }}" /></td>
                                            <td >
                                                <strong>
                                                    <a href="{{ route('edit-combo', ['id' => $item->id]) }}" style="color:#5873fe;">{{ $item->name }}</a>
                                                </strong>
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-primary btn-flat m-l-5" onclick="showProducts('{{ $item->id }}', '{{ $item->name }}')">Xem/Sửa</button>
                                            </td>
                                            <td>{{ $item->price != 0 ? number_format($item->price) : 'Liên hệ' }}</td>
                                            <td>
                                                @if ($item->is_discount == 1)
                                                    <span class="ti-check" style="color:green;font-weight: 900;"></span>
                                                @else
                                                    <span class="ti-close" style="color:red;font-weight: 900;"></span>
                                                @endif
                                            </td>
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
                                                <a type="button" href="{{ route('edit-combo', ['id' => $item->id]) }}" class="btn btn-primary btn-flat my-list-btn"><i class="ti-pencil icon-white"></i></a>
                                                <button type="button" class="btn btn-danger btn-flat m-l-5 my-list-btn" onclick="deleteRow('{{ $item->id }}', '/combo/delete-row')"><i class="ti-trash"></i></button>
                                                <button type="button" class="btn btn-primary btn-flat m-l-5 my-list-btn" onclick="openAddProductModal('{{ $item->id }}')"><i class="ti-plus"></i></button>
                                                @if ($item->is_active == '1')
                                                <button type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" onclick="changeStatus('{{ $item->id }}', '0', '/combo/change-status')">
                                                    <i class="ti-control-pause"></i>
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-default btn-flat m-l-5 my-list-btn" onclick="changeStatus('{{ $item->id }}', '1', '/combo/change-status')">
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

<!-- Modal Add product -->
<div class="modal fade" id="add-product">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <strong>Chọn sản phẩm</strong>
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-8">
                            <select class="form-control form-white" id="selectProduct">
                                
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="number" min="0" class="form-control form-white" placeholder="Số lượng" id="quantity" />
                        </div>
                        <input type="hidden" id="comboId" value="" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light save-product" onclick="addProduct()">OK</button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- Modal Show products -->
<div class="modal fade" id="show-product">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong><span id="modalComboName"></span></strong>
                </h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody id="showProductBody">

                        <tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" class="combo-id" value="" id="selectedComboId">
                <button type="button" class="btn btn-primary waves-effect" id="saveChangedData">Lưu</button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->
<script type="text/javascript">
    
    let url = window.location.origin;
    let productIds = [];
    let productQuantity = [];

    $('#saveChangedData').click(function() {

        getProductInfo();
        
        let check = true;
        for (let i = 0; i < productQuantity.length; ++i) {
            if (productQuantity[i] == '') {
                check = false;
            }
        }

        if (!check) {
            alert('Cần nhập đủ số lượng');
        } else {
            $.ajax({
                url: url + '/bw-admin/combo/change-products',
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    combo_id: $('#selectedComboId').val(),
                    product_ids: productIds,
                    product_quantity: productQuantity
                },
                success: function (res) {
                    alert(res.msg);
                },
                error: function (error) { 
                    alert(error.responseJSON.msg);
                }
            });
        }
    });

    function openAddProductModal(comboId) {
        $.ajax({
            url: url + '/bw-admin/combo/get-unselected-products',
            method: 'GET',
            data: {
                combo_id: comboId
            },
            success: function (res) {
                let combo_id = '';
                let html = '<option value=""></option>';
                if (res.data.length > 0) {
                    $.each(res.data, function(key, value){
                        html += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('#selectProduct').html(html);
                }
            },
            error: function (error) { 
                alert(error.responseJSON.msg);
            }
        });

        $('#comboId').val(comboId);
        $('#add-product').modal('show');
    }

    function addProduct() {
        let comboId = $('#comboId').val();
        let productId = $('#selectProduct').val();
        let quantity = $('#quantity').val();
        if (productId == '' || productId <= 0 || quantity == '' || quantity <= 0) {
            alert("Cần nhập đủ thông tin");
        } else {
            $.ajax({
                url: url + '/bw-admin/combo/add-product',
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    combo_id: comboId,
                    product_id: productId,
                    quantity: quantity
                },
                success: function (res) {
                    alert(res.msg);
                    location.reload();
                },
                error: function (error) { 
                    alert(error.responseJSON.msg);
                }
            });
        }
    }

    function showProducts(comboId, comboName) {
        $.ajax({
            url: url + '/bw-admin/combo/get-products',
            method: 'GET',
            data: {
                combo_id: comboId
            },
            success: function (res) {
                let combo_id = '';
                let html = '';
                if (res.data.length > 0) {
                    $.each(res.data, function(key, value){
                        let baseUrl = "{{ asset('') }}";
                        if (value.product.image != '') {
                            imgUrl = baseUrl + value.product.image;
                        } else {
                            imgUrl = baseUrl + 'images/no-image-available-list.jpg';
                        }
                        html += '<tr>';
                        html += '<td>' + (key + 1) + '</td>';
                        html += '<td><img style="max-height: 80px;" src="' + imgUrl + '"></td>';
                        html += '<td>' + value.product.name + '</td>';
                        html += '<td><input type="text" class="form-control product-quantity" value="' + value.quantity + '"></td>';
                        html += '<td><button type="button" class="btn btn-danger btn-flat m-l-5 my-list-btn" onclick="removeRow($(this))"><i class="ti-trash"></i></button></td>';
                        html += '<input type="hidden" class="product-id" value="' + value.product_id + '">';
                        html += '</tr>';

                        combo_id = value.combo_id;
                    });
                    $('#showProductBody').html(html);
                }
                $('#modalComboName').text(comboName);
                $('#selectedComboId').val(combo_id);
                $('#show-product').modal('show');
            },
            error: function (error) { 
                alert(error.responseJSON.msg);
            }
        });
    }

    function getProductInfo() {
        productIds = [];
        productQuantity = [];
        $('.product-id').each(function(){
            productIds.push(this.value); 
        });
        $('.product-quantity').each(function(){
            productQuantity.push(this.value); 
        });
    }

    function removeRow(thiss) {
        var r = confirm("Chắc chắn xoá?");
        if (r == true) {
            thiss.closest('tr').remove();
        } else {}
    }
</script>
@endsection
