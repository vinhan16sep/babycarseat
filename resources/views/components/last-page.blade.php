<style>
    .content-hau-mai a{
        width: auto;
        /*padding-bottom: 10px;*/
        background: transparent;
        border-radius: 50px;
    }
    .content-hau-mai div.mt-auto:hover a{
        /*color:#d21e50;*/
    }
    .content-hau-mai div.mt-auto{
        /*padding: 15px 30px;*/
        /*padding-bottom: 5px;*/
        /*background: gray;*/
        /*border: 1px solid gray;*/
        /*margin-top: 20px;*/
        /*border-radius: 6px;*/
        /*color: #fff;*/
        /*font-size: 20px;*/
        /*width: 180px;*/
        /*text-align: center;*/
        /*color:#d21e50;*/
    }
    /*.content-hau-mai div.mt-auto:hover{*/
    /*    background: transparent;*/
    /*}*/
    /*.content-hau-mai a, .card-body.d-flex.flex-column a:hover{*/
    /*    position: relative;*/
    /*}*/
    /*.card-body.d-flex.flex-column div.mt-auto:hover a::before{*/
    /*    width: 100%;*/
    /*    left: 0;*/
    /*    right: auto;*/
    /*}*/
    /*.card-body.d-flex.flex-column a::before{*/
    /*    content: "";*/
    /*    width: 0;*/
    /*    height: 1px;*/
    /*    top: 80%;*/
    /*    position: absolute;*/
    /*    left: auto;*/
    /*    right: 0;*/
    /*    z-index: 1;*/
    /*    -webkit-transition: width 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) 0s;*/
    /*    -o-transition: width 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) 0s;*/
    /*    transition: width 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) 0s;*/
    /*    background: #d21e50;*/
    /*}*/
</style>
<!-- Testimonial -->
<section class="flat-spacing pt-0 custom-say home-padding" style="{{ !empty($is_border) ? 'border-top: 1px solid #e9e9e9;' : '' }}">
    <div class="box-hau-mai">
        <div class="title">
            <h3>Chính sách hậu mãi</h3>
        </div>
        <div class="row">
            <div class="col-lg-6" style="margin-bottom: 20px;">
                <div class="card  h-100 content-hau-mai d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <img src="{{ asset("/icon/icons home-06.png")  }}" alt="">
                            <div class="css-text">
                                Chương trình<br>
                                Ghế an toàn Babyro care
                            </div>
                        </div>
                        <p>Tại BABYRO, chúng tôi hiểu rằng an toàn của những hành khách nhỏ là ưu tiên hàng đầu. Vì vậy, khi mua sản phẩm của chúng tôi, bạn có thể tham gia Chương Trình Ghế An Toàn BABYRO và được thay thế miễn phí ghế ô tô đã gặp tai nạn bằng một ghế mới.</p>
                        <br>
                        <div class="mt-auto">
                            <a href="" class="tf-btn btn-fill btn-white"><span class="text">Xem thêm</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="margin-bottom: 20px;">
                <div class="card  h-100 content-hau-mai d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <img src="{{ asset("/icon/icons home-07.png")  }}" alt="">
                            <div class="css-text">
                                Năm<br>
                                bảo hành
                            </div>
                        </div>
                        <p>Bảo hành 10 năm để đáp ứng nhu cầu và mong đợi của khách hàng, chúng tôi cung cấp tùy chọn bảo hành mở rộng, kéo dài 10 năm và cho phép bạn sửa chữa hoặc thay thế miễn phí bộ phận bị hỏng của ghế ô tô.</p>
                        <br>
                        <div class="mt-auto">
                            <a href="" class="tf-btn btn-fill btn-white"><span class="text">Xem thêm</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-0 home-padding" style="background: rgba(134, 121, 121, 0.1);" style="{{ !empty($is_border) ? 'border-top: 1px solid #e9e9e9;' : '' }}">
    @if(empty($is_not_show) && $feedback)
        <div class="box-custom-say">
            <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading" style="color:black;">Công nghệ vẹn tròn yêu thương!</h3>
                {{--                <p class="subheading">Our customers adore our products, and we constantly aim to delight them.</p>--}}
            </div>
            <div dir="ltr" class="swiper tf-sw-testimonial" data-preview="3" data-tablet="2" data-mobile="1"
                 data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1"
                 data-pagination-lg="1">
                 <div class="swiper-wrapper">
                    @foreach ($feedback as $index => $item)
                        <div class="swiper-slide">
                            <div class="testimonial-item style-row hover-img wow fadeInUp" data-wow-delay="{{ $index * 0.1 }}s">
                                <div class="img-style">
                                    <img data-src="{{ $item['image'] }}" src="{{ asset($item['image']) }}" alt="img-testimonial">
                                </div>
                                <div class="content">
                                    <div class="content-top">
                                        <div class="list-star-default">
                                            @for ($i = 0; $i < $item['rate']; $i++)
                                                <i class="icon icon-star"></i>
                                            @endfor
                                            @for ($i = $item['rate']; $i < 5; $i++)
                                                <i class="icon icon-star" style="opacity: 0.3;"></i> {{-- sao mờ nếu chưa đủ 5 --}}
                                            @endfor
                                        </div>
                                        <p class="text-secondary">{!! $item['description'] !!}</p>
                                        <div class="box-author">
                                            <div class="text-title author">{{ $item['rate_by'] }}</div>
                                            <img class="customer-tick" src="{{ asset('images/CustomerSay-tick.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="sw-pagination-testimonial sw-dots type-circle d-flex justify-content-center"></div>
            </div>
        </div>
    @endif
</section>
<!-- /Testimonial -->
