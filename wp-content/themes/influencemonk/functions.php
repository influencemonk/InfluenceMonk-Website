<?php
/*
========================================================
 * Include CSS and JS Files
========================================================
*/


function files_enqueue() {
    wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), '1.0.0', true);
    wp_enqueue_script('customjs', get_template_directory_uri().'/assets/js/index.js', array(), '1.0.0', true);
    wp_enqueue_style('bootstrapcss', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('customcss', get_template_directory_uri().'/assets/css/index.css', array(), '1.0.0', 'all' );

    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'files_enqueue');

/*
========================================================
 * Activate Theme Supports
========================================================
*/

function theme_supports() {
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support('menus');

    register_nav_menu('primary', "Primary Header Menu");
}

add_action('init', 'theme_supports');


/*
========================================================
 * Include Walker Class
========================================================
*/
require get_template_directory() . '/inc/walker_class.php';