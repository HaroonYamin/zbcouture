
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
    
    return sprintf(
        '<img src="%s" alt="%s" class="%s lazy-load" loading="lazy" onload="this.classList.remove(\'opacity-0\')" style="transition:opacity 0.3s" />',
        esc_url($image[0]),
        esc_attr($alt),
        esc_attr($class . ' opacity-0')
    );
}

// Optional: Add to functions.php for enhanced performance
add_action('wp_enqueue_scripts', function() {
    wp_add_inline_script('jquery', '
        $(document).ready(function() {
            $(".lazy-load").each(function() {
                if (this.complete) $(this).removeClass("opacity-0");
            });
        });
    ');
});
