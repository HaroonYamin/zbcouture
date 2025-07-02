<?php
/*
 * Single page
 * Author: Haroon Yamin
 * Author URL: https://www.linkedin.com/in/haroon-webdev/
**/
get_header();
?>

    <!-- Main Article Container -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 mt-24">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        
        <!-- Category Tag -->
        <div class="mb-6">
            <span class="inline-flex items-center text-sm font-semibold uppercase tracking-wide">
            <?php the_author(); ?>
            </span>
        </div>

        <!-- Article Header -->
        <header class="mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                <?php the_title(); ?>
            </h1>
            
            <!-- Meta Information -->
            <div class="flex flex-col md:flex-row md:items-center gap-4 text-sm text-gray-600 mb-8">
                <time datetime="2018-12-21" class="font-medium">Published on <?php echo get_the_date(); ?></time>
            </div>
        </header>

        <!-- Featured Image -->
        <div class="mb-12">
            <img 
                src="https://images.unsplash.com/photo-1582407947304-fd86f028f716?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2096&q=80" 
                alt="George and Carol Bertoty" 
                class="w-full h-96 object-cover rounded-lg shadow-lg"
            >
        </div>

        <!-- Article Content -->
        <article class="prose prose-lg prose-gray max-w-none">
            
            <!-- Repeated Header Info (as in original) -->
            <div class="mb-8 p-6 bg-gray-50 rounded-lg border-l-4 border-opendoor-blue">
                <p class="text-sm text-gray-600 mb-2">December 21, 2018</p>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">The Bertotys used Opendoor to skip the home-selling stress and retire in style</h2>
                <p class="text-sm text-gray-700">Sold their home to Opendoor in Las Vegas, NV</p>
            </div>

            <!-- Main Article Text -->
            <div class="space-y-6 text-lg leading-relaxed">
                <p class="text-xl font-medium text-gray-800 mb-8">
                    At age 66 and 71, George and Carol Bertoty were ready to quit taking care of their house and start fully enjoying retirement. The couple had lived in their Spring Valley, Nevada home for 20 years, and a lot of work was needed to maintain it.
                </p>

                <p>
                    "It was going to need a new air conditioner, a new refrigerator, a new this, a new that," George remembers, "So it was time to move out and not have the responsibilities of landscaping and all that other stuff."
                </p>

                <p>
                    After checking out a few senior living options, the Bertoty's found their new home in an assisted living facility in Henderson. They were excited about moving into their new apartment, but dreaded the upcoming process of selling their old home.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">Seeking a simpler way to sell</h2>

                <p>
                    Between them, they'd sold 3 homes before and were familiar with the stress of the process. "It took a long time and there was a lot of hassle" Carol recalled, "you have to get the kids out of the house for showings and you have to keep everything spot on."
                </p>

                <p>
                    Though it'd been many years since their last sale, they'd heard horror stories from friends who had sold recently. "We knew some people who had lived through months and months of having to keep the house just so, and every time someone wanted to look at it they had to leave, they had to get the dogs out of there, it was just one hassle after another. We didn't want to go through that."
                </p>

                <p>
                    When George heard an ad for <a href="#" class="text-opendoor-blue hover:underline font-medium">Opendoor</a> on the radio offering a new, simpler way to sell their home, he realized it could be the perfect solution. The biggest draw was the fact that if they sold to Opendoor, they wouldn't have to do any upgrades or repair work to the 20-year old home.
                </p>

                <blockquote class="border-l-4 border-opendoor-blue bg-opendoor-light-blue p-6 my-8 italic text-xl">
                    "We're of the age where we didn't want to do a lot of work on the house. We just wanted out of there! Move on with life."
                </blockquote>

                <p>
                    "We don't like the idea of having to fix a place up for somebody else, and they're not going to even like it. They should be able to do what they want with the place, not what we want", Carol explained.
                </p>

                <p>
                    At first, the couple were skeptical. But since requesting an offer online was so easy, George decided to give it a try. He had analyzed comparable homes in the area, and when Opendoor came back with an offer that was "right smack dab around the value of the house," it dispelled their skepticism.
                </p>

                <p>
                    At the same time, the Bertotys had also requested an offer from an Opendoor competitor in Las Vegas. That offer came in about $30,000 lower than Opendoor's, reinforcing to them that Opendoor was the right company to work with.
                </p>

            </div>
        </article>

        <!-- Call to Action Section -->
        <div class="mt-16 border border-[black] rounded-2xl p-8 text-center text-black">
            <h3 class="text-[28px] font-semibold mb-6 font-primary">Ready to sell your home stress-free?</h3>
            <p class="mb-6 text-lg font-secondary">Get an instant offer and skip the traditional selling hassles.</p>
            <a href="#" class="inline-block px-4 py-3 border border-[#27221E] rounded-2xl font-secondary sm:text-base text-sm font-medium text-[#27221E] hover:bg-gray-800 hover:text-white transition">
               Our consultation
            </a>
        </div>
        <?php endwhile; endif; ?>
    </main>

<?php get_footer(); ?>