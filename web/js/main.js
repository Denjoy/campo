$( document ).ready(function() {
    $('.main-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        arrows: false,
        // nextArrow: '<i class="far fa-arrow-right"></i>',
        // prevArrow: '<i class="far fa-arrow-left"></i>',
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 5000,
        adaptiveHeight: true
    });
    $('.product-slider-left-side').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        arrows: false,
        // nextArrow: '<i class="far fa-arrow-right"></i>',
        // prevArrow: '<i class="far fa-arrow-left"></i>',
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 5000,
        adaptiveHeight: true
    });
    $('.product-slider-right-side').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        arrows: false,
        // nextArrow: '<i class="far fa-arrow-right"></i>',
        // prevArrow: '<i class="far fa-arrow-left"></i>',
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 5000,
        adaptiveHeight: true
    });

    $('.main-catalog-slider').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        asNavFor: '.catalog-details-slider',
        variableWidth: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
    $('.catalog-details-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        mobileFirst: true,
        asNavFor: '.main-catalog-slider',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1
                }
            }
        ]
    });

    $('#main-benefits').waypoint(function () {
        $('.benefit').addClass("animation-class");
    }, {
        offset: '100%'
    });
});