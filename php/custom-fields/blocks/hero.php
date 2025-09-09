<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $slideshow = get_field('slideshow');
    $ui = new HY_UI();
?>

<section class="relative sm:h-[calc(100vh-62px)] h-[calc(100vh-78px)]">
    <div class="swiper swiper-banner h-full">
        <div class="swiper-wrapper">
            <?php
            if( $slideshow ) :
                foreach( $slideshow as $slide ) :
                    $image = $slide['background_image'];
                    $title = $slide['title'];
                    $paragraph = $slide['paragraph'];
                    $button = $slide['button'];
                    $content_position = $slide['content_position']; // Get the content position

                    // Determine flexbox classes based on content_position
                    $justify_class = 'justify-center'; // Default to center
                    $align_class = 'items-center';     // Default to center
                    $padding_class = 'p-4 sm:p-8 lg:p-12'; // Default padding for all sides for general content

                    // Adjust padding based on position
                    switch ($content_position) {
                        case 'top-left':
                            $justify_class = 'justify-start';
                            $align_class = 'items-start';
                            $padding_class = 'pt-8 pl-8 sm:pt-12 sm:pl-12 lg:pt-16 lg:pl-16'; // More top/left padding
                            break;
                        case 'top-center':
                            $justify_class = 'justify-start';
                            $align_class = 'items-center';
                            $padding_class = 'pt-8 px-4 sm:pt-12 sm:px-8 lg:pt-16 lg:px-12'; // More top padding, some horizontal
                            break;
                        case 'top-right':
                            $justify_class = 'justify-start';
                            $align_class = 'items-end';
                            $padding_class = 'pt-8 pr-8 sm:pt-12 sm:pr-12 lg:pt-16 lg:pr-16'; // More top/right padding
                            break;
                        case 'middle-left':
                            $justify_class = 'justify-center';
                            $align_class = 'items-start';
                            $padding_class = 'pl-8 py-4 sm:pl-12 sm:py-8 lg:pl-32 lg:py-12'; // More left padding, some vertical
                            break;
                        case 'middle-center':
                            $justify_class = 'justify-center';
                            $align_class = 'items-center';
                            $padding_class = 'p-4 sm:p-8 lg:p-12'; // General padding
                            break;
                        case 'middle-right':
                            $justify_class = 'justify-center';
                            $align_class = 'items-end';
                            $padding_class = 'pr-8 py-4 sm:pr-12 sm:py-8 lg:pr-32 lg:py-12'; // More right padding, some vertical
                            break;
                        case 'bottom-left':
                            $justify_class = 'justify-end';
                            $align_class = 'items-start';
                            $padding_class = 'pb-8 pl-8 sm:pb-12 sm:pl-12 lg:pb-16 lg:pl-16'; // More bottom/left padding
                            break;
                        case 'bottom-center':
                            $justify_class = 'justify-end';
                            $align_class = 'items-center';
                            $padding_class = 'pb-8 px-4 sm:pb-12 sm:px-8 lg:pb-16 lg:px-12'; // More bottom padding, some horizontal
                            break;
                        case 'bottom-right':
                            $justify_class = 'justify-end';
                            $align_class = 'items-end';
                            $padding_class = 'pb-8 pr-8 sm:pb-12 sm:pr-12 lg:pb-16 lg:pr-16'; // More bottom/right padding
                            break;
                        default:
                            // Fallback for any unhandled case or if field is not set
                            $justify_class = 'justify-center';
                            $align_class = 'items-center';
                            $padding_class = 'p-4 sm:p-8 lg:p-12'; // General padding
                            break;
                    }
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
                            <!-- Dynamic classes based on $content_position and dynamic padding -->
                            <div class="absolute inset-0 flex flex-col <?= $justify_class; ?> <?= $align_class; ?> h-full text-center text-white <?= $padding_class; ?> z-20">
                                <div class="swiper-banner-content mb-24 sm:mb-0 max-w-xl"> <!-- Added max-w-xl to limit width -->
                                    <?php if( $title ) : ?>
                                        <?= $ui->main_heading( $title ); ?>
                                    <?php endif; ?>

                                    <?php if( $paragraph ) : ?>
                                        <?= $ui->paragraph( $paragraph, 'sm:mt-6 mt-3' ); ?>
                                    <?php endif; ?>

                                    <?php if( $button ) : ?>
                                        <?= $ui->button( $button['title'], $button['url'], $button['target'], 'mt-7' ); ?>
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