<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$current_id = get_queried_object_id();

get_header( 'shop' ); ?>

<section class="my-8 lg:my-16">
    <div class="container mx-auto px-4 mt-[160px]">

        <?php while ( have_posts() ) : the_post(); ?>
            <?php
                global $product;
                $product_id = $product->get_id();
                $gallery_ids = $product->get_gallery_image_ids();
                $main_image = get_post_thumbnail_id( $product_id );
            ?>

            <div class="text-sm text-[#797878] mb-6 font-medium font-secondary">
                <a href="<?php echo home_url(); ?>" class="hover:underline">Home</a> / 
                <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="hover:underline">Shop</a> / 
                <span><?php the_title(); ?></span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">

                <div class="flex gap-3 flex-col-reverse sm:flex-row">
                    <div class="swiper hy-swiper-product max-h-[750px]">
                        <div class="swiper-wrapper">
                            <?php if ( $main_image ) : ?>
                                <div class="swiper-slide">
                                    <?= get_image($main_image, 'thumbnail object-cover cursor-pointer border-2 border-black opacity-100 bg-[#F5F5F5] w-[90px] h-[131px]'); ?>
                                </div>
                            <?php endif; ?>

                            <?php foreach ( $gallery_ids as $gallery_id ) : ?>
                                <?php $gallery_image = wp_get_attachment_image_src( $gallery_id, 'full' ); ?>
                                <div class="swiper-slide">
                                    <?= get_image($gallery_id, 'thumbnail object-cover cursor-pointer border-2 border-gray-300 hover:border-black opacity-60 bg-[#F5F5F5] w-[90px] h-[131px]'); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="main-product-image overflow-hidden">
                        <?php if ( $main_image ) : ?>
                            <div id="mainImage">
                                <?php 
                                // Get the image with onclick event
                                $image_html = get_image($main_image, 'object-cover w-full h-auto sm:max-w-[550px] sm:h-[750px]');
                                // Add onclick event to the image
                                $image_html = str_replace('<img', '<img onclick="openModal(this)" style="cursor: pointer;"', $image_html);
                                echo $image_html;
                                ?>
                            </div>
                        <?php else : ?>
                            <div class="w-[550px] h-[750px] bg-gray-200 flex items-center justify-center text-gray-500">
                                No Image Available
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Modal -->
                    <div id="imageModal" class="modal">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <div class="modal-content">
                            <img id="modalImage" class="modal-image" src="" alt="Zoomed Image">
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <h1 class="text-[32px] font-medium text-[#27221E] font-secondary"><?php the_title(); ?></h1>

                    <?php if ( $product->get_short_description() ) : ?>
                        <div class="text-gray-600 sm:text-xl text-lg leading-relaxed">
                            <?php echo $product->get_short_description(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="space-y-3">
                        <!-- Woocommerce Variable form -->
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>

                    <div class="flex sm:items-center sm:flex-row flex-col gap-6 text-sm">
                        <?php hy_shared_btn( get_the_title(), get_permalink() ); ?>

                        <div class="my-wishlist-btn">
                            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                        </div>

                        <button id="sizeGuideBtn" class="flex items-center gap-2 text-base font-medium text-black font-secondary cursor-pointer">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5563 1.41421C16.3374 0.633165 17.6037 0.633165 18.3848 1.41421L22.6274 5.65685C23.4085 6.4379 23.4085 7.70423 22.6274 8.48528L8.48527 22.6274C7.70422 23.4085 6.43789 23.4085 5.65684 22.6274L1.4142 18.3848C0.633153 17.6037 0.633154 16.3374 1.4142 15.5563L15.5563 1.41421ZM16.2634 3.53553C16.654 3.14501 17.2871 3.14501 17.6777 3.53553L20.5061 6.36396C20.8966 6.75449 20.8966 7.38765 20.5061 7.77817L19.799 7.07107C19.4085 6.68054 18.7753 6.68054 18.3848 7.07107C17.9942 7.46159 17.9942 8.09476 18.3848 8.48528L19.0919 9.19239L17.6777 10.6066L15.5563 8.48528C15.1658 8.09476 14.5326 8.09476 14.1421 8.48528C13.7516 8.87581 13.7516 9.50897 14.1421 9.89949L16.2634 12.0208L14.8492 13.435L14.1421 12.7279C13.7516 12.3374 13.1184 12.3374 12.7279 12.7279C12.3374 13.1184 12.3374 13.7516 12.7279 14.1421L13.435 14.8492L12.0208 16.2635L9.89948 14.1421C9.50896 13.7516 8.87579 13.7516 8.48527 14.1421C8.09475 14.5327 8.09475 15.1658 8.48527 15.5563L10.6066 17.6777L9.19238 19.0919L8.48527 18.3848C8.09475 17.9943 7.46158 17.9943 7.07106 18.3848C6.68053 18.7753 6.68053 19.4085 7.07106 19.799L7.77816 20.5061C7.38764 20.8966 6.75447 20.8966 6.36395 20.5061L3.53552 17.6777C3.145 17.2871 3.145 16.654 3.53552 16.2635L16.2634 3.53553Z" fill="#0F0F0F"/>
                            </svg>
                            Size Guide
                        </button>
                    </div>

                    <?php
                        $features = get_field('features');

                        $material_and_content = $features['material_and_content'] ?? null;
                        $care = $features['care'] ?? null;
                        $size_and_fit = $features['size_and_fit'] ?? null;
                        $made_to_order = $features['made_to_order'] ?? null;
                        $rush_orders = $features['rush_orders'] ?? null;
                    ?>

                    <div class="mt-12 max-w-[424px]">
                        <?php if( $material_and_content ) : ?>
                            <div class="mb-[24px]">
                                <h3 class="text-[20px] text-[#252525] font-medium mb-2 font-secondary">Material and Content</h3>
                                <p class="text-base text-[#252525] font-normal font-secondary"><?= $material_and_content; ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if( $care ) : ?>
                            <div class="mb-[24px]">
                                <h3 class="text-[20px] text-[#252525] font-medium mb-2 font-secondary">Care</h3>
                                <p class="text-base text-[#252525] font-normal font-secondary"><?= $care; ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if( $size_and_fit ) : ?>
                            <div class="mb-[24px]">
                                <h3 class="text-[20px] text-[#252525] font-medium mb-2 font-secondary">Size and Fit</h3>
                                <p class="text-base text-[#252525] font-normal font-secondary"><?= $size_and_fit; ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if( $made_to_order ) : ?>
                            <div class="mb-[24px]">
                                <h3 class="text-[20px] text-[#252525] font-medium mb-2 font-secondary">Made to Order</h3>
                                <p class="text-base text-[#252525] font-normal font-secondary"><?= $made_to_order; ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if( $rush_orders ) : ?>
                            <div class="mb-[24px]">
                                <h3 class="text-[20px] text-[#252525] font-medium mb-2 font-secondary">Rush Orders</h3>
                                <p class="text-base text-[#252525] font-normal font-secondary"><?= $rush_orders; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

    </div>
</section>

<section class="py-10">
    <div class="container mx-auto px-4">
        <div class="max-w-[550px] text-[#252525] font-secondary" id="faqAccordion">

        <?php if( get_the_content() ) : ?>
            <div class="py-4">
                <button type="button" class="faq-toggle flex justify-between items-center w-full text-left sm:text-[24px] text-[20px] font-medium text-black cursor-pointer">
                    Description
                <span class="toggle-icon text-[24px] width-[24px] height-[24px] transition-transform duration-300">+</span>
                </button>
                <div class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out text-base leading-[1.2] text-black font-normal">
                <div class="pt-4 sm:text-xl text-lg">
                    <?php the_content(); ?>
                </div>
                </div>
            </div>
        <?php endif; ?>

        <?php $global_product_page_content = get_field('global_product_page_content', 'option'); ?>

        <?php if( $global_product_page_content && !empty($global_product_page_content['delivery_policy']) ) : ?>

            <div class="py-4">
                <button type="button" class="faq-toggle flex justify-between items-center w-full text-left sm:text-[24px] text-[20px] font-medium text-black cursor-pointer">
                    Delivery Policy
                    <span class="toggle-icon text-[24px] transition-transform duration-300">+</span>
                </button>
                <div class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out text-base leading-[1.2] text-black font-normal">
                    <div class="pt-4 sm:text-xl text-lg">
                        <?= $global_product_page_content['delivery_policy']; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( $global_product_page_content && !empty($global_product_page_content['how_it_works']) ) : ?>
            <div class="py-4">
                <button type="button" class="faq-toggle flex justify-between items-center w-full text-left sm:text-[24px] text-[20px] font-medium cursor-pointer">
                    How it works
                    <span class="toggle-icon text-[24px] transition-transform duration-300">+</span>
                </button>
                <div class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out text-base leading-[1.2] text-black font-normal">
                    <div class="pt-4 sm:text-xl text-lg">
                        <?= $global_product_page_content['how_it_works']; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="py-4 flex justify-between items-center cursor-pointer" id="sizeGuideBtn2">
            <span class="sm:text-[24px] text-[20px] font-medium text-black">Size Guide</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </div>

        </div>
    </div>
</section>

<section class="mt-44 pb-14">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-medium text-[#27221E] mb-8">You May Also Like</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php $args = array(
                'post_type' => 'product',
                'posts_per_page' => 4,
                'orderby' => 'rand',
                'post_status' => 'publish',
                'post_not_in' => array( $current_id ),
            );

            $product_cats = wp_get_post_terms( $current_id, 'product_cat' );
            if ( $product_cats && ! is_wp_error( $product_cats ) ) {
                $cat_ids = array();
                foreach( $product_cats as $cat ) {
                    $cat_ids[] = $cat->term_id;
                }
                
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'post_status' => 'publish',
                    'post_not_in' => array( $current_id ),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'term_id',
                            'terms'    => $cat_ids,
                        ),
                    ),
                );
            }

            $related_products = new WP_Query( $args );

            if( $related_products->have_posts() ) : 
                while( $related_products->have_posts() ) : 
                    $related_products->the_post(); 

                    global $product;
                    $product_id = $product->get_id();
                    $product_link = get_permalink( $product_id );
                    $product_image = get_post_thumbnail_id( $product_id ); ?>
    
                    <div class="group w-full">
                        <!-- Product Image -->
                        <a href="<?php echo esc_url( $product_link ); ?>" class="block overflow-hidden">
                            <?php if ( $product_image ) : ?>
                                <?= get_image($product_image, 'object-cover w-full h-[300px] sm:h-[350px] md:h-[400px] lg:h-[435px]'); ?>
                            <?php else : ?>
                                <div class="w-full h-[300px] sm:h-[350px] md:h-[400px] lg:h-[435px] bg-gray-200 flex items-center justify-center text-gray-500">
                                    No Image
                                </div>
                            <?php endif; ?>
                        </a>
        
                        <!-- Product Title -->
                        <h3 class="mt-4 text-[#27221E] font-medium text-[20px] leading-tight">
                            <a href="<?php echo esc_url( $product_link ); ?>" class="hover:underline">
                                <?php the_title(); ?>
                            </a>
                        </h3>
        
                        <!-- Product Price -->
                        <div class="mt-2">
                            <?php echo $product->get_price_html(); ?>
                        </div>
                    </div>
    
                <?php endwhile; ?>
            <?php else : ?>
                <div class="col-span-full text-center pb-4">
                    <p class="text-gray-500">No products found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>



<!-- Size Guide Off-canvas - Working Version -->
<div id="sizeGuideOffcanvas" class="offcanvas-container">
    <!-- Overlay -->
    <div class="offcanvas-overlay" id="sizeGuideOverlay"></div>
    
    <!-- Off-canvas Panel -->
    <div class="offcanvas-panel" id="sizeGuidePanel">
        
        <!-- Header -->
        <div class="offcanvas-header">
            <h2 class="text-2xl font-medium text-[#252525] font-secondary">Size Guide</h2>
            <button id="closeSizeGuide" class="close-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Content -->
        <div class="offcanvas-content">
            <?php $global_product_page_size_chart = get_field('global_product_page_size_chart', 'option');
            $chart_img = $global_product_page_size_chart['image_1'];
            $chart_img_2 = $global_product_page_size_chart['image_2'];

            if( $chart_img ) : ?>
                <div class="content-section">
                    <h3 class="text-xl font-medium text-[#252525] font-secondary">Size Chart</h3>
                    <div class="bg-gray-50 mt-6 mb-6 rounded-lg">
                        <?= get_image($chart_img, 'w-full h-auto rounded-md') ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if( $chart_img_2 ) : ?>
                <div class="content-section">
                    <h3 class="text-xl font-medium text-[#252525] font-secondary">How to Measure</h3>
                    <div class="bg-gray-50 mt-6">
                        <?= get_image($chart_img_2, 'w-full h-auto') ?>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</div>


<?php get_footer( 'shop' ); ?>