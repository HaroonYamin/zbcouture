<?php 
    // Get header icons from ACF Options page (used in mobile)
    $icons = get_field('header_icons', 'option'); 
    $account = $icons['account']; 
    $cart = $icons['cart']; 

    // Get true/false field from current page
    $white_header = get_field('white_header'); 

    // Dynamic text/icon color classes
    $text_class = $white_header ? 'text-black' : 'text-white';
    $svg_stroke = $white_header ? '#0F0F0F' : '#FFFFFF';
?> 

<header class="absolute w-full z-20 header h-10 mt-8 <?= $text_class; ?>"> 
    <div class="container mx-auto"> 
        <div class="flex flex-row justify-between items-center px-4 relative"> 
            
            <!-- Left Menu (Desktop) -->
            <div class="hidden lg:block"> 
                <?php wp_nav_menu(['theme_location' => 'left-header-menu']); ?> 
            </div> 
 
            <!-- Logo (Center) -->
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 sm:w-[202px] w-[120px]"> 
                <?= the_custom_logo(); ?> 
            </div> 
 
            <!-- Right Menu & Icons (Desktop) -->
            <div class="hidden lg:flex flex-row items-center gap-5"> 
                <div> 
                    <?php wp_nav_menu(['theme_location' => 'right-header-menu']); ?> 
                </div> 
                <div class="flex flex-row gap-1"> 
                    <a href="#" class="hover:bg-hover block p-1 rounded"> 
                        <!-- Account SVG -->
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 21.5V19.5C20 18.4391 19.5786 17.4217 18.8284 16.6716C18.0783 15.9214 17.0609 15.5 16 15.5H8C6.93913 15.5 5.92172 15.9214 5.17157 16.6716C4.42143 17.4217 4 18.4391 4 19.5V21.5" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 11.5C14.2091 11.5 16 9.70914 16 7.5C16 5.29086 14.2091 3.5 12 3.5C9.79086 3.5 8 5.29086 8 7.5C8 9.70914 9.79086 11.5 12 11.5Z" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a> 
                    <a href="#" class="hover:bg-hover block p-1 rounded"> 
                        <!-- Cart SVG -->
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 2.5L3 6.5V20.5C3 21.0304 3.21071 21.5391 3.58579 21.9142C3.96086 22.2893 4.46957 22.5 5 22.5H19C19.5304 22.5 20.0391 22.2893 20.4142 21.9142C20.7893 21.5391 21 21.0304 21 20.5V6.5L18 2.5H6Z" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 6.5H21" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 10.5C16 11.5609 15.5786 12.5783 14.8284 13.3284C14.0783 14.0786 13.0609 14.5 12 14.5C10.9391 14.5 9.92172 14.0786 9.17157 13.3284C8.42143 12.5783 8 11.5609 8 10.5" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a> 
                </div> 
            </div>

            <!-- Mobile Toggle -->
            <div class="lg:hidden">
                <button onclick="toggleMobileMenu()" class="hover:text-gray-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Icons -->
            <div class="lg:hidden flex flex-row gap-1 ml-auto">
                <?php if( $account ) : ?> 
                    <a href="#" class="hover:bg-hover block p-1 rounded"> 
                        <img src="<?= esc_url($account); ?>" alt="account icon" class="w-6 h-6"> 
                    </a> 
                <?php endif; ?> 
                <?php if( $cart ) : ?> 
                    <a href="#" class="hover:bg-hover block p-1 rounded"> 
                        <img src="<?= esc_url($cart); ?>" alt="cart icon" class="w-6 h-6"> 
                    </a> 
                <?php endif; ?> 
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden fixed inset-0 z-50 bg-white text-black overflow-y-auto" style="display: none;">
            <div class="flex justify-end p-4">
                <button onclick="toggleMobileMenu()" class="hover:text-gray-500 text-3xl font-bold">
                    &times;
                </button>
            </div>
            <div class="py-4 px-6">
                <!-- Left Menu -->
                <div class="mb-4">
                    <?php 
                    wp_nav_menu([
                        'theme_location' => 'left-header-menu',
                        'menu_class' => 'mobile-nav-menu space-y-2',
                        'container' => false
                    ]); 
                    ?> 
                </div>

                <!-- Right Menu -->
                <div>
                    <?php 
                    wp_nav_menu([
                        'theme_location' => 'right-header-menu',
                        'menu_class' => 'mobile-nav-menu space-y-2',
                        'container' => false
                    ]); 
                    ?> 
                </div>
            </div>
        </div>
    </div> 
</header>


