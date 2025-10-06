<?php
    $sections = get_field('sections');

    if( empty( $sections ) ) {
        return;
    }

    $last_key = array_key_last($sections);
?>

<section class="lg:mt-[96px] mt-12 py-12">
    <div class="max-w-7xl mx-auto px-5 flex flex-col lg:flex-row gap-y-8 lg:gap-x-10 items-start relative">

       <div class="w-full lg:w-[30%]">
            <div class="lg:sticky lg:top-24 lg:mb-24 mb-12">
                <div class="flex flex-col legal-nav-container gap-3">
                    <?php foreach( $sections as $i => $single ) :
                        if( $single ) :
                            $title = $single['content']['title'];
                            if( !$title ) { continue; } ?>
                            <a href="<?= '#legal-link-' . $i; ?>"
                               class="legal-nav-link text-base lg:text-lg uppercase lg:mx-4 mx-1 pb-2 tracking-widest"
                               data-target-id="<?= 'legal-link-' . $i; ?>"
                               data-aos="fade-in"
                               data-aos-delay="<?= $i * 200; ?>">

                                <h2 class="text-gray-500 hover:text-black relative inline-block pl-2">
                                    <?= $title; ?>
                                    <span class="active-line-individual absolute top-0 left-0 h-full bg-black"></span>
                                </h2>

                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-[50%]">
            <div class="mt-2">
                <?php foreach( $sections as $i => $single ) :
                    if( $single ) :
                        $title = $single['content']['title'];
                        $editor = $single['editor'];
                        if( !$title ) { continue; } ?>

                            <div id="<?= 'legal-link-' . $i; ?>" data-aos="fade-in">
                                <h2 class="text-xl"><?= $title; ?></h2>

                                <div class="flex flex-col legal-image-editor">
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