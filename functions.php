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



// In your theme's functions.php file

/**
 * Enqueue scripts and styles.
 */
function my_theme_enqueue_scripts() {
    wp_enqueue_script( 'my-theme-ajax-load-more', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), null, true );
    // Make sure 'wc_add_to_cart_params' is available. If not, you might need to manually localize data.
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );


/**
 * Handle AJAX request for loading more products.
 */
function load_more_products_ajax_handler() {
    // Check nonce for security (optional but recommended)
    // if ( ! wp_verify_nonce( $_POST['security'], 'woocommerce-cart' ) ) { // Adjust nonce name if needed
    //     wp_send_json_error( 'Nonce verification failed.' );
    // }

    $paged = isset( $_POST['paged'] ) ? intval( $_POST['paged'] ) : 1;
    $per_page = isset( $_POST['per_page'] ) ? intval( $_POST['per_page'] ) : wc_get_loop_prop( 'per_page' ); // Fallback

    // Set up the WooCommerce query
    $args = array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => $per_page,
        'paged'          => $paged,
        'tax_query'      => array(), // Add your specific tax_query if filtering by category, etc.
    );

    // If you have category/tag filters, retrieve them from $_POST or current query
    // Example for current category:
    if ( is_product_category() || is_product_tag() ) {
        $term = get_queried_object();
        $args['tax_query'][] = array(
            'taxonomy' => $term->taxonomy,
            'field'    => 'slug',
            'terms'    => $term->slug,
        );
    }

    $products_query = new WP_Query( $args );

    ob_start(); // Start output buffering

    if ( $products_query->have_posts() ) {
        while ( $products_query->have_posts() ) {
            $products_query->the_post();
            wc_get_template_part( 'content', 'product' ); // Load the WooCommerce product template
        }
    }

    $products_html = ob_get_clean(); // Get buffered content

    wp_reset_postdata(); // Reset post data after custom query

    if ( $products_query->have_posts() ) {
        wp_send_json_success( array( 
            'products' => $products_html,
            'count'    => $products_query->post_count // Number of products returned
        ) );
    } else {
        wp_send_json_error( 'No more products found.' );
    }
}

add_action( 'wp_ajax_load_more_products_ajax', 'load_more_products_ajax_handler' );
add_action( 'wp_ajax_nopriv_load_more_products_ajax', 'load_more_products_ajax_handler' );