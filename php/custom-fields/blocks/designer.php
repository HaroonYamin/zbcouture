<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $image = get_field('image');
    $label = get_field('label');
    $heading = get_field('heading');
    $sub_heading = get_field('sub_heading');
    $first = get_field('paragraph')['first'];
    $second = get_field('paragraph')['second'];
?>

<section class="sm:py-24 py-[54px] w-full">
  <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center lg:justify-between gap-12">

    <!-- Image (left) -->
    <div class="sm:flex justify-center hidden">
      <?php if( $image ) {
        echo get_image($image, 'sm:w-[527px] sm:h-[738px] w-[345px] h-[434px] object-cover');
      } ?>
    </div>

    

    <!-- Text Area -->
    <div class="w-full xl:basis-2/6 text-left">
      <?php if( $label ) : ?>
        <h5 class="uppercase tracking-wide sm:text-sm text-[12px] text-[#6D6D6D] font-secondary mb-[24px]">
          <?= $label; ?>
        </h5>
      <?php endif; ?>

      <?php if( $heading ) : ?>
        <h2 class="text-[40px] font-primary font-normal max-w-[517px] italic leading-tight">
          <?= $heading; ?>
        </h2>
      <?php endif; ?>

      <?php if( $sub_heading ) : ?>
        <h3 class="text-2xl text-black leading-[1.43] font-light font-secondary mt-[19px] max-w-[235px] sm:max-w-[100%]">
          <?= $sub_heading; ?>
        </h3>
      <?php endif; ?>

      <!-- Image shown on mobile -->
      <div class="justify-center sm:hidden mt-[24px]">
        <?php if( $image ) {
          echo get_image($image, 'sm:w-[527px] sm:h-[738px] w-full h-[434px] object-cover');
        } ?>
      </div>

      <!-- Paragraphs and Button -->
      <div id="readMoreContainer">
        <?php if( $first ) : ?>
          <p class="sm:text-[20px] text-[18px] text-[#27221E] font-light leading-[1.3] font-secondary mt-[18px] max-w-[517px]">
            <?= $first; ?>
          </p>
        <?php endif; ?>

        <?php if( $second ) : ?>
          <p class="sm:text-[20px] text-[18px] text-[#27221E] font-light leading-[1.3] font-secondary max-w-[517px] truncate-4">
            <?= $second; ?>
          </p>
        <?php endif; ?>

        <button id="toggleBtn"
          class="inline-block font-medium text-[16px] mt-[20px] bg-white border border-[#27221E] rounded-[12px] text-[#27221E] px-[26px] py-[12px] hover:bg-[#27221E] hover:text-white transition">
          Read More
        </button>
      </div>
    </div>

    <!-- Col 1: Empty space on large screens -->
    <div class="hidden xl:block xl:basis-1/10"></div>

  </div>
</section>

