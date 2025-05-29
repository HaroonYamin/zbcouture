<?php
    $icons = get_field('header_icons', 'option');
    $account = $icons['account'];
    $cart = $icons['cart'];
?>

<header class="absolute w-full z-20 header h-10 mt-8">
    <div class="container mx-auto">
        <div class="flex flex-row justify-between items-center px-4 relative">
            <div>
                <?php wp_nav_menu( ['theme_location' => 'left-header-menu'] ); ?>
            </div>

            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <?= the_custom_logo(); ?>
            </div>

            <div class="flex flex-row items-center gap-5">
                <div>
                    <?php wp_nav_menu( ['theme_location' => 'right-header-menu'] ); ?>
                </div>

                <div class="flex flex-row gap-1">
                    <?php if( $account ) : ?>
                        <a href="<?php '#'; ?>" class="hover:bg-hover block p-1 rounded">
                            <img src="<?= $account; ?>" alt="account icon" class="w-6 h-6">
                        </a>
                    <?php endif; ?>
    
                    <?php if( $cart ) : ?>
                        <a href="<?php '#'; ?>" class="hover:bg-hover block p-1 rounded">
                            <img src="<?= $cart; ?>" alt="cart icon" class="w-6 h-6">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>