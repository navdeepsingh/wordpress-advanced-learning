<?php
/**
 * Plugin Name: Business Directory Post Types and Taxonomies
 * Description: A simple plugin for creating custom post types and taxonomoes related to a business directory
 * Version:     0.1.0
 * Author:      Navdeep Singh
 * Text Domain: lpt
 * Licence:     GPL-2.0+ *
 */

defined('ABSPATH') or die('No direct access allowed.');

define('LPT_VERSION', '0.1.0');
define('LPTDOMAIN', 'lpt');
define('LPTPATH', plugin_dir_path(__FILE__));

require_once LPTPATH . '/post-types/register.php';
require_once LPTPATH . '/taxonomies/register.php';

add_action('init', 'lpt_register_business_type');
add_action('init', 'lpt_register_size_taxonomy');
add_action('init', 'lpt_register_location_taxonomy');

function lpt_rewrite_flush() {
    lpt_register_business_type();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'lpt_rewrite_flush');
