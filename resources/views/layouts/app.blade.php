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
    <meta name="keywords" content="@yield('meta_keyword', $site_settings['meta_keyword'] ?? '')"/>
    <meta name="description" content="@yield('meta_description', $site_settings['meta_description'] ?? '')"/>
    <link rel="canonical" href="@yield('canonical', url()->current())"/>

    <!-- for Facebook -->
    <meta property="og:title" content="@yield('meta_title', $site_settings['meta_title'] ?? '')"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="@yield('meta_image', asset($site_settings['meta_image'] ?? ''))"/>
    <meta property="og:url" content="@yield('canonical', url()->current())"/>
    <meta property="og:description" content="@yield('meta_description', $site_settings['meta_description'] ?? '')"/>
    <meta property="og:site_name" content="{{ \Request::getHost() }}"/>

    <!-- for Twitter -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="@yield('meta_title', $site_settings['meta_title'] ?? '')"/>
    <meta name="twitter:description" content="@yield('meta_description', $site_settings['meta_description'] ?? '')"/>
    <meta name="twitter:image" content="@yield('meta_image', asset($site_settings['meta_image'] ?? ''))"/>
    <link rel="icon" href="{{ asset("icon/cropped-favico-1-32x32.png") }}" sizes="32x32"/>
    <link rel="icon" href="{{ asset("icon/cropped-favico-1-192x192.png") }}" sizes="192x192"/>
    <link rel="apple-touch-icon" href="{{ asset("icon/cropped-favico-1-180x180.png") }}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('fonts/fonts.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-icons.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css?v=' . ($ver ?? '')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css?v=' . ($ver ?? '')) }}"/>
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/logo/favicon.png') }}">
    @yield('css')
    <script>
        var BASE_URL = '{{ Url('/') }}';
        var HOME_URL = '{{ route("home") }}';
    </script>
</head>
<body>
{{--Show message--}}
@include("components.message")

<!-- Scroll Top -->
<button id="scroll-top">
    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_15741_24194)">
            <path
                d="M3 11.9175L12 2.91748L21 11.9175H16.5V20.1675C16.5 20.3664 16.421 20.5572 16.2803 20.6978C16.1397 20.8385 15.9489 20.9175 15.75 20.9175H8.25C8.05109 20.9175 7.86032 20.8385 7.71967 20.6978C7.57902 20.5572 7.5 20.3664 7.5 20.1675V11.9175H3Z"
                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </g>
        <defs>
            <clipPath id="clip0_15741_24194">
                <rect width="24" height="24" fill="white" transform="translate(0 0.66748)"/>
            </clipPath>
        </defs>
    </svg>
</button>

<!-- preload -->
<div class="preload preload-container">
    <div class="preload-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- /preload -->

<div id="wrapper">

    <!-- Top Bar-->
    <div class="tf-topbar bg-main">
        <div class="container">
            <div class="tf-topbar_wrap d-flex align-items-center justify-content-center justify-content-xl-between">

                <ul class="topbar-left">
                </ul>
                <div class="topbar-right d-none d-xl-block">
                    <ul class="topbar-left">
                        <li><a class="text-caption-1 text-white" href="tel:{{ $contactInformations['hotline'] }}">{{ $contactInformations['hotline'] }}</a></li>
                        <li><a class="text-caption-1 text-white" href="#">{{ $contactInformations['email'] }}</a></li>
                    </ul>

{{--                    <div class="tf-cur justify-content-end">--}}
{{--                        <div class="tf-currencies">--}}
{{--                            <select class="image-select center style-default type-currencies color-white">--}}
{{--                                <option selected data-thumbnail="images/country/us.svg">USD</option>--}}
{{--                                <option data-thumbnail="images/country/vn.svg">VND</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="tf-languages">--}}
{{--                            <select class="image-select center style-default type-languages color-white">--}}
{{--                                <option>English</option>--}}
{{--                                <option>Vietnam</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- /Top Bar -->

    <!-- Header -->
    @include('layouts.header')

    @yield('content')

    @include("layouts.footer")


    @include("components.message")
</div>

<!-- Javascript -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js?v=' . ($ver ?? '')) }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.min.js?v=' . ($ver ?? '')) }}"></script>
<script type="text/javascript" src="{{ asset('js/swiper-bundle.min.js?v=' . ($ver ?? '')) }}"></script>
<script type="text/javascript" src="{{ asset('js/carousel.js?v=' . ($ver ?? '')) }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js?v=' . ($ver ?? '')) }}"></script>
<script type="text/javascript" src="{{ asset('js/lazysize.min.js?v=' . ($ver ?? '')) }}"></script>
<script type="text/javascript" src="{{ asset('js/count-down.js?v=' . ($ver ?? '')) }}"></script>
<script type="text/javascript" src="{{ asset('js/wow.min.js?v=' . ($ver ?? '')) }}"></script>
<script type="text/javascript" src="{{ asset('js/multiple-modal.js?v=' . ($ver ?? '')) }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js?v=' . ($ver ?? '')) }}"></script>

<script src="{{ asset('js/sibforms.js?v=' . ($ver ?? '')) }}" defer></script>

<script>
    window.REQUIRED_CODE_ERROR_MESSAGE = 'Please choose a country code';
    window.LOCALE = 'en';
    window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "The information provided is invalid. Please review the field format and try again.";

    window.REQUIRED_ERROR_MESSAGE = "This field cannot be left blank. ";

    window.GENERIC_INVALID_MESSAGE = "The information provided is invalid. Please review the field format and try again.";

    window.translation = {
        common: {
            selectedList: '{quantity} list selected',
            selectedLists: '{quantity} lists selected'
        }
    };

    var AUTOHIDE = Boolean(0);
</script>

@yield('script')

{{--<script src="{{ asset('js/custom.js?v=' . ($ver ?? '')) }}"></script>--}}

<script>
    $(document).on('keypress', 'input[data-type="number"]', function (e) {
        if (!(e.keyCode >= 46 && e.keyCode <= 57 && e.keyCode != 47)) {
            e.preventDefault();
        }
    });
    $(document).on("keyup blur", 'input[data-type="number"]', function () {
        let valueUpdate = 0;
        const value = this.value.replace(/,/g, '');
        let valueNew = parseFloat(value).toLocaleString('en-US', {
            style: 'decimal',
            maximumFractionDigits: 0,
            minimumFractionDigits: 0
        });
        this.value = valueNew != "NaN" ? valueNew : valueUpdate;
    });
    $(document).on("paste drop", 'input[data-type="number"]', function () {
        return false;
    });
    if ($('input[data-type="number"]').length > 0) {
        $('input[data-type="number"]').trigger("blur");
    }
</script>
</body>
</html>
