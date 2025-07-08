<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $label = get_field('label');
    $heading = get_field('heading');
    $first = get_field('paragraph')['first'];
    $second = get_field('paragraph')['second'];
    $button = get_field('button');
    $image = get_field('image');
?>

<section class="sm:py-24 py-12 w-full">
  <div class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row gap-12 items-center">
      
      <!-- Col 1: Empty space on large screens -->
      <div class="hidden xl:block xl:basis-1/10"></div>

      <!-- Col 2: Text content -->
      <div class="w-full xl:basis-2/4 text-left"
           data-aos="fade-right"
           data-aos-delay="100">
        <?php if( $label ) : ?>
          <h5 class="uppercase tracking-wide text-sm text-[#6D6D6D] font-secondary mb-[15px]">
            <?= $label; ?>
          </h5>
        <?php endif; ?>

        <?php if( $heading ) : ?>
          <h2 class="text-[32px] sm:text-[40px] font-primary font-normal max-w-[414px]">
            <?= $heading; ?>
          </h2>
        <?php endif; ?>

        <?php if( $first ) : ?>
          <p class="text-[20px] text-[#121212] leading-[1.43] font-secondary mt-[18px] max-w-[414px]">
            <?= $first; ?>
          </p>
        <?php endif; ?>

        <?php if( $second ) : ?>
          <p class="text-[20px] text-[#121212] leading-[1.43] font-secondary mt-[18px] mb-[22px] sm:mb-[44px] max-w-[414px]">
            <?= $second; ?>
          </p>
        <?php endif; ?>

        <?php if( $button ) : ?>
          <a href="<?= $button['url']; ?>" 
             class="inline-block font-medium text-[16px] font-secondary bg-white border border-[#27221E] rounded-[12px] text-[#27221E] px-[54px] py-[12px] hover:bg-[#27221E] hover:text-white transition"
             target="<?= $button['target']; ?>">
             <?= $button['title']; ?>
          </a>
        <?php endif; ?>
      </div>

      <!-- Col 3: Image -->
      <div class="w-full lg:basis-3/6 flex lg:justify-center"
           data-aos="fade-left"
           data-aos-delay="300">
        <?php
          if( $image ) {
              echo get_image($image, 'w-full sm:w-[576px] h-auto sm:h-[860px] object-cover');
          }
        ?>
      </div>
      
    </div>
  </div>
</section>
