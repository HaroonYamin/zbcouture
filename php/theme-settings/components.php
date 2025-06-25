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
