<?php
    $site_logo = get_field('site_logo', 'option');
    $column_2 = get_field('column_2', 'option');
    $column_3 = get_field('column_3', 'option');
    $column_4 = get_field('column_4', 'option');
    $bottom = get_field('bottom', 'option');

    $global_social_media = get_field('global_social_media', 'option');
    $facebook = $global_social_media['facebook'] ?? '';
    $instagram = $global_social_media['instagram'] ?? '';
    $twitter = $global_social_media['twitter'] ?? '';
    $linkedin = $global_social_media['linkedin'] ?? '';
?>

<footer id="footer" class="mt-24 mb-9">
    <div class="container mx-auto px-5">
        <div class="grid grid-cols-12 gap-x-6 gap-y-12">
            <!-- Logo -->
            <div class="xl:col-span-3 col-span-4 flex justify-center xl:justify-start">
                <?php echo get_image($site_logo, 'w-32 lg:w-40 h-auto'); ?>
            </div>

            <!-- Column 2 -->
            <div class="xl:col-span-2 col-span-4">
                <?php
                    if (!empty($column_2['heading'])) {
                        echo '<h3 class="text-2xl font-medium italic mb-6 font-primary">' . esc_html($column_2['heading']) . '</h3>';
                    }
                    wp_nav_menu(array('theme_location' => 'brand-menu'));
                ?>
            </div>

            <!-- Column 3 -->
            <div class="xl:col-span-2 col-span-4">
                <?php
                    if (!empty($column_3['heading'])) {
                        echo '<h3 class="text-2xl font-medium italic mb-6 font-primary">' . esc_html($column_3['heading']) . '</h3>';
                    }
                    wp_nav_menu(array('theme_location' => 'service-menu'));
                ?>
            </div>

            <!-- Spacer -->
            <div class="col-span-1 xl:block hidden"></div>

            <!-- Column 4 -->
            <div class="xl:col-span-4 col-span-6">
                <?php
                    if (!empty($column_4['heading'])) {
                        echo '<h3 class="text-2xl font-medium italic mb-3 font-primary">' . esc_html($column_4['heading']) . '</h3>';
                    }
                    if (!empty($column_4['content'])) {
                        echo '<p class="mb-6">' . esc_html($column_4['content']) . '</p>';
                    }
                    if (!empty($column_4['enable'])) {
                        echo do_shortcode('[contact-form-7 id="d2fe9f1" title="Newsletter"]');
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="border-b border-gray-300 my-6"></div>

    <div class="container mx-auto px-5">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <!-- Copyright -->
            <?php
                if (!empty($bottom['copywrite'])) {
                    echo '<p class="text-center sm:text-left">' . esc_html($bottom['copywrite']) . '</p>';
                }
            ?>

            <!-- Social Icons -->
            <div class="flex items-center gap-4">
                <?php
                    if (!empty($bottom['social_media'])) :
                        foreach ($bottom['social_media'] as $item) :
                            if ($item === 'fb' && $facebook) : ?>
                                <a href="<?= esc_url($facebook); ?>" target="_blank" rel="noopener">
                                    <?= get_svg('footer_facebook', 'facebook', 'w-6 h-6'); ?>
                                </a>
                            <?php endif; ?>

                            <?php if ($item === 'in' && $instagram) : ?>
                                <a href="<?= esc_url($instagram); ?>" target="_blank" rel="noopener">
                                    <?= get_svg('footer_instagram', 'instagram', 'w-6 h-6'); ?>
                                </a>
                            <?php endif; ?>

                            <?php if ($item === 'x' && $twitter) : ?>
                                <a href="<?= esc_url($twitter); ?>" target="_blank" rel="noopener">
                                    <?= get_svg('footer_twitter', 'twitter', 'w-6 h-6'); ?>
                                </a>
                            <?php endif; ?>

                            <?php if ($item === 'li' && $linkedin) : ?>
                                <a href="<?= esc_url($linkedin); ?>" target="_blank" rel="noopener">
                                    <?= get_svg('footer_linkedin', 'linkedin', 'w-6 h-6'); ?>
                                </a>
                            <?php endif;
                        endforeach;
                    endif;
                ?>
            </div>
        </div>
    </div>
</footer>
