<?php
function get_image($image_id, $class = "") {
    if (!$image_id) {
        return '<div class="' . esc_attr($class) . ' bg-gray-200 animate-pulse rounded"></div>';
    }
    
    $image = wp_get_attachment_image_src($image_id, 'full');
    if (!$image) {
        return '<div class="' . esc_attr($class) . ' bg-gray-200 rounded flex items-center justify-center text-gray-400">No Image</div>';
    }
    
    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: '';
    $unique_id = 'img_' . $image_id . '_' . uniqid();
    
    return sprintf(
        '<div class="relative %s">
            <div id="skeleton_%s" class="absolute inset-0 bg-gray-200 animate-pulse rounded"></div>
            <img id="%s" src="%s" alt="%s" class="w-full h-full object-cover opacity-0 transition-opacity duration-300" 
                 loading="lazy" onload="hideImageSkeleton(\'%s\')" />
        </div>',
        esc_attr($class),
        $unique_id,
        $unique_id,
        esc_url($image[0]),
        esc_attr($alt),
        $unique_id
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
