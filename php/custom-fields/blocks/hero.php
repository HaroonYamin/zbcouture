<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $slideshow = get_field('slideshow');
?>

<section class="relative h-screen w-full">
    <div class="swiper swiper-banner absolute inset-0 h-full w-full overflow-hidden">
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
                        <div class="h-full w-full bg-cover bg-center bg-no-repeat relative" 
                            <?php if( $image ) {
                                echo 'style="background-image: url(' . $image . ');"';
                            } ?> >

                            <!-- Overlay (Middle Layer) -->
                            <div class="absolute inset-0 bg-black/40 z-10"></div>
                        
                            <!-- Foreground Content (Top Layer) -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center h-full text-center text-white px-4 z-20">
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
                                    <a href="<?= $button['url']; ?>" 
                                        class="font-medium text-base font-secondary mt-6 bg-transparent border border-white rounded-[12px] text-white px-8 py-[12px] hover:bg-gray-200 transition hover:text-black"
                                        target="<?= $button['target']; ?>">
                                        
                                        <?= $button['title']; ?>
                                    </a>
                                <?php endif; ?>
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
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
        <div class="banner-pagination"></div>
    </div>
  
</section>