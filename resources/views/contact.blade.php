
@extends('layouts.app')

@section('meta_title', "Liên hệ")
@section('meta_keyword', "Liên hệ")
@section('meta_description', "Liên hệ")
@section('meta_image', "Liên hệ")

@section('content')

    <!-- page-title -->
    <div class="page-title" style="background-image: url(images/section/page-title.jpg);">
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <h3 class="heading text-center">Contact Us</h3>
                    <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                        <li>
                            <a class="link" href="index.html">Homepage</a>
                        </li>
                        <li>
                            <i class="icon-arrRight"></i>
                        </li>
                        <li>
                            <a class="link" href="#">Pages</a>
                        </li>
                        <li>
                            <i class="icon-arrRight"></i>
                        </li>
                        <li>
                            Contact Us
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- Store locations -->
    <section class="flat-spacing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-us-map">
                        <div class="wrap-map">
                            <iframe src="{{ $contactInformations['google_map_hn'] }}" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="right">
                            <h4>Information</h4>
                            <div class="mb_20">
                                <div class="text-title mb_8">Phone:</div>
                                <p class="text-secondary">+1 666 234 8888</p>
                            </div>
                            <div class="mb_20">
                                <div class="text-title mb_8">Email:</div>
                                <p class="text-secondary">themesflat@gmail.com</p>
                            </div>
                            <div class="mb_20">
                                <div class="text-title mb_8">Address:</div>
                                <p class="text-secondary">2163 Phillips Gap Rd, West Jefferson, North Carolina, United States</p>
                            </div>
                            <div>
                                <div class="text-title mb_8">Open Time:</div>
                                <p class="mb_4 open-time">
                                    <span class="text-secondary">Mon - Sat:</span> 7:30am - 8:00pm PST
                                </p>
                                <p class="open-time">
                                    <span class="text-secondary">Sunday:</span> 9:00am - 5:00pm PST
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Store locations -->

    <!-- Get In Touch -->
    <section class="flat-spacing pt-0">
        <fieldset class="container">
            <div class="heading-section text-center">
                <h3 class="heading">Liên hệ</h3>
{{--                <p class="subheading">Use the form below to get in touch with the sales team</p>--}}
            </div>
            <form id="contactform" action="https://themesflat.co/html/modave/contact/contact-process.php" method="post" class="form-leave-comment">
                <div class="wrap">
                    <div class="row">
                        <fieldset class="col-md-4" style="margin-bottom: 10px;">
                            <input class="" type="text" placeholder="Họ và tên*" name="name" id="name" tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="col-md-4" style="margin-bottom: 10px;">
                            <input class="" type="email" placeholder="Địa chỉ email*" name="email" id="email" tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="col-md-4" style="margin-bottom: 10px;">
                            <input class="" type="text" placeholder="Số điện thoại*" name="phone" id="phone" tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                    </div>
                    <fieldset class="">
                        <textarea name="message" id="message" rows="4" placeholder="Lời nhắn" tabindex="2" aria-required="true"></textarea>
                    </fieldset>
                </div>
                <div class="button-submit send-wrap">
                    <button class="tf-btn btn-fill" type="submit" id="submitFormContact">
                        <span class="text text-button">Gửi</span>
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- /Get In Touch -->
@endsection


@section('script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection
