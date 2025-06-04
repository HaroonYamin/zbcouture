<?php
    $site_logo = get_field('site_logo', 'option');
    $column_2 = get_field('column_2', 'option');
    $column_3 = get_field('column_3', 'option');
    $column_4 = get_field('column_4', 'option');
    $bottom = get_field('bottom', 'option');

    $global_social_media = get_field('global_social_media', 'option');
    $facebook = $global_social_media['facebook'];
    $instagram = $global_social_media['instagram'];
    $twitter = $global_social_media['twitter'];
    $linkedin = $global_social_media['linkedin'];
?>

<footer id="footer" class="mt-24 mb-9">
    <div class="container mx-auto px-5">
<<<<<<< HEAD
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-12">
           <!-- Logo -->
<div class="col-span-12 sm:col-span-2 lg:col-span-3 flex justify-center lg:justify-start lg:items-start items-center text-center lg:text-left">
    <?php echo get_image( $site_logo, 'w-32 lg:w-40 h-auto' ); ?>
</div>


            <!-- Column 2 -->
            <div class="col-span-12 sm:col-span-1 lg:col-span-2">
=======
        <div class="grid grid-cols-12 gap-x-6 gap-y-12">
            <div class="xl:col-span-3 col-span-4">
                <?php echo get_image( $site_logo, 'max-w-40' ); ?>
            </div>

            <div class="xl:col-span-2 col-span-4">
>>>>>>> 807d87b5b0724e66dc5c5f051afb04c0dffa5755
                <?php
<<<<<<< HEAD
                    if( !empty($column_2['heading']) ) {
=======
                    if( !empty($column_2['heading'])  ) {
>>>>>>> refs/remotes/origin/main
                        echo '<h3 class="text-2xl font-medium italic mb-6 font-primary">' . $column_2['heading'] . '</h3>';
                    }
                    wp_nav_menu( array( 'theme_location' => 'brand-menu' ) ); 
                ?>
            </div>

<<<<<<< HEAD
            <!-- Column 3 -->
            <div class="col-span-12 sm:col-span-1 lg:col-span-2">
=======
            <div class="xl:col-span-2 col-span-4">
>>>>>>> 807d87b5b0724e66dc5c5f051afb04c0dffa5755
                <?php
                    if( $column_3['heading'] ) {
                        echo '<h3 class="text-2xl font-medium italic mb-6 font-primary">' . $column_3['heading'] . '</h3>';
                    }
                    wp_nav_menu( array( 'theme_location' => 'service-menu' ) ); 
                ?>
            </div>

<<<<<<< HEAD
            <!-- Spacer for large screens only -->
            <div class="hidden lg:block lg:col-span-1"></div>

            <!-- Column 4 -->
            <div class="col-span-12 sm:col-span-2 lg:col-span-4">
=======
            <div class="col-span-1 xl:block hidden"></div>

            <div class="xl:col-span-4 col-span-6">
>>>>>>> 807d87b5b0724e66dc5c5f051afb04c0dffa5755
                <?php
                    if( $column_4['heading'] ) {
                        echo '<h3 class="text-2xl font-medium italic mb-3 font-primary">' . $column_4['heading'] . '</h3>';
                    }
                    if( $column_4['content'] ) {
                        echo '<p class="mb-6">' . $column_4['content'] . '</p>';
                    }
                    if( $column_4['enable'] ) {
                        echo do_shortcode( '[contact-form-7 id="d2fe9f1" title="Newsletter"]' );
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="border-b border-gray-300 my-6"></div>

    <div class="container mx-auto px-5">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <!-- Copyright -->
            <?php
                if( $bottom['copywrite'] ) {
                    echo '<p class="text-center sm:text-left">' . $bottom['copywrite'] . '</p>';
                }
            ?>

            <!-- Social Icons -->
            <div class="flex items-center gap-4">
                <?php if( $bottom['social_media'] ) :
                    foreach( $bottom['social_media'] as $item ) :
                        if( $item ) : ?>
                            <?php if( $item === 'fb' ) : ?>
                                <a href="<?= esc_url($facebook); ?>" target="_blank" rel="noopener">
                                    <?= get_svg( 'footer_facebook', 'facebook', 'w-6 h-6' ); ?>
                                </a>
                            <?php endif; ?>

                            <?php if( $item === 'in' ) : ?>
                                <a href="<?= esc_url($instagram); ?>" target="_blank" rel="noopener">
                                    <?= get_svg( 'footer_instagram', 'instagram', 'w-6 h-6' ); ?>
                                </a>
                            <?php endif; ?>

                            <?php if( $item === 'x' ) : ?>
                                <a href="<?= esc_url($twitter); ?>" target="_blank" rel="noopener">
                                    <?= get_svg( 'footer_twitter', 'twitter', 'w-6 h-6' ); ?>
                                </a>
                            <?php endif; ?>

                            <?php if( $item === 'li' ) : ?>
                                <a href="<?= esc_url($linkedin); ?>" target="_blank" rel="noopener">
                                    <?= get_svg( 'footer_linkedin', 'linkedin', 'w-6 h-6' ); ?>
                                </a>
                            <?php endif; ?>
                        <?php endif;
                    endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</footer>
