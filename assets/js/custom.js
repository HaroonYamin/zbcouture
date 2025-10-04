"use strict";

/* JQUERY FUNCTIONS */
jQuery(document).ready(function ($) {
    // Legal link smooth scrolling
    $('a[href^="#legal-link-"]').on("click", function (e) {
        e.preventDefault();
        const target = $(this).attr("href");
        const offset = $(target).offset()?.top;
        if (offset !== undefined) {
            $("html, body").animate(
                {
                    scrollTop: offset - 28,
                },
                600
            );
        }
    });

    // Quantity controller for single page
    $(".qty-minus").on("click", function () {
        var $input = $(this).siblings(".quantity").find("input.qty");
        var val = parseInt($input.val()) || 1;
        if (val > 1) {
            $input.val(val - 1).trigger("change");
        }
    });

    $(".qty-plus").on("click", function () {
        var $input = $(this).siblings(".quantity").find("input.qty");
        var val = parseInt($input.val()) || 1;
        $input.val(val + 1).trigger("change");
    });

    // Button aware hover effect
    $(".btn-aware").on("mouseenter", function (e) {
        const $circle = $(this).find(".btn-aware-circle")[0];
        const rect = this.getBoundingClientRect();
        const relX = e.clientX - rect.left;
        const relY = e.clientY - rect.top;

        $(this)
            .find(".btn-aware-circle")
            .css({
                top: relY + "px",
                left: relX + "px",
                transform: "translate(-50%, -50%) scale(1)",
            });
    });

    $(".btn-aware").on("mouseleave", function () {
        $(this).find(".btn-aware-circle").css({
            transform: "translate(-50%, -50%) scale(0)",
        });
    });

    // Custom variation buttons
    $(".hy-variation-button").on("click", function () {
        var $button = $(this);
        var value = $button.data("value");
        var $wrapper = $button.closest(".hy-variation-buttons");
        var attribute = $wrapper.data("attribute_name");

        var $select = $('select[name="' + attribute + '"]');
        $select.val(value).trigger("change");

        $wrapper.find(".hy-variation-button").removeClass("selected");
        $button.addClass("selected");
    });
});


/* HEADER & NAVIGATION */
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







document.addEventListener("DOMContentLoaded", () => {
    // Share Button
    const shareBtn = document.getElementById("hy-share-button");
    shareBtn?.addEventListener("click", async () => {
        try {
            await navigator.share({ title: shareBtn.dataset.title, url: shareBtn.dataset.url });
        } catch (err) {
            console.error("Share failed:", err.message);
        }
    });

    // Image Gallery: Manual Fallback (in case Swiper isn't used)
    const thumbnails = document.querySelectorAll(".thumbnail");
    const mainImg = document.querySelector("#mainImage img");

    if (mainImg && thumbnails.length) {
        const setActive = (el) => {
            mainImg.src = el.src;
            mainImg.alt = el.alt;
            thumbnails.forEach(t => t.classList.replace("border-black", "border-gray-300"));
            thumbnails.forEach(t => t.classList.replace("opacity-100", "opacity-60"));
            el.closest(".thumbnail").classList.replace("border-gray-300", "border-black");
            el.closest(".thumbnail").classList.replace("opacity-60", "opacity-100");
        };

        setActive(thumbnails[0].querySelector("img"));
        thumbnails.forEach(t => t.addEventListener("click", () => setActive(t.querySelector("img"))));
    }

    // Function to update thumbnail active state
    const updateThumbnailActive = (activeIndex) => {
        const thumbSlides = document.querySelectorAll(".hy-swiper-product .swiper-slide img");
        
        thumbSlides.forEach((img, index) => {
            // Force remove all border and opacity classes first
            img.classList.remove("border-gray-300", "border-black", "opacity-60", "opacity-100");
            
            if (index === activeIndex) {
                // Active thumbnail styling
                img.classList.add("border-black", "opacity-100");
                // Also add border-2 if not present
                if (!img.classList.contains("border-2")) {
                    img.classList.add("border-2");
                }
            } else {
                // Inactive thumbnail styling
                img.classList.add("border-gray-300", "opacity-60");
                // Also add border-2 if not present
                if (!img.classList.contains("border-2")) {
                    img.classList.add("border-2");
                }
            }
        });
    };

    // Swiper for Thumbnails & Main Image
    const thumbSwiper = new Swiper(".hy-swiper-product", {
        spaceBetween: 10,
        slidesPerView: 'auto',
        direction: window.innerWidth < 640 ? 'horizontal' : 'vertical', // sm: breakpoint Tailwind style
        freeMode: true,
        watchSlidesProgress: true,
        mousewheel: true,
        breakpoints: {
            640: { direction: 'vertical' }, // sm and up = vertical
            0: { direction: 'horizontal' }, // xs = horizontal
        },
    });

    const mainSwiper = new Swiper(".hy-swiper-main", {
        spaceBetween: 10,
        thumbs: {
            swiper: thumbSwiper,
        },
        // Add slide change event listener
        on: {
            slideChange: function() {
                // Add small delay to ensure swiper has updated
                setTimeout(() => {
                    updateThumbnailActive(this.activeIndex);
                    // Also sync thumbnail swiper to show the active thumbnail
                    thumbSwiper.slideTo(this.activeIndex);
                }, 10);
            },
            init: function() {
                // Set initial active thumbnail with delay
                setTimeout(() => {
                    updateThumbnailActive(this.activeIndex);
                }, 100);
            }
        }
    });

    // Sync thumbnail swiper with main swiper clicks
    thumbSwiper.on('tap', function(swiper, event) {
        const clickedSlide = event.target.closest('.swiper-slide');
        if (clickedSlide) {
            const slideIndex = Array.from(clickedSlide.parentNode.children).indexOf(clickedSlide);
            // Update main swiper to show corresponding image
            mainSwiper.slideTo(slideIndex);
            // Update thumbnail styling
            updateThumbnailActive(slideIndex);
        }
    });

    // Also handle direct thumbnail clicks (for better compatibility)
    document.querySelectorAll('.hy-swiper-product .swiper-slide img').forEach((img, index) => {
        img.addEventListener('click', () => {
            mainSwiper.slideTo(index);
            updateThumbnailActive(index);
        });
    });

    // Product Slider with Arrow Scroll
    const slider = document.getElementById("product-slider");
    const leftBtn = document.getElementById("scrollLeftBtn");
    const rightBtn = document.getElementById("scrollRightBtn");
    const scrollAmt = 328;

    if (slider && leftBtn && rightBtn) {
        const update = () => {
            const max = slider.scrollWidth - slider.clientWidth;
            leftBtn.style.opacity = slider.scrollLeft <= 0 ? "0.5" : "1";
            rightBtn.style.opacity = slider.scrollLeft >= max ? "0.5" : "1";
        };

        leftBtn.onclick = () => slider.scrollBy({ left: -scrollAmt, behavior: "smooth" });
        rightBtn.onclick = () => slider.scrollBy({ left: scrollAmt, behavior: "smooth" });
        slider.addEventListener("scroll", update);
        update();

        let isDown = false, startX, scrollLeftStart;
        slider.addEventListener("mousedown", e => {
            isDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeftStart = slider.scrollLeft;
        });
        ["mouseleave", "mouseup"].forEach(e => slider.addEventListener(e, () => isDown = false));
        slider.addEventListener("mousemove", e => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            slider.scrollLeft = scrollLeftStart - (x - startX) * 2;
        });
    }

    // Horizontal Card Scroll (Generic Cards)
    const scrollWrap = document.querySelector(".overflow-x-auto");
    document.getElementById("scroll-arrow-right")?.addEventListener("click", () => scrollWrap?.scrollBy({ left: 320, behavior: "smooth" }));
    document.getElementById("scroll-arrow-left")?.addEventListener("click", () => scrollWrap?.scrollBy({ left: -320, behavior: "smooth" }));
});






/* MODAL FUNCTIONALITY */
function openModal(imageElement) {
    const modal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    modalImage.src = imageElement.src;
    modalImage.alt = imageElement.alt;
    modal.style.display = "block";
    document.body.style.overflow = "hidden";
}

function closeModal() {
    const modal = document.getElementById("imageModal");
    modal.style.display = "none";
    document.body.style.overflow = "auto";
}

document.getElementById("imageModal")?.addEventListener("click", function (event) {
    if (event.target === this) {
        closeModal();
    }
});

document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        closeModal();
    }
});



/* IMAGE & LOADING FUNCTIONALITY */
document.addEventListener("DOMContentLoaded", function () {
    // AOS initialization
    AOS.init({
        duration: 1500,
        once: true,
    });

    // Image skeleton loader
    const containers = document.querySelectorAll(".image-with-skeleton");
    containers.forEach((container) => {
        const img = container.querySelector("img");
        const skeleton = container.querySelector(".skeleton-loader");

        function hideSkeletonShowImage() {
            img.style.opacity = "1";
            skeleton.style.opacity = "0";
            setTimeout(() => (skeleton.style.display = "none"), 300);
        }

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

/* UI INTERACTIONS */
document.addEventListener("DOMContentLoaded", function () {
    // Read more toggle with smooth animation
    const toggleBtn = document.getElementById("toggleBtn");
    const toggleTitle = document.querySelector(".readme-title");
    const paragraph = document.getElementById("secondPara");
    let expanded = false;

    toggleBtn?.addEventListener("click", function () {
        if (expanded) {
            // Collapsing
            paragraph.classList.add("truncate-4");
            paragraph.classList.remove("expanded");
            toggleTitle.innerText = "Read More";
        } else {
            // Expanding
            paragraph.classList.remove("truncate-4");
            paragraph.classList.add("expanded");
            toggleTitle.innerText = "Read Less";
        }
        expanded = !expanded;
    });

    // FAQ Accordion
    const toggles = document.querySelectorAll("#faqAccordion .faq-toggle");
    toggles.forEach((button) => {
        button.addEventListener("click", () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector(".toggle-icon");
            const isOpen = content.classList.contains("max-h-[500px]");

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


/* OFFCANVAS FUNCTIONALITY */
document.addEventListener("DOMContentLoaded", function () {
    const sizeGuideBtn = document.getElementById("sizeGuideBtn");
    const sizeGuideBtn2 = document.getElementById("sizeGuideBtn2");
    const offcanvas = document.getElementById("sizeGuideOffcanvas");
    const overlay = document.getElementById("sizeGuideOverlay");
    const closeBtn = document.getElementById("closeSizeGuide");

    function openOffcanvas() {
        offcanvas.classList.add("visible");
        document.body.classList.add("no-scroll");
        setTimeout(() => {
            offcanvas.classList.add("show-panel");
        }, 10);
    }

    function closeOffcanvas() {
        offcanvas.classList.remove("show-panel");
        setTimeout(() => {
            offcanvas.classList.remove("visible");
            document.body.classList.remove("no-scroll");
        }, 300);
    }

    sizeGuideBtn?.addEventListener("click", openOffcanvas);
    sizeGuideBtn2?.addEventListener("click", openOffcanvas);
    closeBtn?.addEventListener("click", closeOffcanvas);
    overlay?.addEventListener("click", closeOffcanvas);

    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape" && offcanvas?.classList.contains("visible")) {
            closeOffcanvas();
        }
    });
});

/* SWIPER CONFIGURATIONS */
const swiper = new Swiper(".hy-swiper-product", {
    direction: "horizontal",
    slidesPerView: "auto",
    spaceBetween: 10,
    freeMode: true,
    mousewheel: true,
    grabCursor: true,
    scrollbar: {
        el: ".swiper-scrollbar",
        draggable: true,
    },
    breakpoints: {
        640: {
            direction: "vertical",
        },
    },
});

const swiperCollection = new Swiper(".hy-collection-swiper", {
    slidesPerView: 1.2,
    spaceBetween: 20,
    breakpoints: {
        560: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        1275: { slidesPerView: 4.5 },
    },
    navigation: {
        nextEl: ".hy-arrow-right",
        prevEl: ".hy-arrow-left",
    },
});

const bannerSwiper = new Swiper(".swiper-banner", {
    loop: true,
    speed: 1500, // This speed will now apply to the fade transition
    autoplay: {
        delay: 8000,
        disableOnInteraction: false,
    },
    effect: 'fade',
    fadeEffect: {
        crossFade: true 
    },
    pagination: {
        el: ".banner-pagination",
        clickable: true,
        renderBullet: function (index, className) {
            return `<span class="${className}"><span class="progress"></span></span>`;
        },
    },
});

const progressSelectors = document.querySelectorAll(".banner-pagination");

if (progressSelectors.length > 0) {
    setTimeout(() => {
        progressSelectors.forEach((progress) => {
            progress.classList.add("changed");
        });
    }, 8000);
}




document.addEventListener("DOMContentLoaded", function () {
  const swiperContainers = document.querySelectorAll('.swiper[class*="card-swiper-"]');

  swiperContainers.forEach((swiperEl) => {
    const mySwiper = new Swiper(swiperEl, {
      loop: true,
      speed: 600,
      effect: 'fade',
      fadeEffect: { crossFade: true },
      autoplay: {
        delay: 700,           // hover ke dauraan fast change
        disableOnInteraction: false,
        enabled: false        // ⭐ autoplay off by default
      },
      on: {
        init: () => swiperEl.classList.add("initialized"),
      },
    });

    // Hover events → autoplay sirf hover par chalay
    swiperEl.addEventListener('mouseenter', () => {
      mySwiper.params.autoplay.delay = 900; // 0.9 sec between slides
      mySwiper.autoplay.start();            // start scrolling
    });

    swiperEl.addEventListener('mouseleave', () => {
      mySwiper.autoplay.stop();             // stop scrolling
    });
  });

  // Scroll arrows (same as before)
  const scrollWrapper = document.querySelector('.overflow-x-auto');
  const left = document.getElementById('scroll-arrow-left');
  const right = document.getElementById('scroll-arrow-right');
  if (scrollWrapper && left && right) {
    left.addEventListener('click', () =>
      scrollWrapper.scrollBy({ left: -300, behavior: 'smooth' })
    );
    right.addEventListener('click', () =>
      scrollWrapper.scrollBy({ left: 300, behavior: 'smooth' })
    );
  }
});




// Testimonials Swiper with fade effect
document.addEventListener('DOMContentLoaded', function() {
  const swiper = new Swiper('.testimonials-swiper', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: false, 
    speed: 800,
    effect: 'slide', 
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    on: {
      slideChangeTransitionStart: function () {
        const allSlides = this.slides;
        allSlides.forEach(slide => {
          const image = slide.querySelector('.slide-image');
          const content = slide.querySelector('.slide-content');
          
          if (image) {
            image.style.transform = 'scale(0.8)';
            image.style.opacity = '0';
            image.style.transitionDelay = '0s';
          }
          if (content) {
            content.style.transform = 'translateX(50px)';
            content.style.opacity = '0';
            content.style.transitionDelay = '0s';
          }
        });
      },
      slideChangeTransitionEnd: function () {
        const activeSlide = this.slides[this.activeIndex];
        if (activeSlide) {
          const image = activeSlide.querySelector('.slide-image');
          const content = activeSlide.querySelector('.slide-content');
          
          setTimeout(() => {
            if (image) {
              image.style.transform = 'scale(1)';
              image.style.opacity = '1';
            }
          }, 200);
          
          setTimeout(() => {
            if (content) {
              content.style.transform = 'translateX(0)';
              content.style.opacity = '1';
            }
          }, 300);
        }
      }
    }
  });

  // Arrow click handlers
  document.addEventListener('click', function(e) {
    if (e.target.closest('#testimonial-arrow-left')) {
      e.preventDefault();
      swiper.slidePrev();
    }
    
    if (e.target.closest('#testimonial-arrow-right')) {
      e.preventDefault();
      swiper.slideNext();
    }
  });

  // Initialize first slide with AOS-like animations
  setTimeout(() => {
    const firstSlide = document.querySelector('.swiper-slide-active');
    if (firstSlide) {
      const image = firstSlide.querySelector('.slide-image');
      const content = firstSlide.querySelector('.slide-content');
      
      setTimeout(() => {
        if (image) {
          image.style.transform = 'scale(1)';
          image.style.opacity = '1';
        }
      }, 200);
      
      setTimeout(() => {
        if (content) {
          content.style.transform = 'translateX(0)';
          content.style.opacity = '1';
        }
      }, 300);
    }
  }, 100);
});




document.addEventListener("DOMContentLoaded", function () {
  // Select all images inside .legal-image-editor
  const images = document.querySelectorAll(".legal-image-editor img");

  images.forEach(function (img) {
    // Create a wrapper div
    const wrapper = document.createElement("div");
    wrapper.classList.add("legal-image-wrapper"); // CSS class apply

    // Wrap the image
    img.parentNode.insertBefore(wrapper, img);
    wrapper.appendChild(img);
  });
});



jQuery(document).ready(function ($) {
    const $navLinks = $('.legal-nav-link');
    const $individualActiveLines = $('.active-line-individual');
    const $legalContentSections = $('.legal-content-section');
    const $legalDividers = $('.legal-divider');

    // Hide all content sections initially
    $legalContentSections.addClass('hidden');
    $legalDividers.addClass('hidden');

    function updateActiveState($activeLink) {
        $navLinks.find('h2').removeClass('text-black').addClass('text-gray-500');

        // Hide all individual lines
        $individualActiveLines.css({
            width: '0',
            transform: 'translateX(0)'
        });

        // Activate the clicked link
        $activeLink.find('h2').removeClass('text-gray-500').addClass('text-black');

        const $h2 = $activeLink.find('h2');
        const $currentActiveLine = $activeLink.find('.active-line-individual');

        $currentActiveLine.css({
            width: `${$h2.outerWidth()}px`,
            transform: 'translateX(0)'
        });

        // Show the correct content
        $legalContentSections.addClass('hidden');
        $legalDividers.addClass('hidden');

        const targetId = $activeLink.attr('data-target-id');
        $(targetId).removeClass('hidden');
        $(targetId).next('.legal-divider').removeClass('hidden');
    }

    // Set first link active on load
    if ($navLinks.length > 0) {
        updateActiveState($navLinks.first());
    }

    // Click event
    $navLinks.on('click', function (event) {
        event.preventDefault();
        const $this = $(this);
        updateActiveState($this);

        // Optional scroll
        const targetId = $this.attr('data-target-id');
        const $targetElement = $(targetId);
        if ($targetElement.length) {
            $('html, body').animate({
                scrollTop: $targetElement.offset().top - 100
            }, 500);
        }
    });
});







document.addEventListener('DOMContentLoaded', function() {
    const loaders = document.querySelectorAll('.woocs-lds-ellipsis');
    loaders.forEach(loader => loader.remove());
});






document.addEventListener('DOMContentLoaded', function() {
    // Sort dropdown functionality
    const sortBtn = document.getElementById('sort-dropdown-btn');
    const sortDropdown = document.getElementById('sort-dropdown');

    // Category dropdown functionality
    const categoryBtn = document.getElementById('category-dropdown-btn');
    const categoryDropdown = document.getElementById('category-dropdown');

    // Toggle sort dropdown
    sortBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        sortDropdown.classList.toggle('hidden');
        
        // Close category dropdown if open
        categoryDropdown.classList.add('hidden');
    });

    // Toggle category dropdown
    categoryBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        categoryDropdown.classList.toggle('hidden');
        
        // Close sort dropdown if open
        sortDropdown.classList.add('hidden');
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!sortBtn.contains(e.target) && !sortDropdown.contains(e.target)) {
            sortDropdown.classList.add('hidden');
        }
        
        if (!categoryBtn.contains(e.target) && !categoryDropdown.contains(e.target)) {
            categoryDropdown.classList.add('hidden');
        }
    });

    // Close dropdowns on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            sortDropdown.classList.add('hidden');
            categoryDropdown.classList.add('hidden');
        }
    });
});





  // Function to wrap images in styled containers
        function wrapImagesInContainers() {
            // Get all images inside the article content
            const articleContent = document.querySelector('.article-content');
            if (!articleContent) return;

            // Find all images that are not already wrapped
            const images = articleContent.querySelectorAll('img:not(.content-image)');
            
            images.forEach(img => {
                // Skip if image is already wrapped
                if (img.parentElement.classList.contains('content-image-container')) {
                    return;
                }

                // Create the wrapper container
                const container = document.createElement('div');
                container.className = 'content-image-container';
                
                // Add the content-image class to the image
                img.classList.add('content-image');
                
                // Insert container before the image
                img.parentNode.insertBefore(container, img);
                
                // Move the image into the container
                container.appendChild(img);
            });
        }

        // Run when page loads
        document.addEventListener('DOMContentLoaded', wrapImagesInContainers);

        // Also run if content is loaded dynamically (for WordPress AJAX)
        document.addEventListener('content-loaded', wrapImagesInContainers);

        // For demonstration: Add a new image dynamically
        function addNewImage() {
            const articleContent = document.querySelector('.article-content');
            const newImg = document.createElement('img');
            newImg.src = 'https://images.unsplash.com/photo-1511406361295-0a1ff814c0ce?w=500&h=300&fit=crop';
            newImg.alt = 'New wedding image';
            
            articleContent.appendChild(newImg);
            
            // Wrap the new image
            wrapImagesInContainers();
        }















        jQuery(document).ready(function($) {

    // --- Product Hover Slider Functionality ---
    $('.product-hover-slider').each(function() {
        var $slider = $(this);
        var $slides = $slider.find('.product-image-slide');
        var totalSlides = $slides.length;
        var currentSlide = 0;
        var slideInterval;
        var intervalTime = 1000;

        // Only enable slider if there's more than one image
        if (totalSlides > 1) {
            // Initially, ensure only the first slide is visible
            $slides.stop().css({ 'opacity': 0, 'position': 'absolute' }); // Set all to hidden and absolute
            $slides.eq(0).css({ 'opacity': 1, 'position': 'relative' }); // Make first one visible and relative for layout

            $slider.on('mouseenter', function() {
                // Clear any existing interval to prevent multiple timers
                clearInterval(slideInterval);

                // Reset to first slide visually and logically
                $slides.stop().css('opacity', 0); // Hide all slides immediately
                currentSlide = 0;
                $slides.eq(currentSlide).stop().css({ 'opacity': 1, 'position': 'relative' }); // Show first slide

                // Start the interval for sliding
                slideInterval = setInterval(function() {
                    // Fade out current slide
                    $slides.eq(currentSlide).stop().animate({ opacity: 0 }, 200, function() {
                         $(this).css('position', 'absolute'); // After fade out, reset position
                    });

                    // Move to next slide
                    currentSlide = (currentSlide + 1) % totalSlides;

                    // Fade in next slide
                    $slides.eq(currentSlide).stop().css('position', 'relative').animate({ opacity: 1 }, 200);

                }, intervalTime); // Change image every intervalTime milliseconds
            }).on('mouseleave', function() {
                clearInterval(slideInterval); // Stop sliding on mouse leave

                // Reset to the first image and hide others
                $slides.stop().css('opacity', 0); // Hide all
                currentSlide = 0; // Reset slide index
                $slides.eq(currentSlide).stop().css({ 'opacity': 1, 'position': 'relative' }); // Show first
            });
        }
    });

});