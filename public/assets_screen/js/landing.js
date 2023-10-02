var swiper = new Swiper(".blog-slider", {
    autoplay: {
        delay: 5000,
    },
    allowSlideNext: true,
    allowSlidePrev: true,
    spaceBetween: 30,
    effect: "fade",
    fadeEffect: {
        crossFade: true,
    },
    loop: true,
    mousewheel: {
        invert: false,
    },
    // autoHeight: true,
    pagination: {
        el: ".blog-slider_pagination",
        clickable: true,
    },
});
