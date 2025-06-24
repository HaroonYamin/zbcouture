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

document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggleBtn");
    const moreText = document.getElementById("moreText");

    toggleBtn.addEventListener("click", function () {
        const isHidden = moreText.classList.contains("hidden");

        moreText.classList.toggle("hidden");
        toggleBtn.textContent = isHidden ? "Read Less" : "Read More";
    });
});
