@php
    $products = empty($products) ? \App\Models\Product::getAllProductNames() : $products;
@endphp
<section class="form-warranty header-default header-fullwidth" style="margin-top: 50px;margin-bottom: 50px;">
    <div class="container-fluid" style="padding: 0;">
         <div class="row">
            <div class="col-md-7 form-warranty-content">
                <h1>Đăng Ký Chương trình<br>
                    Bảo hành vàng 12 năm Babyro</h1>
                    <p class="desc">Vui lòng điền đầy đủ thông tin dưới đây để đăng ký tham gia <br>
chương trình "Bảo hành Vàng 12 năm Babyro". Các trường có dấu (<span class="require">*</span>) là bắt buộc
                    </p>
                    <form method="POST" action="{{ route('store-formwarranty') }}" enctype="multipart/form-data" id="formWarrantyForm">
                        @csrf
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <label for="warranty_name" class="form-label">Thông tin liên lạc</label>
                                    <input type="text"  name="name" class="form-control" id="warranty_name" placeholder="Họ và tên *" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <input type="tel" name="phone" class="form-control" id="warranty_phone" placeholder="Số điện thoại *" required>
                                </div>
                                <div class="col">
                                    <input type="email" name="email" class="form-control" id="warranty_email" placeholder="Email *" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <select class="form-label form-select mt-2" name="product_code" id="warranty_product_code" required placeholder="Mã số hóa đơn hoặc mã bảo hành *">
                                        <option value="">Mã số hóa đơn hoặc mã bảo hành *</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product }}">{{ $product }}</option>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <label for="warranty_by_date" class="form-label">Ngày mua ghế ô tô Babyro <span class="require">*</span></label>
                                    <input type="date" name="by_date" class="form-control" id="warranty_by_date" placeholder="Ngày mua ghế ô tô Babyro *" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <label style="display: block;" for="warranty_file-upload" class="form-label">Hóa đơn bán hàng</label>
                                    <label for="warranty_file-upload" class="custom-file-upload btn btn-primary tf-btn btn-fill btn-white">
                                        Tải lên tài liệu
                                    </label>
                                    <span id="warranty_file-upload-name" class="ms-2 align-middle" style="font-style:italic; position:relative; top:-13px;"></span>
                                    <input type="file" id="warranty_file-upload" name="bill_images" accept="image/*" />
                                </div>
                            </div>
                        </div>
                         <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <input type="checkbox" id="warranty_agree" name="agree" value="1" style="display: inline;margin: 0 7px 0 7px;height: 15px;transform: scale(1.7);accent-color: #d21e50;">
                                    <label class="desc" style="display: inline;">Tôi xác nhận rằng các thông tin cung cấp trên là chính xác và đầy đủ. Tôi đồng ý tham gia<br> chương trình “Ghế Ô Tô An Toàn” theo các điều khoản của Babyro.</label>
                                </div>
                            </div>
                        </div>
                        <div id="formWarrantyAlert" style="display:none;"></div>
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <label for="warranty_btnSubmit" class="form-label form-label" style="display: block;">Tôi đồng ý và cam kết</label>
                                    <button for="warranty_btnSubmit" type="submit" class="btn-send btn btn-danger" id="warranty_btn-confirm" disabled>Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="col-md-5">
                <div class="card content-hau-mai d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <img src="{{ asset("/icon/icons home-06.png")  }}" alt="">
                            <div class="css-text">
                                Chương trình<br>
                                Bảo hành vàng 12 năm Babyro
                            </div>
                        </div>
                        <p>Có câu hỏi hoặc cần trợ giúp khi điền mẫu đơn?<br>
                            Liên hệ với chúng tôi:</p>
                        <br>
                        <h4>support@babyro.uk</h4>
                        <h4>Số điện thoại liên hệ:</h4>
                        <p class="text">0967 8888 68</p>
                        <p class="mt-3">Thứ Hai - Thứ Sáu: 8:00 – 15:00</p>
                    </div>
                </div>
            </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var agree = document.getElementById('warranty_agree');
        var btn = document.getElementById('warranty_btn-confirm');
        var form = document.getElementById('formWarrantyForm');
        var alertBox = document.getElementById('formWarrantyAlert');
        var fileUpload = document.getElementById('warranty_file-upload');
        var fileUploadName = document.getElementById('warranty_file-upload-name');
        var byDate = document.getElementById('warranty_by_date');
        var requiredFields = ['warranty_name', 'warranty_phone', 'warranty_email', 'warranty_product_code', 'warranty_by_date'];
        function checkFormWarranty() {
            var valid = agree.checked;
            requiredFields.forEach(function(id) {
                var el = document.getElementById(id);
                if (!el || !el.value) valid = false;
            });
            btn.disabled = !valid;
        }
        agree.addEventListener('change', checkFormWarranty);
        form.querySelectorAll('input,select').forEach(function(el) {
            el.addEventListener('input', checkFormWarranty);
            el.addEventListener('change', checkFormWarranty);
        });
        fileUpload.addEventListener('change', function() {
            fileUploadName.textContent = fileUpload.files.length ? fileUpload.files[0].name : '';
            validateFileSizeWarranty('warranty_file-upload');
            checkFormWarranty();
        });
        function validateFileSizeWarranty(inputId) {
            var input = document.getElementById(inputId);
            if (input && input.files && input.files[0]) {
                if (input.files[0].size > 10 * 1024 * 1024) {
                    alertBox.innerHTML = '<div class="alert alert-danger">Dung lượng ảnh phải nhỏ hơn 10MB.</div>';
                    alertBox.style.display = 'block';
                    input.value = '';
                    if(inputId==='warranty_file-upload') fileUploadName.textContent = '';
                    checkFormWarranty();
                    return false;
                }
            }
            return true;
        }
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            btn.disabled = true;
            alertBox.style.display = 'none';
            alertBox.innerHTML = '';
            if (!validateFileSizeWarranty('warranty_file-upload')) {
                btn.disabled = false;
                return;
            }
            var formData = new FormData(form);
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData,
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alertBox.innerHTML = '<div class="alert alert-success">' + ( 'Đăng ký thành công!') + '</div>';
                    alertBox.style.display = 'block';
                    setTimeout(function() { alertBox.style.display = 'none'; }, 5000);
                    form.reset();
                    fileUploadName.textContent = '';
                    btn.disabled = true;
                } else {
                    let msg = data.message || 'Đã có lỗi xảy ra.';
                    if (data.errors) {
                        msg += '<ul>' + Object.values(data.errors).map(e => '<li>' + e + '</li>').join('') + '</ul>';
                    }
                    alertBox.innerHTML = '<div class="alert alert-danger">' + msg + '</div>';
                    alertBox.style.display = 'block';
                    setTimeout(function() { alertBox.style.display = 'none'; }, 5000);
                    btn.disabled = false;
                }
            })
            .catch(() => {
                alertBox.innerHTML = '<div class="alert alert-danger">Đã có lỗi xảy ra. Vui lòng thử lại sau.</div>';
                alertBox.style.display = 'block';
                btn.disabled = false;
            });
        });
        checkFormWarranty();
        if (byDate) {
            byDate.addEventListener('focus', function() {
                this.showPicker && this.showPicker();
            });
            byDate.addEventListener('click', function() {
                this.showPicker && this.showPicker();
            });
        }
    });
</script>