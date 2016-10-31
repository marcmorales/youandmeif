<?php

function youandmeif_script_enqueue() {
    
    /*
    -css-
    Bootstrap grid system
    */
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('youandmeifstyle', get_template_directory_uri() . '/css/youandmeif.css', array(), '1.0.0', 'all');
    
    /*
    -js-
    Google Jquery 1.12.4 CDN for IE5 compatibility
    */
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, '1.12.4');
    wp_enqueue_script('jquery');
    wp_enqueue_script('youandmeifjs', get_template_directory_uri() . '/js/youandmeif.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'youandmeif_script_enqueue');

//Navigation Menus
add_theme_support('menus');

register_nav_menus( array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
));
