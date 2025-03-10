<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js">
    <![endif]-->
    <!--[if IE 9]>
    <html lang="en" class="ie9 no-js">
        <![endif]-->
        <!--[if !IE]><!-->
        <html lang="vi-VN">
            <!--[endif]-->
            <head>
                <meta charset="utf-8">
                <title>@yield('meta_title', $site_settings['meta_title'] ?? '')</title>
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <meta name="author" content="">
                <meta name="MobileOptimized" content="320">

                <!-- for Google -->
                <meta name="keywords" content="@yield('meta_keyword', $site_settings['meta_keyword'] ?? '')" />
                <meta name="description" content="@yield('meta_description', $site_settings['meta_description'] ?? '')" />
                <link rel="canonical" href="@yield('canonical', url()->current())" />

                <!-- for Facebook -->
                <meta property="og:title" content="@yield('meta_title', $site_settings['meta_title'] ?? '')" />
                <meta property="og:type" content="article" />
                <meta property="og:image" content="@yield('meta_image', asset($site_settings['meta_image'] ?? ''))" />
                <meta property="og:url" content="@yield('canonical', url()->current())" />
                <meta property="og:description" content="@yield('meta_description', $site_settings['meta_description'] ?? '')" />
                <meta property="og:site_name" content="{{ \Request::getHost() }}" />

                <!-- for Twitter -->          
                <meta name="twitter:card" content="summary" />
                <meta name="twitter:title" content="@yield('meta_title', $site_settings['meta_title'] ?? '')" />
                <meta name="twitter:description" content="@yield('meta_description', $site_settings['meta_description'] ?? '')" />
                <meta name="twitter:image" content="@yield('meta_image', asset($site_settings['meta_image'] ?? ''))" />
                <link rel="icon" href="{{ asset("icon/cropped-favico-1-32x32.png") }}" sizes="32x32"/>
                <link rel="icon" href="{{ asset("icon/cropped-favico-1-192x192.png") }}" sizes="192x192"/>
                <link rel="apple-touch-icon" href="{{ asset("icon/cropped-favico-1-180x180.png") }}"/>
                
                <!-- CSRF Token -->
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css?v=' . ($ver ?? '')) }}">
                <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css?v=' . ($ver ?? '')) }}">
                <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css?v=' . ($ver ?? '')) }}">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lemonada">
                @yield('css')
                <script>
                    var BASE_URL = '{{ Url('/') }}';
                    var HOME_URL = '{{ route("home") }}';
                </script>
            </head>
            <body>
                <div id="preloader">
                    <div id="status">
                        <img src="{{ asset('images/preloader.gif') }}" id="preloader_image" alt="loader">
                    </div>
                </div>
                <!-- <div class="modal fade" id="myModal3" role="dialog">
                    <div class="modal-dialog modal_electronic">
                        <div class="modal-content">
                            <div class="lingerie_header electronic_header_close">
                                <button type="button" class="close" data-dismiss="modal">
                                    <svg version="1.1" id="Capa_e" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 496.096 496.096" style="enable-background:new 0 0 496.096 496.096;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M259.41,247.998L493.754,13.654c3.123-3.124,3.123-8.188,0-11.312c-3.124-3.123-8.188-3.123-11.312,0L248.098,236.686
                                                    L13.754,2.342C10.576-0.727,5.512-0.639,2.442,2.539c-2.994,3.1-2.994,8.015,0,11.115l234.344,234.344L2.442,482.342
                                                    c-3.178,3.07-3.266,8.134-0.196,11.312s8.134,3.266,11.312,0.196c0.067-0.064,0.132-0.13,0.196-0.196L248.098,259.31
                                                    l234.344,234.344c3.178,3.07,8.242,2.982,11.312-0.196c2.995-3.1,2.995-8.016,0-11.116L259.41,247.998z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4 class="title">SIGN UP FOR NEWSLETTER</h4>
                                <p>Lorem Ipsum is simply dummy text printing and typesetting industry an the Ipsum has been the industrys standard...</p>
                                <form id="mc-form" class="electronic_popupe_btn">
                                    <input id="mc-email" class="input-block-level" type="email" placeholder="Email Address" required="">
                                    <button class="btn1" type="submit">Subscribe</button>
                                    <div class="electronic_radio">
                                        <input type="checkbox" id="popup">
                                        <label> Do not show popup again</label><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="pd_header_main_wrapper bz_furniture_header_wrapper bz_wins_header_wrapper float_left">
                    @include('layouts.header')
                    @include('layouts.mobile-header')
                </div>
                @yield('content')

                <div class="bz_bottom_footer_main_wrapper wins_footer_main_wrapper float_left">
                    @include("layouts.footer")
                </div>

                @include("components.message")
                
{{--                <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>--}}
                <script src="{{ asset('js/jquery-3.3.1.min.js?v=' . ($ver ?? '')) }}"></script>
                <script src="{{ asset('js/bootstrap.min.js?v=' . ($ver ?? '')) }}"></script>
                <script src="{{ asset('js/owl.carousel.js?v=' . ($ver ?? '')) }}"></script>
                <script src="{{ asset('js/jquery.magnific-popup.js?v=' . ($ver ?? '')) }}"></script>
                @yield('script')
                
                <script src="{{ asset('js/custom.js?v=' . ($ver ?? '')) }}"></script>
                <script src="{{ asset('js/jquery.waypoints.min.js?v=' . ($ver ?? '')) }}"></script>
                <script src="{{ asset('js/jquery.nice-number.js?v=' . ($ver ?? '')) }}"></script>
                <script async="" defer="" src="../../../maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
                <script>
                    // CountDown Js
                    var deadline = 'november 15 2022 11:59:00 GMT-0400';

                    function time_remaining(endtime) {
                        var t = Date.parse(endtime) - Date.parse(new Date());
                        var seconds = Math.floor((t / 1000) % 60);
                        var minutes = Math.floor((t / 1000 / 60) % 60);
                        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                        var days = Math.floor(t / (1000 * 60 * 60 * 24));
                        return {
                            'total': t,
                            'days': days,
                            'hours': hours,
                            'minutes': minutes,
                            'seconds': seconds
                        };
                    }

                    function run_clock(id, endtime) {
                        var clock = document.getElementById(id);

                        // get spans where our clock numbers are held
                        var days_span = clock.querySelector('.days');
                        var hours_span = clock.querySelector('.hours');
                        var minutes_span = clock.querySelector('.minutes');
                        var seconds_span = clock.querySelector('.seconds');

                        function update_clock() {
                            var t = time_remaining(endtime);

                            // update the numbers in each part of the clock
                            days_span.innerHTML = t.days;
                            hours_span.innerHTML = ('0' + t.hours).slice(-2);
                            minutes_span.innerHTML = ('0' + t.minutes).slice(-2);
                            seconds_span.innerHTML = ('0' + t.seconds).slice(-2);

                            if (t.total <= 0) {
                                clearInterval(timeinterval);
                            }
                        }
                        update_clock();
                        var timeinterval = setInterval(update_clock, 1000);
                    }
                    // run_clock('clockdiv', deadline);
                </script>
                <script>
                    $('.top_icon span').click( function(){
                    if ( $(this).hasClass('current') ) {
                       $(this).removeClass('current');
                    } else {
                       $('.top_icon span.current').removeClass('current');
                       $(this).addClass('current');
                    }
                    });
                </script>
                <script>
                    $(function(){
                        $('input[type="number"]').niceNumber();
                    });
                </script>
                <script>
                    // $(window).on('load',function() {
                    //     $('#myModal3').modal('show');
                    // });
                </script>
                <script>
                    // Initialize and add the map
                    function initMap() {
                        // The location of Uluru
                        var uluru = {
                        lat: -25.344,
                        lng: 131.036
                        };
                        // The map, centered at Uluru
                        var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 4,
                        center: uluru
                        });
                        // The marker, positioned at Uluru
                        var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                        });
                    }
                </script>
                
                <script>
                    $(document).on('keypress', 'input[data-type="number"]', function (e) {
                        if (!(e.keyCode >= 46 && e.keyCode <= 57 && e.keyCode != 47)) {
                            e.preventDefault();
                        }
                    });
                    $(document).on("keyup blur", 'input[data-type="number"]', function() {
                        let valueUpdate = 0;
                        const value = this.value.replace(/,/g, '');
                        let valueNew = parseFloat(value).toLocaleString('en-US', {
                            style: 'decimal',
                            maximumFractionDigits: 0,
                            minimumFractionDigits: 0
                        });
                        this.value = valueNew != "NaN" ? valueNew : valueUpdate;
                    });
                    $(document).on("paste drop", 'input[data-type="number"]', function() {
                        return false;
                    });
                    if($('input[data-type="number"]').length > 0){
                        $('input[data-type="number"]').trigger("blur");
                    }
                </script>
            </body>
        </html>
