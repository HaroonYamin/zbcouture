<?php
function get_image($image_id, $class = "", $img="w-full h-full object-cover transition-opacity duration-300") {
    if (!$image_id) {
        return '<div class="' . esc_attr($class) . ' bg-gray-200 animate-pulse rounded"></div>';
    }
    
    $image = wp_get_attachment_image_src($image_id, 'full');
    if (!$image) {
        return '<div class="' . esc_attr($class) . ' bg-gray-200 rounded flex items-center justify-center text-gray-400">No Image</div>';
    }
    
    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: '';
    
    return sprintf(
        '<div class="image-with-skeleton relative %s" data-image-id="%d">
            <div class="skeleton-loader absolute inset-0 bg-gray-200 animate-pulse rounded"></div>
            <img src="%s" alt="%s" class="%s" 
                 loading="lazy" style="opacity: 0;" />
        </div>',
        esc_attr($class),
        $image_id,
        esc_url($image[0]),
        esc_attr($alt),
        esc_attr($img)
    );
}

// Minimal skeleton handler
add_action('wp_footer', function() {
    static $script_added = false;
    if (!$script_added) {
        echo '<script>
            function hideImageSkeleton(id) {
                const img = document.getElementById(id);
                const skeleton = document.getElementById("skeleton_" + id);
                if (img && skeleton) {
                    img.style.opacity = "1";
                    skeleton.style.display = "none";
                }
            }
        </script>';
        $script_added = true;
    }
});

// Shared Button
function hy_shared_btn( $title, $url ) {
    if(  !$title ) {
        return 'No Title';
    } elseif( !$url ) {
        return 'No URL';
    } ?>

    <button class="flex items-center gap-2 text-base font-medium text-black font-secondary cursor-pointer" 
        data-title="<?= $title; ?>"
        data-url="<?= $url; ?>"
        data-text="Check out this amazing product!"
        id="hy-share-button">

        <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
        </svg>
        Share
    </button>
    <?php
}