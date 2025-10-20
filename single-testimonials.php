<?php 
/* 
 * Single page - Wedding Testimonial
 * Author: Haroon Yamin 
 * Author URL: https://www.linkedin.com/in/haroon-webdev/ 
**/ 
get_header(); 
?> 
 
<!-- Main Container --> 
<main class="max-w-screen-xl mx-auto mt-32 px-4"> 
 
  
 
  <!-- Headline + Image --> 
  <div class="grid md:grid-cols-2 items-center gap-8"> 
    <!-- Left Text --> 
    <div class="max-w-xl">
      <!-- Top Bar --> 
      <div class="flex justify-between items-start mb-6"> 
        <p class="text-sm font-medium text-gray-600">
          <?php the_field('top_label'); ?>
        </p> 
        <p class="text-sm text-gray-600">
          <?php the_field('testimonial_date'); ?>
        </p> 
      </div>  
      <h1 class="text-4xl sm:text-6xl font-medium text-gray-900 leading-tight mb-6 font-primary"> 
        <?php the_field('testimonial_heading'); ?>
      </h1> 
      <p class="text-xl font-medium text-gray-800"> 
        <?php the_field('testimonial_subheading'); ?>
      </p> 
    </div>
 
    <!-- Right Image --> 
    <div class="overflow-hidden shadow-sm"> 
      <?php 
      $hero_image = get_field('hero_image'); 
      if ($hero_image): ?>
        <img 
          src="<?php echo esc_url($hero_image['url']); ?>" 
          alt="<?php echo esc_attr($hero_image['alt']); ?>" 
          class="w-full md:h-[780px] h-auto object-cover"
        >
      <?php endif; ?>
    </div> 
  </div> 
</main> 
 
<!-- Quote Section --> 
<section class="bg-[#F5F5F0]">
  <div class="max-w-screen-xl mx-auto px-4 py-24 grid xl:grid-cols-5 gap-0">
    
    <div class="hidden xl:block"></div> <!-- Left Empty Space -->

    <div class="col-span-full xl:col-span-3 max-w-3xl">
      <!-- Quote -->
      <div class="relative pl-[12px] py-4 mb-12 bg-[#eeece6] border-l-4 border-[#cbc9c3]">
          <p class="text-xl font-normal italic leading-relaxed max-w-3xl">
              <?php the_field('quote_text'); ?>
          </p>
      </div>

      <!-- Uniform Responsive Image Gallery -->
      <div class="mb-12">
          <?php 
          $images = get_field('testimonial_image_gallery');
          if ( $images ) : ?>
              <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                  <?php foreach ( $images as $image ) : 
                      $img_url = esc_url( $image['sizes']['large'] );
                      $img_alt = esc_attr( $image['alt'] );
                  ?>
                      <div class="overflow-hidden">
                          <img
                              src="<?php echo $img_url; ?>"
                              alt="<?php echo $img_alt; ?>"
                              class="w-full h-48 sm:h-56 md:h-64 object-cover"
                          />
                      </div>
                  <?php endforeach; ?>
              </div>
          <?php endif; ?>
      </div>


      <!-- Bride Info -->
      <div class="mb-8">
        <h3 class="text-2xl font-medium text-gray-900 mb-2 font-primary">
          <?php the_field('bride_name'); ?>
        </h3>
        <p class="text-gray-600">
          <?php the_field('bride_location'); ?>
        </p>
      </div>

      <!-- Story Paragraphs -->
      <p class="text-base sm:text-lg leading-relaxed max-w-3xl mb-8">
        <?php the_field('story_paragraph_1'); ?>
      </p>

      <p class="text-base sm:text-lg leading-relaxed max-w-3xl">
        <?php the_field('story_paragraph_2'); ?>
      </p>
    </div>

    <div class="hidden xl:block"></div> <!-- Right Empty Space -->

  </div>
</section>

<!-- Final Quote Section --> 
<!-- <section class="py-24"> 
  <div class="max-w-3xl mx-auto px-4 text-center"> 
    <blockquote class="text-2xl font-medium text-gray-900 leading-relaxed mb-6"> 
      <?php the_field('final_quote'); ?>
    </blockquote> 
    <p class="text-lg text-gray-600">
      <?php the_field('final_quote_author'); ?>
    </p> 
  </div> 
</section>  -->




<section class="bg-[#f3f3ef] flex items-center justify-center mb-8 sm:py-32 py-16">
  <div class="container text-center px-4">
    <div class="text-[#212121] max-w-[523px] mx-auto" data-aos="fade-up" data-aos-delay="50">
      <h1 class="sm:text-5xl text-4xl text-center font-primary font-normal max-w-[490px] lh-normal italic">Book a complimentary 30-minute online consultation</h1>
      <div class="mt-8 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150"></div>
    </div>
    <div class="mt-8" data-aos="fade-up" data-aos-delay="150">
      <div class="btn-aware-wrapper relative inline-block">
        <a href="https://darkgoldenrod-dinosaur-500813.hostingersite.com/contact/" class="btn-aware btn-aware-black relative inline-block px-8 py-3 text-base font-medium border border-black rounded-xl overflow-hidden backdrop-blur-[2px] z-10 hover:bg-black hover:text-white transition">
          Book Consultation</a>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>
