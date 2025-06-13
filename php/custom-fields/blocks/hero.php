<section class="relative h-866px w-full bg-cover bg-center">
  <!-- 1. Swiper Background Banner (Bottom Layer) -->
  <div class="swiper swiper-banner absolute inset-0 h-full w-full overflow-hidden">
    <div class="swiper-wrapper">
        <!-- Background image slides -->
        <div class="swiper-slide bg-center bg-cover h-full w-full" 
            style="background-image: url('https://darkgoldenrod-dinosaur-500813.hostingersite.com/wp-content/uploads/2025/06/banner-image-scaled.jpg');">
        </div>
        <div class="swiper-slide bg-center bg-cover h-full w-full" 
            style="background-image: url('https://darkgoldenrod-dinosaur-500813.hostingersite.com/wp-content/uploads/2025/06/banner-image-scaled.jpg');">
        </div>
        <div class="swiper-slide bg-center bg-cover h-full w-full" 
            style="background-image: url('https://darkgoldenrod-dinosaur-500813.hostingersite.com/wp-content/uploads/2025/06/banner-image-scaled.jpg');">
        </div>
    </div>
  </div>

  <!-- 2. Overlay (Middle Layer) -->
  <div class="absolute inset-0 bg-black/40 z-10"></div>

  <!-- 3. Foreground Content (Top Layer) -->
  <div class="absolute inset-0 flex flex-col items-center justify-center h-full text-center text-white px-4 z-10">
      <h1 class="text-[64px] font-primary font-normal max-w-484px lh-normal">
          You've Never Been
          <span class="italic">Just a Bride.</span>
      </h1>
      <p class="mt-6 text-[20px] font-normal max-w-336px">
          You've always seen beauty differently. Your gown should, too.
      </p>
      <a href="#" class="text-base mt-6 bg-white text-black px-6 py-3 hover:bg-gray-200 transition">
          Book an Appointment
      </a>
  </div>

  <!-- Positioned Pagination -->
  <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
    <div class="banner-pagination custom-pagination"></div>
  </div>
  
</section>