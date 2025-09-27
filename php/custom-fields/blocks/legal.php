<?php
    $sections = get_field('sections');

    if( empty( $sections ) ) {
        return;
    }

    $last_key = array_key_last($sections);
?>

<section class="lg:mt-[96px] mt-12 py-12">
    <div class="max-w-[920px] mx-auto px-5">

       <div class="mb-24">
    <div class="flex justify-center legal-nav-container">
        <?php foreach( $sections as $i => $single ) :
            if( $single ) :
                $title = $single['content']['title'];
                if( !$title ) { continue; } ?>
                <a href="<?= '#legal-link-' . $i; ?>" 
                   class="legal-nav-link text-xl uppercase mx-4" 
                   data-target-id="<?= 'legal-link-' . $i; ?>" 
                   data-aos="fade-in" 
                   data-aos-delay="<?= $i * 200; ?>">
                    <h2 class="text-gray-500 hover:text-black"><?= $title; ?></h2>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    
    <!-- This will be the single continuous line container -->
    <div class="relative w-full h-1 bg-gray-300 mt-2">
        <!-- This is the active line indicator -->
        <div class="absolute top-0 left-0 h-full bg-black transition-all duration-300 ease-in-out" id="active-line-indicator"></div>
    </div>
</div>


        

            
        <div class="w-full">
            <div class="mt-2">
                <?php foreach( $sections as $i => $single ) :
                    if( $single ) :
                        $title = $single['content']['title'];
                        $editor = $single['editor'];
                        if( !$title ) { return; } ?>

                            <div id="<?= 'legal-link-' . $i; ?>" data-aos="fade-in">
                                <h2 class="text-xl"><?= $title; ?></h2>
        
                                <div class="flex gap-x-10 legal-image-editor">
                                    <?php if( $editor ) : ?>
                                        <div id="col-legal-page">
                                            <?= $editor; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?= $i !== $last_key ? '<div class="my-8 h-px bg-gray-300 w-full"></div>' : ''; ?>

                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
</section>




<script>
jQuery(document).ready(function ($) {
    // Hide all content sections initially
    $('.legal-content-section').addClass('hidden');
    $('.legal-divider').addClass('hidden');


    // Function to update active state
    function updateActiveState(targetId) {
        // Remove active class from all nav links
        $('.legal-nav-link h2').removeClass('text-black').addClass('text-gray-500');
        $('.legal-nav-link .line').removeClass('bg-black').addClass('bg-gray-300');

        // Add active class to the clicked nav link
        $(`a[data-target-id="${targetId}"] h2`).removeClass('text-gray-500').addClass('text-black');
        $(`a[data-target-id="${targetId}"] .line`).removeClass('bg-gray-300').addClass('bg-black');

        // Hide all content sections and dividers
        $('.legal-content-section').addClass('hidden');
        $('.legal-divider').addClass('hidden');

        // Show the target content section and its subsequent divider
        $(targetId).removeClass('hidden');
        $(targetId).next('.legal-divider').removeClass('hidden');
    }

    // Legal link click handling
    $('.legal-nav-link').on("click", function (e) {
        e.preventDefault();
        const targetId = $(this).attr("data-target-id");
        updateActiveState(targetId);
    });

    // Set initial active state (first section by default)
    if ($('.legal-nav-link').length > 0) {
        const firstTargetId = $('.legal-nav-link').first().attr('data-target-id');
        updateActiveState(firstTargetId);
    }
});
</script>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.legal-nav-link');
        const activeLineIndicator = document.getElementById('active-line-indicator');

        // Function to update the active state and line position
        function updateActiveState(activeLink) {
            navLinks.forEach(link => {
                link.querySelector('h2').classList.remove('text-black');
                link.querySelector('h2').classList.add('text-gray-500');
            });

            activeLink.querySelector('h2').classList.remove('text-gray-500');
            activeLink.querySelector('h2').classList.add('text-black');

            // Position and size the active line indicator
            const containerRect = document.querySelector('.legal-nav-container').getBoundingClientRect();
            const linkRect = activeLink.getBoundingClientRect();

            // Calculate position relative to the start of the container or parent
            const offsetLeft = linkRect.left - containerRect.left; 

            activeLineIndicator.style.width = `${linkRect.width}px`;
            activeLineIndicator.style.transform = `translateX(${offsetLeft}px)`;
        }

        // Set initial active link (e.g., the first one)
        if (navLinks.length > 0) {
            updateActiveState(navLinks[0]);
        }

        // Add click event listeners
        navLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior if you're using JS for scrolling
                updateActiveState(this);

                // Optional: Scroll to target ID if needed
                const targetId = this.getAttribute('data-target-id');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    // Smooth scroll or just instant jump
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    });
</script>
