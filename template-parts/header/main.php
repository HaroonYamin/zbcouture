<?php 
    // Get header icons from ACF Options page (used in mobile)
    $icons = get_field('header_icons', 'option'); 
    $wishlist = $icons['wishlist'];
    $account = $icons['account']; 
    $cart = $icons['cart']; 

    // Get true/false field from current page
    $white_header = get_field('white_header'); 

    // Dynamic text/icon color classes
    $text_class = $white_header ? 'text-white' : 'text-black';
    $svg_stroke = $white_header ? '#FFFFFF' : '#0F0F0F';
    $header_nav = $white_header ? '' : 'white-nav';
    $header_icon = $white_header ? 'hover:bg-hover' : 'hover:bg-[rgba(0,0,0,0.05)]';

    // Logos from ACF Options
    $logos = get_field('header_logos', 'option');
    $black_logo = $logos['black_logo'];
    $white_logo = $logos['white_logo'];
    $sticky_logo = get_field('sticky_logo', 'option'); // ACF image (array)
    $enable_sticky = get_field('enable_sticky_header'); // From current page

?> 

<!-- Change from 'fixed' to 'absolute' initially -->
<header id="site-header" class="absolute top-0 w-full z-50 h-auto py-2 mt-18 header smooth-header-transition <?= $text_class; ?> <?= $header_nav; ?>"> 
     <div class="flex justify-between items-center px-4 lg:pr-23 lg:pl-21 py-2"> 
        
        <!-- Left Menu (Desktop) -->
        <?php if( !is_checkout() ) : ?>
        <div class="hidden lg:block">
            <?php wp_nav_menu(['theme_location' => 'left-header-menu']); ?>
        </div>
        <?php endif; ?>

        <!-- Center Logo -->
        <?php $checkout_align = is_checkout() ? 'my-3' : ''; ?>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 sm:w-[202px] w-[120px] <?= $checkout_align; ?>"> 
            <a href="<?= home_url(); ?>" class="block w-full h-auto">
                <img 
                    src="<?= $white_header ? $white_logo['url'] : $black_logo['url']; ?>"
                    data-white="<?= $white_logo['url']; ?>"
                    data-black="<?= $black_logo['url']; ?>"
                    data-sticky="<?= $sticky_logo['url']; ?>"
                    class="header-logo logo-consistent-dimensions"
                    alt="<?= get_bloginfo('name'); ?>"
                    loading="eager"
                />
            </a>
        </div>

        <!-- Right Menu & Icons (Desktop) -->
        <?php if( !is_checkout() ) : ?>
        <div class="hidden lg:flex flex-row items-center gap-5"> 
            <div> 
                <?php wp_nav_menu(['theme_location' => 'right-header-menu']); ?> 
            </div> 
            <div class="flex flex-row gap-1"> 
                <?php if( $wishlist ) : ?> 
                    <a href="<?= $wishlist; ?>" class="<?= $header_icon; ?> block p-1.5 rounded smooth-icon-transition"> 
                        <svg width="24" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="header-icon-svg smooth-svg-transition">
                            <path d="M17.3671 3.84172C16.9415 3.41589 16.4361 3.0781 15.8799 2.84763C15.3237 2.61716 14.7275 2.49854 14.1254 2.49854C13.5234 2.49854 12.9272 2.61716 12.371 2.84763C11.8147 3.0781 11.3094 3.41589 10.8838 3.84172L10.0004 4.72506L9.11709 3.84172C8.25735 2.98198 7.09129 2.49898 5.87542 2.49898C4.65956 2.49898 3.4935 2.98198 2.63376 3.84172C1.77401 4.70147 1.29102 5.86753 1.29102 7.08339C1.29102 8.29925 1.77401 9.46531 2.63376 10.3251L10.0004 17.6917L17.3671 10.3251C17.7929 9.89943 18.1307 9.39407 18.3612 8.83785C18.5917 8.28164 18.7103 7.68546 18.7103 7.08339C18.7103 6.48132 18.5917 5.88514 18.3612 5.32893C18.1307 4.77271 17.7929 4.26735 17.3671 3.84172Z" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a> 
                <?php endif; ?> 

                <?php if( $account ) : ?> 
                    <a href="<?= $account; ?>" class="<?= $header_icon; ?> block p-1.5 rounded smooth-icon-transition"> 
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="header-icon-svg smooth-svg-transition">
                            <path d="M20 21.5V19.5C20 18.4391 19.5786 17.4217 18.8284 16.6716C18.0783 15.9214 17.0609 15.5 16 15.5H8C6.93913 15.5 5.92172 15.9214 5.17157 16.6716C4.42143 17.4217 4 18.4391 4 19.5V21.5" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 11.5C14.2091 11.5 16 9.70914 16 7.5C16 5.29086 14.2091 3.5 12 3.5C9.79086 3.5 8 5.29086 8 7.5C8 9.70914 9.79086 11.5 12 11.5Z" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a> 
                <?php endif; ?> 

                <?php if( $cart ) : ?>
                    <a href="<?= $cart; ?>" class="<?= $header_icon; ?> block p-1.5 rounded smooth-icon-transition"> 
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="header-icon-svg smooth-svg-transition">
                            <path d="M6 2.5L3 6.5V20.5C3 21.0304 3.21071 21.5391 3.58579 21.9142C3.96086 22.2893 4.46957 22.5 5 22.5H19C19.5304 22.5 20.0391 22.2893 20.4142 21.9142C20.7893 21.5391 21 21.0304 21 20.5V6.5L18 2.5H6Z" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 6.5H21" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 10.5C16 11.5609 15.5786 12.5783 14.8284 13.3284C14.0783 14.0786 13.0609 14.5 12 14.5C10.9391 14.5 9.92172 14.0786 9.17157 13.3284C8.42143 12.5783 8 11.5609 8 10.5" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                <?php endif; ?> 
            </div> 
        </div>

        <!-- Mobile Toggle -->
        <div class="lg:hidden">
            <button onclick="toggleMobileMenu()" class="hover:text-gray-300 focus:outline-none align-middle smooth-icon-transition">
                <svg class="w-6 h-6 smooth-svg-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Icons -->
        <div class="lg:hidden flex flex-row gap-1 ml-auto">
            <?php if( $wishlist ) : ?> 
                <a href="<?= $wishlist; ?>" class="p-1 flex items-center smooth-icon-transition"> 
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="header-icon-svg smooth-svg-transition">
                        <path d="M17.3671 3.84172C16.9415 3.41589 16.4361 3.0781 15.8799 2.84763C15.3237 2.61716 14.7275 2.49854 14.1254 2.49854C13.5234 2.49854 12.9272 2.61716 12.371 2.84763C11.8147 3.0781 11.3094 3.41589 10.8838 3.84172L10.0004 4.72506L9.11709 3.84172C8.25735 2.98198 7.09129 2.49898 5.87542 2.49898C4.65956 2.49898 3.4935 2.98198 2.63376 3.84172C1.77401 4.70147 1.29102 5.86753 1.29102 7.08339C1.29102 8.29925 1.77401 9.46531 2.63376 10.3251L10.0004 17.6917L17.3671 10.3251C17.7929 9.89943 18.1307 9.39407 18.3612 8.83785C18.5917 8.28164 18.7103 7.68546 18.7103 7.08339C18.7103 6.48132 18.5917 5.88514 18.3612 5.32893C18.1307 4.77271 17.7929 4.26735 17.3671 3.84172Z" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a> 
            <?php endif; ?> 

            <?php if( $account ) : ?> 
                <a href="<?= $account; ?>" class="p-1 flex items-center smooth-icon-transition"> 
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="header-icon-svg smooth-svg-transition">
                        <path d="M20 21.5V19.5C20 18.4391 19.5786 17.4217 18.8284 16.6716C18.0783 15.9214 17.0609 15.5 16 15.5H8C6.93913 15.5 5.92172 15.9214 5.17157 16.6716C4.42143 17.4217 4 18.4391 4 19.5V21.5" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 11.5C14.2091 11.5 16 9.70914 16 7.5C16 5.29086 14.2091 3.5 12 3.5C9.79086 3.5 8 5.29086 8 7.5C8 9.70914 9.79086 11.5 12 11.5Z" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a> 
                <?php endif; ?> 

                <?php if( $cart ) : ?>
                    <a href="<?= $cart; ?>" class="p-1 flex items-center smooth-icon-transition"> 
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="header-icon-svg smooth-svg-transition">
                            <path d="M6 2.5L3 6.5V20.5C3 21.0304 3.21071 21.5391 3.58579 21.9142C3.96086 22.2893 4.46957 22.5 5 22.5H19C19.5304 22.5 20.0391 22.2893 20.4142 21.9142C20.7893 21.5391 21 21.0304 21 20.5V6.5L18 2.5H6Z" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 6.5H21" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 10.5C16 11.5609 15.5786 12.5783 14.8284 13.3284C14.0783 14.0786 13.0609 14.5 12 14.5C10.9391 14.5 9.92172 14.0786 9.17157 13.3284C8.42143 12.5783 8 11.5609 8 10.5" stroke="<?= $svg_stroke; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    <?php endif; ?> 
                </div>
            </div>

            
            <?php endif; ?>

        </header>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden fixed inset-0 z-50 bg-white text-black overflow-y-auto w-full max-w-[300px] shadow" style="display: none;">
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


        <style>
        /* Smooth Header Transitions - Ultra smooth */
        .smooth-header-transition {
            transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
            transition-property: background-color, color, box-shadow, margin-top, transform, opacity, position, top;
        }

        .smooth-logo-transition {
            transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
            transition-property: opacity, transform;
        }

        .smooth-icon-transition {
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            transition-property: color, background-color, opacity, transform;
        }

        .smooth-svg-transition path {
            transition: stroke 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* Enhanced hover effects with smooth transitions */
        .smooth-icon-transition:hover {
            transform: translateY(-1px);
        }

        /* Smooth scroll behavior for entire page */
        html {
            scroll-behavior: smooth;
        }

        /* Header becomes sticky when scrolled */
        .header.scrolled {
            position: fixed !important;
            top: 0 !important;
            transform: translateY(0);
            backdrop-filter: blur(10px);
            margin-top: 0 !important;
        }

        /* Mobile menu smooth transitions */
        #mobile-menu {
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* Desktop logo dimensions */
        @media (min-width: 640px) {
            .logo-consistent-dimensions {
                width: 202px !important;
                height: 48px !important; 
            }
        }

        /* Mobile logo dimensions */
        @media (max-width: 639px) {
            .logo-consistent-dimensions {
                width: 104px !important;
                height: 30px !important; 
            }
        }
        </style>

        <script>
          document.addEventListener("DOMContentLoaded", function () {
            const header = document.getElementById("site-header");
            const logo = document.querySelector(".header-logo");
            
            // Increased scroll trigger for later activation
            const scrollTrigger = 150;
            
            let ticking = false;

            const strokeWhite = "#FFFFFF";
            const strokeBlack = "#0F0F0F";

            const whiteHeader = <?= $white_header ? 'true' : 'false'; ?>;

            function setStrokeColor(color) {
              // Update both desktop and mobile SVG icons with ultra smooth transition
              document.querySelectorAll(".header-icon-svg path").forEach(path => {
                path.style.transition = "stroke 0.8s cubic-bezier(0.23, 1, 0.32, 1)";
                path.setAttribute("stroke", color);
              });
            }

            function updateHeader() {
              if (window.scrollY > scrollTrigger) {
                // Scrolled state - make header fixed/sticky with white background
                header.classList.add("bg-white", "shadow-md", "text-black", "scrolled");
                header.classList.remove("text-white", "mt-18");
                header.style.position = "fixed";
                header.style.top = "0";

                // Ultra smooth logo transition
                if (logo) {
                  logo.style.transition = "opacity 0.6s cubic-bezier(0.23, 1, 0.32, 1)";
                  logo.style.opacity = "0.9";
                  setTimeout(() => {
                    if (logo.dataset.sticky && logo.dataset.sticky !== '') {
                      logo.src = logo.dataset.sticky;
                    } else if (logo.dataset.black) {
                      logo.src = logo.dataset.black;
                    }
                    logo.style.opacity = "1";
                  }, 150);
                }

                setStrokeColor(strokeBlack);
              } else {
                // Top of page - header is not sticky, use absolute positioning
                header.classList.remove("bg-white", "shadow-md", "text-black", "scrolled");
                header.classList.add("mt-18");
                header.style.position = "absolute";
                header.style.top = "0";

                if (whiteHeader) {
                  header.classList.add("text-white");
                  // Ultra smooth logo transition for white header
                  if (logo && logo.dataset.white) {
                    logo.style.transition = "opacity 0.6s cubic-bezier(0.23, 1, 0.32, 1)";
                    logo.style.opacity = "0.9";
                    setTimeout(() => {
                      logo.src = logo.dataset.white;
                      logo.style.opacity = "1";
                    }, 150);
                  }
                  setStrokeColor(strokeWhite);
                } else {
                  header.classList.add("text-black");
                  // Ultra smooth logo transition for black header
                  if (logo && logo.dataset.black) {
                    logo.style.transition = "opacity 0.6s cubic-bezier(0.23, 1, 0.32, 1)";
                    logo.style.opacity = "0.9";
                    setTimeout(() => {
                      logo.src = logo.dataset.black;
                      logo.style.opacity = "1";
                    }, 150);
                  }
                  setStrokeColor(strokeBlack);
                }
              }
              ticking = false;
            }

            function requestHeaderUpdate() {
              if (!ticking) {
                requestAnimationFrame(updateHeader);
                ticking = true;
              }
            }

            // Use throttled scroll for better performance
            window.addEventListener("scroll", requestHeaderUpdate, { passive: true });
            
            // Run once on page load
            updateHeader();
          });

          // Enhanced mobile menu toggle with smooth transitions
          function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const isHidden = menu.style.display === 'none' || menu.classList.contains('hidden');
            
            if (isHidden) {
              menu.style.display = 'block';
              menu.classList.remove('hidden');
              // Add smooth slide-in effect
              setTimeout(() => {
                menu.style.transform = 'translateX(0)';
                menu.style.opacity = '1';
              }, 10);
            } else {
              menu.style.transform = 'translateX(-100%)';
              menu.style.opacity = '0';
              setTimeout(() => {
                menu.style.display = 'none';
                menu.classList.add('hidden');
              }, 400);
            }
          }
        </script>