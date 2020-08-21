<?php
add_action('wp_enqueue_scripts', 'lpt_child_enqueue_styles');
function lpt_child_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_uri(), array('parent-style')); // Get child theme directory
}
