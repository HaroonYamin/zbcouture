<?php get_header(); ?>

<style>
    /* Optional: Scoped styles for non-Tailwind adjustments */
    .breadcrumb {
        background: white;
        padding: 1rem 0;
        border-bottom: 1px solid #e0e0e0;
    }

    .breadcrumb-nav {
        font-size: 0.9rem;
        color: #27221E;
    }

    .breadcrumb-nav a {
        color: #27221E;
        text-decoration: none;
        font-weight: 600;
    }

    .breadcrumb-nav a:hover {
        opacity: 0.7;
    }

    /* Main Content */
    .main-content {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 3rem;
        margin: 3rem 0;
    }

    .article-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
        font-size: 0.9rem;
        color: #27221E;
        opacity: 0.8;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .article-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #27221E;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .article-excerpt {
        font-size: 1.1rem;
        color: #27221E;
        font-style: italic;
        opacity: 0.8;
    }


    .article-content {
        padding-top: 2rem;
    }

    .article-content h2 {
        color: #27221E;
        margin: 2rem 0 1rem;
        font-size: 1.5rem;
        font-weight: 500;
    }

    .article-content p {
        margin-bottom: 1.5rem;
        font-size: 18px;
        color: #27221E;
    }

    .content-image-container {
        background-color: #F5F5F0;
        padding: 2rem;
        margin: 2rem 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content-image {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 500px;
        object-fit: contain;
    }

    .highlight-box {
        background: #27221E;
        color: white;
        padding: 1.5rem;
        margin: 2rem 0;
    }

    /* Sidebar */
    .sidebar {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        position: sticky;
        top: 7rem;
        height: fit-content;
    }

    .sidebar-widget {
        background: white;
        padding: 1.5rem;
        border: 1px solid #e0e0e0;
    }

    .recent-post-image {
        width: 80px;
        height: 60px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .widget-title {
        font-size: 1.3rem;
        font-weight: medium;
        margin-bottom: 1rem;
        color: #27221E;
        border-bottom: 2px solid #27221E;
        padding-bottom: 0.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-content {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .nav-links {
            display: none;
        }

        .article-title {
            font-size: 2rem;
        }

        .container {
            padding: 0 15px;
        }

        .content-image-container {
            padding: 1rem;
        }

        .content-image {
            max-height: 300px;
        }

        .sidebar {
            position: relative;
            top: auto;
        }
    }
</style>

<!-- Breadcrumb -->
<section class="breadcrumb">
    <div class="container mx-auto px-4 max-w-[1320px] mt-32">
        <nav class="breadcrumb-nav">
            <a href="<?php echo home_url(); ?>">Home</a> / 
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog</a> / 
            <?php the_title(); ?>
        </nav>
    </div>
</section>

<!-- Main Content -->
<main class="max-w-screen-xl mx-auto px-4 mt-12">
    
<!-- Headline + Image -->
<div class="flex flex-col md:flex-row justify-between items-center gap-8 md:gap-16 mb-16">
    
    <!-- Left Text -->
    <div class="w-full md:w-1/2">
        <!-- Top Bar -->
        <div class="flex justify-between items-start mb-6">
            <div class="flex items-center gap-4 text-sm text-gray-600">
                <div class="flex items-center gap-2">
                    <span>👤</span>
                    <span>Author <?php echo get_the_author(); ?></span>
                </div>
                <div class="flex items-center gap-2">
                    <span>🏷️</span>
                    <span>
                        <?php 
                            $categories = get_the_category();
                            echo $categories ? esc_html($categories[0]->name) : 'Blog';
                        ?>
                    </span>
                </div>
            </div>
            <p class="text-sm text-gray-600"><?php echo get_the_date('F j, Y'); ?></p>
        </div>
        <h1 class="sm:text-5xl text-4xl font-primary lh-normal italic mb-6">
            <?php the_title(); ?>
        </h1>
        <p class="text-xl font-normal text-[#27221E]">
            <?php 
                if (has_excerpt()) {
                    echo get_the_excerpt();
                } else {
                    echo wp_trim_words(get_the_content(), 30, '...');
                }
            ?>
        </p>
    </div>

    <!-- Right Image -->
    <div class="w-full md:w-[550px] h-[750px] overflow-hidden">
        <?php if (has_post_thumbnail()) : ?>
            <img  
                src="<?php the_post_thumbnail_url('full'); ?>"  
                alt="<?php the_title(); ?>"  
                class="w-full h-full object-cover"
            >
        <?php else : ?>
            <img  
                src="http://localhost/zahrabatool/wp-content/uploads/2025/07/wed.jpg"  
                alt="<?php the_title(); ?>"  
                class="w-full h-full object-cover"
            >
        <?php endif; ?>
    </div>
</div>



    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Article Content -->
        <article class="md:col-span-2 overflow-hidden">
            <!-- Article Content with Paragraphs and Images -->
            <div class="article-content">

                <?php the_content(); ?>
            </div>
        </article>

        <!-- Sidebar -->
        <aside class="sidebar">
            <!-- Recent Posts -->
            <div class="sidebar-widget">
                <h3 class="widget-title">Recent Posts</h3>
                <?php
                    $recent_posts = wp_get_recent_posts(['numberposts' => 3]);
                    foreach( $recent_posts as $post ) : 
                ?>
                    <div class="flex gap-4 mb-4 border-b border-gray-200 pb-4 last:border-none last:pb-0">
                        <?php if (has_post_thumbnail($post['ID'])) : ?>
                            <?php echo get_the_post_thumbnail($post['ID'], 'thumbnail', ['class' => 'recent-post-image']); ?>
                        <?php else : ?>
                            <img src="http://localhost/zahrabatool/wp-content/uploads/2025/07/wed.jpg" alt="Default post image" class="recent-post-image">
                        <?php endif; ?>
                        <div class="flex-1">
                            <h4 class="text-sm leading-snug mb-1">
                                <a href="<?php echo get_permalink($post['ID']); ?>" class="text-[#27221E] hover:opacity-70 transition-opacity">
                                    <?php echo esc_html($post['post_title']); ?>
                                </a>
                            </h4>
                            <div class="text-xs text-gray-600"><?php echo get_the_date('F j, Y', $post['ID']); ?></div>
                        </div>
                    </div>
                <?php endforeach; wp_reset_query(); ?>
            </div>

            <!-- Categories -->
            <div class="sidebar-widget">
                <h3 class="widget-title">Categories</h3>
                <div class="flex flex-wrap gap-2">
                    <?php   
                        $categories = get_categories();
                        foreach( $categories as $cat ) :
                    ?>
                        <p <?php echo get_category_link($cat->term_id); ?> class="bg-[#F5F5F0] text-[#535353] text-xs px-3 py-1 rounded-full">
                            <?php echo esc_html($cat->name); ?>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>
    </div>
</main>

<?php get_footer(); ?>




<script>
        // Function to wrap images in styled containers
        function wrapImagesInContainers() {
            // Get all images inside the article content
            const articleContent = document.querySelector('.article-content');
            if (!articleContent) return;

            // Find all images that are not already wrapped
            const images = articleContent.querySelectorAll('img:not(.content-image)');
            
            images.forEach(img => {
                // Skip if image is already wrapped
                if (img.parentElement.classList.contains('content-image-container')) {
                    return;
                }

                // Create the wrapper container
                const container = document.createElement('div');
                container.className = 'content-image-container';
                
                // Add the content-image class to the image
                img.classList.add('content-image');
                
                // Insert container before the image
                img.parentNode.insertBefore(container, img);
                
                // Move the image into the container
                container.appendChild(img);
            });
        }

        // Run when page loads
        document.addEventListener('DOMContentLoaded', wrapImagesInContainers);

        // Also run if content is loaded dynamically (for WordPress AJAX)
        document.addEventListener('content-loaded', wrapImagesInContainers);

        // For demonstration: Add a new image dynamically
        function addNewImage() {
            const articleContent = document.querySelector('.article-content');
            const newImg = document.createElement('img');
            newImg.src = 'https://images.unsplash.com/photo-1511406361295-0a1ff814c0ce?w=500&h=300&fit=crop';
            newImg.alt = 'New wedding image';
            
            articleContent.appendChild(newImg);
            
            // Wrap the new image
            wrapImagesInContainers();
        }

        // Demo button (remove this in production)
        const demoButton = document.createElement('button');
        demoButton.textContent = 'Add New Image (Demo)';
        demoButton.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 1000; padding: 10px; background: #27221E; color: white; border: none; cursor: pointer;';
        demoButton.onclick = addNewImage;
        document.body.appendChild(demoButton);
    </script>