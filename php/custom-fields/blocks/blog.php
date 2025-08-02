<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Zahra Batool Couture</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .font-secondary { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white">

    <!-- Main Container -->
    <main class="max-w-screen-xl mx-auto px-6 sm:px-8 py-24 mt-24">

        <!-- Page Header -->
        <div class="text-center mb-16">
            <p class="text-sm font-medium text-gray-600 mb-4">Stories & Inspiration</p>
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 leading-tight mb-6">
                Our Blog
            </h1>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto">
                Discover the latest trends, real bride stories, and behind-the-scenes insights from the world of luxury bridal couture
            </p>
        </div>

        <!-- Featured Article -->
        <article class="mb-20 bg-[#F5F5F0] rounded-2xl overflow-hidden">
            <div class="flex flex-col lg:flex-row">
                <!-- Image -->
                <div class="lg:w-1/2">
                    <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Featured wedding dress" 
                         class="w-full h-64 lg:h-full object-cover">
                </div>
                <!-- Content -->
                <div class="lg:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                    <span class="text-sm font-medium text-gray-600 mb-3">Featured Story</span>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 leading-tight">
                        A Dream Wedding Dress Journey with Zahra
                    </h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Jennifer's Perfect NYC Wedding Experience - From the initial consultation to the final fitting, every detail was carefully crafted to bring her vision to life.
                    </p>
                    <div class="flex items-center justify-between">
                        <a href="#" class="inline-block font-medium text-[16px] font-secondary border border-[#27221E] rounded-[12px] text-[#27221E] px-[26px] py-[12px] hover:bg-[#27221E] hover:text-white transition">
                            Read Story
                        </a>
                        <span class="text-sm text-gray-600">June 15, 2024</span>
                    </div>
                </div>
            </div>
        </article>

        <!-- Blog Posts Container -->
        <div class="flex flex-col space-y-12">

            <!-- Blog Post 1 -->
            <article class="flex flex-col md:flex-row gap-8 border-b border-gray-200 pb-12">
                <div class="md:w-1/3">
                    <img src="https://images.unsplash.com/photo-1595476108010-b4d1f102b1b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Bridal fashion trends 2024" 
                         class="w-full h-64 object-cover rounded-2xl">
                </div>
                <div class="md:w-2/3 flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-sm font-medium text-gray-600">Fashion Trends</span>
                        <span class="text-sm text-gray-500">•</span>
                        <span class="text-sm text-gray-500">May 28, 2024</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 leading-tight">
                        Top 5 Bridal Fashion Trends for 2024
                    </h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Discover the most sought-after bridal fashion trends this season. From minimalist elegance to bold statement pieces, see what's capturing brides' hearts worldwide.
                    </p>
                    <a href="#" class="text-[#27221E] font-medium hover:underline">Read More →</a>
                </div>
            </article>

            <!-- Blog Post 2 -->
            <article class="flex flex-col md:flex-row-reverse gap-8 border-b border-gray-200 pb-12">
                <div class="md:w-1/3">
                    <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Wedding dress fitting guide" 
                         class="w-full h-64 object-cover rounded-2xl">
                </div>
                <div class="md:w-2/3 flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-sm font-medium text-gray-600">Bridal Tips</span>
                        <span class="text-sm text-gray-500">•</span>
                        <span class="text-sm text-gray-500">May 20, 2024</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 leading-tight">
                        The Ultimate Guide to Wedding Dress Fittings
                    </h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Everything you need to know about wedding dress fittings. From timing to what to expect, we'll guide you through each step of perfecting your dream dress.
                    </p>
                    <a href="#" class="text-[#27221E] font-medium hover:underline">Read More →</a>
                </div>
            </article>

            <!-- Blog Post 3 -->
            <article class="flex flex-col md:flex-row gap-8 border-b border-gray-200 pb-12">
                <div class="md:w-1/3">
                    <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Behind the scenes" 
                         class="w-full h-64 object-cover rounded-2xl">
                </div>
                <div class="md:w-2/3 flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-sm font-medium text-gray-600">Behind the Scenes</span>
                        <span class="text-sm text-gray-500">•</span>
                        <span class="text-sm text-gray-500">May 15, 2024</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 leading-tight">
                        Crafting Perfection: Our Design Process
                    </h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Take a peek behind the curtain and discover how we transform your dreams into reality. From initial sketches to the final stitch, every detail matters.
                    </p>
                    <a href="#" class="text-[#27221E] font-medium hover:underline">Read More →</a>
                </div>
            </article>

            <!-- Blog Post 4 -->
            <article class="flex flex-col md:flex-row-reverse gap-8 border-b border-gray-200 pb-12">
                <div class="md:w-1/3">
                    <img src="https://images.unsplash.com/photo-1566174581259-db3d9e4e5b1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Real bride story" 
                         class="w-full h-64 object-cover rounded-2xl">
                </div>
                <div class="md:w-2/3 flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-sm font-medium text-gray-600">Real Bride Story</span>
                        <span class="text-sm text-gray-500">•</span>
                        <span class="text-sm text-gray-500">May 10, 2024</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 leading-tight">
                        Sarah's Magical Moment in Custom Couture
                    </h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Meet Sarah, whose vision for a timeless yet modern wedding dress became reality through our collaborative design process. Her story will inspire your own journey.
                    </p>
                    <a href="#" class="text-[#27221E] font-medium hover:underline">Read More →</a>
                </div>
            </article>

            <!-- Blog Post 5 -->
            <article class="flex flex-col md:flex-row gap-8 border-b border-gray-200 pb-12">
                <div class="md:w-1/3">
                    <img src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Fabric selection guide" 
                         class="w-full h-64 object-cover rounded-2xl">
                </div>
                <div class="md:w-2/3 flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-sm font-medium text-gray-600">Style Guide</span>
                        <span class="text-sm text-gray-500">•</span>
                        <span class="text-sm text-gray-500">May 5, 2024</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 leading-tight">
                        Choosing the Perfect Fabric for Your Dream Dress
                    </h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Silk, lace, or satin? Understand the characteristics of different fabrics and how they can enhance your wedding dress design and comfort on your special day.
                    </p>
                    <a href="#" class="text-[#27221E] font-medium hover:underline">Read More →</a>
                </div>
            </article>

            <!-- Blog Post 6 -->
            <article class="flex flex-col md:flex-row-reverse gap-8">
                <div class="md:w-1/3">
                    <img src="https://images.unsplash.com/photo-1594736797933-d0401ba3cd6b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Wedding planning tips" 
                         class="w-full h-64 object-cover rounded-2xl">
                </div>
                <div class="md:w-2/3 flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-sm font-medium text-gray-600">Wedding Planning</span>
                        <span class="text-sm text-gray-500">•</span>
                        <span class="text-sm text-gray-500">April 28, 2024</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 leading-tight">
                        When to Start Your Wedding Dress Journey
                    </h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Planning the perfect timeline for your custom wedding dress. Learn when to start, what to expect, and how to ensure everything is ready for your big day.
                    </p>
                    <a href="#" class="text-[#27221E] font-medium hover:underline">Read More →</a>
                </div>
            </article>

        </div>

        <!-- Load More Button -->
        <div class="text-center mt-16">
            <button class="inline-block font-medium text-[16px] font-secondary border border-[#27221E] rounded-[12px] text-[#27221E] px-[32px] py-[14px] hover:bg-[#27221E] hover:text-white transition">
                Load More Articles
            </button>
        </div>

    </main>

    <!-- Newsletter Section -->
    <section class="bg-[#F5F5F0] py-20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold text-gray-900 mb-4">Stay Inspired</h3>
            <p class="text-lg text-gray-700 mb-8 max-w-2xl mx-auto">
                Subscribe to our newsletter for the latest bridal trends, real bride stories, and exclusive behind-the-scenes content.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" 
                       placeholder="Enter your email" 
                       class="flex-1 px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#27221E] focus:border-transparent">
                <button class="font-medium text-[16px] font-secondary bg-[#27221E] rounded-[12px] text-white px-[26px] py-[12px] hover:bg-gray-800 transition">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

</body>
</html>