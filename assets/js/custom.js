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

document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".card-swiper-1", {
    loop: true,
    autoplay: {
        delay: 2600,
        disableOnInteraction: false,
    },
    pagination: {
      el: ".card-swiper-1 .swiper-pagination",
      clickable: true,
      bulletClass: "collection-pagination-bullet",
      bulletActiveClass: "collection-pagination-bullet-active",
    },
  });

  new Swiper(".card-swiper-2", {
    loop: true,
    autoplay: {
        delay: 2600,
        disableOnInteraction: false,
    },
    pagination: {
      el: ".card-swiper-2 .swiper-pagination",
      clickable: true,
      bulletClass: "collection-pagination-bullet",
      bulletActiveClass: "collection-pagination-bullet-active",
    },
  });

  new Swiper(".card-swiper-3", {
    loop: true,
    autoplay: {
        delay: 2600,
        disableOnInteraction: false,
    },
    pagination: {
      el: ".card-swiper-3 .swiper-pagination",
      clickable: true,
      bulletClass: "collection-pagination-bullet",
      bulletActiveClass: "collection-pagination-bullet-active",
    },
  });
});