<?php
/*
 * Single page
 * Author: Haroon Yamin
 * Author URL: https://www.linkedin.com/in/haroon-webdev/
**/
get_header();
?>

<style>
    .single-post-container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
    }
    .single-post-title {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }
    .single-post-meta {
        font-size: 14px;
        text-align: center;
        margin-bottom: 30px;
        color: #888;
    }
    .single-post-thumbnail {
        width: 100%;
        height: auto;
        margin-bottom: 30px;
    }
    .single-post-content {
        font-size: 18px;
        line-height: 1.6;
        color: #555;
    }
    .single-post-content p {
        margin-bottom: 20px;
    }
    .single-post-container img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 20px 0;
    }
    .single-post-footer {
        margin-top: 40px;
        text-align: center;
    }
</style>

<main id="<?php echo get_post_field( 'post_name', get_post() ); ?>">
    <div class="single-post-container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1 class="single-post-title"><?php the_title(); ?></h1>
            
            <div class="single-post-meta">
                Published on <?php echo get_the_date(); ?> | By <?php the_author(); ?>
            </div>

            <?php if ( has_post_thumbnail() ) : ?>
                <img class="single-post-thumbnail" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>
            
            <div class="single-post-content">
                <?php the_content(); ?>
            </div>

            <div class="single-post-footer">
                <?php comments_template(); ?>
            </div>

        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>