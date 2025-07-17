<?php
defined( 'ABSPATH' ) || exit;

echo '<!-- Archive-product.php loaded -->'; // Debug line

get_header( 'shop' );

// Get current sort order
$current_orderby = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );

// Get current category filter
$current_category = '';
if ( is_product_category() ) {
    $current_category = get_queried_object()->slug;
} elseif ( isset( $_GET['product_cat'] ) ) {
    $current_category = wc_clean( $_GET['product_cat'] );
}

// Get category name for display
$category_name = 'All Categories';
if ( $current_category ) {
    $category_term = get_term_by( 'slug', $current_category, 'product_cat' );
    if ( $category_term ) {
        $category_name = $category_term->name;
    }
}

// Get sort options - using WooCommerce's default catalog ordering options
$sort_labels = apply_filters( 'woocommerce_catalog_orderby', array(
    'menu_order' => __( 'Default sorting', 'woocommerce' ),
    'popularity' => __( 'Sort by popularity', 'woocommerce' ),
    'rating'     => __( 'Sort by average rating', 'woocommerce' ),
    'date'       => __( 'Sort by latest', 'woocommerce' ),
    'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
    'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
) );

// Simplify labels for display
$simple_sort_labels = array(
    'menu_order' => 'Default',
    'popularity' => 'Popularity',
    'rating' => 'Average rating',
    'date' => 'Latest',
    'price' => 'Price: low to high',
    'price-desc' => 'Price: high to low'
);

$current_sort_label = isset( $simple_sort_labels[ $current_orderby ] ) ? $simple_sort_labels[ $current_orderby ] : 'Default';
?>

<!-- archive-product.php (or equivalent template) -->

<section class="py-16">
  <div class="container mx-auto px-4">

		<!-- Breadcrumb -->
		<div class="text-sm text-[#797878] mb-4 font-medium font-secondary mt-16">
			<a href="<?php echo home_url(); ?>" class="hover:underline">Home</a> / <span>Shop</span>
		</div>

		<!-- Page Title -->
		<h1 class="text-3xl font-medium font-secondary text-[#27221E] mb-[36px]">Shop</h1>

		<!-- Sort & Filter -->
		<div class="flex flex-wrap gap-x-4 gap-y-3 items-center justify-between mb-8 text-sm text-gray-600">
			<div class="flex flex-wrap items-center gap-x-16 gap-y-3">

				<!-- Sort Dropdown -->
				<div class="relative flex items-center gap-2">
					<p class="font-medium text-[16px] text-[#797878] font-secondary">Sort by:</p> 
					<div class="relative">
						<button id="sort-dropdown-btn" class="text-[#121212] font-secondary font-medium text-[16px] cursor-pointer hover:text-[#797878] transition-colors">
							<span id="current-sort"><?php echo esc_html( $current_sort_label ); ?></span>
						</button>
						<div id="sort-dropdown" class="font-secondary absolute top-full left-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-50 min-w-[200px] hidden size-max">
							<?php foreach ( $simple_sort_labels as $key => $label ) : ?>
								<a href="<?php echo esc_url( add_query_arg( 'orderby', $key ) ); ?>" 
								   class="block px-4 py-2 text-[14px] hover:bg-gray-50 <?php echo $current_orderby === $key ? 'text-[#121212] font-medium' : 'text-[#797878]'; ?>">
									<?php echo esc_html( $label ); ?>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				
				<!-- Category Filter Dropdown -->
				<div class="relative flex items-center gap-2">
					<p class="font-medium text-[16px] text-[#797878] font-secondary">Filter by:</p> 
					<div class="relative">
						<button id="category-dropdown-btn" class="text-[#121212] font-medium text-[16px] cursor-pointer hover:text-[#797878] transition-colors font-secondary">
							<span id="current-category"><?php echo esc_html( $category_name ); ?></span>
						</button>
						<div id="category-dropdown" class="absolute top-full left-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-50 min-w-[200px] hidden size-max font-secondary">
							<!-- All Categories Option -->
							<a href="<?php echo esc_url( remove_query_arg( 'product_cat' ) ); ?>" 
							   class="block px-4 py-2 text-[14px] hover:bg-gray-50 font-secondary<?php echo empty( $current_category ) ? 'text-[#121212] font-medium' : 'text-[#797878]'; ?>">
								All Categories
							</a>
							<?php
							$product_categories = get_terms( array(
								'taxonomy' => 'product_cat',
								'hide_empty' => true,
								'exclude' => array( get_option( 'default_product_cat' ) ), // Exclude uncategorized
							) );
							
							if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) :
								foreach ( $product_categories as $category ) :
							?>
								<a href="<?php echo esc_url( add_query_arg( 'product_cat', $category->slug ) ); ?>" 
								   class="block px-4 py-2 text-[14px] hover:bg-gray-50 <?php echo $current_category === $category->slug ? 'text-[#121212] font-medium' : 'text-[#797878]'; ?>">
									<?php echo esc_html( $category->name ); ?>
									<span class="text-xs text-gray-400 ml-1">(<?php echo $category->count; ?>)</span>
								</a>
							<?php 
								endforeach;
							endif;
							?>
						</div>
					</div>
				</div>

			</div>

			<div>
				<p class="font-medium text-[16px] text-[#797878] font-secondary"><?php echo wc_get_loop_prop( 'total' ); ?> Products</p>
			</div>

		</div>

		<!-- Product Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-4 gap-y-12 sm:my-[99px] mt-32px mb-[99px]">

			<?php if ( wc_get_loop_prop( 'total' ) ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						global $product;
						$product_id = $product->get_id();
						$product_title = get_the_title( $product_id );
						$product_link = get_permalink( $product_id );
						$product_image = get_post_thumbnail_id( $product_id );
					?>

					<div class="group w-full">
						<!-- Product Image -->
						 <div class="image-container relative">
							 <a href="<?php echo esc_url( $product_link ); ?>" class="block overflow-hidden">
								 <?php if ( $product_image ) : ?>
									 <?= get_image($product_image, 'object-cover w-full h-auto sm:h-[350px] md:h-[400px] lg:h-[435px]'); ?>
								 <?php else : ?>
									 <div class="w-full h-[300px] sm:h-[350px] md:h-[400px] lg:h-[435px] bg-gray-200 flex items-center justify-center text-gray-500">
										 No Image
									 </div>
								 <?php endif; ?>
							 </a>
							<div class="absolute top-4 right-4 flex flex-col gap-2 hover-icons">
								<div class="p-2 bg-white rounded-full shadow-lg hover:bg-blue-100 transition-colors duration-200">
									<?php hy_shared_btn( $product_title, $product_link, '', '' ); ?>
								</div>

								<div class="p-2 bg-white rounded-full shadow-lg hover:bg-blue-100 transition-colors duration-200 yith-text-none">
									<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
								</div>
							</div>
						</div>

						<!-- Product Title -->
						<h3 class="mt-4 text-[#27221E] font-medium text-[20px] leading-tight font-secondary">
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
				<div class="col-span-full text-center py-16">
					<p class="text-gray-500">No products found.</p>
				</div>
			<?php endif; ?>

		</div>

		<!-- Pagination/Load More -->
		<div class="text-center">
			<?php
			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$per_page = wc_get_loop_prop( 'per_page' );
			$total = wc_get_loop_prop( 'total' );
			$current_showing = min( $paged * $per_page, $total );
			$max_pages = wc_get_loop_prop( 'total_pages' );
			?>
			<p class="font-medium text-[16px] text-[#797878] font-secondary">Showing <?php echo $current_showing; ?> of <?php echo $total; ?> Products</p>
			
			<?php if ( $paged < $max_pages ) : ?>
				<a href="<?php echo get_pagenum_link( $paged + 1 ); ?>" class="inline-block font-medium text-[16px] mt-6 bg-transparent border border-[#27221E] rounded-[12px] text-[#27221E] px-8 py-[12px] hover:bg-[#27221E] hover:text-white transition duration-300 ease-in-out">Load More</a>
			<?php endif; ?>
		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sort dropdown functionality
    const sortBtn = document.getElementById('sort-dropdown-btn');
    const sortDropdown = document.getElementById('sort-dropdown');

    // Category dropdown functionality
    const categoryBtn = document.getElementById('category-dropdown-btn');
    const categoryDropdown = document.getElementById('category-dropdown');

    // Toggle sort dropdown
    sortBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        sortDropdown.classList.toggle('hidden');
        
        // Close category dropdown if open
        categoryDropdown.classList.add('hidden');
    });

    // Toggle category dropdown
    categoryBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        categoryDropdown.classList.toggle('hidden');
        
        // Close sort dropdown if open
        sortDropdown.classList.add('hidden');
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!sortBtn.contains(e.target) && !sortDropdown.contains(e.target)) {
            sortDropdown.classList.add('hidden');
        }
        
        if (!categoryBtn.contains(e.target) && !categoryDropdown.contains(e.target)) {
            categoryDropdown.classList.add('hidden');
        }
    });

    // Close dropdowns on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            sortDropdown.classList.add('hidden');
            categoryDropdown.classList.add('hidden');
        }
    });
});
</script>

<?php get_footer( 'shop' ); ?>