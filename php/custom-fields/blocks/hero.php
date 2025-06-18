<section class="relative h-screen w-full">
  <!-- 1. Swiper Background Banner (Bottom Layer) -->
  <div class="swiper swiper-banner absolute inset-0 h-full w-full overflow-hidden">
    <div class="swiper-wrapper">
        <!-- Background image slides -->
        <div class="swiper-slide h-full w-full bg-cover bg-center bg-no-repeat" 
            style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2025/05/banner-image.jpg');">
        </div>

        <div class="swiper-slide h-full w-full bg-cover bg-center bg-no-repeat" 
            style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2025/06/slide-2.jpg');">
        </div>
    </div>
  </div>

  <!-- 2. Overlay (Middle Layer) -->
  <div class="absolute inset-0 bg-black/40 z-10"></div>

  <!-- 3. Foreground Content (Top Layer) -->
  <div class="absolute inset-0 flex flex-col items-center justify-center h-full text-center text-white px-4 z-10">
      <h1 class="sm:text-[48px] text-[36px] font-primary font-normal max-w-[490px] lh-normal italic">
          Wear the story only you could inspire
      </h1>
      <p class="sm:mt-6 mt-[12px] sm:text-[20px] text-[16px] font-normal max-w-[490px]">
          Zahra paints each gown by hand, turning your love, energy, and essence into a once-in-a-lifetime creation.
      </p>
      <a href="#" class="font-medium text-[16px] mt-6 bg-transparent border border-white rounded-[12px] text-white px-8 py-[12px] hover:bg-gray-200 transition hover:text-black">
          Book a Private Consultation
      </a>
  </div>

  <!-- Positioned Pagination -->
  <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
    <div class="banner-pagination"></div>
  </div>
  
</section>