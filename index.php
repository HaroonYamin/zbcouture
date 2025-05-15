<?php
/**
 * The main index template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package YourThemeName
 * @since 1.0.0
 */

get_header(); ?>

<main id="site-main" class="main-content <?php echo esc_attr(get_post_field('post_name', get_post())); ?>">
    <div class="container">
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>