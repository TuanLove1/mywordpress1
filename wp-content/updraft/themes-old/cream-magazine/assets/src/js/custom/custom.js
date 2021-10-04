(function($) {

    'use strict';

    jQuery(document).ready(function() {

        var rtlCarousel = false;

        if (jQuery('body').hasClass('rtl')) {

            rtlCarousel = true;
        }

        if (cream_magazine_script_obj.enable_sticky_menu_section == '1') {

            $("nav.main-navigation").sticky();
        }


        /* Initialize Image Lazyload */

        if (cream_magazine_script_obj.enable_image_lazy_load == '1') {

            $('.lazy-image').lazy({
                effect: "fadeIn",
                afterLoad: function(element) {
                    // called after an element was successfully handled
                    element.addClass('image-loaded');
                    element.removeClass('lazy-image');
                }
            });
        }

        /*
        =============================================
        = Init Primary navigation
        =============================================
        */

        jQuery('.primary-navigation').stellarNav({

            theme: 'dark',
            breakpoint: 991,
            closeBtn: false,
            scrollbarFix: true,
            sticky: false,
        });

        if (cream_magazine_script_obj.show_search_icon == '1') {

            jQuery(".primary-navigation > ul").append('<li class="primarynav_search_icon"><a class="search_box" href="javascript:;"><i class="fa fa-search" aria-hidden="true"></i></a></li>');

            /* Toggle header search container on click of search icon */

            jQuery("body").on( 'click', '.search_box', function() {

                jQuery(".header-search-container").toggle();
            });
        }

        jQuery("body").on( 'click', '.menu-toggle', function(event) {

            event.preventDefault();
        });

        /*
        =============================================
        = Init Sticky sidebar
        =============================================
        */
        if (cream_magazine_script_obj.enable_sticky_sidebar == '1') {

            jQuery('.sticky_portion').theiaStickySidebar({

                additionalMarginTop: 10,
            });
        }

        /*
        =============================================
        = Append back to top button
        =============================================
        */
        if (cream_magazine_script_obj.show_to_top_btn == '1') {
            
            jQuery(window).on( 'scroll', function() {

                if (jQuery(this).scrollTop() != 0) {

                    jQuery('#toTop').fadeIn();
                } else {

                    jQuery('#toTop').fadeOut();
                }
            });

            jQuery('body').on( 'click', '#toTop', function() {

                jQuery("html, body").animate({ scrollTop: 0 }, 800);

                return false;
            });
        }

        if (cream_magazine_script_obj.show_news_ticker == '1') {

            jQuery('.ticker_carousel').owlCarousel({

                rtl: rtlCarousel,
                items: 1,
                loop: true,
                margin: 0,
                smartSpeed: 4000,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                mouseDrag: false,
                touchDrag: false,
                animateOut: 'slideOutUp',
                animateIn: 'slideInUp',
                navText: ["<i class='feather icon-chevron-down'></i>", "<i class='feather icon-chevron-up'></i>"],
            });
        }

        if (cream_magazine_script_obj.show_banner_slider == '1') {

            jQuery('.cm_banner-carousel-five').owlCarousel({

                rtl: rtlCarousel,
                items: 1,
                loop: true,
                margin: 0,
                smartSpeed: 800,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            });
        }

        jQuery('.middle_widget_six_carousel').owlCarousel({

            rtl: rtlCarousel,
            items: 2,
            loop: true,
            margin: 30,
            smartSpeed: 800,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                576: {
                    items: 2,
                    margin: 15,
                },
                768: {
                    items: 2,
                    margin: 15,
                },
                992: {
                    items: 2
                },
                1024: {

                    items: 2
                },
                1200: {
                    items: 2
                }
            },
        });

    });
})(jQuery);