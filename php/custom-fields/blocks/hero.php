<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $slideshow = get_field('slideshow');
    $ui = new HY_UI();
?>

<section class="relative min-h-screen lg:h-[calc(100vh-62px)] md:h-[calc(100vh-78px)]">
    <div class="swiper swiper-banner h-full">
        <div class="swiper-wrapper">
            <?php
            if( $slideshow ) :
                foreach( $slideshow as $slide ) :
                    $image = $slide['background_image'];
                    $title = $slide['title'];
                    $paragraph = $slide['paragraph'];
                    $button = $slide['button'];
                    $content_position = $slide['content_position'];

                    // Default classes for mobile (always centered)
                    $mobile_justify_class = 'justify-center';
                    $mobile_align_class = 'items-center';
                    $mobile_padding_class = 'p-4'; // Reduced padding for mobile

                    // Initialize desktop classes
                    $desktop_justify_class = '';
                    $desktop_align_class = '';
                    $desktop_padding_class = '';

                    // Determine desktop flexbox classes and padding based on content_position
                    switch ($content_position) {
                        case 'top-left':
                            $desktop_justify_class = 'md:justify-start';
                            $desktop_align_class = 'md:items-start';
                            $desktop_padding_class = 'md:pt-12 md:pl-12 lg:pt-16 lg:pl-16';
                            break;
                        case 'top-center':
                            $desktop_justify_class = 'md:justify-start';
                            $desktop_align_class = 'md:items-center';
                            $desktop_padding_class = 'md:pt-12 md:px-8 lg:pt-16 lg:px-12';
                            break;
                        case 'top-right':
                            $desktop_justify_class = 'md:justify-start';
                            $desktop_align_class = 'md:items-end';
                            $desktop_padding_class = 'md:pt-12 md:pr-12 lg:pt-16 lg:pr-16';
                            break;
                        case 'middle-left':
                            $desktop_justify_class = 'md:justify-center';
                            $desktop_align_class = 'md:items-start';
                            $desktop_padding_class = 'md:pl-12 md:py-8 lg:pl-32 lg:py-12';
                            break;
                        case 'middle-center':
                            $desktop_justify_class = 'md:justify-center';
                            $desktop_align_class = 'md:items-center';
                            $desktop_padding_class = 'md:p-8 lg:p-12';
                            break;
                        case 'middle-right':
                            $desktop_justify_class = 'md:justify-center';
                            $desktop_align_class = 'md:items-end';
                            $desktop_padding_class = 'md:pr-12 md:py-8 lg:pr-32 lg:py-12';
                            break;
                        case 'bottom-left':
                            $desktop_justify_class = 'md:justify-end';
                            $desktop_align_class = 'md:items-start';
                            $desktop_padding_class = 'md:pb-12 md:pl-12 lg:pb-16 lg:pl-16';
                            break;
                        case 'bottom-center':
                            $desktop_justify_class = 'md:justify-end';
                            $desktop_align_class = 'md:items-center';
                            $desktop_padding_class = 'md:pb-12 md:px-8 lg:pb-16 lg:px-12';
                            break;
                        case 'bottom-right':
                            $desktop_justify_class = 'md:justify-end';
                            $desktop_align_class = 'md:items-end';
                            $desktop_padding_class = 'md:pb-12 md:pr-12 lg:pb-16 lg:pr-16';
                            break;
                        default:
                            // Fallback for any unhandled case or if field is not set for desktop
                            $desktop_justify_class = 'md:justify-center';
                            $desktop_align_class = 'md:items-center';
                            $desktop_padding_class = 'md:p-8 lg:p-12';
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

                            <!-- Noise overlay (bottom overlay) -->
                            <div class="absolute inset-0 bg-[url('<?php echo get_template_directory_uri(); ?>/assets/images/noise.png')] opacity-20 mix-blend-overlay z-0 pointer-events-none"></div>

                            <!-- Dark overlay (middle overlay) -->
                            <div class="absolute inset-0 bg-black/40 z-10"></div>

                            <!-- Foreground Content (Top Layer) -->
                            <!-- Dynamic classes: mobile defaults to center, desktop takes content_position -->
                            <div class="absolute inset-0 flex flex-col <?= $mobile_justify_class; ?> <?= $mobile_align_class; ?> <?= $mobile_padding_class; ?> <?= $desktop_justify_class; ?> <?= $desktop_align_class; ?> <?= $desktop_padding_class; ?> h-full text-center text-white z-20">
                                <div class="swiper-banner-content max-w-xl">
                                    <?php if( $title ) : ?>
                                        <?= $ui->main_heading( $title ); ?>
                                    <?php endif; ?>

                                    <?php if( $paragraph ) : ?>
                                        <?= $ui->paragraph( $paragraph, 'md:mt-6 mt-3' ); ?>
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
    <div class="absolute md:bottom-8 bottom-5 left-1/2 transform -translate-x-1/2 z-10 slider-timer">
        <div class="banner-pagination slider-timer"></div>
    </div>
</section>