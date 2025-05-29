<?php
    $site_logo = get_field('site_logo', 'option');
    $column_2 = get_field('column_2', 'option');
    $column_3 = get_field('column_3', 'option');
    $column_4 = get_field('column_4', 'option');
?>

<footer id="footer" class="my-24">
    <div class="container mx-auto px-5">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-3">
                <?php echo get_image( $site_logo, 'max-w-40' ); ?>
            </div>

            <div class="col-span-2">
                <?php
                    if( $column_2['heading'] ) {
                        echo '<h3 class="text-2xl font-bold mb-6">' . $column_2['heading'] . '</h3>';
                    }
                    wp_nav_menu( array( 'theme_location' => 'brand-menu' ) ); 
                ?>
            </div>

            <div class="col-span-2">
                <?php
                    if( $column_3['heading'] ) {
                        echo '<h3 class="text-2xl font-bold mb-6">' . $column_3['heading'] . '</h3>';
                    }
                    wp_nav_menu( array( 'theme_location' => 'service-menu' ) ); 
                ?>
            </div>

            <div class="col-span-1"></div>

            <div class="col-span-4">
                <?php
                    if( $column_4['heading'] ) {
                        echo '<h3 class="text-2xl font-bold mb-6">' . $column_4['heading'] . '</h3>';
                    }
                    if( $column_4['content'] ) {
                        echo '<p>' . $column_4['content'] . '</p>';
                    }
                    if( $column_4['enable'] ) {
                        echo do_shortcode( '[contact-form-7 id="d2fe9f1" title="Newsletter"]' );
                    }
                ?>
            </div>
        </div>
        <p class="size-16">© 2020. All rights reserved.</p>
    </div>
</footer>