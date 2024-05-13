/*---------------------------------------------
Template name:  VPNet
Version:        1.0
Author:         ThemeLooks
Author url:     http://themelooks.com

NOTE:
------
Please DO NOT EDIT THIS JS, you may need to use "custom.js" file for writing your custom js.
We may release future updates so it will overwrite this file. it's better and safer to use "custom.js".

[Table of Content]

01: Main menu
02: Movable image
03: Background image
04: Parsley form validation
05: Smooth scroll for comment reply
06: Pricing slider
07: Review slider
08: Video popup
09: Back to top button
10: Changing SVG(image) color
11: Typed JS
12: Preloader
13: Content animation

----------------------------------------------*/


(function($) {
    "use strict";
    $(function(){


        /* 01: Main menu
        ==============================================*/

        $('.header-menu a[href="#"]').on('click', function(event) {
            event.preventDefault();
        });

        $(".header-menu").menumaker({
            title: '<i class="fas fa-bars"></i>',
            format: "multitoggle"
        });

        var mainHeader = $('.main-header');

        if(mainHeader.length) {
            var sticky = new Waypoint.Sticky({
                element: mainHeader[0]
            });
        }


        /* 02: Movable image
        ==============================================*/

        var moveableImage = $('.banner-image');

        if (moveableImage.length) {
            var parallaxImage = new Parallax(moveableImage[0]);
        }


        /* 03: Background image
        ==============================================*/

        var bgImg = $('[data-bg-img]');

        bgImg.css('background', function(){
            return 'url(' + $(this).data('bg-img') + ') center top';
        });


        /* 04: Parsley form validation
        ==============================================*/

        $('form').parsley();



        /* 07: Review slider
        ==============================================*/

        var reviewSlider = new Swiper('.review-slider', {
            slidesPerView: 4,
            spaceBetween: 30,
            speed: 500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            pagination: {
                el: '.review-pagination',
                clickable: true,
            },
            breakpoints: {
                575: {
                    slidesPerView: 1
                },
                991: {
                    slidesPerView: 2
                }
            }
        });


        /* Team Slider */

        var teamSlider = new Swiper('.team-slider', {
            slidesPerView: 6,
            spaceBetween: 20,
            speed: 500,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            pagination: {
                el: '.team-pagination',
                clickable: true,
            },
            breakpoints: {
                575: {
                    slidesPerView: 2
                },
                991: {
                    slidesPerView: 3
                }
            }
        });



        /* 09: Back to top button
        ==============================================*/

        var $backToTopBtn = $('.back-to-top');

        if ($backToTopBtn.length) {
            var scrollTrigger = 400,
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $backToTopBtn.addClass('show');
                } else {
                    $backToTopBtn.removeClass('show');
                }
            };

            backToTop();

            $(window).on('scroll', function () {
                backToTop();
            });

            $backToTopBtn.on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }





        /* 11: Typed JS
        ==============================================*/
        if (!isMobile()) {

        var typedElement = '.typed',
            typedTarget = $(typedElement);

        if(typedTarget.length) {
            var typed = new Typed(typedElement, {
                 stringsElement: '#typed-strings',
                typeSpeed: 100,
                backSpeed: 0,
                loop: false
            });
        }

        var typedElementSecond = '.typed-second',
            typedTargetSecond = $(typedElementSecond);

        if(typedTargetSecond.length) {
            var typed = new Typed(typedElementSecond, {
                stringsElement: '#typed-strings2',
                typeSpeed: 0,
                backSpeed: 0,
                loop: false
            });
        }
}
    });

    /* 12: Preloader
    ==============================================*/

    $(window).on('load', function(){

        function removePreloader() {
            var preLoader = $('.preLoader');
            preLoader.fadeOut();
        }
        setTimeout(removePreloader, 25);
    });


    /* 13: Content animation
    ==============================================*/

    $(window).on('load', function(){

        var $animateEl = $('[data-animate]');

        $animateEl.each(function () {
            var $el = $(this),
                $name = $el.data('animate'),
                $duration = $el.data('duration'),
                $delay = $el.data('delay');

            $duration = typeof $duration === 'undefined' ? '0.6' : $duration ;
            $delay = typeof $delay === 'undefined' ? '0' : $delay ;

            $el.waypoint(function () {
                $el.addClass('animated ' + $name)
                   .css({
                        'animation-duration': $duration + 's',
                        'animation-delay': $delay + 's'
                   });
            }, {offset: '93%'});
        });
    });

})(jQuery);


function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}
