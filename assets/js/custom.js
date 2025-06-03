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






function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenu.style.display === 'none' || mobileMenu.style.display === '') {
        mobileMenu.style.display = 'block';
        mobileMenu.classList.remove('hidden');
    } else {
        mobileMenu.style.display = 'none';
        mobileMenu.classList.add('hidden');
    }
}

// Close menu when clicking outside
document.addEventListener('click', function(event) {
    const mobileMenu = document.getElementById('mobile-menu');
    const toggleButton = document.getElementById('mobile-menu-toggle');
    
    if (mobileMenu && toggleButton && 
        !toggleButton.contains(event.target) && 
        !mobileMenu.contains(event.target)) {
        mobileMenu.style.display = 'none';
        mobileMenu.classList.add('hidden');
    }
});