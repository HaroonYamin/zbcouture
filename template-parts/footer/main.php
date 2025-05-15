<?php
    $footer_menu = wp_nav_menu( array( 'theme_location' => 'footer-menu' ) );
?>

<footer id="footer">
    <div class="container">
        <?php $footer_menu; ?>
        <p class="size-16">© 2020. All rights reserved.</p>
    </div>
</footer>