
@extends('layouts.app')

@section('meta_title', "Liên hệ")
@section('meta_keyword', "Liên hệ")
@section('meta_description', "Liên hệ")
@section('meta_image', "Liên hệ")

@section('content')

    <div class="bz_inner_page_navigation float_left">
      <div class="container custom_container">
        <div class="inner_menu float_left">
          <ul>
            <li>
              <a href="#">
                <span>
                  <i class="fas fa-home"></i>
                </span>
              </a>
            </li>
            <li class="active">
              <a href="#">
                <span>
                  <i class="fas fa-angle-right"></i>
                </span> Liên hệ </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="bz_product_grid_content_main_wrapper float_left">
      <div class="container custom_container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
              <div class="contact_box">
                <h3>HÀ NỘI</h3>
                <p>{{ $contactInformations['address_hn'] }}</p>
                <div class="contact_icon">
                  <span>
                    <i class="fas fa-map-marker-alt"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="contact_box">
                <h3>TP HỒ CHÍ MINH</h3>
                <p>{{ $contactInformations['address_hcm'] }}</p>
                <div class="contact_icon">
                  <span>
                    <i class="fas fa-map-marker-alt"></i>
                  </span>
                </div>
              </div>
            </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="contact_box">
              <h3>SỐ ĐIỆN THOẠI</h3>
              <p>HÀ NỘI: {{ $contactInformations['phone_hn'] }}</p>
              <p>HỒ CHÍ MINH: {{ $contactInformations['phone_hcm'] }}</p>
              <div class="contact_icon">
                <span>
                  <i class="fas fa-phone"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="contact_box">
              <h3>Email</h3>
              <a href="#">
                <span class="__cf_email__" data-cfemail="cfbcbba0bdaa8faab7aea2bfa3aae1aca0a2">[email&#160;protected]</span>
              </a>
              <a href="#">
                <span class="__cf_email__" data-cfemail="3a494e55485f7a5f425b574a565f14595557">[email&#160;protected]</span>
              </a>
              <div class="contact_icon">
                <span>
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <div class="bs_map_main_wrapper float_left">
                    <iframe src="{{ $contactInformations['google_map_hn'] }}" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                  </div>
            </div>
            <div class="col-md-6">
                
    <div class="bs_map_main_wrapper float_left">
        <iframe src="{{ $contactInformations['google_map_hcm'] }}" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
            </div>
        </div>
    </div>
    <div class="bz_leave_msg_main_wrapper float_left">
      <div class="container customer_container">
        <div class="contact_us_form">
          <h3>Gửi tin nhắn cho chúng tôi</h3>
          <form method="POST" action="{{ route("contact.store") }}" class="contact" id="contact">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
              <div class="col-md-4 col-12 mar_bot">
                <input type="text" name="name" class="require" placeholder="Họ và tên*">
                <i class="fas fa-user"></i>
              </div>
              <div class="col-md-4 col-12 mar_bot">
                <input type="email" name="email" class="require" data-valid="email" data-error="Email should be valid." placeholder="Địa chỉ Email*">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="col-md-4 col-12 mar_bot">
                <input type="text" name="phone" class="require" placeholder="Số điện thoại*">
                <i class="fas fa-phone"></i>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12 col-12">
                <textarea name="message" class="require" rows="4" placeholder="Nội dung"></textarea>
                <div class="response"></div>
                <input type="hidden" name="form_type" value="contact">
                <button type="button" class="submitForm ewr_btn_yellow submit_btn" id="submitFormContact">Gửi</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
@endsection


@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
