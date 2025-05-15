<?php
/**
 * Theme Functions and Definitions
 *
 * @package YourThemeName
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
 * Custom Post Types
 */
// require_once THEME_DIR . '/php/custom-post-types/config.php';
