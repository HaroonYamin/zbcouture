const swiper = new Swiper('.swiper-banner', {
    loop: true,
    autoplay: {
        delay: 2600,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.banner-pagination',
        clickable: true,
    },
});