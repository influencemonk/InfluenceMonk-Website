<?php
/*
========================================================
 * Include CSS and JS Files
========================================================
*/
wp_enqueue_script('jquery');



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

?>