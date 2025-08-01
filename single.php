<?php 
/* 
 * Single page - Wedding Testimonial
 * Author: Haroon Yamin 
 * Author URL: https://www.linkedin.com/in/haroon-webdev/ 
**/ 
get_header(); 
?> 
 
     <!-- Main Container --> 
  <main class="max-w-screen-xl mx-auto px-6 sm:px-8 py-24 mt-24"> 
 
    <!-- Top Bar --> 
    <div class="flex justify-between items-start mb-6"> 
      <p class="text-sm font-medium text-gray-600">Real Love, Real Stories</p> 
      <p class="text-sm text-gray-600">June 15, 2024</p> 
    </div> 
 
    <!-- Headline + Image --> 
    <div class="grid md:grid-cols-2 items-center gap-8 mb-16"> 
      <!-- Left Text --> 
      <div> 
        <h1 class="text-4xl sm:text-6xl font-bold text-gray-900 leading-tight mb-6 font-primary"> 
          A Dream Wedding Dress Journey with Zahra 
        </h1> 
        <p class="text-xl font-medium text-gray-800"> 
          Jennifer's Perfect NYC Wedding Experience 
        </p> 
      </div> 
 
      <!-- Right Image --> 
      <div class="rounded-2xl overflow-hidden shadow-sm"> 
        <img  
          src="http://localhost/zahrabatool/wp-content/uploads/2025/07/wed.jpg"  
          alt="Beautiful bride in elegant wedding dress"  
          class="w-full h-auto object-cover" 
        > 
      </div> 
    </div> 

 
  </main> 
 
  <!-- Quote Section --> 
  <section class="bg-[#F5F5F0]"> 
    <div class="max-w-screen-xl mx-auto px-4 py-24 xl:flex"> 
       
      <!-- Left Empty Space: 40% on xl and up --> 
      <div class="hidden xl:block xl:basis-[40%]"></div> 
 
      <!-- Right Content: 60% on xl and up --> 
      <div class="w-full xl:basis-[60%]"> 
         
        <!-- Quote --> 
        <p class="text-lg sm:text-xl font-medium leading-relaxed mb-12 max-w-3xl"> 
          "I'm so happy with my gorgeous dress! Zahra has made my dream come true. 
          I'll be wearing a piece of art, so unique and beautiful. I also really appreciated 
          Zahra's communication along the entire process, from the first message, and her 
          efforts to make things easy and comfortable for me." 
        </p> 
 
        <!-- Bride Image --> 
        <div class="mb-12"> 
          <img  
            src="https://images.unsplash.com/photo-1606800052052-a08af7148866?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"  
            alt="Bride in beautiful wedding dress"  
            class="rounded-2xl w-full max-w-2xl object-cover" 
          > 
        </div> 
 
        <!-- Client Name --> 
        <div class="mb-8"> 
          <h3 class="text-2xl font-bold text-gray-900 mb-2 font-primary">Jennifer Ritz</h3> 
          <p class="text-gray-600">NYC Wedding</p> 
        </div> 
 
        <!-- Story Paragraph --> 
        <p class="text-base sm:text-lg leading-relaxed max-w-3xl mb-8"> 
          Jennifer's journey with Zahra began months before her special day. From the initial 
          consultation to the final fitting, every detail was carefully crafted to bring her 
          vision to life. The dress became more than just a garment—it was a reflection of 
          her personality, her style, and her love story. 
        </p> 
 
        <p class="text-base sm:text-lg leading-relaxed max-w-3xl"> 
          What made the experience truly special was Zahra's attention to detail and personal 
          touch. Every adjustment, every embellishment, and every conversation was focused on 
          making Jennifer feel like the most beautiful version of herself on her wedding day. 
        </p> 
      </div> 
 
    </div> 
  </section> 

  
  <!-- Final Quote Section --> 
  <section class="py-24"> 
    <div class="max-w-4xl mx-auto px-4 text-center"> 
      <blockquote class="text-2xl sm:text-5xl font-medium text-gray-900 leading-relaxed mb-8 font-primary"> 
        "Working with Zahra was like having a fairy godmother. She didn't just create a dress; 
        she created a dream." 
      </blockquote> 
      <p class="text-lg text-gray-600">- Jennifer Ritz, Bride</p> 
    </div> 
  </section> 

  <!-- Call to Action --> 
  <section class="bg-[#F5F5F0] py-16"> 
    <div class="max-w-4xl mx-auto px-4 text-center"> 
      <h3 class="text-2xl font-bold text-gray-900 mb-4 font-primary">Ready to Create Your Dream Dress?</h3> 
      <p class="text-lg text-gray-700 mb-8">Let's bring your vision to life, just like we did for Jennifer.</p> 
      <a href="#" 
          class="inline-block font-medium text-[16px] mt-3 font-secondary border border-[#27221E] rounded-[12px] text-[#27221E] px-[26px] py-[12px] hover:bg-[#27221E] hover:text-white transition">
        Book Consultation
      </a>
    </div> 
  </section> 
     
<?php get_footer(); ?>