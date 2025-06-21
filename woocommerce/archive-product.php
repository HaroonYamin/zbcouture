<?php
defined( 'ABSPATH' ) || exit;

echo '<!-- Archive-product.php loaded -->'; // Debug line


get_header( 'shop' );
?>

<!-- archive-product.php (or equivalent template) -->

<section class="py-16">
  <div class="container mx-auto">

		<!-- Breadcrumb -->
		<div class="text-sm text-[#797878] mb-4 font-medium mt-16">
			<a href="#"> Home / Shop</span>
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
				<p class="font-medium text-[16px] text-[#797878]">34 Products</p>
			</div>

		</div>

		<!-- Product Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-[99px]">
			<!-- Product Item -->
			<div>
				<div class="overflow-hidden">
					<img src="http://localhost/zahrabatool/wp-content/uploads/2025/06/lavender.png" alt="Lavender Love" class="object-cover w-[316px] !h-[435px]" />
				</div>
				<h3 class="mt-[18px] text-[#27221E] font-medium text-[20px]">Lavender Love</h3>
			</div>

			<div>
				<div class="overflow-hidden">
					<img src="http://localhost/zahrabatool/wp-content/uploads/2025/06/romancing.png" alt="Lavender Love" class="object-cover w-[316px] h-[435px]" />
				</div>
				<h3 class="mt-[18px] text-[#27221E] font-medium text-[20px]">Romancing Petals</h3>
			</div>

			<div>
				<div class="overflow-hidden">
					<img src="http://localhost/zahrabatool/wp-content/uploads/2025/06/vintage.png" alt="Lavender Love" class="object-cover w-[316px] h-[435px]" />
				</div>
				<h3 class="mt-[18px] text-[#27221E] font-medium text-[20px]">Vintage Plum</h3>
			</div>

			<div>
				<div class="overflow-hidden">
					<img src="http://localhost/zahrabatool/wp-content/uploads/2025/06/vintage.png" alt="Lavender Love" class="object-cover w-[316px] h-[435px]" />
				</div>
				<h3 class="mt-[18px] text-[#27221E] font-medium text-[20px]">Vintage Plum</h3>
			</div>

		</div>
    <div class="text-center">
			<p class="font-medium text-[16px] text-[#797878]">Showing 12 of 34 Products</p>
			<a href="#" class="inline-block font-medium text-[16px] mt-6 bg-transparent border border-[#27221E] rounded-[12px] text-[#27221E] px-8 py-[12px] hover:bg-[#27221E] hover:text-white transition duration-300 ease-in-out">Load More</a></div>
	</div>
</section>

<?php get_footer( 'shop' ); ?>