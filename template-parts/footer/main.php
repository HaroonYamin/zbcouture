<?php
    $site_logo = get_field('site_logo', 'option');
    $column_2 = get_field('column_2', 'option');
    $column_3 = get_field('column_3', 'option');
    $column_4 = get_field('column_4', 'option');
?>

<footer id="footer" class="my-24">
    <div class="container">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-3">
                <?php

                ?>
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
                    if( $column_2['heading'] ) {
                        echo '<h3 class="text-2xl font-bold mb-6">' . $column_2['heading'] . '</h3>';
                    }
                    wp_nav_menu( array( 'theme_location' => 'service-menu' ) ); 
                ?>
            </div>

            <div class="col-span-1"></div>

            <div class="col-span-4"></div>
        </div>
        <p class="size-16">© 2020. All rights reserved.</p>
    </div>
</footer>