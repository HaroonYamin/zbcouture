<?php
/**
 * Theme Functions and Definitions
 *
 * @package ZB Couture
 * @version 1.0.0
 * @author Haroon Yamin
 * @link https://www.linkedin.com/in/haroon-webdev/
 * 
 * This file contains the core functionality for the WordPress theme.
 * It handles theme setup, asset management, custom post types,
 * and other essential features.
 */

if (!defined('ABSPATH')) {
    exit;
}

defined('THEME_DIR') || define('THEME_DIR', get_template_directory());
defined('THEME_URI') || define('THEME_URI', get_template_directory_uri());

/*
 * WordPress Theme Security
 */
require_once THEME_DIR . '/php/theme-settings/security.php';

/*
 * WordPress Theme Support
 */
require_once THEME_DIR . '/php/theme-settings/support.php';

/*
 * WordPress Theme Enqueue
 */
require_once THEME_DIR . '/php/theme-settings/enqueue.php';

/*
 * Custom Fields
 */
require_once THEME_DIR . '/php/custom-fields/config.php';

/*
 * WordPress Theme Components - Functions of predefined components
 */
require_once THEME_DIR . '/php/theme-settings/components.php';

/*
 * Custom Post Types
 */
require_once THEME_DIR . '/php/custom-post-types/config.php';





function remove_woocs_loader() {
    echo '<style>
        .woocs-lds-ellipsis { display: none !important; }
    </style>';
}
add_action('wp_head', 'remove_woocs_loader');





add_filter( 'woocommerce_product_variations_attribute_options', 'sort_numeric_product_variations_by_size', 10, 3 );

function sort_numeric_product_variations_by_size( $options, $product, $attribute ) {
    // Only apply to the 'pa_size' attribute
    if ( 'pa_size' === $attribute ) {
        // Remove any empty values if they exist
        $options = array_filter($options);

        // Sort numerically
        usort( $options, 'sort_by_numeric_value' );
    }
    return $options;
}

// Custom comparison function for numeric sorting
function sort_by_numeric_value( $a, $b ) {
    return (int)$a - (int)$b;
}