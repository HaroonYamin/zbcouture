<?php
    $enable = get_field('enable');

    if ( !$enable ) {
        return;
    }

    $label = get_field('label');
    $heading = get_field('heading');
?>

<section class="bg-[#F5F5F0] sm:py-48 py-12 sm:my-32 my-16">
    <div class="container mx-auto px-6">

        <div class="text-center mb-12">
            <?php if( $label ) : ?>
                <p class="uppercase sm:text-base text-sm font-normal tracking-widest text-[#27221E] mb-6"><?= $label; ?></p>
            <?php endif; ?>

            <?php if( $heading ) : ?>
                <h2 class="text-3xl lg:text-5xl font-normal italic font-primary text-[#27221E] max-w-[290px] m-auto"><?= $heading; ?></h2>
            <?php endif; ?>
        </div>

        <?php
            $args = array(
                'post_type' => 'testimonials',
                'posts_per_page' => -1,
                'order' => 'DESC',
                'meta_query'     => array(
                    array(
                        'key'     => '_is_featured',
                        'value'   => '1',
                        'compare' => '=',
                    ),
                ),
            );

            $query = new WP_Query( $args );

            $images = array();
            $paragraph = '';
            $customer = '';
            $role = '';

            if( $query->have_posts() ) :
                while( $query->have_posts() ) : $query->the_post();
                    $images = get_field('gallery', get_the_ID());

                    $section = get_field('section', get_the_ID());
                    $paragraph = $section['quotation'];
                    $customer = get_the_title( get_the_ID() );
                    $role = $section['role'];
                endwhile;
            endif;
        ?>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="relative w-full flex sm:justify-center justify-start">
                <div class="relative">
                    <?php if( $images[0] ) :
                        $image_1 = wp_get_attachment_image_src($images[0], 'full'); ?>
                        <img
                        src="<?= $image_1[0]; ?>"
                        alt="<?= $customer; ?>"
                        class="sm:w-[298px] sm:h-[348px] w-[250px] h-[320px] object-cover"/>
                    <?php endif; ?>

                    <?php if( $images[1] ) :
                        $image_2 = wp_get_attachment_image_src($images[1], 'full'); ?>
                        <img
                        src="<?= $image_2[0]; ?>"
                        alt="<?= $customer; ?>"
                        class="sm:w-[193px] sm:h-[195px] w-[140px] h-[140px] object-cover absolute sm:bottom-[-100px] sm:right-[-100px] -bottom-[40px] -right-[50px]"/>
                    <?php endif; ?>
                </div>
            </div>

            <div class="text-left mt-[32px]">
                <?php if( $paragraph ) : ?>
                    <p class="sm:text-2xl text-lg font-normal text-[#27221E] mb-6 max-w-[648px] mx-auto lg:mx-0">
                        <?= $paragraph; ?>
                    </p>
                <?php endif; ?>

                <?php if( $customer ) : ?>
                    <p class="italic font-primary text-2xl font-normal text-[#27221E] mb-1"><?= $customer; ?></p>
                <?php endif; ?>

                <?php if( $role ) : ?>
                    <p class="text-base font-medium text-[#535353]"><?= $role; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
