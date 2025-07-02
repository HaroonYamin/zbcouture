<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $cards = get_field('cards');
?>

<section class="py-16 text-center">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-y-12 md:gap-y-0 text-[#27221E]">
            <?php if( $cards ) :
                foreach( $cards as $i => $card ) :
                    if( $card ) :
                        $border = $i % 4 !== 0 ? 'md:border-l border-[#D1D1D1]' : ''; ?>
                        
                        <div class="px-6 md:px-4 flex flex-col items-center <?= $border; ?> <?= $i > 3 ? 'mt-8' : ''; ?>">
                            <?php if( $card['title'] ) : ?>
                                <h3 class="text-xl font-medium font-secondary mb-2"><?= $card['title']; ?></h3>
                            <?php endif; ?>

                            <?php if( $card['paragraph'] ) : ?>
                                <p class="text-base font-light font-secondary"><?= $card['paragraph']; ?></p>
                            <?php endif; ?>
                        </div>

                    <?php endif;
                endforeach;
            endif; ?>
        </div>
    </div>
</section>
