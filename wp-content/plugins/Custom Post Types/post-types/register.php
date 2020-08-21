<?php

function lpt_register_business_type()
{
    $labels = array(
        'name' => __('Businesses', LPTDOMAIN),
        'singular_name' => __('Business', LPTDOMAIN),
        'featured_image' => __('Business Logo', LPDOMAIN),
        'set_featured_image' => __('Set Business Logo', LPDOMAIN),
        'remove_featured_image' => __('Remove Logo', LPDOMAIN),
        'use_featured_image' => __('Use Logo', LPDOMAIN),
        'add_new' => __('Add New Business', LPDOMAIN),
        'add_new_item' => __('Add New Business', LPDOMAIN),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => 'businesses',// To display archive page realted to this post
        'rewrite' => array('has_front' => true),
        'menu_icon' => 'dashicons-building',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true, // To enable Gutenberg Editor
    );

    register_post_type('business', $args);
}
