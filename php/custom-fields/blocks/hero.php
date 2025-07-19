<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $slideshow = get_field('slideshow');
    $hy = new HY_UI();
?>

<section class="relative h-[calc(100vh-62px)]">
    <div class="swiper swiper-banner h-full">
        <div class="swiper-wrapper">
            <?php
            if( $slideshow ) :
                foreach( $slideshow as $slide ) :
                    $image = $slide['background_image'];
                    $title = $slide['title'];
                    $paragraph = $slide['paragraph'];
                    $button = $slide['button'];
            ?>
                    <div class="swiper-slide">
                        <div class="w-full h-full bg-cover bg-center bg-no-repeat relative" 
                            <?php if( $image ) {
                                echo 'style="background-image: url(' . $image . ');"';
                            } ?> 
                            data-aos="fade-in"
                            data-aos-delay="0"
                            data-aos-duration="700">

                            <!-- Overlay (Middle Layer) -->
                            <div class="absolute inset-0 bg-black/40 z-10"></div>
                        
                            <!-- Foreground Content (Top Layer) -->
                            <div class="absolute inset-0 flex flex-col items-center sm:justify-center justify-end h-full text-center text-white px-4 z-20">
                                <div class="swiper-banner-content mb-24 sm:mb-0">
                                    <?php if( $title ) : ?>
                                        <h1 class="sm:text-[48px] text-[36px] font-primary font-normal max-w-[490px] lh-normal italic">
                                            <?= $title; ?>
                                        </h1>
                                    <?php endif; ?>
    
                                    <?php if( $paragraph ) : ?>
                                        <p class="sm:mt-6 mt-[12px] sm:text-xl text-[16px] font-secondary max-w-[490px]">
                                            <?= $paragraph; ?>
                                        </p>
                                    <?php endif; ?>
    
                                    <?php if( $button ) : ?>
                                        <?= $hy->button( $button['title'], $button['url'], $button['target'], 'mt-7' ); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
    <!-- Positioned Pagination -->
    <div class="absolute sm:bottom-8 bottom-5 left-1/2 transform -translate-x-1/2 z-10 slider-timer">
        <div class="banner-pagination slider-timer"></div>
    </div>
</section>
