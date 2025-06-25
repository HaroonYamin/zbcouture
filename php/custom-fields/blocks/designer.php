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

        <div class="sm:flex justify-center hidden">
            <?php if( $image ) {
                echo get_image($image, 'sm:w-[527px] sm:h-[738px] w-[345px] h-[434px] object-cover');
            } ?>
        </div>
        
        <div class="text-left">
            <?php if( $label ) : ?>
                <h5 class="uppercase tracking-wide sm:text-sm text-[12px] text-[#6D6D6D] font-normal mb-[24px]">
                    <?= $label; ?>
                </h5>
            <?php endif; ?>

            <?php if( $heading ) : ?>
                <h2 class="text-[40px] font-primary font-normal max-w-[517px] italic leading-tight">
                    <?= $heading; ?>
                </h2>
            <?php endif; ?>

            <?php if( $sub_heading ) : ?>
                <h3 class="text-[24px] text-black leading-[1.43] font-light mt-[19px] max-w-[200px] sm:max-w-[100%]">
                    <?= $sub_heading; ?>
                </h3>
            <?php endif; ?>

            <div class="justify-center sm:hidden mt-[24px]">
                <?php if( $image ) {
                    echo get_image($image, 'sm:w-[527px] sm:h-[738px] w-[345px] h-[434px] object-cover');
                } ?>
            </div>

            <div id="readMoreContainer">
                <?php if( $first ) : ?>
                <p class="sm:text-[20px] text-[18px] text-[#27221E] leading-[1.3] font-light mt-[18px] max-w-[517px]">
                    <?= $first; ?>
                </p>
                <?php endif; ?>

                <?php if( $second ) : ?>
                <p class="sm:text-[20px] text-[18px] text-[#27221E] leading-[1.3] font-light max-w-[517px] truncate-4">
                    <?= $second; ?>
                </p>
                <?php endif; ?>

                <!-- Toggle Button -->
                <button id="toggleBtn" 
                    class="inline-block font-medium text-[16px] mt-[20px] bg-white border border-[#27221E] rounded-[12px] text-[#27221E] px-[26px] py-[12px] hover:bg-[#27221E] hover:text-white transition">
                    Read More
                </button>
            </div>
        </div>
    </div>
</section>
