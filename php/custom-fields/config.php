<?php
/*
 * Custom Fields Blocks Registration
 */
function register_acf_block($name, $title, $description, $template, $keywords) {
    acf_register_block(array(
        'name' => 'acf/' . $name,
        'title' => __($title),
        'description' => __($description),
        'render_template' => THEME_DIR . '/php/custom-fields/blocks/' . $template . '.php',
        'category' => 'formatting',
        'icon' => 'testimonial',
        'keywords' => array($name, $keywords, 'section'),
    ));
}

function blocks_from_json() {
    if (function_exists('acf_register_block')) {
        $json_file = __DIR__ . '/register.json';

        // Load and decode JSON
        if (file_exists($json_file)) {
            $blocks = json_decode(file_get_contents($json_file), true);

            // Register each block from the JSON file
            foreach ($blocks as $block) {
                register_acf_block(
                    $block['name'],
                    $block['title'],
                    $block['description'],
                    $block['template'],
                    $block['keywords'],
                );
            }
        }
    }
}
add_action('acf/init', 'blocks_from_json');

/*
 * Custom Fields Options Page Registration
 */
function custom_fields_add_options_page($page_title, $menu_title, $menu_slug, $parent_slug = null) {
    if ($parent_slug) {
        add_submenu_page(
            $parent_slug,
            $page_title,
            $menu_title,
            'manage_options',
            $menu_slug,
            function() use ($menu_title) {
                echo "<h1>$menu_title</h1>";
                echo "<p>Custom settings for $menu_title.</p>";
            }
        );
    } else {
        add_menu_page(
            $page_title,
            $menu_title,
            'manage_options',
            $menu_slug,
            function() use ($menu_title) {
                echo "<h1>$menu_title</h1>";
                echo "<p>Custom settings for $menu_title.</p>";
            }
        );
    }
}

add_action('admin_menu', function() {
    custom_fields_add_options_page('Theme Settings', 'Theme Settings', 'theme-settings');

    custom_fields_add_options_page('Header Settings', 'Edit Header', 'header-setting', 'theme-settings');
    custom_fields_add_options_page('Footer Settings', 'Edit Footer', 'footer-setting', 'theme-settings');
});
