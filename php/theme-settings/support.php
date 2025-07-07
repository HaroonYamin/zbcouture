<?php
/**
 * WordPress Support Functions
 * 
 * Enables the following WordPress features
 * with proper configuration
 *
 * @package TheTriibe
 * @version 1.0.0
 */

/*
 * WordPress Active Support
 */
function wordpress_active() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'custom-logo' );
	register_nav_menus(
		array(
			'left-header-menu' => esc_html__( 'Left Header Menu', 'main' ),
			'right-header-menu' => esc_html__( 'Right Header Menu', 'main' ),
			'brand-menu' => esc_html__( 'Brand Menu', 'footer' ),
			'service-menu' => esc_html__( 'Service Menu', 'footer' ),
        )
	);
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'wordpress_active' );

/*
 * Allow SVG and WebP uploads
 */
add_filter( 'upload_mimes', function( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';
	return $mimes;
} );

// Sanitize SVG files on upload (only for admins)
add_filter( 'wp_handle_upload_prefilter', function( $file ) {
	if (
		isset( $file['type'] ) &&
		$file['type'] === 'image/svg+xml' &&
		current_user_can( 'administrator' )
	) {
		// Sanitize using built-in filter if you install a library like enshrined/svg-sanitizer
		// Or optionally warn the user if you're not sanitizing
	} elseif ( $file['type'] === 'image/svg+xml' ) {
		$file['error'] = 'Only administrators can upload SVG files.';
	}
	return $file;
} );

/**
 * Simple SVG Icon Loader
 * The function returns the SVG content as a string
 * 
 * The folder that contains the icons is theme/assets/icons
 */
function get_svg($icon_name, $class = '') {
    $filepath = THEME_DIR . "/assets/icons/{$icon_name}.svg";
    
    if (!file_exists($filepath)) {
        return '';
    }

    // Retrieve SVG content with basic XSS prevention
    $svg_content = file_get_contents($filepath);
    $svg_content = preg_replace('/<script[\s\S]*?>[\s\S]*?<\/script>/i', '', $svg_content);
    
    // Add class if provided
    if (!empty($class)) {
        $svg_content = str_replace('<svg', "<svg class='{$class}'", $svg_content);
    }
    
    return $svg_content;
}

// Remove the WooCommerce styles
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Convert WooCommerce variation dropdown to buttons
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'hy_convert_variation_dropdown_to_buttons', 20, 2 );
function hy_convert_variation_dropdown_to_buttons( $html, $args ) {
    if ( ! isset( $args['options'], $args['attribute'] ) ) return $html;
    
    $options   = $args['options'];
    $attribute = $args['attribute'];
    $product   = $args['product'];
    $name      = esc_attr( $attribute );
    $id        = esc_attr( $attribute );
    $selected  = isset( $args['selected'] ) ? $args['selected'] : '';

    if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
        $attributes = $product->get_variation_attributes();
        $options    = $attributes[ $attribute ];
    }

    if ( empty( $options ) ) return $html;

    $buttons = '<div class="hy-variation-buttons" data-attribute_name="attribute_' . esc_attr( $attribute ) . '">';
    foreach ( $options as $option ) {
        $selected_class = sanitize_title( $selected ) === sanitize_title( $option ) ? ' selected' : '';
        $buttons .= '<button type="button" class="hy-variation-button' . $selected_class . '" data-value="' . esc_attr( $option ) . '">' . esc_html( $option ) . '</button>';
    }
    $buttons .= '</div>';

    // Hide original dropdown (for fallback/accessibility)
    $html = '<div class="hy-hidden-dropdown" style="display:none;">' . $html . '</div>' . $buttons;
    return $html;
}

// Add ACF Menu Item
add_filter('wp_nav_menu_objects', 'add_acf_to_menu_items', 10, 2);

function add_acf_to_menu_items($items, $args) {
    if (!function_exists('get_field')) {
        return $items;
    }
    
    $new_items = array();
    $acf_items = array();
    
    foreach ($items as $item) {
        $new_items[] = $item;
        
        // Get ACF fields for this menu item
        $menu_data = get_field('hy_menu', $item);
        
        // Check if fields exist and are not empty
        if ($menu_data && 
            (!empty($menu_data['image']) || !empty($menu_data['title']) || !empty($menu_data['subtitle']))) {
            
            // Create custom menu item with all required properties
            $custom_item = new stdClass();
            $custom_item->ID = 'acf-' . $item->ID;
            $custom_item->db_id = 0;
            $custom_item->menu_item_parent = $item->ID;
            $custom_item->object_id = 0;
            $custom_item->object = 'custom';
            $custom_item->type = 'custom';
            $custom_item->type_label = 'Custom';
            $custom_item->title = '';
            $custom_item->url = '#';
            $custom_item->target = '';
            $custom_item->attr_title = '';
            $custom_item->description = '';
            $custom_item->classes = array('menu-item-acf');
            $custom_item->xfn = '';
            $custom_item->menu_order = 9999;
            
            // Store ACF data
            $custom_item->acf_image = $menu_data['image'];
            $custom_item->acf_title = $menu_data['title'];
            $custom_item->acf_subtitle = $menu_data['subtitle'];
            
            // Store for later to add at end
            $acf_items[] = $custom_item;
        }
    }
    
    // Add ACF items at the end
    return array_merge($new_items, $acf_items);
}

// Custom walker to display ACF fields
add_filter('wp_nav_menu_args', 'use_acf_walker');

function use_acf_walker($args) {
    $args['walker'] = new ACF_Walker();
    return $args;
}

class ACF_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', $classes);
        
        $output .= '<li class="' . $class_names . '">';
        
        // Check if this is our ACF item
        if (in_array('menu-item-acf', $classes)) {
            // Display ACF content only if fields exist
            if (!empty($item->acf_image)) {
                $output .= '<img src="' . $item->acf_image['url'] . '" alt="' . $item->acf_image['alt'] . '">';
            }
			if (!empty($item->acf_title)) {
				$output .= '<h3>' . $item->acf_title . '</h3>';
			}
			if (!empty($item->acf_subtitle)) {
				$output .= '<p>' . $item->acf_subtitle . '</p>';
			}
        } else {
            // Regular menu item
            $output .= '<a href="' . $item->url . '">' . $item->title . '</a>';
        }
    }
}