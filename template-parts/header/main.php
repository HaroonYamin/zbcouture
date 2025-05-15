<?php
    $site_logo = get_the_custom_logo() ?: '';
    $main_menu = wp_nav_menu( ['theme_location' => 'main-menu'] );
?>

<header id="header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <?= $site_logo; ?>
            </div>
            <div>
                <?php $main_menu; ?>
            </div>
        </div>
    </div>
</header>