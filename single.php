<?php
/*
 * Single page
 * Author: Haroon Yamin
 * Author URL: https://www.linkedin.com/in/haroon-webdev/
**/
get_header();
?>

     <!-- Main Container -->
  <main class="max-w-screen-xl mx-auto px-6 sm:px-8 py-24 mt-24">

    <!-- Top Bar -->
    <div class="flex justify-between items-start mb-6">
      <p class="text-sm font-medium text-gray-600">Competitive Offer</p>
      <p class="text-sm text-gray-600">December 20, 2018</p>
    </div>

    <!-- Headline + Image -->
    <div class="grid md:grid-cols-2 items-center gap-8 mb-16">
      <!-- Left Text -->
      <div>
        <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 leading-tight mb-6">
          A home sale twenty years in the making
        </h1>
        <p class="text-xl font-medium text-gray-800">
          Sold her home to Opendoor in Raleigh, NC
        </p>
      </div>

      <!-- Right Image -->
      <div class="rounded-2xl overflow-hidden shadow-sm">
        <img 
          src="https://images.unsplash.com/photo-1582407947304-fd86f028f716?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" 
          alt="Family smiling" 
          class="w-full h-auto object-cover"
        >
      </div>
    </div>


  </main>

    <section class="bg-[#F5F5F0]">
        <div class="max-w-screen-xl mx-auto px-4 py-24">
            
            <!-- Col 1: Empty space on large screens -->
            <div class="hidden xl:block xl:basis-1/10"></div>

            <!-- Col 2: Text content -->
             <div>
                <!-- Quote -->
                <p class="text-lg sm:text-xl font-medium leading-relaxed mb-12 max-w-3xl">
                    “I like feeling like I’m the only one. Customer service is a big thing for me.
                    When the team came out to do the assessment, everybody was nice. I felt special.”
                </p>

                <!-- Image -->
                <div class="mb-12">
                    <img 
                    src="https://images.unsplash.com/photo-1582407947304-fd86f028f716?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" 
                    alt="Customer family" 
                    class="rounded-2xl w-full max-w-2xl object-cover"
                    >
                </div>

                <!-- Paragraph -->
                <p class="text-base sm:text-lg leading-relaxed max-w-3xl">
                    She was even able to move her close date so that she could go out of town for her birthday.
                    Thinking back, she doubts she would have sold her home without Opendoor—
                    the stress and hassle of a traditional sale just wasn’t worth it.
                </p>
             </div>
            

        </div>
    </section>    

<?php get_footer(); ?>