<?php
    $icons = get_field('header_icons', 'option');
    $account = $icons['account'];
    $cart = $icons['cart'];
?>

<header id="header" class="bg-sky-900">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <?= the_custom_logo(); ?>
            </div>
            <div>
                <?php wp_nav_menu( ['theme_location' => 'main-menu'] ); ?>
            </div>
        </div>
    </div>
</header>