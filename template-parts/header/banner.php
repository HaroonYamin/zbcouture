<?php
    $global_social_media = get_field('global_social_media', 'option');
    $facebook = $global_social_media['facebook'];
    $instagram = $global_social_media['instagram'];
    $twitter = $global_social_media['twitter'];

    $banner = get_field('header_banner', 'option');
    $social_media = $banner['social_media'];
    $text = $banner['text'];
?>

<section class="bg-primary">
    <div class="container mx-auto py-1 px-4">
        <div class="flex flex-row items-center justify-between relative">
            <?php if( $social_media ) : ?>
                <div class="flex flex-row gap-1">
                    <?php foreach( $social_media as $item ) :
                        if( $item ) : ?>
                            <?php if( $item === 'fb' ) : ?>
                                <a href="<?= $facebook; ?>" target="_blank" class="hover:bg-stone-600 rounded">
                                    <?= get_svg( 'facebook', 'facebook', 'w-24' ); ?>
                                </a>
                            <?php endif; ?>

                            <?php if( $item === 'in' ) : ?>
                                <a href="<?= $instagram; ?>" target="_blank" class="hover:bg-stone-600 rounded">
                                    <?= get_svg( 'instagram', 'instagram', 'w-24' ); ?>
                                </a>
                            <?php endif; ?>

                            <?php if( $item === 'x' ) : ?>
                                <a href="<?= $instagram; ?>" target="_blank" class="hover:bg-stone-600 rounded">
                                    <?= get_svg( 'twitter', 'twitter', 'w-24' ); ?>
                                </a>
                            <?php endif; ?>
                        <?php endif;
                    endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if( $text ) : ?>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <p class="text-white font-medium"><?= $text; ?></p>
                </div>
            <?php endif; ?>

            <div></div>
        </div>
    </div>
</section>