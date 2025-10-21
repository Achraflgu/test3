/*--------------------- Copyright (c) 2020 -----------------------
[Master Javascript]
Project: Multifarious Services - Responsive HTML Template 
Version: 1.0.0
Assigned to: Theme Forest
-------------------------------------------------------------------*/
(function($) {
    "use strict";
    /*-----------------------------------------------------
    	Function  Start
    -----------------------------------------------------*/
    var Multifarious = {
        initialised: false,
        version: 1.0,
        mobile: false,
        init: function() {
            if (!this.initialised) {
                this.initialised = true;
            } else {
                return;
            }
            /*-----------------------------------------------------
            	Function Calling
            -----------------------------------------------------*/
            this.preLoader();
            this.searchBox();
            this.cartBox();
            this.wowAnimation();
            this.navMenu();
            this.focusText();
            this.TeamSlider();
            this.counter();
            this.topButton();
            this.gymVideo();
            this.gymClasses();
            this.calculatorTabs();
            this.gymTestimonial();
            this.gymProduct();
            this.gymPartner();
            this.gymService();
            this.tabs();
            this.StickyHeader();
            this.niceSelectType();
        },

        /*-----------------------------------------------------
        	Fix Preloader
        -----------------------------------------------------*/
        preLoader: function() {
            $(window).on('load', function() {
                $(".preloader_wrapper").removeClass('preloader_active');
            });
            jQuery(window).on('load', function() {
                setTimeout(function() {
                    jQuery('.preloader_open').addClass('loaded');
                }, 100);
            });
        },

        /*-----------------------------------------------------
         	Fixed Header
     		-----------------------------------------------------*/
        StickyHeader: function() {
            var header = $(".gym_header_wrapper");
            var w = window.innerWidth;
            if (w >= 992) {
                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();
                    if (scroll >= 300) {
                        header.addClass("fixed_header animated fadeInDown");
                    } else {
                        header.removeClass('fixed_header animated fadeInDown');
                    }
                });
            }
            if (w <= 991) {
                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();
                    if (scroll >= 200) {
                        header.addClass("fixed_header");
                    } else {
                        header.removeClass('fixed_header');
                    }
                });
            }
        },

        /*-----------------------------------------------------
        	Fix Search Bar & Cart
        -----------------------------------------------------*/
        searchBox: function() {
            $('.searchBtn').on("click", function() {
                $('.searchBox').addClass('show');
            });
            $('.closeBtn').on("click", function() {
                $('.searchBox').removeClass('show');
            });
            $('.searchBox').on("click", function() {
                $('.searchBox').removeClass('show');
            });
            $(".search_bar_inner").on('click', function() {
                event.stopPropagation();
            });
        },

        cartBox: function() {
            var cartCount = 0;
            $('.gym_cart_open').on("click", function() {
                if (cartCount == '0') {
                    $('.gym_cart_open').addClass('show');
                    cartCount++;
                } else {
                    $('.gym_cart_open').removeClass('show');
                    cartCount--;
                }
            });
            $(".gym_cart_open, .gym_cart_box").on('click', function(e) {
                event.stopPropagation();
            });
            $('body').on("click", function() {
                if (cartCount == '1') {
                    $('.gym_cart_open').removeClass('show');
                    cartCount--;
                }
            });
        },

        /*-----------------------------------------------------
        	Fix Animation 
        -----------------------------------------------------*/
        wowAnimation: function() {
            new WOW({
                //dataduration : 0.2
            }).init();

        },

        /*-----------------------------------------------------
        	Fix Mobile Menu 
        -----------------------------------------------------*/
        navMenu: function() {
            var w = window.innerWidth;
            if (w <= 991) {
                $(".main_menu_wrapper>ul li").on('click', function() {
                    $(this).find('ul.sub_menu').slideToggle();
                    $(this).toggleClass("open");
                });
                $(".main_menu_wrapper>ul").on('click', function() {
                    event.stopPropagation();
                });
                $(".menu_btn").on('click', function(e) {
                    event.stopPropagation();
                    $(".main_menu_wrapper, .menu_btn_wrap").toggleClass("open");
                });
                $("body").on('click', function() {
                    $(".main_menu_wrapper, .menu_btn_wrap").removeClass("open");
                });
            }
        },

        /*-----------------------------------------------------
        	Fix  On focus Placeholder
        -----------------------------------------------------*/
        focusText: function() {
            var place = '';
            $('input,textarea').focus(function() {
                place = $(this).attr('placeholder');
                $(this).attr('placeholder', '');
            }).blur(function() {
                $(this).attr('placeholder', place);
            });
        },

        /*-----------------------------------------------------
        	Fix Team Slider 
        -----------------------------------------------------*/
        TeamSlider: function() {
            var TeamSwiper = new Swiper('.team_slider.swiper-container', {
                autoHeight: false,
                autoplay: true,
                spaceBetween: 30,
                slidesPerView: 4,
                loop: true,
                speed: 3000,
                autoplay: {
                    delay: 3000,
                },
                centeredSlides: false,
                navigation: {
                    nextEl: '.swiper-button-next1',
                    prevEl: '.swiper-button-prev1',
                },
                pagination: {
                    el: '.swiperPagination',
                    clickable: true,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                    575: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    767: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                },
            });
        },

        /*-----------------------------------------------------
        	Fix Counter
        -----------------------------------------------------*/
        counter: function() {
            if ($('.counter_holder').length > 0) {
                var a = 0;
                $(window).scroll(function() {
                    var topScroll = $('.counter_holder').offset().top - window.innerHeight;
                    if (a == 0 && $(window).scrollTop() > topScroll) {
                        $('.count_no').each(function() {
                            var $this = $(this),
                                countTo = $this.attr('data-count');
                            $({
                                countNum: $this.text()
                            }).animate({
                                countNum: countTo
                            }, {
                                duration: 5000,
                                easing: 'swing',
                                step: function() {
                                    $this.text(Math.floor(this.countNum));
                                },
                                complete: function() {
                                    $this.text(this.countNum);
                                }
                            });
                        });
                        a = 1;
                    }
                });
            };
        },

        /*-----------------------------------------------------
        	Fix GoToTopButton
        -----------------------------------------------------*/
        topButton: function() {
            var scrollTop = $("#scroll");
            $(window).on('scroll', function() {
                if ($(this).scrollTop() < 500) {
                    scrollTop.removeClass("active");
                } else {
                    scrollTop.addClass("active");
                }
            });
            $('#scroll').click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 2000);
                return false;
            });

            $(function() {
                $('.go_to_demo').click(function() {
                    $('html, body').animate({ scrollTop: $('#go_to_demo').offset().top }, 'slow');
                    return false;
                });
            });
        },

        /*-----------------------------------------------------
        	Fix Video Popup
        -----------------------------------------------------*/
        gymVideo: function() {
            if ($('.video_popup').length > 0) {
                $('.video_popup').magnificPopup({
                    type: 'iframe',
                    iframe: {
                        markup: '<div class="mfp-iframe-scaler">' +
                            '<div class="mfp-close"></div>' +
                            '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                            '<div class="mfp-title">Some caption</div>' +
                            '</div>',
                        patterns: {
                            youtube: {
                                index: 'youtube.com/',
                                id: 'v=',
                                src: 'https://www.youtube.com/embed/8lQzkwqhKTk'
                            }
                        }
                    }
                });
            }
        },

        /*-----------------------------------------------------
        	Fix gymClasses Slider 
        -----------------------------------------------------*/
        gymClasses: function() {
            var gymClassesSwiper = new Swiper('.gym_class_slider .swiper-container', {
                autoHeight: false,
                autoplay: true,
                spaceBetween: 30,
                slidesPerView: 6,
                loop: true,
                speed: 2000,
                centeredSlides: true,
                autoplay: {
                    delay: 1000,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                    575: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    767: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                    1920: {
                        slidesPerView: 6,
                        spaceBetween: 30,
                    },
                },
            });
        },

        /*-----------------------------------------------------
        	Fix Calculater Tabs 
        -----------------------------------------------------*/
        calculatorTabs: function() {
            $('.gym_tabs_nav li:first-child').addClass('active');
            $('.gym_single_tab').hide();
            $('.gym_single_tab:first').show();
            $('.gym_tabs_nav li').click(function() {
                $('.gym_tabs_nav li').removeClass('active');
                $(this).addClass('active');
                $('.gym_single_tab').hide();
                var activeTab = $(this).find('a').attr('href');
                $(activeTab).fadeIn();
                return false;
            });
        },

        /*-----------------------------------------------------
        	Fix GYM Testimonial Slider  / dance rightclass / dance testimonial Slider 
        -----------------------------------------------------*/
        gymTestimonial: function() {
            var TestimonialSwiper = new Swiper('.swiper-container.s1', {
                autoHeight: false,
                autoplay: false,
                loop: true,
                spaceBetween: 0,
                centeredSlides: false,
                speed: 1500,
                autoplay: {
                    delay: 1000,
                },
                navigation: {
                    nextEl: ".swiperButtonNext, .swiper-button-next1",
                    prevEl: ".swiperButtonPrev, .swiper-button-prev1",
                },
            });
        },

        /*-----------------------------------------------------
        	Fix GYM Product Slider 
        -----------------------------------------------------*/
        gymProduct: function() {
            var productSwiper = new Swiper('.gym_product_slider.swiper-container', {
                autoHeight: false,
                autoplay: true,
                spaceBetween: 30,
                slidesPerView: 4,
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 1000,
                },
                centeredSlides: false,
                navigation: {
                    nextEl: '.NextProduct',
                    prevEl: '.PrevProduct',
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                    575: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    767: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                },
            });
        },
        /*-----------------------------------------------------
        	Fix GYM Partner Slider 
        -----------------------------------------------------*/
        gymPartner: function() {
            var partnersSwiper = new Swiper(".gym_partner_slider.swiper-container", {
                autoHeight: false,
                autoplay: true,
                spaceBetween: 30,
                slidesPerView: 6,
                loop: true,
                speed: 1500,
                autoplay: {
                    delay: 1000,
                },
                navigation: {
                    nextEl: ".swiper-button-next1",
                    prevEl: ".swiper-button-prev1",
                },
                breakpoints: {
                    0: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                    },
                    575: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                    767: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    992: {
                        slidesPerView: 5,
                        spaceBetween: 20,
                    },
                    1200: {
                        slidesPerView: 6,
                        spaceBetween: 30,
                    },
                },
            });
        },
        /********************************************************
        	Gym Services Page Slider
        *********************************************************/
        gymService: function() {
            var Service_swiper = new Swiper('.gym_topservices_slider', {
                slidesPerView: 3,
                spaceBetween: 0,
                freeMode: true,
                autoplay: true,
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                    575: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    767: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },

                },
            });
        },

        /*-----------------------------------------------------
        	Fix Tabs
        -----------------------------------------------------*/
        tabs: function() {

            $('.tabs_nav li:first-child').addClass('active');
            $('.single_tab').hide();
            $('.single_tab:first').show();
            $('.tabs_nav li').click(function() {
                $('.tabs_nav li').removeClass('active');
                $(this).addClass('active');
                $('.single_tab').hide();
                var activeTab = $(this).find('a').attr('href');
                $(activeTab).fadeIn();
                return false;
            });

        },

        /*-----------------------------------------------------
            Fix Select Field
        -----------------------------------------------------*/
        niceSelectType: function() {
            if ($('select').length > 0) {
                $('select').niceSelect();
            }
        },



    };

    Multifarious.init();

})(jQuery);

/*-----------------------------------------------------
	Fix Contact Form Submission
-----------------------------------------------------*/
// Contact Form Submission
function checkRequire(formId, targetResp) {
    targetResp.html('');
    var email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
    var url = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;
    var image = /\.(jpe?g|gif|png|PNG|JPE?G)$/;
    var mobile = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
    var facebook = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
    var twitter = /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/;
    var google_plus = /^(https?:\/\/)?(www\.)?plus.google.com\/[a-zA-Z0-9(\.\?)?]/;
    var check = 0;
    $('#er_msg').remove();
    var target = (typeof formId == 'object') ? $(formId) : $('#' + formId);
    target.find('input , textarea , select').each(function() {
        if ($(this).hasClass('require')) {
            if ($(this).val().trim() == '') {
                check = 1;
                $(this).focus();
                $(this).parent('div').addClass('form_error');
                targetResp.html('You missed out some fields.');
                $(this).addClass('error');
                return false;
            } else {
                $(this).removeClass('error');
                $(this).parent('div').removeClass('form_error');
            }
        }
        if ($(this).val().trim() != '') {
            var valid = $(this).attr('data-valid');
            if (typeof valid != 'undefined') {
                if (!eval(valid).test($(this).val().trim())) {
                    $(this).addClass('error');
                    $(this).focus();
                    check = 1;
                    targetResp.html($(this).attr('data-error'));
                    return false;
                } else {
                    $(this).removeClass('error');
                }
            }
        }
    });
    return check;
}
$(".submitForm").on('click', function() {
    var _this = $(this);
    var targetForm = _this.closest('form');
    var errroTarget = targetForm.find('.response');
    var check = checkRequire(targetForm, errroTarget);

    if (check == 0) {
        var formDetail = new FormData(targetForm[0]);
        formDetail.append('form_type', _this.attr('form-type'));
        $.ajax({
            method: 'post',
            url: 'ajaxmail.php',
            data: formDetail,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(resp) {
            console.log(resp);
            if (resp == 1) {
                targetForm.find('input').val('');
                targetForm.find('textarea').val('');
                errroTarget.html('<p style="color:green;">Mail has been sent successfully.</p>');
            } else {
                errroTarget.html('<p style="color:red;">Something went wrong please try again latter.</p>');
            }
        });
    }
});