<?php
    $enable = get_field('enable');

    if(  !$enable ) {
        return;
    }

    $heading = get_field('heading');
    $button = get_field('button');
?>

<section class="bg-[#f3f3ef] flex items-center justify-center sm:my-32 my-16 sm:py-32 py-16">
    <div class="container text-center px-4">
        <?php if( $heading ) : ?>
            <h2 class="text-[34px] md:text-5xl font-normal font-primary text-[#212121] leading-widest max-w-[523px] mx-auto italic"
                data-aos="fade-up" data-aos-delay="50">
                <?= $heading; ?> 
            </h2>
        <?php endif; ?>

        <?php if( $button ) : ?>
            <a href="<?= $button['url']; ?>" 
               class="inline-block font-medium text-[16px] mt-8 font-secondary border border-[#27221E] rounded-[12px] text-[#27221E] px-[26px] py-[12px] hover:bg-[#27221E] hover:text-white transition"
               target="<?= $button['target']; ?>"
               data-aos="fade-up" data-aos-delay="150">
               <?= $button['title']; ?>
            </a>
        <?php endif; ?>
    </div>
</section>
