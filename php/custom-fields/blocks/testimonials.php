<?php
    $enable = get_field('enable');

    if ( !$enable ) {
        return;
    }

    $label = get_field('label');
    $heading = get_field('heading');
    $images = get_field('images');
    $paragraph = get_field('paragraph');
    $customer = get_field('customer');
    $role = get_field('role');
?>

<section class="bg-[#F5F5F0] sm:py-48 py-12 sm:my-32 my-16">
    <div class="container mx-auto px-6">

        <div class="text-center mb-12">
            <?php if( $label ) : ?>
                <p class="uppercase sm:text-base text-sm font-normal tracking-widest text-[#27221E] mb-6"><?= $label; ?></p>
            <?php endif; ?>

            <?php if( $heading ) : ?>
                <h2 class="text-3xl lg:text-5xl font-normal italic font-primary text-[#27221E] max-w-[290px] m-auto"><?= $heading; ?></h2>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="relative w-full flex sm:justify-center justify-start">
                <div class="relative">
                    <?php if( $images[0] ) : ?>
                        <img
                        src="<?= $images[0]['url']; ?>"
                        alt="<?= $images[0]['alt']; ?>"
                        class="sm:w-[298px] sm:h-[348px] w-[250px] h-[320px] object-cover"/>
                    <?php endif; ?>

                    <?php if( $images[1] ) : ?>
                        <img
                        src="<?= $images[1]['url']; ?>"
                        alt="<?= $images[1]['alt']; ?>"
                        class="sm:w-[193px] sm:h-[195px] w-[140px] h-[140px] object-cover absolute sm:bottom-[-100px] sm:right-[-100px] -bottom-[40px] -right-[50px]"/>
                    <?php endif; ?>
                </div>
            </div>

            <div class="text-left mt-[32px]">
                <?php if( $paragraph ) : ?>
                    <p class="sm:text-2xl text-lg font-normal text-[#27221E] mb-6 max-w-[648px] mx-auto lg:mx-0">
                        <?= $paragraph; ?>
                    </p>
                <?php endif; ?>

                <?php if( $customer ) : ?>
                    <p class="italic font-primary text-2xl font-normal text-[#27221E] mb-1"><?= $customer; ?></p>
                <?php endif; ?>

                <?php if( $role ) : ?>
                    <p class="text-base font-medium text-[#535353]"><?= $role; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
