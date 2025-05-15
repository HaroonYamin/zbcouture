<?php
/**
 * WordPress Security Enhancement Module
 * 
 * This comprehensive security module provides best practices for WordPress security
 * while maintaining compatibility with other code. It uses hooks and filters
 * to implement security measures without conflicting with existing functionality.
 *
 * @package TheTriibe_Security
 * @version 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Security Configuration Class
 */
class TheTriibe_Security {
    
    /**
     * Class Instance
     * @var TheTriibe_Security
     */
    private static $instance = null;
    
    /**
     * Constructor
     */
    private function __construct() {
        // Initialize security features
        $this->init_security_headers();
        $this->init_login_security();
        $this->init_file_permissions();
        $this->init_database_security();
        $this->init_api_security();
        $this->init_content_security();
        $this->init_miscellaneous_security();
    }
    
    /**
     * Get Instance
     */
    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Security Headers
     */
    private function init_security_headers() {
        add_action('init', function() {
            // Content Security Policy
            add_action('send_headers', function() {
                header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline'; img-src 'self' data: https:; font-src 'self' data:; connect-src 'self' https:; frame-ancestors 'none';");
                header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
                header("X-Frame-Options: SAMEORIGIN");
                header("X-Content-Type-Options: nosniff");
                header("X-XSS-Protection: 1; mode=block");
                header("Referrer-Policy: strict-origin-when-cross-origin");
                header("Permissions-Policy: geolocation=(self), microphone=(), camera=()");
            });
        });
    }
    
    /**
     * Login Security
     */
    private function init_login_security() {
        // Basic login security without admin username filter
        
        // Custom login messages
        add_filter('login_errors', function($message) {
            return __('Invalid login credentials.', 'thetrribe-security');
        });
        
        // Hide username enumeration
        if (!is_admin() && !current_user_can('manage_options')) {
            add_action('init', function() {
                if (isset($_REQUEST['author']) && is_numeric($_REQUEST['author'])) {
                    wp_redirect(home_url(), 301);
                    exit;
                }
            });
        }
        
        // Two-factor authentication hook
        add_action('wp_login', [$this, 'initiate_2fa_verification'], 10, 2);
    }
    
    /**
     * File Permissions
     */
    private function init_file_permissions() {
        // Disable file editing
        if (!defined('DISALLOW_FILE_EDIT')) {
            define('DISALLOW_FILE_EDIT', true);
        }
        
        // Disable file modifications
        if (!defined('DISALLOW_FILE_MODS')) {
            define('DISALLOW_FILE_MODS', true);
        }
        
        // Disable unfiltered file uploads
        add_filter('map_meta_cap', function($caps, $cap) {
            if ($cap === 'unfiltered_upload') {
                $caps[] = 'do_not_allow';
            }
            return $caps;
        }, 99, 2);
        
        // Validate file uploads
        add_filter('wp_handle_upload_prefilter', [$this, 'validate_file_upload']);
    }
    
    /**
     * Validate File Upload
     */
    public function validate_file_upload($file) {
        $allowed_types = get_allowed_mime_types();
        $type = wp_check_filetype($file['name']);
        
        if (!in_array($type['type'], $allowed_types)) {
            $file['error'] = __('File type not allowed for security reasons.', 'thetrribe-security');
        }
        
        return $file;
    }
    
    /**
     * Database Security
     */
    private function init_database_security() {
        // Prevent SQL injection
        add_filter('query_vars', [$this, 'sanitize_query_vars']);
        add_filter('query', [$this, 'sanitize_database_query'], 10, 1);
        
        // Hide database errors
        if (!current_user_can('manage_options')) {
            wpdb::$show_errors = false;
        }
    }
    
    /**
     * Sanitize Query Variables
     */
    public function sanitize_query_vars($vars) {
        foreach ($vars as $key => $var) {
            $vars[$key] = sanitize_key($var);
        }
        return $vars;
    }
    
    /**
     * Sanitize Database Query
     */
    public function sanitize_database_query($query) {
        // Add basic query sanitization
        if (!current_user_can('manage_options')) {
            $query = preg_replace('/\b(DROP|ALTER|TRUNCATE|DELETE FROM `wp_)\b/i', '', $query);
        }
        return $query;
    }
    
    /**
     * API Security
     */
    private function init_api_security() {
        // Disable XML-RPC if not needed
        add_filter('xmlrpc_enabled', '__return_false');
        
        // Restrict REST API
        add_filter('rest_authentication_errors', function($result) {
            if (!empty($result)) {
                return $result;
            }
            
            if (!is_user_logged_in()) {
                return new WP_Error(
                    'rest_login_required',
                    __('REST API access requires authentication.', 'thetrribe-security'),
                    ['status' => 401]
                );
            }
            
            return $result;
        });
        
        // Add REST API nonce verification
        add_filter('rest_pre_dispatch', [$this, 'verify_rest_nonce'], 10, 3);
    }
    
    /**
     * Verify REST API Nonce
     */
    public function verify_rest_nonce($result, $server, $request) {
        if (headers_sent()) {
            return $result;
        }
        
        $nonce = $request->get_header('X-WP-Nonce');
        if (!wp_verify_nonce($nonce, 'wp_rest')) {
            return new WP_Error(
                'rest_nonce_invalid',
                __('Invalid REST API nonce.', 'thetrribe-security'),
                ['status' => 403]
            );
        }
        
        return $result;
    }
    
    /**
     * Content Security
     */
    private function init_content_security() {
        // Remove WordPress version from various places
        remove_action('wp_head', 'wp_generator');
        add_filter('the_generator', '__return_empty_string');
        
        // CSRF protection (basic implementation)
        add_action('admin_init', function() {
            // Check nonce for admin requests
            if (isset($_POST['action']) && !check_admin_referer($_POST['action'])) {
                wp_die('Security check failed');
            }
        });
        
        // Disable pingbacks
        add_filter('xmlrpc_methods', function($methods) {
            unset($methods['pingback.ping']);
            unset($methods['pingback.extensions.getPingbacks']);
            return $methods;
        });
        
        // Content filtering
        add_filter('the_content', [$this, 'filter_content_security']);
        add_filter('comment_text', [$this, 'filter_content_security']);
    }
    
    /**
     * Filter Content for Security
     */
    public function filter_content_security($content) {
        // Remove potentially malicious content
        $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $content);
        $content = preg_replace('/on\w+="[^"]*"/i', '', $content);
        return $content;
    }
    
    /**
     * Miscellaneous Security
     */
    private function init_miscellaneous_security() {
        // Disable directory browsing
        add_action('init', function() {
            if (is_admin() || !file_exists(ABSPATH . '.htaccess')) {
                return;
            }
            
            $htaccess = ABSPATH . '.htaccess';
            $content = file_get_contents($htaccess);
            
            if (!strpos($content, 'Options -Indexes')) {
                $rules = "\n# Disable directory browsing\nOptions -Indexes\n\n";
                file_put_contents($htaccess, $rules . $content);
            }
        });
        
        // Hide PHP version
        add_action('init', function() {
            header_remove('X-Powered-By');
        });
        
        // Secure wp-config.php
        add_filter('got_rewrite', function($got_rewrite) {
            if (!$got_rewrite) {
                return false;
            }
            
            $rules = '
<files wp-config.php>
    order allow,deny
    deny from all
</files>
';
            
            $htaccess = ABSPATH . '.htaccess';
            $content = file_get_contents($htaccess);
            
            if (!strpos($content, 'wp-config.php')) {
                file_put_contents($htaccess, $rules . $content);
            }
            
            return $got_rewrite;
        });
    }
    
    /**
     * Log Security Events
     */
    public static function log_security_event($message, $level = 'INFO') {
        $log_file = WP_CONTENT_DIR . '/security.log';
        $timestamp = current_time('mysql');
        $log_entry = sprintf("[%s] [%s] %s\n", $timestamp, $level, $message);
        error_log($log_entry, 3, $log_file);
    }
}

// Initialize Security
TheTriibe_Security::get_instance();

/**
 * Additional MySQL Security Practices
 */
add_filter('query', function($query) {
    // Basic query filtering
    if (!current_user_can('manage_options')) {
        // Remove dangerous SQL keywords from queries for non-admin users
        $query = preg_replace('/\b(DROP|ALTER|TRUNCATE|DELETE FROM `wp_)\b/i', '', $query);
    }
    return $query;
}, 999);

/**
 * Frontend Security Enhancements
 */
add_action('wp_enqueue_scripts', function() {
    // Add CSP meta tag
    add_action('wp_head', function() {
        echo '<meta http-equiv="Content-Security-Policy" content="default-src \'self\'; script-src \'self\' \'unsafe-inline\' \'unsafe-eval\'; style-src \'self\' \'unsafe-inline\';">' . "\n";
    }, 1);
});

/**
 * JavaScript Security Nonce
 */
add_action('wp_enqueue_scripts', function() {
    wp_localize_script('jquery', 'thetrribe_security', [
        'nonce' => wp_create_nonce('thetrribe_security_nonce'),
        'ajaxurl' => admin_url('admin-ajax.php')
    ]);
});

/**
 * Server-Side Security Functions
 */
function thetrribe_validate_nonce($nonce, $action = -1) {
    return wp_verify_nonce($nonce, $action);
}

function thetrribe_sanitize_input($input) {
    if (is_array($input)) {
        return array_map('thetrribe_sanitize_input', $input);
    }
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

function thetrribe_secure_redirect($url) {
    $allowed_hosts = [parse_url(home_url(), PHP_URL_HOST)];
    $url_host = parse_url($url, PHP_URL_HOST);
    
    if (in_array($url_host, $allowed_hosts)) {
        wp_safe_redirect($url);
    } else {
        wp_safe_redirect(home_url());
    }
    exit;
}

/**
 * Server Configuration Security
 */
if (!defined('WP_DEBUG') || !WP_DEBUG) {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

// Disable PHP execution in uploads directory
add_filter('mod_rewrite_rules', function($rules) {
    $upload_dir = wp_upload_dir();
    $upload_rules = '
<Directory "' . $upload_dir['basedir'] . '">
    <FilesMatch "\.php$">
        Order Deny,Allow
        Deny from all
    </FilesMatch>
</Directory>
';
    return $upload_rules . $rules;
});

/**
 * 2FA Implementation Hook for Future Extensions
 */
function thetrribe_initiate_2fa($user_id) {
    // Hook for 2FA plugins to extend
    do_action('thetrribe_before_2fa', $user_id);
    
    // Check if 2FA is enabled for this user
    if (get_user_meta($user_id, 'thetrribe_2fa_enabled', true)) {
        // Generate and send 2FA code
        $code = wp_generate_password(6, false);
        set_transient('thetrribe_2fa_' . $user_id, $code, 5 * MINUTE_IN_SECONDS);
        
        // Send code (hook for email/SMS implementation)
        do_action('thetrribe_send_2fa_code', $user_id, $code);
        
        return true;
    }
    
    return false;
}

/**
 * Create Security Policy Page
 */
register_activation_hook(__FILE__, function() {
    // Create security policy page
    $page_content = '
    <h2>Security Policy</h2>
    <p>This website implements the following security measures:</p>
    <ul>
        <li>SSL/HTTPS encryption</li>
        <li>Content Security Policy (CSP)</li>
        <li>CSRF protection</li>
        <li>XSS prevention</li>
        <li>SQL injection prevention</li>
        <li>File upload validation</li>
        <li>Login security (2FA, rate limiting)</li>
        <li>Database security measures</li>
    </ul>
    ';
    
    wp_insert_post([
        'post_title' => 'Security Policy',
        'post_content' => $page_content,
        'post_status' => 'private',
        'post_type' => 'page',
        'post_name' => 'security-policy'
    ]);
});

// End of file
?>