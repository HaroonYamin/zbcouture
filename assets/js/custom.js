document.addEventListener('DOMContentLoaded', function () {
  AOS.init({
    duration: 1000,
    once: true
  });
});



"use strict";
// Custom JavaScript for the website

// Image with Skeleton Loader
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

// Variation Button HY
jQuery(document).ready(function ($) {
    $(".hy-variation-button").on("click", function () {
        var $button = $(this);
        var value = $button.data("value");
        var $wrapper = $button.closest(".hy-variation-buttons");
        var attribute = $wrapper.data("attribute_name");

        // Set the value in the original select
        var $select = $('select[name="' + attribute + '"]');
        $select.val(value).trigger("change");

        // Highlight selected button
        $wrapper.find(".hy-variation-button").removeClass("selected");
        $button.addClass("selected");
    });
});

// Shared Button HY
document.addEventListener("DOMContentLoaded", function () {
    const shareButton = document.getElementById("hy-share-button");
    if (shareButton && navigator.share) {
        shareButton.addEventListener("click", async function () {
            const title = shareButton.dataset.title;
            const url = shareButton.dataset.url;

            try {
                await navigator.share({
                    title: title,
                    url: url,
                });
            } catch (err) {
                console.error("Share failed:", err.message);
            }
        });
    } else if (shareButton) {
        // Optionally hide the button or show fallback
        // shareButton.style.display = 'none';
    }
});

// Banner Swiper
const bannerSwiper = new Swiper(".swiper-banner", {
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
document.addEventListener("DOMContentLoaded", function () {
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

// Mobile menu toggle
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
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById('toggleBtn');
  const readMoreText = document.getElementById('readMoreText');

  let isOpen = false;

  toggleBtn.addEventListener('click', () => {
    isOpen = !isOpen;
    if (isOpen) {
      readMoreText.classList.remove('max-h-0');
      readMoreText.classList.add('max-h-[1000px]');
      toggleBtn.textContent = 'Read Less';
    } else {
      readMoreText.classList.add('max-h-0');
      readMoreText.classList.remove('max-h-[1000px]');
      toggleBtn.textContent = 'Read More';
    }
  });
});

// Image gallery functionality
document.addEventListener("DOMContentLoaded", function () {
    const thumbnailContainers = document.querySelectorAll(".thumbnail");
    const mainImageContainer = document.querySelector("#mainImage");
    const mainImage = mainImageContainer ? mainImageContainer.querySelector("img") : null;

    if (mainImage && thumbnailContainers.length > 0) {
        // Set the first thumbnail as active and load its image into main view on page load
        const firstThumbnail = thumbnailContainers[0];
        const firstThumbnailImg = firstThumbnail.querySelector("img");
        if (firstThumbnailImg && mainImage.src === "undefined") {
            mainImage.src = firstThumbnailImg.src;
            mainImage.alt = firstThumbnailImg.alt;

            // Make first thumbnail active
            firstThumbnail.classList.remove("border-gray-300", "opacity-60");
            firstThumbnail.classList.add("border-black", "opacity-100");
        }

        thumbnailContainers.forEach(function (thumbnailContainer) {
            thumbnailContainer.addEventListener("click", function () {
                const thumbnailImg = this.querySelector("img");

                if (thumbnailImg) {
                    // Update main image
                    mainImage.src = thumbnailImg.src;
                    mainImage.alt = thumbnailImg.alt;

                    // Remove active state from all thumbnails
                    thumbnailContainers.forEach(function (container) {
                        container.classList.remove("border-black", "opacity-100");
                        container.classList.add("border-gray-300", "opacity-60");
                    });

                    // Add active state to clicked thumbnail container
                    this.classList.remove("border-gray-300", "opacity-60");
                    this.classList.add("border-black", "opacity-100");
                }
            });
        });
    }
});

// FAQ Accordion functionality
document.addEventListener("DOMContentLoaded", function () {
    const toggles = document.querySelectorAll("#faqAccordion .faq-toggle");

    toggles.forEach((button) => {
        button.addEventListener("click", () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector(".toggle-icon");
            const isOpen = content.classList.contains("max-h-[500px]");

            // Close all
            document.querySelectorAll("#faqAccordion .faq-content").forEach((el) => {
                el.style.maxHeight = null;
                el.classList.remove("max-h-[500px]");
            });
            document
                .querySelectorAll("#faqAccordion .toggle-icon")
                .forEach((i) => (i.textContent = "+"));

            if (!isOpen) {
                content.style.maxHeight = content.scrollHeight + "px";
                content.classList.add("max-h-[500px]");
                icon.textContent = "−";
            }
        });
    });
});

// Product slider functionality Main Collection
document.addEventListener("DOMContentLoaded", function () {
    const slider = document.getElementById("product-slider");
    const scrollLeftBtn = document.getElementById("scrollLeftBtn");
    const scrollRightBtn = document.getElementById("scrollRightBtn");

    if (slider && scrollLeftBtn && scrollRightBtn) {
        // Scroll distance (card width + gap)
        const scrollDistance = 328; // 320px card + 8px gap

        function scrollLeft() {
            slider.scrollBy({
                left: -scrollDistance,
                behavior: "smooth",
            });
        }

        function scrollRight() {
            slider.scrollBy({
                left: scrollDistance,
                behavior: "smooth",
            });
        }

        // Add event listeners
        scrollLeftBtn.addEventListener("click", scrollLeft);
        scrollRightBtn.addEventListener("click", scrollRight);

        // Update arrow visibility based on scroll position
        function updateArrows() {
            const maxScroll = slider.scrollWidth - slider.clientWidth;

            // Hide/show left arrow
            if (slider.scrollLeft <= 0) {
                scrollLeftBtn.style.opacity = "0.5";
            } else {
                scrollLeftBtn.style.opacity = "1";
            }

            // Hide/show right arrow
            if (slider.scrollLeft >= maxScroll) {
                scrollRightBtn.style.opacity = "0.5";
            } else {
                scrollRightBtn.style.opacity = "1";
            }
        }

        // Initial arrow state
        updateArrows();

        // Update arrows on scroll
        slider.addEventListener("scroll", updateArrows);

        // Touch/swipe support for mobile
        let isDown = false;
        let startX;
        let scrollLeftPos;

        slider.addEventListener("mousedown", (e) => {
            isDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeftPos = slider.scrollLeft;
        });

        slider.addEventListener("mouseleave", () => {
            isDown = false;
        });

        slider.addEventListener("mouseup", () => {
            isDown = false;
        });

        slider.addEventListener("mousemove", (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2;
            slider.scrollLeft = scrollLeftPos - walk;
        });
    }
});






// Off-canvas size guide functionality
document.addEventListener('DOMContentLoaded', function() {
    const sizeGuideBtn = document.getElementById('sizeGuideBtn');
    const sizeGuideBtn2 = document.getElementById('sizeGuideBtn2');
    const offcanvas = document.getElementById('sizeGuideOffcanvas');
    const overlay = document.getElementById('sizeGuideOverlay');
    const panel = document.getElementById('sizeGuidePanel');
    const closeBtn = document.getElementById('closeSizeGuide');

    function openOffcanvas() {
        offcanvas.classList.add('visible');
        document.body.classList.add('no-scroll');

        // Trigger slide-in animation after delay
        setTimeout(() => {
            offcanvas.classList.add('show-panel');
        }, 10);
    }

    function closeOffcanvas() {
        offcanvas.classList.remove('show-panel');

        // Wait for transition to end before hiding completely
        setTimeout(() => {
            offcanvas.classList.remove('visible');
            document.body.classList.remove('no-scroll');
        }, 300);
    }

    // Event bindings
    if (sizeGuideBtn) sizeGuideBtn.addEventListener('click', openOffcanvas);
    if (sizeGuideBtn2) sizeGuideBtn2.addEventListener('click', openOffcanvas);
    if (closeBtn) closeBtn.addEventListener('click', closeOffcanvas);
    if (overlay) overlay.addEventListener('click', closeOffcanvas);

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && offcanvas.classList.contains('visible')) {
            closeOffcanvas();
        }
    });
});









// Image Zoom Modal functionality
function openModal(imageElement) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    
    // Set modal image source to clicked image
    modalImage.src = imageElement.src;
    modalImage.alt = imageElement.alt;
    
    // Show modal
    modal.style.display = 'block';
    
    // Prevent body scrolling
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'none';
    
    // Restore body scrolling
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside the image
document.getElementById('imageModal').addEventListener('click', function(event) {
    if (event.target === this) {
        closeModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal();
    }
});