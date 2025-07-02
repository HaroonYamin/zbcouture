<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$currect_id = get_queried_object_id();

get_header( 'shop' ); ?>

<section class="py-8 lg:py-16">
    <div class="container mx-auto px-4">

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

                <div class="space-y-4 flex gap-3">
                    <div class="max-w-[550px] overflow-x-auto whitespace-nowrap scrollbar-hide">
                        <div class="flex flex-col gap-3 overflow-auto">
                            <?php if ( $main_image ) : ?>
                                <div class="flex-shrink-0">
                                    <?= get_image($main_image, 'thumbnail object-cover cursor-pointer border-2 border-black opacity-100 bg-[#F5F5F5] w-[90px] h-[131px]'); ?>
                                </div>
                            <?php endif; ?>

                            <?php foreach ( $gallery_ids as $gallery_id ) : ?>
                                <?php $gallery_image = wp_get_attachment_image_src( $gallery_id, 'full' ); ?>
                                <div class="flex-shrink-0">
                                    <?= get_image($gallery_id, 'thumbnail object-cover cursor-pointer border-2 border-gray-300 hover:border-black opacity-60 bg-[#F5F5F5] w-[90px] h-[131px]'); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="main-product-image overflow-hidden">
                        <?php if ( $main_image ) : ?>
                            <div id="mainImage">
                                <?= get_image($main_image, 'object-cover w-[550px] h-[750px]'); ?>
                            </div>
                        <?php else : ?>
                            <div class="w-[550px] h-[750px] bg-gray-200 flex items-center justify-center text-gray-500">
                              No Image Available
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="space-y-6">
                    <h1 class="text-[32px] font-medium text-[#27221E] font-secondary"><?php the_title(); ?></h1>

                    <?php if ( $product->get_short_description() ) : ?>
                        <div class="text-gray-600 text-sm leading-relaxed">
                            <?php echo $product->get_short_description(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="space-y-3">
                        <!-- Woocommerce Variable form -->
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>

                    <div class="flex items-center gap-6 text-sm">
                        <button class="flex items-center gap-2 text-base font-medium text-black font-secondary cursor-pointer" 
                            data-title="Amazing WordPress Product"
                            data-url="https://example.com/product/amazing-product"
                            data-text="Check out this amazing product!"
                            id="hy-share-button">

                            <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                            </svg>
                            Share
                        </button>


                        <div class="my-wishlist-btn">
                            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                        </div>

                        <button class="flex items-center gap-2 text-base font-medium text-black font-secondary">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5563 1.41421C16.3374 0.633165 17.6037 0.633165 18.3848 1.41421L22.6274 5.65685C23.4085 6.4379 23.4085 7.70423 22.6274 8.48528L8.48527 22.6274C7.70422 23.4085 6.43789 23.4085 5.65684 22.6274L1.4142 18.3848C0.633153 17.6037 0.633154 16.3374 1.4142 15.5563L15.5563 1.41421ZM16.2634 3.53553C16.654 3.14501 17.2871 3.14501 17.6777 3.53553L20.5061 6.36396C20.8966 6.75449 20.8966 7.38765 20.5061 7.77817L19.799 7.07107C19.4085 6.68054 18.7753 6.68054 18.3848 7.07107C17.9942 7.46159 17.9942 8.09476 18.3848 8.48528L19.0919 9.19239L17.6777 10.6066L15.5563 8.48528C15.1658 8.09476 14.5326 8.09476 14.1421 8.48528C13.7516 8.87581 13.7516 9.50897 14.1421 9.89949L16.2634 12.0208L14.8492 13.435L14.1421 12.7279C13.7516 12.3374 13.1184 12.3374 12.7279 12.7279C12.3374 13.1184 12.3374 13.7516 12.7279 14.1421L13.435 14.8492L12.0208 16.2635L9.89948 14.1421C9.50896 13.7516 8.87579 13.7516 8.48527 14.1421C8.09475 14.5327 8.09475 15.1658 8.48527 15.5563L10.6066 17.6777L9.19238 19.0919L8.48527 18.3848C8.09475 17.9943 7.46158 17.9943 7.07106 18.3848C6.68053 18.7753 6.68053 19.4085 7.07106 19.799L7.77816 20.5061C7.38764 20.8966 6.75447 20.8966 6.36395 20.5061L3.53552 17.6777C3.145 17.2871 3.145 16.654 3.53552 16.2635L16.2634 3.53553Z" fill="#0F0F0F"/>
                            </svg>
                            Size Guide
                        </button>
                    </div>

                    <?php
                        $features = get_field('features');
                        $material_and_content = $features['material_and_content'];
                        $care = $features['care'];
                        $size_and_fit = $features['size_and_fit'];
                        $made_to_order = $features['made_to_order'];
                        $rush_orders = $features['rush_orders'];
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
                <div class="pt-4">
                    <!-- woocommerce product description -->
                    <?php the_content(); ?>
                </div>
                </div>
            </div>
        <?php endif; ?>

        <?php $global_product_page_content = get_field('global_product_page_content', 'option'); ?>

        <?php if( $global_product_page_content['delivery_policy'] ) : ?>
            <div class="py-4">
                <button type="button" class="faq-toggle flex justify-between items-center w-full text-left sm:text-[24px] text-[20px] font-medium text-black cursor-pointer">
                    Delivery Policy
                    <span class="toggle-icon text-[24px] transition-transform duration-300">+</span>
                </button>
                <div class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out text-base leading-[1.2] text-black font-normal">
                    <div class="pt-4">
                        <?= $global_product_page_content['delivery_policy']; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( $global_product_page_content['how_it_works'] ) : ?>
            <div class="py-4">
                <button type="button" class="faq-toggle flex justify-between items-center w-full text-left sm:text-[24px] text-[20px] font-medium cursor-pointer">
                    How it works
                    <span class="toggle-icon text-[24px] transition-transform duration-300">+</span>
                </button>
                <div class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out text-base leading-[1.2] text-black font-normal">
                    <div class="pt-4">
                        <?= $global_product_page_content['how_it_works']; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="py-4 flex justify-between items-center cursor-pointer">
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
                'post__not_in' => array( $currect_id ),
            );

            $product_cats = wp_get_post_terms( $currect_id, 'product_cat' );
            if ( $product_cats && ! is_wp_error( $product_cats ) ) {
                $cat_ids = array();
                foreach( $product_cats as $cat ) {
                    $cat_ids[] = $cat->term_id;
                }
                
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'post_status' => 'publish',
                    'post__not_in' => array( $currect_id ),
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

<?php get_footer( 'shop' ); ?>
