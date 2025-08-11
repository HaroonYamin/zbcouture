<?php
    $global_social_media = get_field('global_social_media', 'option') ?: [];
    $facebook = $global_social_media['facebook'] ?? '';
    $instagram = $global_social_media['instagram'] ?? '';
    $twitter = $global_social_media['twitter'] ?? '';

    $banner = get_field('header_banner', 'option') ?: [];
    $social_media = $banner['social_media'] ?? [];
    $text = $banner['text'] ?? '';

if ($social_media || $text): ?>

    <section class="bg-primary">
        <div class="py-1 px-4 lg:px-24">
            <div class="flex flex-row items-center justify-between relative">
                <?php if( $social_media ) : ?>
                    <div class="flex flex-row gap-1">
                        <?php foreach( $social_media as $item ) :
                            if( $item ) : ?>
                                <?php if( $item === 'fb' && $facebook ) : ?>
                                    <a href="<?= esc_url($facebook); ?>" target="_blank" rel="noopener noreferrer" class="hover:bg-stone-600 rounded">
                                        <?= get_svg( 'facebook', 'facebook', 'w-24' ); ?>
                                    </a>
                                <?php endif; ?>

                                <?php if( $item === 'in' && $instagram ) : ?>
                                    <a href="<?= esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" class="hover:bg-stone-600 rounded">
                                        <?= get_svg( 'instagram', 'instagram', 'w-24' ); ?>
                                    </a>
                                <?php endif; ?>

                                <?php if( $item === 'x' && $twitter ) : ?>
                                    <a href="<?= esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" class="hover:bg-stone-600 rounded">
                                        <?= get_svg( 'twitter', 'twitter', 'w-24' ); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif;
                        endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if( $text ) : ?>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <p class="text-white font-medium"><?= esc_html($text); ?></p>
                    </div>
                <?php endif; ?>

                <div>
                    <!-- Right side: ENG and USD -->
                    <div class="flex flex-row items-center gap-4">
                        <?php do_shortcode('[woocs sd=1]'); ?>
                        <div class="text-white cursor-pointer flex items-center gap-1 text-base font-medium underline">
                            ENG <span class="text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down-icon lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg></span>
                        </div>
                        <div class="text-white cursor-pointer flex items-center gap-1 text-base font-medium">
                            $USD <span class="text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down-icon lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>