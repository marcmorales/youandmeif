<?php

// Linking CSS styles and JS Scripts
function youandmeif_script_enqueue() {
    
    /*
    -css-
    Bootstrap grid system
    */
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('youandmeifstyle', get_template_directory_uri() . '/css/youandmeif.css', array(), '1.0.0', 'all');
    
    /*
    -js-
    Google Jquery 2.2.4 CDN
    */
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, '2.2.4');
    wp_enqueue_script('jquery');
    wp_enqueue_script('youandmeifjs', get_template_directory_uri() . '/js/youandmeif.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'youandmeif_script_enqueue');

// Removing default Wordpress top-margin 32px !important class
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

//Navigation Menus
add_theme_support('menus');

register_nav_menus( array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
));