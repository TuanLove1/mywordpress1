jQuery(document).ready(function($){    
    
    var slider_auto, slider_loop, rtl;
    
    if( hello_fashion_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( hello_fashion_data.loop == '1' ){
        slider_loop = true;
    }else{
        slider_loop = false;
    }

    if ( hello_fashion_data.rtl == '1' ) {
        rtl = true;
    } else {
        rtl = false;
    }

    $('.site-banner.style-two .item-wrap').owlCarousel({
        items: 4,
        autoplay: slider_auto,
        loop: slider_loop,
        nav: true,
        dots: false,
        autoplaySpeed : 800,
        autoplayTimeout: 3000,
        rtl: rtl,
        responsive : {
            0 : {
                items: 1,
            }, 
            768 : {
                items: 2,
            }, 
            1025 : {
                items: 3,
            }, 
            1367 : {
                items: 4,
            }
        }
    });


    $('.site-header.style-two .secondary-menu .toggle-btn').click(function (e) {
        $(this).siblings('.secondary-menu-list').animate({
            width: 'toggle'
        });
    });

    $('.site-header.style-two .secondary-menu .close').click(function () {
        $(this).parents('.secondary-menu-list').animate({
            width: 'toggle'
        });
    });

    $(window).on('keyup', function (event) {
        if (event.key == 'Escape') {
            $('.site-header.style-two .secondary-menu').animate({
                width: 'toggle'
            });
        }
    });

    const ps = new PerfectScrollbar('.mobile-menu', {
        wheelSpeed: 0.5,
        wheelPropagation: true,
        // minScrollbarLength: 20
    });

});