<style>
    .content-hau-mai a{
        padding: 0;
        width: auto;
        padding-bottom: 10px;
        background: transparent;
    }
    .content-hau-mai div.mt-auto:hover a{
        color:#d21e50;
    }
    .content-hau-mai div.mt-auto{
        padding: 15px 30px;
        padding-bottom: 5px;
        background: gray;
        border: 1px solid gray;
        margin-top: 20px;
        border-radius: 6px;
        color: #fff;
        font-size: 20px;
        width: 180px;
        text-align: center;
        color:#d21e50;
    }
    .content-hau-mai div.mt-auto:hover{
        background: transparent;
    }
    .content-hau-mai a, .card-body.d-flex.flex-column a:hover{
        position: relative;
    }
    .card-body.d-flex.flex-column div.mt-auto:hover a::before{
        width: 100%;
        left: 0;
        right: auto;
    }
    .card-body.d-flex.flex-column a::before{
        content: "";
        width: 0;
        height: 1px;
        top: 80%;
        position: absolute;
        left: auto;
        right: 0;
        z-index: 1;
        -webkit-transition: width 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) 0s;
        -o-transition: width 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) 0s;
        transition: width 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) 0s;
        background: #d21e50;
    }
</style>
<!-- Testimonial -->
<section class="flat-spacing pt-0 custom-say" style="{{ !empty($is_border) ? 'border-top: 1px solid #e9e9e9;' : '' }}">
    <div class="container box-hau-mai">
        <h3>Chính sách hậu mãi</h3>
        <div class="row">
            <div class="col-lg-6" style="margin-bottom: 20px;">
                <div class="card  h-100 content-hau-mai d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h4>Chương trình <br>ghế an toàn babyro care</h4>
                        <p>Tại BABYRO, chúng tôi hiểu rằng an toàn của những hành khách nhỏ là ưu tiên hàng đầu. Vì vậy, khi mua sản phẩm của chúng tôi, bạn có thể tham gia Chương Trình Ghế An Toàn BABYRO và được thay thế miễn phí ghế ô tô đã gặp tai nạn bằng một ghế mới.</p>
                        <br>
                        <div class="mt-auto">
                            <a class="mt-auto" href="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="margin-bottom: 20px;">
                <div class="card  h-100 content-hau-mai d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h4>BẢO HÀNH <span>10</span> NĂM</h4>
                        <p>Bảo hành 10 năm để đáp ứng nhu cầu và mong đợi của khách hàng, chúng tôi cung cấp tùy chọn bảo hành mở rộng, kéo dài 10 năm và cho phép bạn sửa chữa hoặc thay thế miễn phí bộ phận bị hỏng của ghế ô tô.</p>
                        <br>
                        <div class="mt-auto">
                            <a class="mt-auto" href="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(empty($is_not_show))
        <div class="container">
            <div class="heading-section text-center wow fadeInUp">
                <h3 class="heading">Công nghệ trọn vẹn yêu thương!</h3>
                {{--                <p class="subheading">Our customers adore our products, and we constantly aim to delight them.</p>--}}
            </div>
            <div dir="ltr" class="swiper tf-sw-testimonial" data-preview="3" data-tablet="2" data-mobile="1"
                 data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1"
                 data-pagination-lg="1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item style-row hover-img wow fadeInUp" data-wow-delay="0s">
                            <div class="img-style">
                                <img data-src="images/CustomerSay1.png" src="{{ asset('images/CustomerSay1.png') }}"
                                     alt="img-testimonial">
                                {{--                                <a href="#quickView" data-bs-toggle="modal" class="box-icon hover-tooltip center">--}}
                                {{--                                    <span class="icon icon-eye"></span>--}}
                                {{--                                    <span class="tooltip">Quick View</span>--}}
                                {{--                                </a>--}}
                            </div>
                            <div class="content">
                                <div class="content-top">
                                    <div class="list-star-default">
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                    </div>
                                    <p class="text-secondary">"Stylish and high-quality glass vase. Its elegant design
                                        and premium finish make it a perfect choice for any flower display. Highly
                                        recommended!"</p>
                                    <div class="box-author">
                                        <div class="text-title author">Sybil Sharp</div>
                                        <img class="customer-tick" src="{{ asset('images/CustomerSay-tick.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item style-row hover-img wow fadeInUp" data-wow-delay="0.1s">
                            <div class="img-style">
                                <img data-src="images/CustomerSay2.png" src="{{ asset('images/CustomerSay2.png') }}"
                                     alt="img-testimonial">
                                {{--                                <a href="#quickView" data-bs-toggle="modal" class="box-icon hover-tooltip center">--}}
                                {{--                                    <span class="icon icon-eye"></span>--}}
                                {{--                                    <span class="tooltip">Quick View</span>--}}
                                {{--                                </a>--}}
                            </div>
                            <div class="content">
                                <div class="content-top">
                                    <div class="list-star-default">
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                    </div>
                                    <p class="text-secondary">"Stylish and high-quality glass vase. Its elegant design
                                        and premium finish make it a perfect choice for any flower display. Highly
                                        recommended!"</p>
                                    <div class="box-author">
                                        <div class="text-title author">Mark G.</div>
                                        <img class="customer-tick" src="{{ asset('images/CustomerSay-tick.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item style-row hover-img wow fadeInUp" data-wow-delay="0.2s">
                            <div class="img-style">
                                <img data-src="images/CustomerSay3.png" src="{{ asset('images/CustomerSay3.png') }}"
                                     alt="img-testimonial">
                                {{--                                <a href="#quickView" data-bs-toggle="modal" class="box-icon hover-tooltip center">--}}
                                {{--                                    <span class="icon icon-eye"></span>--}}
                                {{--                                    <span class="tooltip">Quick View</span>--}}
                                {{--                                </a>--}}
                            </div>
                            <div class="content">
                                <div class="content-top">
                                    <div class="list-star-default">
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                        <i class="icon icon-star"></i>
                                    </div>
                                    <p class="text-secondary">"Stylish and high-quality glass vase. Its elegant design
                                        and premium finish make it a perfect choice for any flower display. Highly
                                        recommended!"</p>
                                    <div class="box-author">
                                        <div class="text-title author">Sybil Sharp</div>
                                        <img class="customer-tick" src="{{ asset('images/CustomerSay-tick.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-testimonial sw-dots type-circle d-flex justify-content-center"></div>
            </div>
        </div>
    @endif
</section>
<!-- /Testimonial -->
