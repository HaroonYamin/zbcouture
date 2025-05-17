<?php
    $banner = get_field('header_banner', 'option');
    $social_media = $banner['social_media'];
    $text = $banner['text'];

    $icons = get_field('header_icons', 'option');
    $account = $icons['account'];
    $cart = $icons['cart'];
?>

<section class="bg-primary">
    <div class="container">
        <div class="flex flex-row">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</section>

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