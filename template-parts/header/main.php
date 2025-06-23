<?php 
    $icons = get_field('header_icons', 'option'); 
    $account = $icons['account']; 
    $cart = $icons['cart']; 
?> 

<header class="absolute w-full z-20 header h-10 mt-8"> 
    <div class="container mx-auto"> 
        <div class="flex flex-row justify-between items-center px-4 relative"> 
            <!-- Desktop Left Menu -->
            <div class="hidden lg:block"> 
                <?php wp_nav_menu( ['theme_location' => 'left-header-menu'] ); ?> 
            </div> 
 
            <!-- Logo (centered) -->
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 sm:w-[202px] w-[120px]"> 
                <?= the_custom_logo(); ?> 
            </div> 
 
            <!-- Desktop Right Menu & Icons -->
            <div class="hidden lg:flex flex-row items-center gap-5"> 
                <div> 
                    <?php wp_nav_menu( ['theme_location' => 'right-header-menu'] ); ?> 
                </div> 
 
                <div class="flex flex-row gap-1"> 
                    <?php if( $account ) : ?> 
                        <a href="#" class="hover:bg-hover block p-1 rounded"> 
                            <img src="<?= $account; ?>" alt="account icon" class="w-6 h-6"> 
                        </a> 
                    <?php endif; ?> 
     
                    <?php if( $cart ) : ?> 
                        <a href="#" class="hover:bg-hover block p-1 rounded"> 
                            <img src="<?= $cart; ?>" alt="cart icon" class="w-6 h-6"> 
                        </a> 
                    <?php endif; ?> 
                </div> 
            </div>

            <!-- Mobile Layout (visible on screens < 1024px) -->
            <!-- Mobile Toggle Button (Left Side) -->
            <div class="lg:hidden">
                <button onclick="toggleMobileMenu()" id="mobile-menu-toggle" class="text-white hover:text-gray-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Icons (Right Side) -->
            <div class="lg:hidden flex flex-row gap-1 ml-auto">
                <?php if( $account ) : ?> 
                    <a href="#" class="hover:bg-hover block p-1 rounded"> 
                        <img src="<?= $account; ?>" alt="account icon" class="w-6 h-6"> 
                    </a> 
                <?php endif; ?> 
 
                <?php if( $cart ) : ?> 
                    <a href="#" class="hover:bg-hover block p-1 rounded"> 
                        <img src="<?= $cart; ?>" alt="cart icon" class="w-6 h-6"> 
                    </a> 
                <?php endif; ?> 
            </div>
        </div> 

        <!-- Mobile Menu (hidden by default) -->
        <div id="mobile-menu" class="lg:hidden hidden fixed inset-0 z-50 bg-white text-black overflow-y-auto" style="display: none;">
            <div class="flex justify-end p-4">
                <button onclick="toggleMobileMenu()" class="text-black hover:text-gray-500 text-3xl font-bold">
                    &times;
                </button>
            </div>
            <div class="py-4 px-6">
                <!-- Left Menu Items -->
                <div class="mb-4">
                    <?php 
                    wp_nav_menu( [
                        'theme_location' => 'left-header-menu',
                        'menu_class' => 'mobile-nav-menu space-y-2',
                        'container' => false
                    ] ); 
                    ?> 
                </div>

                <!-- Right Menu Items -->
                <div>
                    <?php 
                    wp_nav_menu( [
                        'theme_location' => 'right-header-menu',
                        'menu_class' => 'mobile-nav-menu space-y-2',
                        'container' => false
                    ] ); 
                    ?> 
                </div>
            </div>
        </div>

    </div> 
</header>

