<?php
    $sections = get_field('sections');

    if( empty( $sections ) ) {
        return;
    }

    $last_key = array_key_last($sections);
?>

<section class="lg:mt-[96px] mt-12 py-12">
    <div class="max-w-7xl mx-auto px-5 flex gap-x-10 items-start"> <!-- Added items-start -->

       <div class="lg:mb-24 mb-12 w-[30%] sticky top-0"> 
            <div class="flex flex-col legal-nav-container gap-3">
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
                            <!-- Added pl-2 (padding-left: 0.5rem) to h2 -->
                            <h2 class="text-gray-500 hover:text-black relative inline-block pl-2">
                                <?= $title; ?>
                                <!-- Adjusted left-0 to left-0 (it's already correct, just ensure it's at the start) -->
                                <span class="active-line-individual absolute top-0 left-0 h-full bg-black"></span>
                            </h2>

                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="w-[50%]">
            <div class="mt-2">
                <?php foreach( $sections as $i => $single ) :
                    if( $single ) :
                        $title = $single['content']['title'];
                        $editor = $single['editor'];
                        if( !$title ) { continue; } ?>

                            <div id="<?= 'legal-link-' . $i; ?>" data-aos="fade-in">
                                <h2 class="text-xl"><?= $title; ?></h2>

                                <div class="flex gap-x-10 legal-image-editor">
                                    <?php if( $editor ) : ?>
                                        <div id="col-legal-page" class="w-full">
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