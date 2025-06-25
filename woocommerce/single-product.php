<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' ); ?>

<section class="py-8 lg:py-16">
  <div class="container mx-auto px-4">

    <?php while ( have_posts() ) : the_post(); ?>
      <?php
      global $product;
      $product_id = $product->get_id();
      $gallery_ids = $product->get_gallery_image_ids();
      $main_image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'large' );
      ?>

      <!-- Breadcrumb -->
      <div class="text-sm text-[#797878] mb-6 font-medium font-secondary">
        <a href="<?php echo home_url(); ?>" class="hover:underline">Home</a> / 
        <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="hover:underline">Shop</a> / 
        <span><?php the_title(); ?></span>
      </div>

      <!-- Product Details Section -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">

        <!-- Product Images -->
        <div class="space-y-4">
          <!-- Main Image -->
          <div class="main-product-image overflow-hidden">
            <?php if ( $main_image ) : ?>
              <img id="mainImage" src="<?php echo esc_url( $main_image[0] ); ?>" alt="<?php the_title_attribute(); ?>" style="width: 550px; height: 750px;" class="object-cover">
            <?php else : ?>
              <div class="w-[550px] h-[750px] bg-gray-200 flex items-center justify-center text-gray-500">
                No Image Available
              </div>
            <?php endif; ?>
          </div>

          <!-- Thumbnail Gallery -->
          <div class="max-w-[550px] overflow-x-auto whitespace-nowrap scrollbar-hide">
            <div class="inline-flex gap-2">
              <!-- Main thumbnail -->
              <?php if ( $main_image ) : ?>
                <div class="flex-shrink-0">
                  <img src="<?php echo esc_url( $main_image[0] ); ?>" alt="<?php the_title_attribute(); ?>" style="width: 90px; height: 131px;" class="thumbnail object-cover cursor-pointer border-2 border-black opacity-100 bg-[#F5F5F5]">
                </div>
              <?php endif; ?>

              <!-- Gallery thumbnails -->
              <?php foreach ( $gallery_ids as $gallery_id ) : ?>
                <?php $gallery_image = wp_get_attachment_image_src( $gallery_id, 'medium' ); ?>
                <div class="flex-shrink-0">
                  <img src="<?php echo esc_url( $gallery_image[0] ); ?>" alt="Product Image" style="width: 90px; height: 131px;" class="thumbnail object-cover cursor-pointer border-2 border-gray-300 hover:border-black opacity-60 bg-[#F5F5F5]">
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <!-- Product Information -->
        <div class="space-y-6">
          <h1 class="text-[32px] font-medium text-[#27221E] font-secondary"><?php the_title(); ?></h1>

          <?php if ( $product->get_short_description() ) : ?>
            <div class="text-gray-600 text-sm leading-relaxed">
              <?php echo $product->get_short_description(); ?>
            </div>
          <?php endif; ?>

          <!-- Size Selection -->
          <div class="space-y-3">
            <h3 class="text-[#252525] text-[20px] font-medium font-secondary">Size</h3>
            <div class="flex flex-wrap gap-2">
              <?php
              if ( $product->is_type( 'variable' ) ) {
                $available_variations = $product->get_available_variations();
                $added_sizes = [];

                foreach ( $available_variations as $variation ) {
                  $variation_obj = wc_get_product( $variation['variation_id'] );
                  $size = $variation_obj->get_attribute( 'size' );

                  if ( $size && ! in_array( $size, $added_sizes ) ) {
                    echo '<button class="size-option py-[6px] px-[12px] border rounded-[4px] border-[#8B8B8B] text-base hover:border-black focus:border-black focus:bg-black focus:text-white transition-colors" data-size="' . esc_attr( $size ) . '">' . esc_html( $size ) . '</button>';
                    $added_sizes[] = $size;
                  }
                }
              } else {
                echo '<button class="size-option py-[6px] px-[12px] rounded-[4px] border border-[#8B8B8B] text-base hover:border-black focus:border-black focus:bg-black focus:text-white transition-colors" data-size="0">0</button>';
              }
              ?>
            </div>
            <a href="#" class="text-base font-normal underline text-black font-secondary">Size Guide</a>
          </div>

          <button class="bg-black text-white py-[12px] sm:px-[134px] px-[60px] text-base font-medium hover:bg-gray-800 transition-colors rounded-[12px] font-secondary">
            Book an Appointment
          </button>

          <!-- Action Buttons -->
          <div class="flex items-center gap-6 text-sm">
            <button class="flex items-center gap-2 text-base font-medium text-black font-secondary">
              <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
              </svg>
              Share
            </button>

            <button class="flex items-center gap-2 text-base font-medium text-black font-secondary">
              <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
              </svg>
              Add to wishlist
            </button>
          </div>

          <!-- Product Details -->
          <div class="mt-12 max-w-[424px]">
            <div class="mb-[24px]">
              <h3 class="text-[20px] text-[#252525] font-medium mb-2 font-secondary">Material and Content</h3>
              <p class="text-base text-[#252525] font-normal font-secondary">100% Silk and Linen, Silk Lining</p>
            </div>
            <div class="mb-[24px]">
              <h3 class="text-[20px] text-[#252525] font-medium mb-2 font-secondary">Care</h3>
              <p class="text-base text-[#252525] font-normal font-secondary">Eco or green dry cleaners are recommended as these use chemicals which are less aggressive for the environment. Do not use harsh chemicals.</p>
            </div>
            <div class="mb-[24px]">
              <h3 class="text-[20px] text-[#252525] font-medium mb-2 font-secondary">Size and Fit</h3>
              <p class="text-base text-[#252525] font-normal font-secondary">Model is 5' 7" and is wearing size 4</p>
            </div>
            <div class="mb-[24px]">
              <h3 class="text-[20px] text-[#252525] font-medium mb-2 font-secondary">Made to Order</h3>
              <p class="text-base text-[#252525] font-normal font-secondary">Made in NYC</p>
            </div>
            <div class="mb-[24px]">
              <h3 class="text-[20px] text-[#252525] font-medium mb-2 font-secondary">Rush Orders</h3>
              <p class="text-base text-[#252525] font-normal font-secondary">Items Required earlier than 16 weeks</p>
            </div>
          </div>
        </div>

      </div>
    <?php endwhile; ?>

  </div>
</section>

<section class="py-10">
  <div class="container mx-auto px-4">
    <div class="max-w-[550px] text-[#252525] font-secondary" id="faqAccordion">

      <!-- FAQ Items -->
      <div class="py-4">
        <button type="button" class="faq-toggle flex justify-between items-center w-full text-left sm:text-[24px] text-[20px] font-medium text-black">
          Description
          <span class="toggle-icon text-[24px] width-[24px] height-[24px] transition-transform duration-300">+</span>
        </button>
        <div class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out text-base leading-[1.2] text-black font-normal">
          <div class="pt-4">
            Lorem ipsum dolor sit amet consectetur...
          </div>
        </div>
      </div>

      <div class="py-4">
        <button type="button" class="faq-toggle flex justify-between items-center w-full text-left sm:text-[24px] text-[20px] font-medium text-black">
          Delivery Policy
          <span class="toggle-icon text-[24px] transition-transform duration-300">+</span>
        </button>
        <div class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out text-base leading-[1.2] text-black font-normal">
          <div class="pt-4">
            Delivery is handled by our trusted courier partners...
          </div>
        </div>
      </div>

      <div class="py-4">
        <button type="button" class="faq-toggle flex justify-between items-center w-full text-left sm:text-[24px] text-[20px] font-medium">
          How it works
          <span class="toggle-icon text-[24px] transition-transform duration-300">+</span>
        </button>
        <div class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out text-base leading-[1.2] text-black font-normal">
          <div class="pt-4">
            Select your product, choose size, and complete the booking...
          </div>
        </div>
      </div>

      <div class="py-4 flex justify-between items-center cursor-pointer">
        <span class="sm:text-[24px] text-[20px] font-medium text-black">Size Guide</span>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
      </div>

    </div>
  </div>
</section>

<?php get_footer( 'shop' ); ?>