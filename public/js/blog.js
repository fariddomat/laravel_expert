(function() {
    // Related Blogs owlCarousel
    var owl = $(".related-blogs .owl-carousel").owlCarousel({
        loop: false,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        responsiveClass: true,
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
        },
        rtl: owlRTL
    });
})();
