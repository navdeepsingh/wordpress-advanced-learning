<?php
/**
 * Plugin Name: Custom WP Login
 * Version: 0.1
 * Author: Navdeep Singh
 * Licence: GPL+
 * Text domain: cwpl
 */

add_action('login_enqueue_scripts', 'cwpl_login_stylesheet');
 /**
  * Load custom stylesheet on login page
  */
 function cwpl_login_stylesheet() {
     // load stylesheet
     wp_enqueue_style('cwpl_login_stylesheet', plugin_dir_url(__FILE__) . 'login-styles.css');
 }

/**
 * Custom Error Message
 */
add_filter('login_errors', 'cwpl_error_message');
 function cwpl_error_message() {
     return 'Well, that was not it!';
 }

/**
 * Remove Shake Script
 */
add_action('login_footer', 'cwpl_remove_shake');
function cwpl_remove_shake() {
  remove_action('login_footer', 'wp_shake_js', 12);
}

add_filter('admin_title', 'my_admin_title', 10, 2);
function my_admin_title($admin_title, $title) {
  return $title.' -&gt; '.get_bloginfo('name');
}

 
 