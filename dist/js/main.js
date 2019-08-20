$('.portfolio-slides').slick({
    infinite: false,
    slidesToShow: 9,
    slidesToScroll: 1,
    mobileFirst: true,
    draggable: false,
    dots: false,
    prevArrow: false,
    nextArrow: false,
    arrows: true

});

$('.portfolio-slides').slickLightbox({
    itemSelector: 'a',
    navigateByKeyboard: true,
    prevArrow: false,
    nextArrow: false,
    arrows: false,
    dots: true, 
    responsive: [
    {
        breakpoint: 360,
        settings: {
            slidesToShow: 2,
        }
    },
        {
        breakpoint: 591,
        settings: {
            slidesToShow: 3,
        }
    }
    ]
});