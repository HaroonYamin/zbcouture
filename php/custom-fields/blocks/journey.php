<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $label = get_field('label');
    $heading = get_field('heading');
    $cards = get_field('cards');
?>

<section class="bg-[#F5F5F3] py-24">
    <div class="container mx-auto px-4">

        <?php if( $label ) : ?>
            <h5 class="text-sm font-normal uppercase tracking-widest text-[#27221E] mb-[25px] text-center"><?= $label; ?></h5>
        <?php endif; ?>

        <?php if( $heading ) : ?>
            <h2 class="text-[40px] font-light font-primary italic leading-tight text-[#27221E] mb-[47px] max-w-[530px] mx-auto text-center">
                <?= $heading; ?>
            </h2>
        <?php endif; ?>

        <div class="flex flex-col md:flex-row justify-center items-stretch gap-8">
            <?php if( $cards ) :
                foreach( $cards as $card ) :
                    if( $card ) :
                        $title = $card['title'];
                        $paragraph = $card['paragraph'];
                        $button = $card['button']; ?>

                        <div class="bg-[#FFFFFF] border border-[#D1D1D1] sm:py-[55px] sm:px-[60px] p-[32px] w-full max-w-[560px]">
                            <?php if( $title ) : ?>
                                <h3 class="text-2xl font-medium mb-[20px] text-black"><?= $title; ?></h3>
                            <?php endif; ?>

                            <?php if( $paragraph ) : ?>
                                <p class="text-black text-lg mb-[20px]">
                                    <?= $paragraph; ?>
                                </p>
                            <?php endif; ?>

                            <?php if( $button ) : ?>
                                <a href="<?= $button['url']; ?>" 
                                    class="inline-block font-medium text-[16px] bg-white border border-[#27221E] rounded-[12px] text-[#27221E] px-[26px] py-[12px] hover:bg-[#27221E] hover:text-white transition"
                                    target="<?= $button['target']; ?>">

                                    <?= $button['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>

                    <?php endif; 
                endforeach; 
            endif; ?>
        </div>
    </div>
</section>