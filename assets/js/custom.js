// Custom JavaScript for the website
const swiper = new Swiper('.swiper-banner', {
"use strict";

// Image with Skelton Loader
document.addEventListener("DOMContentLoaded", function () {
    const containers = document.querySelectorAll(".image-with-skeleton");

    containers.forEach((container) => {
        const img = container.querySelector("img");
        const skeleton = container.querySelector(".skeleton-loader");

        function hideSkeletonShowImage() {
            img.style.opacity = "1";
            skeleton.style.opacity = "0";
            setTimeout(() => (skeleton.style.display = "none"), 300);
        }

        // Check if image is already loaded
        if (img.complete && img.naturalHeight !== 0) {
            hideSkeletonShowImage();
        } else {
            img.addEventListener("load", hideSkeletonShowImage);
            img.addEventListener("error", () => {
                skeleton.innerHTML =
                    '<div class="flex items-center justify-center h-full text-gray-400 text-sm">Image failed to load</div>';
                skeleton.classList.remove("animate-pulse");
            });
        }
    });
});

const swiper = new Swiper(".swiper-banner", {
    loop: true,
    autoplay: {
        delay: 2600,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".banner-pagination",
        clickable: true,
    },
}); 


// Initialize Swipers with staggered delays
// This script assumes you have three swipers with classes 'card-swiper-1', 'card-swiper-2', and 'card-swiper-3'
// Ensure you have the Swiper library included in your project
});

document.addEventListener("DOMContentLoaded", function () {
    // Initialize Swipers with staggered delays
    const swiperConfigs = [
        { selector: ".card-swiper-1", delay: 0 },
        { selector: ".card-swiper-2", delay: 5000 / 3 },
        { selector: ".card-swiper-3", delay: (5000 * 2) / 3 },
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
                    },
                },
            });
        }, delay);
    });
});


// Smooth scrolling for horizontal card swipers
// This script assumes you have a wrapper with class 'overflow-x-auto' and buttons with ids 'scroll-arrow-right' and 'scroll-arrow-left'
// Ensure you have the buttons in your HTML
document.addEventListener("DOMContentLoaded", function () {
    const scrollWrapper = document.querySelector(".overflow-x-auto");
    const scrollRightBtn = document.getElementById("scroll-arrow-right");
    const scrollLeftBtn = document.getElementById("scroll-arrow-left");

    const scrollAmount = 320; // Adjust as needed based on card width

    scrollRightBtn?.addEventListener("click", () => {
        scrollWrapper.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });

    scrollLeftBtn?.addEventListener("click", () => {
        scrollWrapper.scrollBy({ left: -scrollAmount, behavior: "smooth" });
    });
});

function toggleMobileMenu() {
    const mobileMenu = document.getElementById("mobile-menu");

    if (mobileMenu.style.display === "none" || mobileMenu.style.display === "") {
        mobileMenu.style.display = "block";
        mobileMenu.classList.remove("hidden");
    } else {
        mobileMenu.style.display = "none";
        mobileMenu.classList.add("hidden");
    }
}
// Close menu when clicking outside
document.addEventListener("click", function (event) {
    const mobileMenu = document.getElementById("mobile-menu");
    const toggleButton = document.getElementById("mobile-menu-toggle");

    if (
        mobileMenu &&
        toggleButton &&
        !toggleButton.contains(event.target) &&
        !mobileMenu.contains(event.target)
    ) {
        mobileMenu.style.display = "none";
        mobileMenu.classList.add("hidden");
    }
});


// Toggle "Read More" functionality
// This script assumes you have a button with id 'toggleBtn' and a div with id 'moreText'
// Ensure you have the 'moreText' div in your HTML with the class 'hidden'
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggleBtn");
    const moreText = document.getElementById("moreText");

    toggleBtn.addEventListener("click", function () {
        const isHidden = moreText.classList.contains("hidden");

        moreText.classList.toggle("hidden");
        toggleBtn.textContent = isHidden ? "Read Less" : "Read More";
    });
  });

// Image gallery functionality
// This script assumes you have images with the class 'thumbnail' and an image with id 'mainImage'
// Ensure you have the main image element in your HTML
  document.addEventListener('DOMContentLoaded', function () {
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.getElementById('mainImage');

    thumbnails.forEach(function (thumbnail) {
        thumbnail.addEventListener('click', function () {
            mainImage.src = this.src;
            mainImage.alt = this.alt;

            thumbnails.forEach(function (thumb) {
                thumb.classList.remove('border-black', 'opacity-100');
                thumb.classList.add('border-gray-300', 'opacity-60');
            });

            this.classList.remove('border-gray-300', 'opacity-60');
            this.classList.add('border-black', 'opacity-100');
        });
    });
});


// FAQ Accordion functionality
const toggles = document.querySelectorAll('#faqAccordion .faq-toggle');

  toggles.forEach((button) => {
    button.addEventListener('click', () => {
      const content = button.nextElementSibling;
      const icon = button.querySelector('.toggle-icon');
      const isOpen = content.classList.contains('max-h-[500px]');

      // Close all
      document.querySelectorAll('#faqAccordion .faq-content').forEach((el) => {
        el.style.maxHeight = null;
        el.classList.remove('max-h-[500px]');
      });
      document.querySelectorAll('#faqAccordion .toggle-icon').forEach((i) => i.textContent = '+');

      if (!isOpen) {
        content.style.maxHeight = content.scrollHeight + 'px';
        content.classList.add('max-h-[500px]');
        icon.textContent = '−';
      }
    });
  });



// Product slider functionality Main Collection
// This script assumes you have a slider with id 'product-slider' and buttons to scroll left and right
const slider = document.getElementById("product-slider");
const scrollLeftBtn = document.getElementById("scrollLeftBtn");
const scrollRightBtn = document.getElementById("scrollRightBtn");

// Scroll distance (card width + gap)
const scrollDistance = 328; // 320px card + 8px gap

function scrollLeft() {
    slider.scrollBy({ 
        left: -scrollDistance, 
        behavior: "smooth" 
    });
}

function scrollRight() {
    slider.scrollBy({ 
        left: scrollDistance, 
        behavior: "smooth" 
    });
}

// Add event listeners
scrollLeftBtn.addEventListener('click', scrollLeft);
scrollRightBtn.addEventListener('click', scrollRight);

// Optional: Update arrow visibility based on scroll position
function updateArrows() {
    const maxScroll = slider.scrollWidth - slider.clientWidth;
    
    // Hide/show left arrow
    if (slider.scrollLeft <= 0) {
        scrollLeftBtn.style.opacity = '0.5';
    } else {
        scrollLeftBtn.style.opacity = '1';
    }
    
    // Hide/show right arrow
    if (slider.scrollLeft >= maxScroll) {
        scrollRightBtn.style.opacity = '0.5';
    } else {
        scrollRightBtn.style.opacity = '1';
    }
}

// Initial arrow state
updateArrows();

// Update arrows on scroll
slider.addEventListener('scroll', updateArrows);

// Optional: Touch/swipe support for mobile
let isDown = false;
let startX;
let scrollLeftPos;

slider.addEventListener('mousedown', (e) => {
    isDown = true;
    startX = e.pageX - slider.offsetLeft;
    scrollLeftPos = slider.scrollLeft;
});

slider.addEventListener('mouseleave', () => {
    isDown = false;
});

slider.addEventListener('mouseup', () => {
    isDown = false;
});

slider.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 2;
    slider.scrollLeft = scrollLeftPos - walk;
});
});
