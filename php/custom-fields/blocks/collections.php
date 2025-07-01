<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $label = get_field('label');
    $heading = get_field('heading');
    $button = get_field('button');
    $collection = get_field('collections');
?>

<section class="text-center py-[108px] px-4">
    <div class="container mx-auto">
        <?php if( $label ) : ?>
            <p class="uppercase text-base font-normal text-[#27221E] tracking-widest"><?= $label; ?></p>
        <?php endif; ?>

        <?php if( $heading ) : ?>
            <h2 class="sm:text-5xl text-3xl font-primary font-light mt-5 mb-6">
                <?= $heading; ?>
            </h2>
        <?php endif; ?>

        <?php if( $button ) : ?>
            <a href="<?= $button['url']; ?>" 
               class="inline-block px-4 py-3 border border-black sm:text-base text-sm font-medium uppercase tracking-wider hover:bg-black hover:text-white transition"
               target="<?= esc_attr($button['target']); ?>">
                <?= $button['title']; ?>
            </a>
        <?php endif; ?>

        <!-- Responsive Grid -->
        <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-items-center">
            <?php if( $collection ) :
                foreach( $collection as $collect ) :
                    if( $collect ) :
                        $thumbnail_id = get_term_meta( $collect, 'thumbnail_id', true );
                        $term = get_term( $collect );
                        $term_link = get_term_link( $term );
                        ?>
                        
                        <a href="<?= esc_url($term_link); ?>" class="relative w-full lg:w-[315px] h-auto lg:h-[472px] group overflow-hidden block">
                            <?= get_image( $thumbnail_id, 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 group-hover:-translate-y-2' ); ?>

                            <div class="absolute inset-0 bg-black/30 z-10 w-full h-full"></div>

                            <?php if( $term->name ) : ?>
                                <div class="absolute bottom-0 text-white text-left px-4 py-2 z-20 w-full">
                                    <div class="flex flex-col items-start">
                                        <div class="mb-3 border-t border-white sm:w-[272px] w-[320px]"></div>
                                        <span class="text-3xl font-primary font-normal tracking-wider"><?= $term->name; ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </a>

                    <?php endif;
                endforeach;
            endif; ?>
        </div>
    </div>
</section>
