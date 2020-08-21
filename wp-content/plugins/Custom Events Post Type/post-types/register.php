<?php

function ept_register_event_type()
{
    $labels = array(
        'name' => __('Events', EPTDOMAIN),
        'singular_name' => __('Event', EPTDOMAIN),
        'featured_image' => __('Event Logo', EPTDOMAIN),
        'set_featured_image' => __('Set Event Logo', EPTDOMAIN),
        'remove_featured_image' => __('Remove Logo', EPTDOMAIN),
        'use_featured_image' => __('Use Logo', EPTDOMAIN),
        'add_new' => __('Add New Event', EPTDOMAIN),
        'add_new_item' => __('Add New Event', EPTDOMAIN),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => 'Events',
        'rewrite' => array('has_front' => true),
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true, // To enable Gutenberg Editor
    );

    register_post_type('event', $args);
}
