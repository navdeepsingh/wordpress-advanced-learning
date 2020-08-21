<?php
/**
 * Plugin Name: Single Post Content Plus
 * Description: Adds a sidebar/widget aka to single posts
 * Version:     0.1.0
 * Author:      Navdeep Singh
 * Text Domain: spcp
 * Licence:     SPL-2.0+ * 
 */

 // If this file is called directly, abort
 if (!defined('ABSPATH')) {
    die;
 }

 add_action('wp_enqueue_scripts', 'spcp_login_stylesheet');
 /**
  * Load plugin styles
  */
 function spcp_login_stylesheet() {
     
    if (apply_filters('spcp_load_styles', true)) {
        wp_enqueue_style('wpcp-custom-stylesheet', plugin_dir_url(__FILE__) . 'spcp-styles.css');
    }
 }

 // Uncomment following code to display styles
 // add_filter('spcp_load_styles', __return_false);

 add_action('widgets_init', 'spcp_register_sidebar');
 /**
  * Registers a sidebar called Post Content Plus
  */
 function spcp_register_sidebar() {
    // register sidebar
    register_sidebar( array(
            'name' => __('Post Content Plus', 'spcp'),
            'id' => 'spcp-sidebar',
            'description' => __('Widgets in this area display on single posts', 'spcp'),
            'before_widget' => '<div class="widget spcp-sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',            
        )
    );
 }

 add_filter('the_content', 'spcp_display_sidebars');
 /**
  * Display sidebar
  */
 function spcp_display_sidebars( $content ) {
    //  TODO: Add conditions to display on single posts only
    if (is_single() && is_active_sidebar('spcp-sidebar')) {
        dynamic_sidebar('spcp-sidebar');
    }     
    return $content;
 }
