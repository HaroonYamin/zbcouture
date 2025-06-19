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
  const swiperConfigs = [
    { selector: ".card-swiper-1", delay: 0 },
    { selector: ".card-swiper-2", delay: 5000 / 3 },
    { selector: ".card-swiper-3", delay: 5000 * 2 / 3 },
  ];

  swiperConfigs.forEach(({ selector, delay }) => {
    setTimeout(() => {
      const swiperEl = document.querySelector(selector);
      if (!swiperEl) return;

      new Swiper(selector, {
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        pagination: {
          el: `${selector} .swiper-pagination`,
          clickable: true,
        },
        on: {
          init: () => {
            swiperEl.classList.add("initialized");
          }
        }
      });
    }, delay);
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




document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggleBtn");
    const moreText = document.getElementById("moreText");

    toggleBtn.addEventListener("click", function () {
      const isHidden = moreText.classList.contains("hidden");

      moreText.classList.toggle("hidden");
      toggleBtn.textContent = isHidden ? "Read Less" : "Read More";
    });
  });