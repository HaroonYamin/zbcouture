<?php get_header(); ?>

    <!-- Main Container -->
    <main class="max-w-[1380px] mx-auto px-6 sm:px-8 py-24 mt-24">

        <!-- Page Header -->
        <div class="text-center mb-16">
            <p class="text-sm font-medium text-gray-600 mb-4">Stories & Inspiration</p>
            <h1 class="text-4xl sm:text-5xl font-meduim text-gray-900 leading-tight mb-6 font-primary">
                Our Blog
            </h1>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto">
                Discover the latest trends, real bride stories, and behind-the-scenes insights from the world of luxury bridal couture
            </p>
        </div>

        <!-- Blog Cards Container - CSS Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php
            // Query for blog posts
            $blog_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 6, // Change number as needed
                'post_status' => 'publish'
            ));

            if ($blog_posts->have_posts()) :
                while ($blog_posts->have_posts()) : $blog_posts->the_post();
            ?>

            <!-- Dynamic Blog Card -->
            <article class="bg-white overflow-hidden">
                <!-- Featured Image -->
                <div class="mb-6">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url('medium_large'); ?>" 
                                 alt="<?php the_title(); ?>" 
                                 class="w-160 h-80 object-cover rounded-2xl hover:opacity-90 transition-opacity">
                        </a>
                    <?php else : ?>
                        <!-- Default placeholder image if no featured image -->
                        <a href="<?php the_permalink(); ?>">
                            <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                 alt="<?php the_title(); ?>" 
                                 class="w-160 h-80 object-cover rounded-2xl hover:opacity-90 transition-opacity">
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Content -->
                <div class="px-1">
                    <!-- Author & Date -->
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-gray-900">
                            <?php echo get_the_author(); ?>
                        </span>
                        <span class="text-sm text-gray-500">
                            <?php echo get_the_date('j M Y'); ?>
                        </span>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-lg font-medium text-gray-900 mb-3 leading-tight">
                        <a href="<?php the_permalink(); ?>" class="hover:text-gray-700 transition-colors">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    
                    <!-- Excerpt -->
                    <p class="text-base text-gray-600 mb-6 leading-relaxed">
                        <?php 
                        if (has_excerpt()) {
                            echo wp_trim_words(get_the_excerpt(), 25, '...');
                        } else {
                            echo wp_trim_words(get_the_content(), 25, '...');
                        }
                        ?>
                    </p>
                    
                </div>
            </article>

            <?php 
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <!-- No Posts Found -->
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">No blog posts found.</p>
                </div>
            <?php endif; ?>

        </div>

        <?php
        // Pagination (optional)
        if ($blog_posts->max_num_pages > 1) :
        ?>
        <!-- Load More / Pagination -->
        <div class="text-center mt-16">
            <div class="flex justify-center space-x-4">
                <?php
                echo paginate_links(array(
                    'total' => $blog_posts->max_num_pages,
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                    'type' => 'list',
                    'end_size' => 2,
                    'mid_size' => 1,
                ));
                ?>
            </div>
        </div>
        <?php endif; ?>

    </main>

<?php get_footer(); ?>