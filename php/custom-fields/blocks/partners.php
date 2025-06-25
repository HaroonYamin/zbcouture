<?php
    $enable = get_field('enable');

    if( !$enable ) {
        return;
    }

    $title = get_field('title');
    $gallery = get_field('gallery');
?>

<section class="py-8">
    <div class="container mx-auto px-4 text-center">
        <?php if( $title ) : ?>
            <h2 class="text-[#27221E] text-xl font-light mb-[40px]"><?= $title; ?></h2>
        <?php endif; ?>

        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-6 gap-x-20 gap-y-8">
            <?php if( $gallery ) :
                foreach( $gallery as $image ) :
                    if( $image ) : 
                        echo get_image($image, '', 'h-full max-h-24 w-full object-contain');
                    endif;
                endforeach;
            endif; ?>
        </div>
    </div>
</section>
