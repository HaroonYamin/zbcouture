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
        <div class="grid grid-cols-12 gap-x-6 gap-y-12">
            <div class="xl:col-span-3 col-span-4">
                <?php echo get_image( $site_logo, 'max-w-40' ); ?>
            </div>

            <div class="xl:col-span-2 col-span-4">
                <?php
                    if( $column_2['heading'] ) {
                        echo '<h3 class="text-2xl font-medium italic mb-6 font-primary">' . $column_2['heading'] . '</h3>';
                    }
                    wp_nav_menu( array( 'theme_location' => 'brand-menu' ) ); 
                ?>
            </div>

            <div class="xl:col-span-2 col-span-4">
                <?php
                    if( $column_3['heading'] ) {
                        echo '<h3 class="text-2xl font-medium italic mb-6 font-primary">' . $column_3['heading'] . '</h3>';
                    }
                    wp_nav_menu( array( 'theme_location' => 'service-menu' ) ); 
                ?>
            </div>

            <div class="col-span-1 xl:block hidden"></div>

            <div class="xl:col-span-4 col-span-6">
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

    <div class="border-b-1 border-gray-300 mb-6 mt-12"></div>

    <div class="container mx-auto px-5">
        <div class="flex justify-between items-center">
            <?php
                if( $bottom['copywrite'] ) {
                    echo '<p class="">' . $bottom['copywrite'] . '</p>';
                }
            ?>

            <div class="flex items-center gap-6">
                <?php if(  $bottom['social_media'] ) :
                    foreach( $bottom['social_media'] as $item ) :
                        if( $item ) : ?>
                            <?php if( $item === 'fb' ) : ?>
                                <a href="<?= $facebook; ?>" target="_blank">
                                    <?= get_svg( 'footer_facebook', 'facebook', 'w-24' ); ?>
                                </a>
                            <?php endif; ?>

                            <?php if( $item === 'in' ) : ?>
                                <a href="<?= $instagram; ?>" target="_blank">
                                    <?= get_svg( 'footer_instagram', 'instagram', 'w-24' ); ?>
                                </a>
                            <?php endif; ?>

                            <?php if( $item === 'x' ) : ?>
                                <a href="<?= $instagram; ?>" target="_blank">
                                    <?= get_svg( 'footer_twitter', 'twitter', 'w-24' ); ?>
                                </a>
                            <?php endif; ?>

                            <?php if( $item === 'li' ) : ?>
                                <a href="<?= $linkedin; ?>" target="_blank">
                                    <?= get_svg( 'footer_linkedin', 'linkedin', 'w-24' ); ?>
                                </a>
                            <?php endif; ?>
                        <?php endif;
                    endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</footer>