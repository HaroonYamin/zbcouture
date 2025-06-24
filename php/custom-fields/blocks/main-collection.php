<?php
get_header();
?>


<section class="py-16">
  <div class="container mx-auto px-4">

		<!-- Breadcrumb -->
		<div class="text-sm text-[#797878] mb-4 font-medium mt-16">
			<a href="<?php echo home_url(); ?>" class="hover:underline">Home</a> / <span>Collections</span>
		</div>

		<!-- Page Title -->
		<h1 class="text-3xl font-medium text-[#27221E] mb-[36px]">Collections</h1>

	</div>
</section>





<section class="container mx-auto px-4">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 my-[99px]">

    <!-- Product Card -->
    <div class="group w-full">
      <a href="#" class="block overflow-hidden">
        <img src="https://via.placeholder.com/400x550/ccc/fff" 
            alt="Product Name" 
            class="object-cover w-full h-[300px] sm:h-[350px] md:h-[400px] lg:h-[435px]" />
      </a>
      <h3 class="mt-4 text-[#27221E] font-medium text-[20px] leading-tight">
        <a href="#" class="hover:underline">Product Title</a>
      </h3>
    </div>
  </div>
</section>


<?php get_footer(); ?>