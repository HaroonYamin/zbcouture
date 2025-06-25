<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $image = get_field('background_image');
    $heading = get_field('heading');
    $first = get_field('paragraph')['first'];
    $second = get_field('paragraph')['second'];
    $button = get_field('button');
?>

<section class="relative h-screen bg-cover bg-center sm:bg-fixed bg-scroll text-white flex items-center justify-center px-4"
    <?php if( $image ) : ?>
        style="background-image: url('<?= $image; ?>');"
    <?php endif; ?> >
  
    <div class="absolute inset-0 bg-black/40 z-0"></div>

    <div class="relative z-10 max-w-3xl text-center">
        <?php if( $heading ) : ?>
            <h2 class="sm:text-[40px] text-[36px] font-normal font-primary italic sm:mb-8 mb-[21px] max-w-[600px] mx-auto">
                <?= $heading; ?>
            </h2>
        <?php endif; ?>

        <?php if( $first ) : ?>
            <p class="sm:text-xl text-[16px] font-light text-white/80 mb-[22px] max-w-[650px] mx-auto">
                <?= $first; ?>
            </p>
        <?php endif; ?>

        <?php if( $second ) : ?>
            <p class="sm:text-xl text-[16px] font-light text-white/80 max-w-[600px] mx-auto sm:mb-[44px] mb-[37px]">
                <?= $second; ?>
            </p>
        <?php endif; ?>

        <?php if( $button) : ?>
            <a href="<?= $button['url']; ?>" 
                class="font-medium text-[16px] bg-white/10 border border-white rounded-[12px] text-white px-8 py-[12px] hover:bg-gray-200 transition hover:text-black"
                target="<?= $button['target']; ?>">
                <?= $button['title']; ?>
            </a>
        <?php endif; ?>
    </div>
</section>