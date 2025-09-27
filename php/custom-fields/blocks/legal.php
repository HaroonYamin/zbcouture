<?php
    $sections = get_field('sections');

    if( empty( $sections ) ) {
        return;
    }

    $last_key = array_key_last($sections);
?>

<section class="lg:mt-[96px] mt-12 py-12">
    <div class="max-w-[768px] mx-auto px-5">

       <div class="mb-24">
            <div class="flex justify-center legal-nav-container">
                <?php foreach( $sections as $i => $single ) :
                    if( $single ) :
                        $title = $single['content']['title'];
                        if( !$title ) { continue; } ?>
                        <a href="<?= '#legal-link-' . $i; ?>"
                           class="legal-nav-link text-lg uppercase mx-4 pb-2 tracking-widest"
                           data-target-id="<?= 'legal-link-' . $i; ?>"
                           data-aos="fade-in"
                           data-aos-delay="<?= $i * 200; ?>">

                            <!-- Title with underline INSIDE -->
                            <h2 class="text-gray-500 hover:text-black relative inline-block pb-2">
                                <?= $title; ?>
                                <span class="active-line-individual absolute bottom-0 left-0 h-[2px] bg-black transition-all duration-300 ease-in-out w-0"></span>
                            </h2>

                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
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
    const $navLinks = $('.legal-nav-link');
    const $individualActiveLines = $('.active-line-individual');
    const $legalContentSections = $('.legal-content-section');
    const $legalDividers = $('.legal-divider');

    // Hide all content sections initially
    $legalContentSections.addClass('hidden');
    $legalDividers.addClass('hidden');

    function updateActiveState($activeLink) {
        $navLinks.find('h2').removeClass('text-black').addClass('text-gray-500');

        // Hide all individual lines
        $individualActiveLines.css({
            width: '0',
            transform: 'translateX(0)'
        });

        // Activate the clicked link
        $activeLink.find('h2').removeClass('text-gray-500').addClass('text-black');

        const $h2 = $activeLink.find('h2');
        const $currentActiveLine = $activeLink.find('.active-line-individual');

        $currentActiveLine.css({
            width: `${$h2.outerWidth()}px`,
            transform: 'translateX(0)'
        });

        // Show the correct content
        $legalContentSections.addClass('hidden');
        $legalDividers.addClass('hidden');

        const targetId = $activeLink.attr('data-target-id');
        $(targetId).removeClass('hidden');
        $(targetId).next('.legal-divider').removeClass('hidden');
    }

    // Set first link active on load
    if ($navLinks.length > 0) {
        updateActiveState($navLinks.first());
    }

    // Click event
    $navLinks.on('click', function (event) {
        event.preventDefault();
        const $this = $(this);
        updateActiveState($this);

        // Optional scroll
        const targetId = $this.attr('data-target-id');
        const $targetElement = $(targetId);
        if ($targetElement.length) {
            $('html, body').animate({
                scrollTop: $targetElement.offset().top - 100
            }, 500);
        }
    });
});
</script>