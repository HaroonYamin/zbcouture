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
            <h5 class="text-sm font-normal uppercase font-secondary tracking-widest text-[#27221E] mb-[25px] text-center" 
                data-aos="fade-up" 
                data-aos-delay="50"><?= $label; ?></h5>
        <?php endif; ?>

        <?php if( $heading ) : ?>
            <h2 class="text-[40px] font-light font-primary italic leading-tight text-[#27221E] mb-[47px] max-w-[530px] mx-auto text-center"
                data-aos="fade-up" 
                data-aos-delay="100">
                <?= $heading; ?>
            </h2>
        <?php endif; ?>

        <div class="flex flex-col md:flex-row justify-center items-stretch gap-8">
            <?php if( $cards ) :
                foreach( $cards as $i => $card ) :
                    if( $card ) :
                        $title = $card['title'];
                        $paragraph = $card['paragraph'];
                        $button = $card['button'];
                        $delay = 200 + ($i * 100); // 200ms, 300ms, 400ms...
                        ?>

                        <div class="bg-[#FFFFFF] border border-[#D1D1D1] sm:py-[55px] sm:px-[60px] p-[32px] w-full max-w-[560px]"
                             data-aos="fade-up"
                             data-aos-delay="<?= $delay; ?>">
                             
                            <?php if( $title ) : ?>
                                <h3 class="text-2xl font-medium font-secondary mb-[20px] text-black"><?= $title; ?></h3>
                            <?php endif; ?>

                            <?php if( $paragraph ) : ?>
                                <p class="text-black text-lg font-secondary mb-[20px]">
                                    <?= $paragraph; ?>
                                </p>
                            <?php endif; ?>

                            <?php if( $button ) : ?>
                                <a href="<?= $button['url']; ?>" 
                                    class="inline-block font-medium text-base font-secondary bg-white border border-[#27221E] rounded-[12px] text-[#27221E] px-[26px] py-[12px] hover:bg-[#27221E] hover:text-white transition"
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