<?php
    $sections = get_field('sections');

    if( empty( $sections ) ) {
        return;
    }

    $last_key = array_key_last($sections);
?>

<section class="lg:mt-[96px] mt-12 py-12">
    <div class="max-w-[768px] mx-auto px-5">

       <div class="lg:mb-24 mb-12">
            <div class="flex flex-col md:flex-row justify-center legal-nav-container">
                <?php foreach( $sections as $i => $single ) :
                    if( $single ) :
                        $title = $single['content']['title'];
                        if( !$title ) { continue; } ?>
                        <a href="<?= '#legal-link-' . $i; ?>"
                           class="legal-nav-link lg:text-lg text-base uppercase lg:mx-4 mx-1 pb-2 tracking-widest"
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
