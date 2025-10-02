<?php
/*
 * Register Custom Post Types and Taxonomies from JSON
 * Safe Rewrite Flush Fix
 */

// 1. Always register CPTs/Taxonomies on init
add_action('init', 'register_cpts_and_taxonomies_from_json', 10);

function register_cpts_and_taxonomies_from_json() {
    $json_file = __DIR__ . '/register.json';

    if (!file_exists($json_file)) {
        return; // Exit if the file doesn't exist
    }

    $cpts = json_decode(file_get_contents($json_file), true);

    if (empty($cpts) || !is_array($cpts)) {
        return; // Exit if JSON is invalid or empty
    }

    foreach ($cpts as $cpt) {
        $post_type = $cpt['post_type'];
        $taxonomy_name = '';

        // ✅ Register taxonomy if exists
        if (!empty($cpt['taxonomy'])) {
            $taxonomy_name = $cpt['taxonomy']['name'];
            register_taxonomy(
                $taxonomy_name,
                array($post_type),
                array(
                    'labels'            => $cpt['taxonomy']['labels'],
                    'hierarchical'      => true,
                    'public'            => true,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'show_in_nav_menus' => true,
                    'show_tagcloud'     => true,
                    'show_in_rest'      => true,
                )
            );
        }

        // ✅ Register CPT
        register_post_type($post_type, array(
            'show_in_rest' => true,
            'supports'     => !empty($cpt['supports']) ? $cpt['supports'] : array('title', 'editor', 'thumbnail'),
            'rewrite'      => array('slug' => !empty($cpt['slug']) ? $cpt['slug'] : $post_type),
            'has_archive'  => true,
            'public'       => true,
            'taxonomies'   => !empty($taxonomy_name) ? array($taxonomy_name) : array(),
            'labels'       => $cpt['labels'],
            'menu_icon'    => !empty($cpt['menu_icon']) ? $cpt['menu_icon'] : 'dashicons-admin-post',
        ));

        // ✅ Featured Option Meta Box (if enabled in JSON)
        if (!empty($cpt['has_featured_option']) && $cpt['has_featured_option'] === true) {
            add_action('add_meta_boxes_' . $post_type, 'add_featured_option_meta_box');
            add_action('save_post_' . $post_type, 'save_featured_option_meta_data', 10, 2);
        }
    }
}

/**
 * Featured Option Meta Box
 */
function add_featured_option_meta_box($post) {
    add_meta_box(
        'featured_option_metabox',
        'Featured Option',
        'featured_option_meta_box_html',
        $post->post_type,
        'side',
        'default'
    );
}

function featured_option_meta_box_html($post) {
    wp_nonce_field('featured_option_nonce_action', 'featured_option_nonce');
    $is_featured = get_post_meta($post->ID, '_is_featured', true);
    ?>
    <p>
        <input type="checkbox" id="featured_option_checkbox" name="featured_option_checkbox" value="1" <?php checked($is_featured, '1'); ?>>
        <label for="featured_option_checkbox">Mark this item as featured</label>
    </p>
    <?php
}

function save_featured_option_meta_data($post_id, $post) {
    if (!isset($_POST['featured_option_nonce']) || !wp_verify_nonce($_POST['featured_option_nonce'], 'featured_option_nonce_action')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    $is_featured = isset($_POST['featured_option_checkbox']) ? '1' : '0';
    update_post_meta($post_id, '_is_featured', $is_featured);
}

/**
 * ✅ Flush Rewrite Rules Correctly
 * - Only runs once on plugin activation or theme switch
 */

// If this is inside a PLUGIN
if (function_exists('register_activation_hook')) {
    register_activation_hook(__FILE__, 'myplugin_rewrite_flush');
    function myplugin_rewrite_flush() {
        register_cpts_and_taxonomies_from_json();
        flush_rewrite_rules();
    }

    register_deactivation_hook(__FILE__, 'myplugin_rewrite_flush_deactivate');
    function myplugin_rewrite_flush_deactivate() {
        flush_rewrite_rules();
    }
}

// If this is inside a THEME
add_action('after_switch_theme', 'mytheme_rewrite_flush');
function mytheme_rewrite_flush() {
    register_cpts_and_taxonomies_from_json();
    flush_rewrite_rules();
}
