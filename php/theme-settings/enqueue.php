<?php
/**
 * Asset Management Functions
 * 
 * Handles the efficient loading of CSS and JavaScript files
 * with proper versioning and dependency management.
 *
 * @package TheTriibe
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Define asset paths and configurations
 */
define('THEME_ASSETS', [
    'css' => [
        'bootstrap' => [
            'path' => '/lib/bootstrap/css/bootstrap.min.css',
            'deps' => []
        ],
        'main' => [
            'path' => '/assets/css/custom.css',
            'deps' => []
        ]
    ],
    'js' => [
        'main' => [
            'path' => '/assets/js/custom.js',
            'deps' => ['jquery']
        ],
        'bootstrap' => [
            'path' => '/lib/bootstrap/js/bootstrap.min.js',
            'deps' => ['jquery']
        ]
    ]
]);

/**
 * Enqueue stylesheet with proper version control
 */
function enqueue_theme_style($handle, $path, $deps = []) {
    $full_path = THEME_DIR . $path;
    
    if (!file_exists($full_path)) {
        return;
    }

    wp_enqueue_style(
        $handle,
        THEME_URI . $path,
        $deps,
        filemtime($full_path)
    );
}

/**
 * Enqueue script with proper version control
 */
function enqueue_theme_script($handle, $path, $deps = []) {
    $full_path = THEME_DIR . $path;
    
    if (!file_exists($full_path)) {
        return;
    }

    wp_enqueue_script(
        $handle,
        THEME_URI . $path,
        $deps,
        filemtime($full_path),
        true
    );
}

/**
 * Main enqueue function for all theme assets
 */
function enqueue_theme_assets() {
    // Enqueue Styles
    foreach (THEME_ASSETS['css'] as $handle => $asset) {
        enqueue_theme_style($handle, $asset['path'], $asset['deps']);
    }

    // Enqueue Scripts
    wp_enqueue_script('jquery');  // WordPress core jQuery
    foreach (THEME_ASSETS['js'] as $handle => $asset) {
        enqueue_theme_script($handle, $asset['path'], $asset['deps']);
    }

    // Localize Scripts
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');