<?php
get_header();
?>


<section class="py-16">
  <div class="container mx-auto px-4">

		<!-- Breadcrumb -->
		<div class="text-sm text-[#797878] mb-4 font-medium mt-16">
			<a href="<?php echo home_url(); ?>" class="hover:underline">Home</a> / <span>Collections</span>
		</div>

		<!-- Page Title -->
		<h1 class="text-3xl font-medium text-[#27221E] mb-[36px]">Collections</h1>

	</div>
</section>





<section class="container mx-auto px-4 my-[140px]">
  <!-- Text + Button Section -->
  <div class="flex flex-col lg:flex-row items-start mb-16">
      <!-- Heading -->
      <h2 class="text-[32px] font-medium text-[#27221E] font-secondary">
          Symphony of Rose
      </h2>

      <!-- Description + Button -->
      <div class="max-w-[427px] lg:ml-[350px] mb-6 lg:mt-0">
          <p class="text-sm text-[#6C6C6C] font-normal font-secondary leading-relaxed mb-4">
              The timeless elegance of peonies inspired this collection for the bride looking for uniquely fashionable options on her wedding day. With luxurious textures and intricate details, the peony is blended with European art and architectural elements.
          </p>
          <a href="#" class="inline-block border border-black px-[22px] py-[12px] rounded-[12px] font-secondary text-base font-medium hover:bg-black hover:text-white transition-all">
              Explore Collection
          </a>
      </div>
  </div>

  <!-- Horizontal Scrollable Product Slider -->
  <div class="relative">
      <!-- Scrollable Container -->
      <div id="product-slider" class="flex gap-8 overflow-x-auto custom-scroll-hide pb-4">
          <!-- Product Card 1 -->
          <div class="flex-shrink-0 w-[320px]">
              <a href="#">
                  <div class="w-[320px] h-[435px] bg-gray-200">
                      <img src="http://localhost/zahrabatool/wp-content/uploads/2025/06/lavender.png" 
                            alt="Lavender Love"
                            class="object-cover w-full h-full" />
                  </div>
              </a>
              <h3 class="mt-4 text-[#27221E] font-medium text-[20px] font-secondary">
                  <a href="#" class="hover:underline">Lavender Love</a>
              </h3>
          </div>

          <!-- Product Card 2 -->
          <div class="flex-shrink-0 w-[320px]">
              <a href="#">
                  <div class="w-[320px] h-[435px] bg-gray-200">
                      <img src="http://localhost/zahrabatool/wp-content/uploads/2025/06/romancing.png" 
                            alt="Romancing Petals"
                            class="object-cover w-full h-full" />
                  </div>
              </a>
              <h3 class="mt-4 text-[#27221E] font-medium text-[20px] font-secondary">
                  <a href="#" class="hover:underline">Romancing Petals</a>
              </h3>
          </div>

          <!-- Product Card 3 -->
          <div class="flex-shrink-0 w-[320px]">
              <a href="#" class="">
                  <div class="w-[320px] h-[435px] bg-gray-200">
                      <img src="http://localhost/zahrabatool/wp-content/uploads/2025/06/vintage.png" 
                            alt="Vintage Plum"
                            class="object-cover w-full h-full" />
                  </div>
              </a>
              <h3 class="mt-4 text-[#27221E] font-medium text-[20px] font-secondary">
                  <a href="#" class="hover:underline">Vintage Plum</a>
              </h3>
          </div>

          <!-- Product Card 4 -->
          <div class="flex-shrink-0 w-[320px]">
              <a href="#">
                  <div class="w-[320px] h-[435px] bg-gray-200">
                      <img src="http://localhost/zahrabatool/wp-content/uploads/2025/06/vintage.png" 
                            alt="Rose Garden"
                            class="object-cover w-full h-full" />
                  </div>
              </a>
              <h3 class="mt-4 text-[#27221E] font-medium text-[20px] font-secondary">
                  <a href="#" class="hover:underline">Vintage Plum</a>
              </h3>
          </div>

          <!-- Product Card 5 -->
          <div class="flex-shrink-0 w-[320px]">
              <a href="#">
                  <div class="w-[320px] h-[435px] bg-gray-200">
                      <img src="http://localhost/zahrabatool/wp-content/uploads/2025/06/romancing.png" 
                            alt="Romancing Petals"
                            class="object-cover w-full h-full"/>
                  </div>
              </a>
              <h3 class="mt-4 text-[#27221E] font-medium text-[20px] font-secondary">
                  <a href="#" class="hover:underline">Romancing Petals</a>
              </h3>
          </div>
      </div>

      <!-- Scroll Arrows -->
      <div class="flex justify-end gap-4 mt-8">
          <!-- Left Arrow -->
          <button id="scrollLeftBtn" class="p-2 scroll-arrow" aria-label="Scroll left">
              <svg width="28" height="28" viewBox="0 0 15 15" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M6.85355 3.14645C7.04882 3.34171 7.04882 3.65829 6.85355 3.85355L3.70711 7H12.5C12.7761 7 13 7.22386 13 7.5C13 7.77614 12.7761 8 12.5 8H3.70711L6.85355 11.1464C7.04882 11.3417 7.04882 11.6583 6.85355 11.8536C6.65829 12.0488 6.34171 12.0488 6.14645 11.8536L2.14645 7.85355C1.95118 7.65829 1.95118 7.34171 2.14645 7.14645L6.14645 3.14645C6.34171 2.95118 6.65829 2.95118 6.85355 3.14645Z"
                      fill="#000000" />
              </svg>
          </button>

          <!-- Right Arrow -->
          <button id="scrollRightBtn" class="p-2 scroll-arrow" aria-label="Scroll right">
              <svg width="28" height="28" viewBox="0 0 15 15" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M8.14645 3.14645C8.34171 2.95118 8.65829 2.95118 8.85355 3.14645L12.8536 7.14645C13.0488 7.34171 13.0488 7.65829 12.8536 7.85355L8.85355 11.8536C8.65829 12.0488 8.34171 12.0488 8.14645 11.8536C7.95118 11.6583 7.95118 11.3417 8.14645 11.1464L11.2929 8H2.5C2.22386 8 2 7.77614 2 7.5C2 7.22386 2.22386 7 2.5 7H11.2929L8.14645 3.85355C7.95118 3.65829 7.95118 3.34171 8.14645 3.14645Z"
                      fill="#000000" />
              </svg>
          </button>
      </div>
  </div>
</section>




<?php get_footer(); ?>