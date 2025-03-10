(function($) {
    "use strict";
    var tpj = jQuery;
    var revapi24;
    setTimeout(() => {
        jQuery("#status").fadeOut();
        jQuery("#preloader").delay(10).fadeOut("slow");
    }, 100);
    // jQuery(window).on('load', function() {
    //     jQuery("#status").fadeOut();
    //     jQuery("#preloader").delay(50).fadeOut("slow");
    // });
    jQuery(document).ready(function($) {
        $(window).scroll(function() {
            var window_top = $(window).scrollTop() + 1;
            if (window_top > 160) {
                $('.pd_navigation_wrapper').addClass('menu_fixed animated fadeInDown');
            } else {
                $('.pd_navigation_wrapper').removeClass('menu_fixed animated fadeInDown');
            }
        });
        $('.filter_btn').click(function() {
            $('#filter_form').slideToggle('fast').addClass("demo");
            $(this).val($(this).val() == '+ Filter Option' ? '- Filter Option' : '+ Filter Option');
            return false;
        });
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 100) {
                $('#return-to-top').fadeIn(200);
            } else {
                $('#return-to-top').fadeOut(200);
            }
        });
        $('#return-to-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });
        $('#search_button').on("click", function(e) {
            $('#search_open').slideToggle();
            e.stopPropagation();
        });
        $(document).on("click", function(e) {
            if (!(e.target.closest('#search_open'))) {
                $("#search_open").slideUp();
            }
        });
        $('.fur_single_product_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $('.cosmatics_testi_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                900: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('.product_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 2
                },
                1000: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        });
        $('.mobile_product_slider:not(.mobile_product_slider_detail) .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 3
                },
                1000: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        });

        $('.detail_product_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 4
                },
                600: {
                    items: 4
                },
                900: {
                    items: 4
                },
                1000: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        });
        
        $('.mobile_product_slider.mobile_product_slider_detail .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
        $('.mobile_seller_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                900: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
        $('.discover_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                900: {
                    items: 1
                },
                1000: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        });
        $('.poster_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                900: {
                    items: 1
                },
                1000: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
        $('.post_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
        $('.washing_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                900: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
        });
        $('.camera_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
        });
        $('.related_post_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
        $('.testimonial_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('.blog_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 25,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                900: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        });
        $('.partner_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        });
        $('.mobile_partner_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        });
        $('.delivery_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        });
        $('.bz_home_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('.offer_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplay: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('.fur_testimonial_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplay: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('.new_blog_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplay: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('.company_logo_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
        $('.new_hot_deal_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            autoplay: true,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $('.new_feature_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            autoplay: true,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $('.wins_testimonial_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            autoplay: false,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        });
        $('.wins_update_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            autoplay: true,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        });
        $('.mobile_post_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            autoplay: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        });
        $('.best_slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: false,
            autoplay: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                900: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
        var $winW = function() {
            return $(window).width();
        };
        var $winH = function() {
            return $(window).height();
        };
        var $screensize = function(element) {
            $(element).width($winW()).height($winH());
        };
        var screencheck = function(mediasize) {
            if (typeof window.matchMedia !== "undefined") {
                var screensize = window.matchMedia("(max-width:" + mediasize + "px)");
                if (screensize.matches) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if ($winW() <= mediasize) {
                    return true;
                } else {
                    return false;
                }
            }
        };
        $('.animated-row').each(function() {
            var $this = $(this);
            $this.find('.animate').each(function(i) {
                var $item = $(this);
                var animation = $item.data('animate');
                $item.on('inview', function(event, isInView) {
                    if (isInView) {
                        setTimeout(function() {
                            $item.addClass('animated ' + animation).removeClass('animate');
                        }, i * 50);
                    } else if (!screencheck(767)) {
                        $item.removeClass('animated ' + animation).addClass('animate');
                    }
                });
            });
        });
        $(document).ready(function() {
            $(".collapse.show").each(function() {
                $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
            });
            $(".collapse").on('show.bs.collapse', function() {
                $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
            }).on('hide.bs.collapse', function() {
                $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
            });
        });
        $("#toggle").on("click", function() {
            let sidebarId = "#sidebar";
            var w = $(sidebarId).width();
            var pos = $(sidebarId).offset().left;
            if (pos == 0) {
                $(sidebarId).animate({
                    "left": -w
                }, "slow");
            } else {
                $(sidebarId).animate({
                    "left": "0"
                }, "slow");
            }
        });
        $("#toggle_close").on("click", function() {
            let sidebarId = "#sidebar";
            var w = $(sidebarId).width();
            var pos = $(sidebarId).offset().left;
            if (pos == 0) {
                $(sidebarId).animate({
                    "left": -w
                }, "slow");
            } else {
                $(sidebarId).animate({
                    "left": "0"
                }, "slow");
            }
        });

        $("#toggle_filter").on("click", function() {
            let sidebarId = "#sidebar-filter";
            var w = $(sidebarId).width();
            var pos = $(sidebarId).offset().right;
            if (pos == 0) {
                $(sidebarId).animate({
                    "right": -w
                }, "slow");
            } else {
                $(sidebarId).animate({
                    "right": "0"
                }, "slow");
            }
        });
        $("#toggle_close_filter").on("click", function() {
            let sidebarId = "#sidebar-filter";
            var w = $(sidebarId).width();
            var pos = $(sidebarId).offset().left;
            if (pos == 0) {
                $(sidebarId).animate({
                    "right": "0"
                }, "slow");
            } else {
                $(sidebarId).animate({
                    "right": -w
                }, "slow");
            }
        });
        (function($) {
            $(document).ready(function() {
                $('#cssmenu li.active').addClass('open').children('ul').show();
                $('#cssmenu li.has-sub>a').on('click', function() {
                    $(this).removeAttr('href');
                    var element = $(this).parent('li');
                    if (element.hasClass('open')) {
                        element.removeClass('open');
                        element.find('li').removeClass('open');
                        element.find('ul').slideUp(200);
                    } else {
                        element.addClass('open');
                        element.children('ul').slideDown(200);
                        element.siblings('li').children('ul').slideUp(200);
                        element.siblings('li').removeClass('open');
                        element.siblings('li').find('li').removeClass('open');
                        element.siblings('li').find('ul').slideUp(200);
                    }
                });

                $('#cssmenu-filter li.active').addClass('open').children('ul').show();
                $('#cssmenu-filter li.has-sub>a').on('click', function() {
                    $(this).removeAttr('href');
                    var element = $(this).parent('li');
                    if (element.hasClass('open')) {
                        element.removeClass('open');
                        element.find('li').removeClass('open');
                        element.find('ul').slideUp(200);
                    } else {
                        element.addClass('open');
                        element.children('ul').slideDown(200);
                        element.siblings('li').children('ul').slideUp(200);
                        element.siblings('li').removeClass('open');
                        element.siblings('li').find('li').removeClass('open');
                        element.siblings('li').find('ul').slideUp(200);
                    }
                });
            });
        })(jQuery);
        var $winW = function() {
            return $(window).width();
        };
        var $winH = function() {
            return $(window).height();
        };
        var $screensize = function(element) {
            $(element).width($winW()).height($winH());
        };
        var screencheck = function(mediasize) {
            if (typeof window.matchMedia !== "undefined") {
                var screensize = window.matchMedia("(max-width:" + mediasize + "px)");
                if (screensize.matches) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if ($winW() <= mediasize) {
                    return true;
                } else {
                    return false;
                }
            }
        };
        $('.animated-row').each(function() {
            var $this = $(this);
            $this.find('.animate').each(function(i) {
                var $item = $(this);
                var animation = $item.data('animate');
                $item.on('inview', function(event, isInView) {
                    if (isInView) {
                        setTimeout(function() {
                            $item.addClass('animated ' + animation).removeClass('animate');
                        }, i * 50);
                    } else if (!screencheck(767)) {
                        $item.removeClass('animated ' + animation).addClass('animate');
                    }
                });
            });
        });
    });

    //cart
    $(document).on("focusout", ".qty-product", function () {
        let qty = $(this).val();
        if (Number(qty) <= 0) $(this).val(1);
    });

    $(".cart_btn.add-to-cart").on("click", function() {
        ajax_cart_add($(this).attr("data-id"), $("#qty-product").val(), $(this).attr("data-type"));
    });

    $(document).on("click", ".buy_now.add-to-cart", function() {
        ajax_cart_add($(this).attr("data-id"), $(this).attr("data-qty"), $(this).attr("data-type"));
    });

    $(document).on("click", ".box-body-cart .close_btn", function () {
        let id = $(this).attr("data-id");
        let rowid = {};
        rowid[id] = { quantity: 0 };
        ajax_cart_update({ rowid: rowid, checkout: $("#payment-left").length > 0 ? "checkout" : "" });
    });

    $(document).on("click", "#order-cart-left .close_btn", function () {
        let rowid = {};
        let id = $(this).attr("data-id");
        rowid[id] = { quantity: 0 };
        ajax_cart_update({ rowid: rowid });
    });

    $(document).on("click", "#submit_cart", function () {
        let data = $("#form-update-cart").serializeArray();
        data.push({name: "cart_detail", value: true});
        ajax_cart_update($.param(data), false);
    });
    

    $(document).on("click", "#apply-discount-code", function () {
        ajax_cart_update({
            cart_detail: true,
            code: $(this).prev().val(),
        }, true, "Đã áp dụng mã giảm giá!");
    });
    
    $(document).on("change", ".qty-product", function(){
        $("#submit_cart").attr("class", "submit_btn btn");
    });

    $(document).on("click", ".number_pluse.cart button", function(){
        let element = $(this).parents(".number_pluse").find('input[type="number"]');
        if(element.val() != element.attr("data-old-value")){
            $("#submit_cart").attr("class", "submit_btn btn");
        }
    });

    $('.submit_btn.next').on('click', function() {
        $('#collapseFour').collapse('show');
    });
    $('#collapseFour').on('show.bs.collapse', function (e) {
        let form = $("#order-form");
        if(!form.valid()) {
            $('#collapseTwo').collapse('show');
            e.preventDefault();
            showMessage("alert alert-danger", "Vui lòng nhập đầy đủ thông tin!");
        }
    });

    if($("#order-form").length > 0){
        validateForm();
        $(document).on("click", ".submit_payment", function(e) {
            let form = $("#order-form");
            if(form.valid()) {
                $("#order-form").submit();
            } else {
                $('#collapseTwo').collapse('show');
                showMessage("alert alert-danger", "Vui lòng nhập đầy đủ thông tin!");
            }
            e.preventDefault();
        });
    }

    setTimeout(() => {
        $(".box-message").hide();
    }, 10000);

    if($("#contact").length > 0){
        validateContact();
    }
    $("#submitFormContact").on("click", function(e){
        let form = $("#contact");
        if(form.valid()) {
            let name = $("#contact [name=name]").val();
            let email = $("#contact [name=email]").val();
            let phone = $("#contact [name=phone]").val();
            let message = $("#contact [name=message]").val();
            $.post(BASE_URL + '/lien-he', {
                name: name, 
                email: email,
                phone: phone,
                message: message,
                _token: $('[name="csrf-token"]').attr("content") 
            }, function(data){
                $("#contact input, #contact textarea").val("");
                if (data != false) {
                    showMessage("alert alert-success", "Thêm liên hệ thành công!");
                } else {
                    showMessage("alert alert-danger", "Lỗi hệ thống, vui lòng liên hệ quản trị viên để được hỗ trợ!");
                }
            });
        }
        e.preventDefault();

    });

    
    $(".gift .contact").on("click", function(){
        let id = $(this).data("id");
        let title = $(this).data("title");
        $("#myModal3 input").val("");
        $('#myModal3 .modal-body input[name=gift_id]').val(id);
        $('#myModal3 .modal-body .title').html(`Sản phẩm: ${title}`);
        $('#myModal3').modal('show');
    });

    if($("#mc-form").length > 0){
        validateGift();
    }
    
    $("#mc-form button").on("click", function(e){
        let form = $("#mc-form");
        if(form.valid()) {
            console.log(123123);
            let name = $("#mc-form [name=name]").val();
            let quantity = $("#mc-form [name=quantity]").val();
            let phone = $("#mc-form [name=phone]").val();
            let address = $("#mc-form [name=address]").val();
            let gift_id = $("#mc-form [name=gift_id]").val();
            $.post(BASE_URL + '/qua-tang', {
                name: name, 
                quantity: quantity,
                phone: phone,
                address: address,
                gift_id: gift_id,
                _token: $('[name="csrf-token"]').attr("content") 
            }, function(data){
                $("#mc-form [name=name], #mc-form [name=quantity], #mc-form [name=phone], #mc-form [name=address]").val("");
                if (data != false) {
                    showMessage("alert alert-success", "Thêm liên hệ đặt quà thành công!");
                } else {
                    showMessage("alert alert-danger", "Lỗi hệ thống, vui lòng liên hệ quản trị viên để được hỗ trợ!");
                }
            });
        }
        e.preventDefault();

    });

})(jQuery);

function validateForm(){
    let form = $("#order-form");
    let rules = {
        name: {
            required: true
        },
        address: {
            required: true
        },
        phone: {
            required: true
        },
        email: {
            required: true
        }
    };
    form.validate({
        ignore: false,
        rules: rules,
        messages:{
            name: {
                required: 'Vui lòng nhập họ và tên',
            },
            address: {
                required: 'Vui lòng nhập địa chỉ',
            },
            phone: {
                required: 'Vui lòng nhập số điện thoại',
            },
            email: {
                required: 'Vui lòng nhập địa chỉ email',
                email: 'Vui lòng nhập một địa chỉ email hợp lệ.'
            }
            
        },
        showErrors: function(errorMap,errorList) {
            this.defaultShowErrors();
        }
    });
}

function validateContact(){
    let form = $("#contact");
    let rules = {
        name: {
            required: true
        },
        phone: {
            required: true
        },
        email: {
            required: true,
            email: true
        }
    };
    form.validate({
        ignore: false,
        rules: rules,
        messages:{
            name: {
                required: 'Vui lòng nhập họ và tên',
            },
            phone: {
                required: 'Vui lòng nhập số điện thoại',
            },
            email: {
                required: 'Vui lòng nhập địa chỉ email',
                email: 'Vui lòng nhập một địa chỉ email hợp lệ.'
            }
            
        },
        showErrors: function(errorMap,errorList) {
            this.defaultShowErrors();
        }
    });
}

function validateGift(){
    let form = $("#mc-form");
    let rules = {
        name: {
            required: true
        },
        quantity: {
            required: true,
            digits: true
        },
        phone: {
            required: true
        },
        address: {
            required: true
        }
    };
    form.validate({
        ignore: false,
        rules: rules,
        messages:{
            name: {
                required: 'Vui lòng nhập họ và tên',
            },
            quantity: {
                required: 'Vui lòng nhập số lượng',
                digits: 'Vui lòng nhập số'
            },
            phone: {
                required: 'Vui lòng nhập số điện thoại',
            },
            address: {
                required: 'Vui lòng nhập địa chỉ',
            }
            
        },
        showErrors: function(errorMap,errorList) {
            this.defaultShowErrors();
        }
    });
}

function ajax_cart_add(productId, qty, type){
    qty = Number(qty);
    if (qty > 0) {
        $.post(BASE_URL + '/add-to-cart', {
            id: productId, 
            qty: qty,
            type: type,
            _token: $('[name="csrf-token"]').attr("content") 
        }, function(data){
            if (data != false) {
                $(".box-cart-header").html(data.cart_header_html);
                $(".box-count-item-cart").html(`<div class="count-item-cart">${data.count}</div>`);
                showMessage("alert alert-success", "Thêm vào giỏ hàng thành công!");
            }
        });
    }
}

function ajax_cart_update(data, useToken = true, message = "Cập nhật giỏ hàng thành công!"){
    if (useToken) {
        data._token = $('[name="csrf-token"]').attr("content");
    }
    if($("#order-cart-left").length > 0 || $("#order-cart-right").length > 0) {
        data.cart_detail = true;
    }
    $.post(BASE_URL + '/update-to-cart', data, function(data){
        if (data != false) {
            $(".box-cart-header").html(data.cart_header_html);
            $(".box-count-item-cart").html(`<div class="count-item-cart">${data.count}</div>`);
            if ($("#order-cart-left").length > 0 || $("#order-cart-right").length > 0) {
                if ($("#order-cart-left").length > 0) {
                    $("#order-cart-left").html(data.order_left_html);
                }
                if ($("#order-cart-right").length > 0) {
                    $("#order-cart-right").html(data.order_right_html);
                }
                if($('input[type="number"]').length > 0) {
                    $('input[type="number"]').niceNumber();
                }
            }
            if($("#payment-left").length > 0 && data.count == 0){
                $("#payment-left").html(`
                    <p class="zoom-area">Không có sản phẩm nào để thanh toán</p>
                    <a class="back-to-home" href="${HOME_URL}">Quay lại trang chủ</a>
                `);
            }
            if (data.check_discount_code === false) {
                showMessage("alert alert-danger", "Mã giảm giá không tồn tại!");
            } else {
                showMessage("alert alert-success", message);
            }
        }
    });
}

function showMessage(className, content, time = 8000){
    $(".box-message .alert").attr("class", className);
    $(".box-message .alert").html(`<strong>${content}</strong>`);
    $(".box-message").show();
    setTimeout(function(){
        $(".box-message").hide();
    }, time);
}
