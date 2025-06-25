<?php
defined( 'ABSPATH' ) || exit;

echo '<!-- Archive-product.php loaded -->'; // Debug line

get_header( 'shop' );
?>

<!-- archive-product.php (or equivalent template) -->

<section class="py-16">
  <div class="container mx-auto px-4">

		<!-- Breadcrumb -->
		<div class="text-sm text-[#797878] mb-4 font-medium mt-16">
			<a href="<?php echo home_url(); ?>" class="hover:underline">Home</a> / <span>Shop</span>
		</div>

		<!-- Page Title -->
		<h1 class="text-3xl font-medium text-[#27221E] mb-[36px]">Shop</h1>

		<!-- Sort & Filter -->
		<div class="flex items-center justify-between mb-8 text-sm text-gray-600">
			<div class="flex items-center gap-16">

				<div class="flex items-center gap-2">
					<p class="font-medium text-[16px] text-[#797878]">Sort by:</p> <span class="text-[#121212] font-medium text-[16px]">Latest</span>
				</div>
				
				<div class="flex items-center gap-2">
					<p class="font-medium text-[16px] text-[#797878]">Filter by:</p> <span class="text-[#121212] font-medium text-[16px]">Gowns</span>
				</div>

			</div>

			<div>
				<p class="font-medium text-[16px] text-[#797878]"><?php echo wc_get_loop_prop( 'total' ); ?> Products</p>
			</div>

		</div>

		<!-- Product Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 my-[99px]">

			<?php if ( wc_get_loop_prop( 'total' ) ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						global $product;
						$product_id = $product->get_id();
						$product_link = get_permalink( $product_id );
						$product_image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'medium' );
					?>

					<div class="group w-full">
						<!-- Product Image -->
						<a href="<?php echo esc_url( $product_link ); ?>" class="block overflow-hidden">
							<?php if ( $product_image ) : ?>
								<img src="<?php echo esc_url( $product_image[0] ); ?>"
										alt="<?php the_title_attribute(); ?>"
										class="object-cover w-full h-[300px] sm:h-[350px] md:h-[400px] lg:h-[435px]" />
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

						<!-- Product Price (Optional) -->
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
			<p class="font-medium text-[16px] text-[#797878]">Showing <?php echo $current_showing; ?> of <?php echo $total; ?> Products</p>
			
			<?php if ( $paged < $max_pages ) : ?>
				<a href="<?php echo get_pagenum_link( $paged + 1 ); ?>" class="inline-block font-medium text-[16px] mt-6 bg-transparent border border-[#27221E] rounded-[12px] text-[#27221E] px-8 py-[12px] hover:bg-[#27221E] hover:text-white transition duration-300 ease-in-out">Load More</a>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer( 'shop' ); ?>