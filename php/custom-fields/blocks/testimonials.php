<?php
$enable = get_field('enable');
$label = get_field('label');
$heading = get_field('heading');

if( !$enable ) return;
?>

<section class="bg-[#F5F5F0] sm:py-48 py-12 sm:my-32 my-16">
  <div class="container mx-auto px-6">

    <!-- Section Heading -->
    <div class="text-center mb-12">
      <?php if( $label ) : ?>
        <p class="uppercase sm:text-base text-sm font-normal font-secondary tracking-widest text-[#27221E] mb-6"
           data-aos="fade-up" data-aos-delay="50"><?= $label; ?></p>
      <?php endif; ?>

      <?php if( $heading ) : ?>
        <h2 class="text-3xl lg:text-5xl font-normal italic font-primary text-[#27221E] max-w-[290px] m-auto"
            data-aos="fade-up" data-aos-delay="100"><?= $heading; ?></h2>
      <?php endif; ?>
    </div>

    <!-- Query Testimonials -->
    <?php
    $args = array(
      'post_type'      => 'testimonials',
      'posts_per_page' => -1,
      'order'          => 'DESC',
      'meta_query'     => array(
        array(
          'key'     => '_is_featured',
          'value'   => '1',
          'compare' => '='
        )
      )
    );

    $query = new WP_Query($args);
    ?>

    <?php if( $query->have_posts() ) : ?>
      <?php while( $query->have_posts() ) : $query->the_post(); ?>
        <?php
        $post_id   = get_the_ID();
        $images    = get_field('gallery', $post_id);
        $section   = get_field('section', $post_id);
        $paragraph = $section['quotation'] ?? '';
        $role      = $section['role'] ?? '';
        $customer  = get_the_title($post_id);
        $permalink = get_permalink($post_id);
        ?>

        <!-- Testimonial Block -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-24">
          <!-- Image Side -->
          <div class="relative w-full flex sm:justify-center justify-start" data-aos="zoom-in" data-aos-delay="200">
            <div class="relative">
              <?php if( !empty($images[0]) ) :
                $image_1 = wp_get_attachment_image_src($images[0], 'full'); ?>
                <img src="<?= esc_url($image_1[0]); ?>" alt="<?= esc_attr($customer); ?>"
                     class="sm:w-[298px] sm:h-[348px] w-[250px] h-[320px] object-cover"/>
              <?php endif; ?>

              <?php if( !empty($images[1]) ) :
                $image_2 = wp_get_attachment_image_src($images[1], 'full'); ?>
                <img src="<?= esc_url($image_2[0]); ?>" alt="<?= esc_attr($customer); ?>"
                     class="sm:w-[193px] sm:h-[195px] w-[140px] h-[140px] object-cover absolute sm:bottom-[-100px] sm:right-[-100px] -bottom-[40px] -right-[50px]"/>
              <?php endif; ?>
            </div>
          </div>

          <!-- Text Side -->
          <div class="text-left lg:mt-[32px] mt-[64px]" data-aos="fade-left" data-aos-delay="300">
            <?php if( $paragraph ) : ?>
              <p class="sm:text-2xl text-lg font-normal font-secondary text-[#27221E] mb-6 max-w-[648px] mx-auto lg:mx-0">
                <?= $paragraph; ?>
              </p>
            <?php endif; ?>

            <?php if( $customer ) : ?>
              <p class="italic font-primary text-2xl font-normal text-[#27221E] mb-1"><?= $customer; ?></p>
            <?php endif; ?>

            <?php if( $role ) : ?>
              <p class="text-base font-medium font-secondary text-[#535353]"><?= $role; ?></p>
            <?php endif; ?>

            <!-- Read More Button -->
            <a href="<?= esc_url($permalink); ?>" 
               class="inline-block font-medium font-secondary text-[16px] mt-[20px] border border-[#27221E] rounded-[12px] text-[#27221E] px-[26px] py-[12px] hover:bg-[#27221E] hover:text-white transition">
              Read More
            </a>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    <?php endif; ?>

  </div>
</section>
