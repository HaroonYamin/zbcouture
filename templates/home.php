<?php 
/*
 * Template Name: Home Template
 *
 */
get_header(); ?>

<main id="custom-page" class="main-content <?php echo esc_attr(get_post_field('post_name', get_post())); ?>">
    <?php the_content(); ?>
</main>

<?php get_footer(); ?>