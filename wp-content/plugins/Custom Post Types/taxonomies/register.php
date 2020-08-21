<?php

function lpt_register_size_taxonomy()
{
    $labels = array(
        'name' => __('Sizes', LPTDOMAIN),
        'singular_name' => __('Size', LPTDOMAIN),
        'add_new_item' => __('Add New Size', LPTDOMAIN),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_admin_column' => true,
        'show_in_quick_edit' => true,
        'show_in_rest' => true,
    );

    $post_types = array('business');

    register_taxonomy('size', $post_types, $args);
}

function lpt_register_location_taxonomy()
{
    $labels = array(
        'name' => __('Locations', LPTDOMAIN),
        'singular_name' => __('Location', LPTDOMAIN),
        'add_new_item' => __('Add New Location', LPTDOMAIN),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_admin_column' => true,
        'show_in_quick_edit' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite' => array('hierarchical' => true, 'has_front' => true),
    );

    $post_types = array('business', 'event');

    register_taxonomy('location', $post_types, $args);
}
