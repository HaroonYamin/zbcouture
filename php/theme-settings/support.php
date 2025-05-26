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