<?php
/**
 * Plugin Name: Events Post Types and Taxonomies
 * Description: A simple plugin for creating custom post types and taxonomoes related to a events
 * Version:     0.1.0
 * Author:      Navdeep Singh
 * Text Domain: ept
 * Licence:     GPL-2.0+ *
 */

defined('ABSPATH') or die('No direct access allowed.');

define('EPT_VERSION', '0.1.0');
define('EPTDOMAIN', 'lpt');
define('EPTPATH', plugin_dir_path(__FILE__));

require_once EPTPATH . '/post-types/register.php';

add_action('init', 'ept_register_event_type');
