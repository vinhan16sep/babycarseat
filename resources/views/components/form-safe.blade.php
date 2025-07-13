@php
    $products = empty($products) ? \App\Models\Product::getAllProductNames() : $products;
@endphp
<section class="form-safe header-default header-fullwidth" style="margin-top: 50px;margin-bottom: 50px;">
    <div class="container-fluid" style="padding: 0;">
         <div class="row">
            <div class="col-md-7 form-safe-content">
                <h1>Đăng ký tham gia chương trình<br>
                    Ghế Ô Tô An Toàn</h1>
                    <p class="desc">Vui lòng điền đầy đủ thông tin dưới đây để đăng ký tham gia<br>
chương trình "Ghế Ô Tô An Toàn". Các trường có dấu (<span class="require">*</span>) là bắt buộc
                    </p>
                    <form method="POST" action="{{ route('store-formsafe') }}" enctype="multipart/form-data" id="formSafeForm">
                        @csrf
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">Thông tin liên lạc</label>
                                    <input type="text"  name="name" class="form-control" id="name" placeholder="Họ và tên *" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="Số điện thoại *" required>
                                </div>
                                <div class="col">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email *" required>
                                </div>
                            </div>
                        </div>
                         <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Địa chỉ nhận hàng *" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">Thông tin sản phẩm</label>
                                    <select class=" form-label form-select mt-2" name="product_code" id="product_code" required placeholder="Mã số hóa đơn hoặc mã bảo hành *">
                                        <option value="">Mã sản phẩm *</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product }}">{{ $product }}</option>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <input type="text" name="code" class="form-control" id="code" placeholder="Mã bảo hành/ mã hóa đơn *" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">Ngày mua ghế ô tô Babyro <span class="require">*</span></label>
                                    <input type="date" name="by_date" class="form-control" id="by_date" placeholder="Ngày mua ghế ô tô Babyro *" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">Thông Tin Tai Nạn/Ghế Ô Tô</label>
                                    <p class="desc">Biên bản tai nạn giao thông (đính kèm bản sao)*</p>
                                    <label for="file-upload" class="custom-file-upload btn btn-primary tf-btn btn-fill btn-white">
                                        Chọn tệp
                                    </label>
                                    <span id="file-upload-name" class="ms-2 align-middle" style="font-style:italic; position:relative; top:-13px;"></span>
                                    <input type="file" id="file-upload" name="report_images" required accept="image/*" />

                                    <p class="desc">Hình ảnh hiện trường tai nạn và tình trạng ghế ô tô (đính kèm)</p>
                                    <label for="env_images" class="custom-file-upload btn btn-primary tf-btn btn-fill btn-white">
                                        Chọn tệp
                                    </label>
                                    <span id="env_images-name" class="ms-2 align-middle" style="font-style:italic; position:relative; top:-13px;"></span>
                                    <input type="file" id="env_images" name="env_images" accept="image/*" />
                                    <p class="desc">Video hiện trường vui lòng gửi mail tới <a style="color:#374ea1" href="mailto:info@babyro.com.vn ">info@babyro.com.vn</a></p>
                                </div>
                            </div>
                        </div>
                         <div class="mb-3">
                            <div class="row g-2">
                                <div class="col white-space-normal-mb">
                                    <input type="checkbox" id="agree" name="agree" value="1" style="display: inline;margin: 0 7px 0 7px;height: 15px;transform: scale(1.7);accent-color: #374ea1;">
                                    <label class="desc" style="display: inline;white-space: pre-line">Tôi xác nhận rằng các thông tin cung cấp trên là chính xác và đầy đủ. Tôi đồng ý tham gia
chương trình “Ghế Ô Tô An Toàn” theo các điều khoản của Babyro.</label>
                                </div>
                            </div>
                        </div>
                        <div id="formSafeAlert" style="display:none;"></div>
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col">
                                    <label for="btnSubmit" class="form-label form-label" style="display: block;">Tôi đồng ý và cam kết</label>
                                    <button for="btnSubmit" style="border-color: unset;" type="submit" class="btn-send btn btn-danger" id="btn-confirm" disabled>Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="col-md-5">
                <div class="card content-hau-mai d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <img style="filter:unset" src="{{ asset("/icon/icons home-05.png")  }}" alt="">
                            <div class="css-text">
                                Chương trình<br>
                                ĐỔI GHẾ MIỄN PHÍ
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
        var agree = document.getElementById('agree');
        var btn = document.getElementById('btn-confirm');
        var form = document.getElementById('formSafeForm');
        var alertBox = document.getElementById('formSafeAlert');
        var fileUpload = document.getElementById('file-upload');
        var envImages = document.getElementById('env_images');
        var fileUploadName = document.getElementById('file-upload-name');
        var envImagesName = document.getElementById('env_images-name');
        var byDate = document.getElementById('by_date');
        function checkForm() {
            var requiredFields = ['name', 'phone', 'email', 'address', 'product_code', 'by_date', 'code'];
            var valid = agree.checked;
            requiredFields.forEach(function(id) {
                var el = document.getElementById(id);
                if (!el || !el.value) valid = false;
            });
            // Kiểm tra file report_images (bắt buộc phải có file)
            if (!fileUpload.files.length) valid = false;
            btn.disabled = !valid;
        }
        agree.addEventListener('change', checkForm);
        form.querySelectorAll('input,select').forEach(function(el) {
            el.addEventListener('input', checkForm);
            el.addEventListener('change', checkForm);
        });
        // Hiển thị tên file đã chọn
        fileUpload.addEventListener('change', function() {
            fileUploadName.textContent = fileUpload.files.length ? fileUpload.files[0].name : '';
            validateFileSize('file-upload');
            checkForm();
        });
        envImages.addEventListener('change', function() {
            envImagesName.textContent = envImages.files.length ? envImages.files[0].name : '';
            validateFileSize('env_images');
            checkForm();
        });
        // Validate file size < 10MB cho cả 2 file
        function validateFileSize(inputId) {
            var input = document.getElementById(inputId);
            if (input && input.files && input.files[0]) {
                if (input.files[0].size > 10 * 1024 * 1024) {
                    alertBox.innerHTML = '<div class="alert alert-danger">Dung lượng ảnh phải nhỏ hơn 10MB.</div>';
                    alertBox.style.display = 'block';
                    input.value = '';
                    if(inputId==='file-upload') fileUploadName.textContent = '';
                    if(inputId==='env_images') envImagesName.textContent = '';
                    checkForm();
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
            if (!validateFileSize('file-upload') || !validateFileSize('env_images')) {
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
                    envImagesName.textContent = '';
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
        // Khởi tạo trạng thái ban đầu
        checkForm();
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
